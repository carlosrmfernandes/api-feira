<?php

namespace App\Service\V1\Favorite;

use App\Repository\V1\Favorite\FavoriteRepository;

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
