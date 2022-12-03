
@extends('front.index')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ثبت نام کاربران</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body dir="rtl" style="text-align:right">
    <div class="container">
    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb bgcolor">
        <li class="breadcrumb-item"><a href="{{ route('books') }}">صفحه اصلی</a></li>
        <li class="breadcrumb-item active" aria-current="page">ثبت نام کاربران</li>
      </ol>
    </nav>
        @include('front.messages')

        <div class="justify-content-center col-lg-8 stretch-card ">
                <div class="card">
                  <div class="card-body">

                    <form method="POST" action="{{route('register')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('نام و نام خانوادگی') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('ایمیل') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('رمز ورود') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('تکرار رمز ورود') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password_confirmation">
                            </div>
                        </div>

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ثبت نام') }}
                                </button>
                                <a href="{{route('books')}}" class="btn btn-warning">انصراف</a>
                            </div>
                        </div>

                    </form>
                   
                  </div>
                </div>
              </div>
        
    </div>
</body>

</html>
@endsection