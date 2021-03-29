<?php

namespace App\Repository\V1\WishList;

use App\Models\User;
use App\Repository\V1\BaseRepository;
use Illuminate\Support\Facades\DB;

class WishListRepository extends BaseRepository
{

    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function save(array $attributes): object
    {
        DB::beginTransaction();
        try {
            $user = $this->obj->create($attributes);
            DB::commit();
            return $user;
        } catch (Exception $ex) {
            DB::rollback();
            return $ex->getMessage();
        }
    }

    public function update(int $id, array $attributes): object
    {
        DB::beginTransaction();
        try {
            $user = $this->obj->find($id);
            if ($user) {
                $user->updateOrCreate([
                    'id' => $id,
                        ], $attributes);
            }

            DB::commit();
            return (object) $user;
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
