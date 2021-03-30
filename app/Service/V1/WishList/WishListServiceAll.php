<?php

namespace App\Service\V1\WishList;

use App\Repository\V1\WishList\WishListRepository;

class WishListServiceAll
{

    protected $wishListRepository;

    public function __construct(WishListRepository $wishListRepository
    )
    {
        $this->wishListRepository = $wishListRepository;
    }

    public function all()
    {        
        return $this->wishListRepository->all();
    }

}
