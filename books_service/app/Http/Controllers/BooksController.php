<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Authors;
use App\Models\Books;
use App\Traits\ApiResponser;
use DB; 
use Illuminate\Http\Response;


Class BooksController extends Controller {
    
    use ApiResponser;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getBooks()
    {
        $books = Books::all();
        return $this -> successResponse($books);
    }

    public function getBookId($id)
    {
        $books = Books::findOrFail($id);
        return $this -> successResponse($books);
    }
    
    public function addBook(Request $request){
        
        $rules = [
            'id' => 'required|max:4',
            'bookname' => 'required|max:150',
            'yearpublish' => 'required',
            'authorid' => 'required|numeric|min:1|not_in:0'
        ];

        $this->validate($request,$rules);
        $books = Books::create($request->all());
        return $this -> successResponse($books, Response::HTTP_CREATED);
    }

    public function updateBook(Request $request, $id)
     {
        $rules = [
            'id' => 'required|max:4',
            'bookname' => 'required|max:150',
            'yearpublish' => 'required',
            'authorid' => 'required|numeric|min:1|not_in:0'
        ];

         $this->validate($request,$rules);
         $books = Books::where('id', $id)->firstOrFail();
         $books->fill($request->all());


         if ($books->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $books->save();
         return $this -> successResponse($books);
     }

     public function deleteBook($id) {
        $books = Books::findOrFail($id);
        $books->delete();
        return $this -> successResponse($books);
    }
}

