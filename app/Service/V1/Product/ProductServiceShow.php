<?php

namespace App\Service\V1\Product;

use App\Repository\V1\Product\ProductRepository;

class ProductServiceShow
{

    protected $productRepository;

    public function __construct(ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function show(int $id)
    {
        return $this->productRepository->show($id);
    }

}
