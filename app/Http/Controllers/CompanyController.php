<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:companies|max:255',
            'logo' => 'nullable|max:2048',
            'website' => 'required|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect('companies/create')
                        ->withErrors($validator)
                        ->withInput();
        }
    
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/Logos');
            $file->move($destinationPath, $name);
        } else {
            $name = 'default-logo.png';
        }
    
        $company = new Company;
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->logo = $name;
    
        // add https to website if not present
        $website = $request->input('website');
        if (!preg_match("/^https?:\/\//i", $website)) {
            $website = 'https://' . $website;
        }
        $company->website = $website;
    
        $company->save();
    
        return redirect('/companies')->with('success', 'Company created successfully.');
    }
    
    
    


    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.show', compact('company'));
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

 public function update(Request $request, $id)
{
    $company = Company::findOrFail($id);

    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        'email' => 'required|email|unique:companies,email,'.$id.'|max:255',
        'logo' => 'nullable|max:2048',
        'website' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('companies/'.$id.'/edit')
                    ->withErrors($validator)
                    ->withInput();
    }

    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $name = time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('/Logos');
        $file->move($destinationPath, $name);
        if ($company->logo != 'default-logo.png') {
            $oldLogo = public_path('/Logos/'.$company->logo);
            if (file_exists($oldLogo)) {
                unlink($oldLogo);
            }
        }
        $company->logo = $name;
    }

    $company->name = $request->input('name');
    $company->email = $request->input('email');
    $company->website = $request->input('website');
    $company->save();

    return redirect('/companies')->with('success', 'Company updated successfully.');
}

    
    public function destroy($id)
    {
    // Find the company by ID
    $company = Company::findOrFail($id);

    // Delete the company logo if it exists
    if ($company->logo && file_exists(storage_path('app/public/' . $company->logo))) {
        Storage::delete('public/' . $company->logo);
    }

    // Delete the company
    $company->delete();

    // Redirect to the companies index page with a success message
    return redirect()->route('companies.index')->with('success', 'Company deleted successfully');
}





    
}
