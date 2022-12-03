
@extends('back.index')
@section('content')
@section('title')
کتاب جدید
@endsection
<div class="main-panel">

        <div class="content-wrapper">
          <!-- Page Title Header Starts-->
          <div class="row page-title-header">
            <div class="col-12">
              <div class="page-header">
                <h4 class="page-title">ثبت کتاب جدید</h4>
              </div>
            </div>
             
          </div>
          <!-- Page Title Header Ends-->
        <div class="row">
                    
        <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                  @include('back.messages')
                    
                  <form method="POST" action="{{route('admin.books.store')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('نام کتاب') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">

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
                                <input id="slug" type="slug" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{old('slug')}}">

                                @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="writer" class="col-md-4 col-form-label text-md-end">{{ __('نویسنده')}}</label>

                            <div class="col-md-6">
                                <input id="writer" type="writer" class="form-control @error('writer') is-invalid @enderror" name="writer" value="{{old('writer')}}">

                                @error('writer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('خلاصه کتاب') }}</label>

                            <div class="col-md-6">
                              <textarea class="form-control" id="description" type="description"   name="description" rows="5" placeholder="خلاصه کتاب"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('قیمت')}}</label>

                            <div class="col-md-6">
                                <input id="price" type="integer" class="form-control @error('writer') is-invalid @enderror" name="price" value="{{old('price')}}">

                                @error('price')
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
                                  <option value="1">منتشر شده </option>  
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="categories" class="col-md-4 col-form-label text-md-end">{{ __('انتخاب دسته بندی') }}</label>
                            <div id="output"></div>
                            <div class="col-md-6">
                                <select  class="chosen-select"  name="categories[]" multiple style="width:400px"> 
                                  
                                @foreach($categories as $cat_id=>$cat_name)
                                <option value="{{$cat_id}}">{{$cat_name}}</option>
                                @endforeach
                                
                                </select>
                            </div>
                        
                        </div><br><br>

                            
                                <div class="row mb-3">
                                    <label for="categories" class="col-md-4 col-form-label text-md-end">{{ __('انتخاب تصویر') }}</label>
                                    <div class="input-group">
                                        <input type="text" id="image_label" class="form-control" name="image"
                                            aria-label="Image" aria-describedby="button-image" >
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image" data-preview="holder" >انتخاب</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="categories" class="col-md-4 col-form-label text-md-end">{{ __('آپلود کتاب') }}</label>
                                    <div class="input-group">
                                        <input type="text" id="image_label" class="form-control" name="upload_file"
                                            aria-label="Image" aria-describedby="button-image" >
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="button-image" data-preview="holder" >انتخاب</button>
                                        </div>
                                    </div>
                                </div>



                        <div class="container">
                        
                        <div class="row mb-3">
                            <label for="user_id" class="col-md-4 col-form-label text-md-end">کاربر: {{Auth::user()->name}}</label>
                            <input  type="hidden"  name="user_id" value="{{Auth::user()->id}}">
                        </div>

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ذخیره') }}
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
