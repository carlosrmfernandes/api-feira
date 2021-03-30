<?php

namespace App\Repository\V1\Favorite;

use App\Models\Favorite;
use App\Repository\V1\BaseRepository;
use Illuminate\Support\Facades\DB;

class FavoriteRepository extends BaseRepository
{

    public function __construct(Favorite $favorite)
    {
        parent::__construct($favorite);
    }

    public function save(array $attributes): object
    {        
        DB::beginTransaction();
        try {
            $favorite = $this->obj->updateOrCreate([
             'user_id'=>auth()->user()->id,
             'product_id'=>$attributes['product_id']  
            ], $attributes);
            DB::commit();
            return $favorite;
        } catch (Exception $ex) {
            DB::rollback();
            return $ex->getMessage();
        }
    }

    public function update(int $id, array $attributes): object
    {
        DB::beginTransaction();
        try {
            $favorite = $this->obj->find($id);
            if ($favorite) {
                $favorite->updateOrCreate([
                    'id' => $id,
                        ], $attributes);
            }

            DB::commit();
            return (object) $favorite;
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
