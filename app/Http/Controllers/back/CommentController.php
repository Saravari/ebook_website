<?php

namespace App\Http\Controllers\back;

use App\Models\Comment;
use App\Models\Book;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments=Comment::orderBy('id','DESC')->paginate(10);
        return view('back.comments.comments',compact('comments'));
    }

    public function store(StoreCommentRequest $request,Comment $comment)
    {
        $messages=[
            'user_name.required'=>'نام خود را وارد کنید',
            'email.required'=>' ایمیل را وارد کنید',
            'message.required'=>'لطفا نظر یا پیشنهاد خود را برای ما بنویسید',

        ];
        $validate=$request->validate(['user_name'=>'required','email'=>'required','message'=>'required'], $messages);
        $comment= new Comment();
        try{
            $book->create($request->all());
        }catch(Exception $exception){
            return redirect(route('main'))->with('warning', $exception->getcode());

        }
       
        $msg="پیام شما با موفقیت ثبت شد";
        return redirect(route('main'))->with('success', $msg);
    }

  
    public function edit(Comment $comment)
    {
        $comments = Comment::all();
        return view('back.comments.edit',compact('comments'));    }

    
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $messages=[
            'user_name.required'=>'نام نویسنده را وارد کنید',
            'body.required'=>' متن را وارد کنید',
            'body.required'=>' ایمیل را وارد کنید'
        ];
        $validate=$request->validate(['user_name'=>'required','body'=>'required','email'=>'required'], $messages);
    
        try{
            $book->update($request->all());
            $book->categories()->attach($request->categories);
        }catch(Exception $exception){
            return redirect(route('admin.comments.edit'))->with('warning', $exception->getcode());
        }
       
        $msg="ننظر جدید با موفقیت ثبت شد";
        return redirect(route('admin.comments'))->with('success', $msg);
    }

    
    public function destroy(Comment $comment)
    {
        try{
            $comment->delete();
        }catch(Exception $exception){
            return redirect(route('admin.comments'))->with('warning', $exception->getcode());}
        
        $msg="آیتم مورد نظر حذف شد";
        return redirect(route('admin.comments'))->with('success', $msg);    

    }

    public function updatestatus( Comment $comment)
    {
        if($comment->status==1)

        {
            $comment->status=0;
        }else
        {
            $comment->status=1;
        }

        $comment->save();
        $msg="تغییر وضعیت با موفقیت انجام شد";
        return redirect(route('admin.comments'))->with('success', $msg);
    }
}
