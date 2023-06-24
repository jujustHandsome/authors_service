<?php

namespace App\Http\Controllers;
use App\Models\Authors; 
use Illuminate\Http\Response; 
use App\Traits\ApiResponser; 
use Illuminate\Http\Request; 
use DB; 

Class AuthorsController extends Controller {
 
    use ApiResponser;
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    public function showAuthors()
    {
        $authors = Authors::all();
        return $this->successResponse($authors);

    }
 
    public function showAuthorId($id)
    {
        $authors = Authors::findOrFail($id);
        return $this->successResponse($authors);
    }

    public function addAuthor(Request $request){
        
        $rules = [
            'id' => 'required|max:4',
            'fullname' => 'required|max:150',
            'gender' => 'required|in:Male,Female',
            'birthday' => 'required'
        ];

        $this->validate($request,$rules);
        $authors = Authors::create($request->all());
        return $this -> successResponse($authors, Response::HTTP_CREATED);
    }

    public function updateAuthor(Request $request, $id)
     {
        $rules = [
            'id' => 'required|max:4',
            'fullname' => 'required|max:150',
            'gender' => 'required|in:Male,Female',
            'birthday' => 'required'
        ];

         $this->validate($request,$rules);
         $authors = Authors::where('id', $id)->firstOrFail();
         $authors->fill($request->all());


         if ($authors->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
         }
         $authors->save();
         return $this -> successResponse($authors);
     }

     public function deleteAuthor($id) {
        $authors = Authors::findOrFail($id);
        $authors->delete();
        return $this -> successResponse($authors);
    }
}