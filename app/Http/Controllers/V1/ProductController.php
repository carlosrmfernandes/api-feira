<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\V1\Product\ProductServiceRegistration;
use App\Service\V1\Product\ProductServiceShow;
use App\Service\V1\Product\ProductServiceAll;
use App\Http\Controllers\Controller;
use App\Service\V1\Product\ProductServiceUpdate;


class ProductController extends Controller
{

    protected $ProductServiceRegistration;
    protected $ProductServiceUpdate;
    protected $ProductServiceShow;
    protected $productServiceAll;


    public function __construct(
        ProductServiceRegistration $productServiceRegistration,
        ProductServiceUpdate $productServiceUpdate,
        ProductServiceShow $productServiceShow,
        ProductServiceAll $productServiceAll

    ) {
        $this->productServiceShow = $productServiceShow;
        $this->productServiceUpdate = $productServiceUpdate;
        $this->productServiceRegistration = $productServiceRegistration;
        $this->productServiceAll = $productServiceAll;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status=null,$numberPaginator=null)
    {           
        $product = $this->productServiceAll->all($status,$numberPaginator);

        return response()->json(['data' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->productServiceRegistration->store($request);

        return response()->json(['data' => $product]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productServiceShow->show($id);

        return response()->json(['data' => $product]);
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

        $product = $this->productServiceUpdate->update($id, $request);

        return response()->json(['data' => $product]);
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
