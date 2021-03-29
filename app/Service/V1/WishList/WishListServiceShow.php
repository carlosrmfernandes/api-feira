<?php

namespace App\Service\V1\WishList;

use App\Repository\V1\WishList\WishListRepository;

class WishListServiceShow
{

    protected $wishListRepository;

    public function __construct(WishListRepository $wishListRepository
    )
    {
        $this->wishListRepository = $wishListRepository;
    }

    public function show(int $id)
    {
        return $this->wishListRepository->show($id);
    }

}
