<?php

namespace App\Service\V1\WishList;

use App\Repository\V1\WishList\WishListRepository;
use App\Repository\V1\User\UserRepository;
use App\Repository\V1\Product\ProductRepository;
use Validator;

class WishListServiceRegistration
{

    use Traits\RuleTrait;

    protected $wishListRepository;
    protected $userRepository;
    protected $productRepository;

    public function __construct(
        WishListRepository $wishListRepository,
        UserRepository $userRepository,
        ProductRepository $productRepository
    )
    {
        $this->wishListRepository = $wishListRepository;
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
        
         if (!get_object_vars(($this->userRepository->show($attributes['user_id'])))) {
            return "user_id invalid";
        }
        if (!get_object_vars(($this->productRepository->show($attributes['product_id'])))) {
            return "product_id invalid";
        }
        $favorite = $this->wishListRepository->save($attributes);
        return $favorite?$favorite:'wish list favorite';
    }

}
