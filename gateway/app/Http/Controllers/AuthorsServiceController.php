<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\AuthorsService;

class AuthorsServiceController extends Controller
{
     use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @var AuthorsService
     */

     public $AuthorsService;

    public function __construct(AuthorsService $AuthorsService)
    {
        $this->AuthorsService = $AuthorsService;
    }


    public function getAuthors() 
    {
        return $this->successResponse($this->AuthorsService->getAuthors());
    }

    public function getAuthorId($id) 
    {
        return $this->successResponse($this->AuthorsService->getAuthorId($id));
    }

    public function createAuthor(Request $request) {
        return $this->successResponse($this->AuthorsService->createAuthor($request->all()));
    }
    
    public function deleteAuthor($id) {
        return $this->successResponse($this->AuthorsService->deleteAuthor($id));
    }

    public function updateAuthor(Request $data, $id) {
        return $this->successResponse($this->AuthorsService->updateAuthor($data->all(), $id));
    }
}
