<?php

namespace Tests\Unit\Register;

use App\Models\User;
use App\Models\UserType;
use Tests\TestCase;
class UserTest extends TestCase {

    /**
     * A basic unit test example.
     *
     * @return void
     */
    use \App\Service\V1\User\Traits\RuleTrait;
    use \Illuminate\Foundation\Testing\DatabaseTransactions;

    function test_create() {

        $user= factory(User::class)->create();
        if (is_object($user)) {
            $expceted = User::find($user->id);
            $this->assertEquals($expceted->id, $user->id);
            $this->login($user);
        } else {
            dd($user);
        }
    }

    function login($user) {
         $this->be($user);
         $expceted= User::find($user->id);
         if($user){
             $this->assertEquals($expceted->id, $user->id);
         }else{
             dd('Unauthorized User');
         }
    }



}
