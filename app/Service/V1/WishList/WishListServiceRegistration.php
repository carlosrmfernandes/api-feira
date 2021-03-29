<?php

namespace App\Service\V1\WishList;

use App\Repository\V1\WishList\WishListRepository;
use Validator;

class WishListServiceRegistration
{

    use Traits\RuleTrait;

    protected $wishListRepository;

    public function __construct(
        WishListRepository $wishListRepository
    )
    {
        $this->wishListRepository = $wishListRepository;
    }

    public function store($request)
    {
        $attributes = null;
        if (is_object($request)) {
            $attributes = $request->all();
        } else {
            $attributes = $request;
        }

         $validator = Validator::make($attributes, $this->rules());

         if ($validator->fails()) {
             return $validator->errors();
         }

        $favorite = $this->wishListRepository->save($attributes);
        return $favorite?$favorite:'wish list favorite';
    }

}
