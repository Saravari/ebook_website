

@extends('front.index')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ورود کاربران</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body dir="rtl" style="text-align:right">
    <div class="container">
    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb bgcolor">
        <li class="breadcrumb-item"><a href="{{ route('books') }}">صفحه اصلی</a></li>
        <li class="breadcrumb-item active" aria-current="page">ورود کاربران</li>
      </ol>
    </nav>

        @include('front.messages')

<div class="d-flex justify-content-center">
    <div class="card">
        <div class="card-body">

            <form action="{{route('login')}}" method="POST">
                @csrf


                <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('ایمیل') }}</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{old('email')}}">
                    @error('email')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="row mb-3">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('رمز ورود') }}</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="title">مرا بخاطر بسپار</label>
                    <div>
                        <input type="checkbox" class="form-check-input" name="remember">
                    </div>

                </div>

                <div class="form-group">
                    <label for="title"></label>
                    <button type="submit" class="btn btn-success">ورود</button>
                    <a href="{{route('books')}}" class="btn btn-warning">انصراف</a>
                </div>
        
            </form>

        
        </div>
    </div>
</div>
</body>

</html>
@endsection


