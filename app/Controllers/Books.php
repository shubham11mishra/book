<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Books extends BaseController
{
    public $booksModel;
    public function _construct()
    {
    }
    public function index()
    {
        $pager = service('pager');
        $this->booksModel = new \App\Models\BooksModel();
        // $books = new \App\Entities\BooksEntity();
        // var_dump($this->booksModel->where('price >=', 100));
        $books = $this->booksModel->paginate(20);
        //dd($this->booksModel->pager->getPageCount());
        return view('/books/all', [

            'pager' => $this->booksModel->pager
        ]);
    }
    public function pegination()
    {
        $this->booksModel = new \App\Models\BooksModel();


        if ($this->request->getVar('content')) {
            $page = $this->request->getVar('pagenumber');
            $minimum_price = (int) $this->request->getPost('minimum_price');
            $maximum_price = (int) $this->request->getPost('maximum_price');
            //dd( $minimum_price , $maximum_price);
            try {
                // var_dump('price BETWEEN "'.$minimum_price . '" and "'. $maximum_price.'"');
                // $data =   $this->booksModel->where("`price` BETWEEN {$minimum_price}  AND  $maximum_price ")->orderBy('price', 'asc')
                $data =   $this->booksModel->where('price BETWEEN "' . $minimum_price . '" and "' . $maximum_price . '"')->orderBy('price', 'asc')
                    ->paginate(20, '', $page);
                if ($data) {
                    return json_encode($data);
                    // return view('books/paginatebooks', ['books' => $data]);
                } else {
                    echo  "NO result found";
                }
            } catch (\Exception $th) {
                var_dump($th);
            }
        }


        // $data =  $this->booksModel->paginate(20, '', $page);

        // // $data =  $this->booksModel->query('SELECT * FROM `books` LIMIT 20');
        // // return json_encode($data);

        // return view('books/paginatebooks', [
        //     'books' => $data,
        //     'log' => $log
        // ]);
    }
}
