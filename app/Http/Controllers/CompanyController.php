<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.index',[
            'companies' => Company::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {
        try {
            $company = Company::create($request->all());
            if ($request->hasFile('logo')) {
                $this->storeLogo($request, $company);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Upss! Error - ' . $th->getMessage())->withInput();   
        }

        return redirect()->route('companies.index')->with('status', 'Company created sucessfully.');   
    }

    public function storeLogo($request, $company)
    {
        $file = $request->file('logo');
        if ($file->isValid()) {
            $name = time() . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->storeAs(
                'logos', $name,'public'
            );
            $company->logo = $name;
            $company->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('company.show',[
            'company' => Company::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('company.edit',[
            'company' => Company::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCompany $request, $id)
    {
        try {
            $company = Company::findOrFail($id);
            $company->update($request->all());
            if ($request->hasFile('logo')) {
                $this->storeLogo($request, $company);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Upss! Error - ' . $th->getMessage())->withInput();   
        }

        return redirect()->route('companies.show',[
            'company' => $company->id
            ])->with('status', 'Company updated sucessfully.');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $flight = Company::findOrFail($id);
            $flight->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Upss! Error - ' . $th->getMessage());   
        }
        return redirect()->route('companies.index')->with('status', 'Company deleted sucessfully.');   
    }
}
