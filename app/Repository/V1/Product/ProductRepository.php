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
    public function all($status=null,$numberPaginator=null): object
    {   $product=null;            
        if($status=='home'){
          $product= $this->obj                        
                        ->paginate($numberPaginator?$numberPaginator:10);  
        }elseif($status=='logged_home'){
          $product= $this->obj
                        ->where('user_id','<>',auth()->user()->id)
                        ->paginate($numberPaginator?$numberPaginator:10);  
        }else{
            $product= $this->obj
                        ->where('user_id',auth()->user()->id)
                        ->paginate($numberPaginator?$numberPaginator:10);
        }        
        return (object) $product;  
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
                        ->with(['favorite'=>function($query){
                            $query->select([
                                'product_id',
                                DB::raw('count(product_id) as total_favorite')
                            ])->groupBy([
                                 'product_id' 
                            ]);
                        }])
                        ->where('id', $id)
                        ->first();
    }

}
