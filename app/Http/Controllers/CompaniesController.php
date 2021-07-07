<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $companies = Companies::simplePaginate(10);
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100"|Mimes:jpeg,jpg,gif,png,pneg'

        ]);


       $input = $request->all();
  
        if ($logo = $request->file('logo')) {
            //$destinationPath = public_path().'/storage/';
            $logoImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            //$logo->move($destinationPath, $logoImage);
            $path = $request->file('logo')->storeAs('public/', $logoImage); //stores image in storage/app/public and symlink created to link to public/storage
            $input['logo'] = $logoImage;
        }

            
        Companies::create($input);
     
        return redirect()->route('companies_index')
                        ->with('successMsg','Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $company = Companies::find($id);
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100"|Mimes:jpeg,jpg,gif,png,pneg'

        ]);


        $company = Companies::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;
  
        if ($logo = $request->file('logo')) {
            //$destinationPath = public_path().'/storage/';
            $logoImage = date('YmdHis') . "." . $logo->getClientOriginalExtension();
            //$logo->move($destinationPath, $logoImage);
            $path = $request->file('logo')->storeAs('public/', $logoImage); //stores image in storage/app/public and symlink created to link to public/storage
            $company->logo = $logoImage;
            
        }
        $company->save();
        return redirect()->route('companies_index')
                        ->with('successMsg','Company updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Companies::find($id);
        //delete the logo
        if(!is_null($company->logo))
        {
            unlink(storage_path('app/public/'.$company->logo));
     
        }
        Companies::find($id)->delete();
        return redirect()->route('companies_index')
                        ->with('successMsg','Company deleted successfully.');
    }
}
