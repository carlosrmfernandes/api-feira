<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\V1\WishList\WishListServiceRegistration;
use App\Service\V1\WishList\WishListServiceShow;
use App\Http\Controllers\Controller;
use App\Service\V1\WishList\WishListServiceAll;


class WishListController extends Controller
{

    protected $wishListServiceRegistration;    
    protected $wishListServiceShow;
    protected $wishListServiceAll;


    public function __construct(
        WishListServiceRegistration $wishListServiceRegistration,
        WishListServiceShow $wishListServiceShow,        
        WishListServiceAll  $wishListServiceAll        

    ) {
        $this->wishListServiceRegistration = $wishListServiceRegistration;
        $this->wishListServiceShow = $wishListServiceShow;        
        $this->wishListServiceAll = $wishListServiceAll;        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wishList = $this->wishListServiceAll->all();

        return response()->json(['data' => $wishList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $wishList = $this->wishListServiceRegistration->store($request);

        return response()->json(['data' => $wishList]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $wishList = $this->wishListServiceShow->show($id);

        return response()->json(['data' => $wishList]);
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
