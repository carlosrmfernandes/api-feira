<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Service\V1\Favorite\FavoriteServiceRegistration;
use App\Service\V1\Product\FavoriteServiceShow;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{

    protected $favoriteServiceRegistration;    
    protected $favoriteServiceShow;


    public function __construct(
        FavoriteServiceRegistration $favoriteServiceRegistration,
        FavoriteServiceShow $favoriteServiceShow        

    ) {
        $this->favoriteServiceRegistration = $favoriteServiceRegistration;
        $this->favoriteServiceShow = $favoriteServiceShow;        
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
        $user = $this->favoriteServiceRegistration->store($request);

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
        $user = $this->favoriteServiceShow->show($id);

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
