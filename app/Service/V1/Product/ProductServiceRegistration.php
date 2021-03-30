<?php

namespace App\Service\V1\Product;

use App\Repository\V1\Product\ProductRepository;
use App\Repository\V1\User\UserRepository;
use Validator;

class ProductServiceRegistration
{

    use Traits\RuleTrait;

    protected $productRepository;
    protected $userRepository;

    public function __construct(
        ProductRepository $productRepository,
        UserRepository $userRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->userRepository = $userRepository;
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

        $product = $this->productRepository->save($attributes);
        return $product?$product:'unidentified product';
    }

}
