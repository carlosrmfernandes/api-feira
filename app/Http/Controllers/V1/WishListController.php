<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\V1\WishList\WishListServiceRegistration;
use App\Service\V1\WishList\WishListServiceShow;
use App\Http\Controllers\Controller;


class WishListController extends Controller
{

    protected $wishListServiceRegistration;    
    protected $wishListServiceShow;


    public function __construct(
        WishListServiceRegistration $wishListServiceRegistration,
        WishListServiceShow $wishListServiceShow        

    ) {
        $this->wishListServiceRegistration = $wishListServiceRegistration;
        $this->wishListServiceShow = $wishListServiceShow;        
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
        $user = $this->wishListServiceRegistration->store($request);

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
        $user = $this->wishListServiceShow->show($id);

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
