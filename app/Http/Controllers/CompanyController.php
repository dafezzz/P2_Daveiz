<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function index()
    {
        return response()->json(Company::all());
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        return response()->json($company);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|string',
            'ppiu_license_number' => 'nullable|string|max:255',
            'pihk_license_number' => 'nullable|string|max:255',
            'npwp' => 'nullable|string|max:255',
            'main_address' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'status' => 'nullable|in:active,inactive,suspended',
        ]);

        $data['slug'] = Str::slug($data['name']);

        $company = Company::create($data);
        return response()->json(['message' => 'Company created', 'company' => $company]);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'logo' => 'nullable|string',
            'ppiu_license_number' => 'nullable|string|max:255',
            'pihk_license_number' => 'nullable|string|max:255',
            'npwp' => 'nullable|string|max:255',
            'main_address' => 'nullable|string',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|string|max:255',
            'status' => 'nullable|in:active,inactive,suspended',
        ]);

        if(isset($data['name'])){
            $data['slug'] = Str::slug($data['name']);
        }

        $company->update($data);

        return response()->json(['message' => 'Company updated', 'company' => $company]);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
        return response()->json(['message' => 'Company deleted']);
    }
}