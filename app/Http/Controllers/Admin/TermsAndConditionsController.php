<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SiteInfo\TermsAndConditionsRequest;
use App\Models\TermsAndConditions;
use Illuminate\Http\Request;

class TermsAndConditionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terms_and_conditons = TermsAndConditions::get() ;
        return view('admin.termsAndConditions.index' , compact('terms_and_conditons')) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TermsAndConditions  $termsAndConditions
     * @return \Illuminate\Http\Response
     */
    public function show(TermsAndConditions $termsAndConditions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermsAndConditions  $termsAndConditions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $terms_and_conditons = TermsAndConditions::find($id) ;

        return view('admin.termsAndConditions.edit' , compact('terms_and_conditons')) ;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermsAndConditions  $termsAndConditions
     * @return \Illuminate\Http\Response
     */
    public function update(TermsAndConditionsRequest $request, TermsAndConditions $termsAndConditions)
    {
        $terms = TermsAndConditions::first()->update($request->all()) ;
        if ($terms) {
            $request->session()->flash('success', 'Terms And Conditions Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect('acp/terms-and-conditions') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermsAndConditions  $termsAndConditions
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermsAndConditions $termsAndConditions)
    {
        //
    }
}