<?php

namespace App\Repository\V1\Product;

use App\Models\Product;
use App\Repository\V1\BaseRepository;
use Illuminate\Support\Facades\DB;

class ProductRepository extends BaseRepository
{

    public function __construct(Product $product)
    {
        parent::__construct($product);
    }
    public function all($status=null): object
    {               
        if($status=='home'){
          return (object) $this->obj                        
                        ->get();  
        }
        
        if($status=='logged_home'){
          return (object) $this->obj
                        ->where('user_id','<>',auth()->user()->id)
                        ->get();  
        }
        
        return (object) $this->obj
                        ->where('user_id',auth()->user()->id)
                        ->get();
    }
    public function save(array $attributes): object
    {
        DB::beginTransaction();
        try {
            $product = $this->obj->create($attributes);
            DB::commit();
            return $product;
        } catch (Exception $ex) {
            DB::rollback();
            return $ex->getMessage();
        }
    }

    public function update(int $id, array $attributes): object
    {
        DB::beginTransaction();
        try {
            $product = $this->obj->find($id);
            if ($product) {
                $product->updateOrCreate([
                    'id' => $id,
                        ], $attributes);
            }

            DB::commit();
            return (object) $product;
        } catch (Exception $ex) {
            DB::rollback();
            return $ex->getMessage();
        }
    }

    public function show(int $id): object
    {
        return (object) $this->obj
                        ->where('id', $id)
                        ->first();
    }

}
