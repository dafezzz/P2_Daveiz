<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageDetail;
use App\Models\PackageItinerary;
use App\Models\PackagePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::withCount('jamaahs')
            ->latest()
            ->paginate(10);

        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:umrah,haji',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quota' => 'required|integer|min:1',
            'departure_date' => 'required|date',
            'duration_days' => 'required|integer|min:1',
            'departure_city' => 'required|string|max:255',
            'room_type' => 'required|in:quad,triple,double',
            'status' => 'required|in:draft,published,closed',
            'photos.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        DB::transaction(function () use ($validated, $request) {

            $package = Package::create([
                ...$validated,
                'code' => 'PKG-' . strtoupper(Str::random(6)),
                'slug' => Str::slug($validated['name']) . '-' . time(),
                'quota_used' => 0,
            ]);

            $package->detail()->create([
                'description' => $request->description,
                'includes' => $request->includes,
                'excludes' => $request->excludes,
            ]);

            if ($request->itinerary_days) {
                foreach ($request->itinerary_days as $i => $day) {
                    $package->itineraries()->create([
                        'day' => $day,
                        'title' => $request->itinerary_titles[$i] ?? null,
                        'description' => $request->itinerary_desc[$i] ?? null,
                    ]);
                }
            }

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('packages', 'public');
                    $package->photos()->create([
                        'photo_path' => $path
                    ]);
                }
            }
        });

        return redirect()->route('packages.index')
            ->with('success', 'Package created');
    }

    public function show(Package $package)
    {
        $package->load(['detail', 'itineraries', 'photos', 'jamaahs']);
        return view('admin.packages.show', compact('package'));
    }

    public function edit(Package $package)
    {
        $package->load(['detail', 'itineraries', 'photos']);
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'type' => 'required|in:umrah,haji',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'quota' => 'required|integer|min:1',
            'departure_date' => 'required|date',
            'duration_days' => 'required|integer|min:1',
            'departure_city' => 'required|string|max:255',
            'room_type' => 'required|in:quad,triple,double',
            'status' => 'required|in:draft,published,closed',
            'photos.*' => 'image|mimes:jpg,jpeg,png|max:2048'
        ]);

        DB::transaction(function () use ($validated, $request, $package) {

            $package->update([
                ...$validated,
                'slug' => Str::slug($validated['name']) . '-' . time(),
            ]);

            $package->detail()->updateOrCreate(
                ['package_id' => $package->id],
                [
                    'description' => $request->description,
                    'includes' => $request->includes,
                    'excludes' => $request->excludes,
                ]
            );

            $package->itineraries()->delete();

            if ($request->itinerary_days) {
                foreach ($request->itinerary_days as $i => $day) {
                    $package->itineraries()->create([
                        'day' => $day,
                        'title' => $request->itinerary_titles[$i] ?? null,
                        'description' => $request->itinerary_desc[$i] ?? null,
                    ]);
                }
            }

            if ($request->delete_photos) {
                $photos = PackagePhoto::whereIn('id', $request->delete_photos)
                    ->where('package_id', $package->id)
                    ->get();

                foreach ($photos as $photo) {
                    if (Storage::disk('public')->exists($photo->photo_path)) {
                        Storage::disk('public')->delete($photo->photo_path);
                    }
                    $photo->delete();
                }
            }

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('packages', 'public');
                    $package->photos()->create([
                        'photo_path' => $path
                    ]);
                }
            }
        });

        return redirect()->route('packages.index')
            ->with('success', 'Package updated');
    }

    public function destroy(Package $package)
    {
        if ($package->jamaahs()->count() > 0) {
            return back()->with('error', 'Package already has jamaah');
        }

        DB::transaction(function () use ($package) {

            foreach ($package->photos as $photo) {
                if (Storage::disk('public')->exists($photo->photo_path)) {
                    Storage::disk('public')->delete($photo->photo_path);
                }
                $photo->delete();
            }

            $package->detail()?->delete();
            $package->itineraries()->delete();
            $package->delete();
        });

        return back()->with('success', 'Deleted');
    }
}