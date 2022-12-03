@extends('front.index')

@section('content')


    <nav aria-label="breadcrumb ">
      <ol class="breadcrumb bgcolor">
        <li class="breadcrumb-item"><a href="{{ route('books') }}">صفحه اصلی</a></li>
        <li class="breadcrumb-item active" aria-current="page">خرید کتاب</li>
        <li class="breadcrumb-item active" aria-current="page">{{$book->name}}</li>
      </ol>
    </nav>
<div class="col-lg-12 grid-margin stretch-card  align-self-center">
<div class="card">
  <div class="card-body">  

            <div class="form-group">
                <h3>{{$book->name}}</h3>
                <p>
                <img src="<?php echo '/photos/1/'.basename($book->image)?>" alt="">
                </p>
                <p>
                {{$book->description}}
                </p>

                <form method="POST"  class="form-group" action="{{route('purchase.store')}}">
                    @csrf
                  <div visible="false">
                      <input   type="integer" class="form-control" name="book_id" value="{{$book->id}}">
                      @auth
                      <input   type="integer" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                      @else
                      <input   type="integer" class="form-control" name="user_id" value="0">

                      @endauth
                  </div>
                
                     

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                <a href="<?php echo '/files/'.basename($book->upload_file)?>"download="{{$book->upload_file}}" >{{ __('دانلود') }}</a>
  
                                </button>

                                <a href="{{route('books')}}" class="btn btn-warning">انصراف</a>

                            </div>
                        </div>
                  </form>
 
              </div>

  </div>
</div>
</div><br><br><br><br><br>

        @include('front.messages')

          <div class="col-lg-8 grid-margin stretch-card  align-self-center">
              <h5><p>لطفا نظرات و پیشنهادهای خود را برای ما بفرستید، با تشکر</p></h5>

                <div class="card">
                  <div class="card-body">

                    <form method="POST"  class="form-group" action="{{route('comments.store')}}">
                        @csrf
                      @auth
                        <div class="row mb-3">
                            <label for="user_name" class="col-md-4 col-form-label text-md-end">{{ __('نام شما') }}</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control" name="user_name" value="{{Auth::user()->name}}" readonly >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('ایمیل') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{Auth::user()->email}}"  readonly>
                            </div>
                        </div>
                      @else
                      <div class="row mb-3">
                            <label for="user_name" class="col-md-4 col-form-label text-md-end">{{ __('نام شما') }}</label>

                            <div class="col-md-6">
                                <input id="user_name" type="text" class="form-control" name="user_name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('ایمیل') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email">
                            </div>
                        </div>
                      @endauth

                      <div class="row mb-3">
                            <label for="book_id" class="col-md-4 col-form-label text-md-end">{{ __('کتاب') }}</label>

                            <div class="col-md-6">
                                <input id="book_id" type="integer" class="form-control" name="book_id" value="{{$book->id}}" readonly>
                            </div>
                        </div>
                        

                        
                        <div class="row mb-3">
                            <label for="subject" class="col-md-4 col-form-label text-md-end">{{ __('متن پیام') }}</label>

                            <div class="col-md-6">
                              <textarea class="form-control" name="message" rows="5" placeholder="متن پیام"></textarea>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('فرستادن پیام') }}
                                </button>
                            </div>
                        </div>

                    </form>
                   
                  </div>
                </div>
              </div>
        </div><br><br><br><br><br><br><br>
  
  @include('front.footer')

@endsection