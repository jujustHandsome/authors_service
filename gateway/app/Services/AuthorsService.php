<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class AuthorsService {
     use ConsumesExternalService;
     /*
     *@var string

     */

     public $baseUri;

     public function __construct() {
          $this->baseUri = config('services.authors.base_uri');
          $this->secret =  config('services.authors.secret');
     }


     /*
     *@return string
     */

     public function getAuthors() {
          return $this->performRequest('GET', 'api/authors');
     }

     public function getAuthorId($id) {
          return $this->performRequest('GET', "api/authors/{$id}");
     }


     public function addAuthor($data) {
          return $this->performRequest('POST', 'api/authors/', $data);
     }

     public function updateAuthor($data, $id) {
          return $this->performRequest('PUT', "api/authors/{$id}", $data);
     }

     public function deleteAuthor($id) {
          return $this->performRequest('DELETE', "api/authors/{$id}");
     }
}