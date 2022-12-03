
@extends('back.index')
@section('content')
@section('title')
ویرایش کتاب
@endsection
<div class="main-panel">

        <div class="content-wrapper">
          <!-- Page Title Header Starts-->
          <div class="row page-title-header">
            <div class="col-12">
              <div class="page-header">
                <h4 class="page-title">ویرایش کتاب</h4>
              </div>
            </div>
             
          </div>
          <!-- Page Title Header Ends-->
        <div class="row">
                    
        <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                  @include('back.messages')
                    
                  <form method="POST" action="{{route('admin.books.update', $book->id)}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('نام کتاب') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$book->name}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="slug" class="col-md-4 col-form-label text-md-end">{{ __('نام مستعار') }}</label>

                            <div class="col-md-6">
                                <input id="slug" type="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{$book->slug}}">

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('خلاصه کتاب') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" type="texe" class="form-control @error('description') is-invalid @enderror" name="description"> {{$book->description}}</textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('وضعیت') }}</label>

                            <div class="col-md-6">
                                <select  class="form-control"  name="status"> 
                                  <option value="0">منتشر نشده </option>
                                  <option value="1" <?php if($book->status==1) echo 'selected';?>>منتشر شده </option>  
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="categories" class="col-md-4 col-form-label text-md-end">{{ __('انتخاب دسته بندی') }}</label>
                            <div id="output"></div>
                            <div class="col-md-6">
                                <select  class="chosen-select"  name="categories[]" multiple style="width:400px"> 
                                  @foreach($categories as $cat_id=>$cat_name)
                                  <option value="{{$cat_id}}" <?php if(in_array($cat_id,$book->categories->pluck('id')->toArray())) echo 'selected' ?>>{{$cat_name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="input-group">
                            <span class="input-group-btn">
                                <a href="#" id="lfm" data-input="image"  data-preview="holder" class="btb btn-primary">
                                    <i class="fa fa-picture-o"></i>انتخاب تصویر
                                </a>
                            </span> 
                            <input id="image" class="form-control" type="text" name="image" value="{{$book->image}}">
                        </div>
                        <img id="holder" style="margin-top:15px; max-height:100px;">


                        <div class="row mb-3">
                            <label for="user" class="col-md-4 col-form-label text-md-end">کاربر: {{Auth::user()->name}}</label>
                            <input  type="hidden"  name="user_id" value="{{Auth::user()->id}}">
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ویرایش') }}
                                </button>
                                <a href="{{route('admin.books')}}" class="btn btn-warning">انصراف</a>
                            </div>
                        </div>
                    </form>
                   
                  </div>
                </div>
              </div>

        </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('back.footer')
        <!-- partial -->
</div>

@endsection

         