<?php

namespace App\Service\V1\Product;

use App\Repository\V1\Product\FavoriteRepository;

class FavoriteServiceShow
{

    protected $favoriteRepository;

    public function __construct(FavoriteRepository $favoriteRepository
    )
    {
        $this->favoriteRepository = $favoriteRepository;
    }

    public function show(int $id)
    {
        return $this->favoriteRepository->show($id);
    }

}
