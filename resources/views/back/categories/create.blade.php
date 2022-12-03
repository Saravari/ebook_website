
@extends('back.index')
@section('content')
@section('title')
 دسته بندی جدید
@endsection
<div class="main-panel">

        <div class="content-wrapper">
          <!-- Page Title Header Starts-->
          <div class="row page-title-header">
            <div class="col-12">
              <div class="page-header">
                <h4 class="page-title">دسته بندی جدید</h4>
              </div>
            </div>
             
          </div>
          <!-- Page Title Header Ends-->
        <div class="row">
                    
        <div class="col-lg-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                  @include('back.messages')
                    
                  <form method="POST" action="{{route('admin.categories.store')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('نام دسته بندی') }}</label>

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
                                <input id="slug" type="slug" class="form-control" name="slug" value="{{old('slug')}}">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ذخیره') }}
                                </button>
                                <a href="{{route('admin.categories')}}" class="btn btn-warning">انصراف</a>
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
