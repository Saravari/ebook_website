@extends('front.index')

@section('content')

    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb bgcolor">
        <li class="breadcrumb-item"><a href="{{ route('books') }}">صفحه اصلی</a></li>
        <li class="breadcrumb-item active" aria-current="page">دانلود کتاب</li>
        <li class="breadcrumb-item active" aria-current="page">{{$book->name}}</li>
      </ol>
    </nav>
  <main id="main" class="d-flex justify-content-center">

           <div class="d-flex justify-content-center">
              <div class="form-group">
                <h3>{{$book->name}}</h3><br>
                <p>
                  برای دانلود روی لین زیر کلیک کنید                
                </p>
                <p>
                <a href="<?php echo '/files'.basename($book->upload_file)?>" download> دانلود {{$book->name}}</a>
                </p>
                
              </div>
            </div>

  </main>
  @include('front.footer')
@endsection