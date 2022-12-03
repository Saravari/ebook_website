<?php

namespace App\Http\Controllers\back;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use App\Models\Purchase;
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
        $books=Book::orderBy('id','DESC')->paginate(10);
        return view('back.books.books',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name','id');
        $books = Book::all()->pluck('image');
        return view('back.books.create',compact('categories','books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $messages=[
            'name.required'=>'نام را وارد کنید'
        ];
        $validate=$request->validate(['name'=>'required'], $messages);
        $book= new Book();


        try{
            $book=$book->create($request->all());
            $book->categories()->attach($request->categories);
        }catch(Exception $exception){
                
            return redirect(route('admin.books.create'))->with('warning', $exception->getcode());
        }
       
        $msg="کتاب جدید با موفقیت ثبت شد";
        return redirect(route('admin.books'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::all()->pluck('name','id');
        return view('back.books.edit',compact('book','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $messages=[
            'name.required'=>'نام را وارد کنید'
        ];
        $validate=$request->validate(['name'=>'required'], $messages);
    
        try{
            $book->update($request->all());
            $book->categories()->attach($request->categories);
        }catch(Exception $exception){
            
            return redirect(route('admin.books.create'))->with('warning', $exception->getcode());
        }
       
        $msg="کتاب جدید با موفقیت ثبت شد";
        return redirect(route('admin.books'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        try{
            $book->delete();
        }catch(Exception $exception){
            return redirect(route('admin.books'))->with('warning', $exception->getcode());}
        
        $msg="آیتم مورد نظر حذف شد";
        return redirect(route('admin.books'))->with('success', $msg);    }

    public function updatestatus( Book $book)
    {
        if($book->status==1)

        {
            $book->status=0;
        }else
        {
            $book->status=1;
        }

        $book->save();
        $msg="تغییر وضعیت با موفقیت انجام شد";
        return redirect(route('admin.books'))->with('success', $msg);
    }
}
