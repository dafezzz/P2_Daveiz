<?php

namespace App\Http\Controllers;

use App\Models\Jamaah;
use App\Models\Package;
use Illuminate\Http\Request;

class JamaahController extends Controller
{
    /**
     * List Jamaah
     */
    public function index(Request $request)
    {
        $query = Jamaah::with(['package', 'user'])->latest();

        // FILTER STATUS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // FILTER PACKAGE
        if ($request->filled('package_id')) {
            $query->where('package_id', $request->package_id);
        }

        // SEARCH NAMA
        if ($request->filled('search')) {
            $query->where('full_name', 'like', '%' . $request->search . '%');
        }

        $jamaahs = $query->paginate(10);
        $packages = Package::all();

        return view('admin.jamaahs.index', compact('jamaahs', 'packages'));
    }

    /**
     * Detail Jamaah
     */
    public function show(Jamaah $jamaah)
    {
        $jamaah->load([
            'package',
            'user',
            'documents',
            'health'
        ]);

        return view('admin.jamaahs.show', compact('jamaah'));
    }

    /**
     * Update Status Jamaah
     */
    public function updateStatus(Request $request, Jamaah $jamaah)
    {
        $request->validate([
            'status' => 'required|in:pending,revisi,confirmed,cancelled'
        ]);

        $jamaah->update([
            'status' => $request->status
        ]);

        return redirect()
            ->back()
            ->with('success', 'Status jamaah berhasil diperbarui');
    }

    /**
     * Delete Jamaah
     */
    public function destroy(Jamaah $jamaah)
    {
        $jamaah->delete();

        return redirect()
            ->back()
            ->with('success', 'Data jamaah berhasil dihapus');
    }
}