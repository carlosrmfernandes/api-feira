<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\V1\Product\ProductServiceRegistration;
use App\Service\V1\Product\ProductServiceShow;
use App\Http\Controllers\Controller;
use App\Service\V1\Product\ProductServiceUpdate;


class ProductController extends Controller
{

    protected $ProductServiceRegistration;
    protected $ProductServiceUpdate;
    protected $ProductServiceShow;


    public function __construct(
        ProductServiceRegistration $productServiceRegistration,
        ProductServiceUpdate $productServiceUpdate,
        ProductServiceShow $productServiceShow

    ) {
        $this->productServiceShow = $productServiceShow;
        $this->productServiceUpdate = $productServiceUpdate;
        $this->productServiceRegistration = $productServiceRegistration;
    }

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $this->productServiceRegistration->store($request);

        return response()->json(['data' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->productServiceShow->show($id);

        return response()->json(['data' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request)
    {

        $user = $this->productServiceUpdate->update($id, $request);

        return response()->json(['data' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
