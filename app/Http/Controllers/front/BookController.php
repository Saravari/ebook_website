<?php

namespace App\Http\Controllers\front;

use App\frontModels\Book;
use App\frontModels\User;
use Fouladgar\EloquentBuilder\EloquentBuilder;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::orderBy('id','DESC')->where('status',1)->paginate(20);

        return view('front.main',compact('books'));
    }

    public function store(StoreBookRequest $request)
    {

        try{
            $books=Book::where('name',$request->name)->orWhere('writer',$request->name)->paginate(20);
        }catch(Exception $exception){
            $msg="این کتاب وجود ندارد";
                return view('front.main',compact('books'))->with('warning', $msg);
            }
       
        return view('front.main',compact('books'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function show(Book $book)
    {
        $book->increment('hit');
        return view('front.book',compact('book'));

        

    }

    
}
