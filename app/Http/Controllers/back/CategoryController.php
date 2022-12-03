<?php

namespace App\Http\Controllers\back;


use App\Models\Category;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('id','DESC')->paginate(10);
        return view('back.categories.categories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view('back.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages=[
            'name.required'=>'نام را وارد کنید',
            'slug.unique'=>' نام مستعار تکراری است',
            'slug.required'=>' نام مستعار را وارد کنید '
        ];
        $validate=$request->validate(['name'=>'required','slug'=>'required|unique:categories'], $messages);
        $category= new Category();
        try{
            $category->create($request->all());
        }catch(Exception $exception){
            switch($exception->getcode()){
                case 23000:
                $msg=" نام مستعار تکراری است";
                break;}
            
            return redirect(route('admin.categories.create'))->with('warning', $msg);
        }
       
        $msg="دسته جدید با موفقیت ذخیره شد";
        return redirect(route('admin.categories'))->with('success', $msg);
       // $category= new category(['title'=>$request->get('title'),
        //'description'=>$request->get('description'),
        // 'active'=>$request->get('active')]);
       // $category->save();
        //return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('back.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $messages=[
            'name.required'=>'نام را وارد کنید',
            'slug.unique'=>'فیلد نام مستعار تکراری است',
            'slug.required'=>' فیلد نام مستعار را وارد کنید '
        ];
        $validate=$request->validate(['name'=>'required','slug'=>'required|unique:categories'], $messages);
    
        try{
            $category->update($request->all());
        }catch(Exception $exception){
            switch($exception->getcode()){
                case 23000:
                $msg=" نام مستعار تکراری است";
                break;}
            
            return redirect(route('admin.categories.edit'))->with('warning', $msg);
        }
        $msg="ویرایش با موفقیت انجام شد";

        return redirect(route('admin.categories'))->with('success', $msg);
       // $category= new category(['title'=>$request->get('title'),
        //'description'=>$request->get('description'),
        // 'active'=>$request->get('active')]);
       // $category->save();
        //return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        try{
            $category->delete();
        }catch(Exception $exception){
            return redirect(route('admin.categories'))->with('warning', $exception->getcode());}
        
        $msg="آیتم مورد نظر حذف شد";
        return redirect(route('admin.categories'))->with('success', $msg);
    }
}
