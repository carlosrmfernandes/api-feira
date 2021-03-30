<?php

namespace App\Repository\V1\WishList;

use App\Models\WishList;
use App\Repository\V1\BaseRepository;
use Illuminate\Support\Facades\DB;

class WishListRepository extends BaseRepository
{

    public function __construct(WishList $wishList)
    {
        parent::__construct($wishList);
    }
    
    public function all(): object
    {                               
        return (object) $this->obj
                        ->with('product')
                        ->where('user_id',auth()->user()->id)
                        ->get();
    }

    public function save(array $attributes): object
    {
        DB::beginTransaction();
        try {
            $wishList = $this->obj->updateOrCreate([
             'user_id'=>auth()->user()->id,
             'product_id'=>$attributes['product_id']  
            ], $attributes);
            DB::commit();
            return $wishList;
        } catch (Exception $ex) {
            DB::rollback();
            return $ex->getMessage();
        }
    }

    public function update(int $id, array $attributes): object
    {
        DB::beginTransaction();
        try {
            $wishList = $this->obj->find($id);
            if ($wishList) {
                $wishList->updateOrCreate([
                    'id' => $id,
                        ], $attributes);
            }

            DB::commit();
            return (object) $wishList;
        } catch (Exception $ex) {
            DB::rollback();
            return $ex->getMessage();
        }
    }

    public function show(int $id): object
    {
        return (object) $this->obj
                        ->with('product')
                        ->where('id', $id)
                        ->first();
    }

}
