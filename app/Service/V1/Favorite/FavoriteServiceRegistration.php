<?php

namespace App\Service\V1\Favorite;

use App\Repository\V1\Favorite\FavoriteRepository;
use Validator;

class FavoriteServiceRegistration
{

    use Traits\RuleTrait;

    protected $favoriteRepository;

    public function __construct(
        FavoriteRepository $favoriteRepository
    )
    {
        $this->favoriteRepository = $favoriteRepository;
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

        $favorite = $this->favoriteRepository->save($attributes);
        return $favorite?$favorite:'unidentified favorite';
    }

}
