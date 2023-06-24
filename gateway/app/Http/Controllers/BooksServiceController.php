<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Traits\ApiResponser;
use App\Services\BooksService;

class BooksServiceController extends Controller
{
     use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @var BooksService
     */

     public $BooksService;

    public function __construct(BooksService $BooksService)
    {
        $this->BooksService = $BooksService;
    }


    public function getBooks() 
    {
        return $this->successResponse($this->BooksService->getBooks());
    }

    public function getBookId($id) 
    {
        return $this->successResponse($this->BooksService->getBookId($id));
    }

    public function addBook(Request $request) {
        return $this->successResponse($this->BooksService->addBook($request->all()));
    }
    
    public function deleteBook($id) {
        return $this->successResponse($this->BooksService->deleteBook($id));
    }

    public function updateBook(Request $data, $id) {
        return $this->successResponse($this->BooksService->updateBook($data->all(), $id));
    }
}
