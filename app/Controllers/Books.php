<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Books extends BaseController
{
    public function index()
    {
        $booksModel = new \App\Models\BooksModel();
        // $books = new \App\Entities\BooksEntity();
        $books = $booksModel->findAllBooks();
        return view('/books/all', ['books' => $books]);
    }
}
