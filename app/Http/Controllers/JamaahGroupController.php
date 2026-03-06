<?php

namespace App\Http\Controllers;

use App\Models\JamaahGroup;
use App\Models\Package;
use Illuminate\Http\Request;

class JamaahGroupController extends Controller
{
    public function index()
    {
        $groups = JamaahGroup::with(['package'])
            ->withCount('jamaahs')
            ->latest()
            ->paginate(10);

        return view('admin.jamaah-groups.index',compact('groups'));
    }

    public function create()
    {
        $packages = Package::pluck('name','id');

        return view('admin.jamaah-groups.create',compact('packages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'package_id'=>'required',
            'departure_date'=>'required|date'
        ]);

        JamaahGroup::create($request->all());

        return redirect()
            ->route('jamaah-groups.index')
            ->with('success','Group created');
    }

    public function show(JamaahGroup $jamaahGroup)
    {
        $jamaahGroup->load(['package','jamaahs']);

        return view('admin.jamaah-groups.show',compact('jamaahGroup'));
    }

    public function edit(JamaahGroup $jamaahGroup)
    {
        $packages = Package::pluck('name','id');

        return view('admin.jamaah-groups.edit',compact('jamaahGroup','packages'));
    }

    public function update(Request $request,JamaahGroup $jamaahGroup)
    {
        $request->validate([
            'name'=>'required',
            'package_id'=>'required',
            'departure_date'=>'required|date'
        ]);

        $jamaahGroup->update($request->all());

        return redirect()
            ->route('jamaah-groups.index')
            ->with('success','Group updated');
    }

    public function destroy(JamaahGroup $jamaahGroup)
    {
        if($jamaahGroup->jamaahs()->count()>0){
            return back()->with('error','Group still has jamaah');
        }

        $jamaahGroup->delete();

        return back()->with('success','Deleted');
    }
}