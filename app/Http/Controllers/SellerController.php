<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $seller = Seller::where([
            "first"=>$request->first ,
            "last"=>$request->last,
            "portfolio_url" => $request->portfolio,
            "has_store"=> $request->has_store,
        ])->first();


        $validator = Validator::make($request->all(),[
            "first" => "required|max:255",
            "last" => "required|max:255",
            "portfolio_url"  => "required|max:255",
            'category' => "required|max:255",

        ]);

        if ($validator->fails() || isset($seller)) {
             return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $seller = Seller::firstOrCreate([
            "first"=>$request->first ,
             "last"=>$request->last,
             "portfolio_url" => $request->portfolio,
              "has_store" => $request->has_store,
        ]);

       $seller->profile()->create([
           'category'=>$request->category ,
           'store_url'=>$request->store_url ,
           'quality_level'=>$request->quality_level ,
           'experience_level'=>$request->experience_level ,
           'business_level'=>$request->business_level ,
       ]);


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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
