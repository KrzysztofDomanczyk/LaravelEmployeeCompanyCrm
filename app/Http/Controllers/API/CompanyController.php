<?php

namespace App\Http\Controllers\API;

use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return response()->json(Company::all());
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
            return response()->json(['error'=>  $th->getMessage()]);
        }
        return response()->json(['status', 'Company created sucessfully.']);   
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
}
