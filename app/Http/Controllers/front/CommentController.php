<?php

namespace App\Http\Controllers\front;

use App\frontModels\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{

    //public function index()
   // {
        //$comments=Comment::orderBy('id','DESC')->paginate(10);
        //return view('front.footer',compact('comments'));
    //}

    public function store(StoreCommentRequest $request)
    {
        $messages=[
            'user_name.required'=>'نام خود را وارد کنید',
            'email.required'=>' ایمیل را وارد کنید',
            'message.required'=>'لطفا نظر یا پیشنهاد خود را برای ما بنویسید',

        ];
        $validate=$request->validate(['user_name'=>'required','email'=>'required','message'=>'required'], $messages);
        $comment= new Comment();
        try{
            $comment->create($request->all());
        }catch(Exception $exception){
            return redirect()->back()->with('warning', $exception->getcode());

        }
       
        $msg="پیام شما با موفقیت ارسال شد";
        return redirect()->back()->with('success', $msg);
    }

  
   
    
    
}
