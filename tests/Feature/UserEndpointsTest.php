<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserEndpointsTest extends TestCase
{
 
    public function test_user_index_endpoint(){

        $headers = [
            'Authorization'=>'Bearer 1|8whrWwEa4rwDqjtnhYXbG4C25ilucQ2Ew2xop43gd8b336ab',
            'Content Type'=>'application/json',
            'Accept'=>'application/json',

        ];
        $payload = [];
        $this->json('GET','/api/user/index',$payload,$headers)->assertStatus(200);

    }

}
