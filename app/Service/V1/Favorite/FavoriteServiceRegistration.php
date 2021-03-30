<?php

namespace App\Service\V1\Favorite;

use App\Repository\V1\Favorite\FavoriteRepository;
use App\Repository\V1\User\UserRepository;
use App\Repository\V1\Product\ProductRepository;
use Validator;

class FavoriteServiceRegistration
{

    use Traits\RuleTrait;

    protected $favoriteRepository;
    protected $userRepository;
    protected $productRepository;
    public function __construct(
        FavoriteRepository $favoriteRepository,
        UserRepository $userRepository,
        ProductRepository $productRepository
    )
    {
        $this->favoriteRepository = $favoriteRepository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
    }

    public function store($request)
    {
        $attributes = null;
        if (is_object($request)) {
            $attributes = $request->all();
        } else {
            $attributes = $request;
        }
         $attributes['user_id']= auth()->user()->id;
         $validator = Validator::make($attributes, $this->rules());

         if ($validator->fails()) {
             return $validator->errors();
         }
         
        if (!get_object_vars(($this->userRepository->show(auth()->user()->id)))) {
            return "user_id invalid";
        }
        if (!get_object_vars(($this->productRepository->show($attributes['product_id'])))) {
            return "product_id invalid";
        }
        $favorite = $this->favoriteRepository->save($attributes);
        return $favorite?$favorite:'unidentified favorite';
    }

}
