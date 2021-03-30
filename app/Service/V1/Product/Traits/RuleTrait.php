<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of RuleTrait
 *
 * @author carlosfernandes
 */

namespace App\Service\V1\Product\Traits;
trait RuleTrait
{

    public function rules($id = null)
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'user_id' => 'required|integer|max:255',
            'price' => 'required',
        ];
    }



}
