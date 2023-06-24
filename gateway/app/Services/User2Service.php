<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class User2Service
{
    use ConsumesExternalService;
    /**
     * The base URI to consume the User2 Service
     * @var string
     */
    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.users2.base_uri');
        $this->secret =  config('services.users2.secret');
    }

    public function obtainUser2()
    {
        return $this->performRequest('GET', '/users2');
    }
    public function createUser2($data)
    {
        return $this->performRequest('POST', '/users2',$data);
    }
    public function showUser2($id)
    {
    return $this->performRequest('GET', "/users2/{$id}");
    }
    public function updateUser2($data, $id)
    {
        return $this->performRequest('PUT', "/users2/{$id}", $data);
    }
    public function deleteUser2($id)
    {
        return $this->performRequest('DELETE', "/users2/{$id}");
    }

    // FOR JOBS
    public function obtainjob2()
    {
        return $this->performRequest('GET', '/userjob2');
    }
    public function showJob2($id)
    {
        return $this->performRequest('GET', "/userjob2/{$id}");
    }

}
