
@extends('front.index')

@section('content')

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
                                <a href="{{route('books')}}" class="btn btn-warning">انصراف</a>
                            </div>
                        </div>

                    </form>
                   
                  </div>
                </div>
              </div>
        </div><br><br><br><br><br><br><br>
  
              <div class="container d-flex justify-content-center">
                <div class="copyright">
                  &copy; Copyright <strong>ketabseen</strong>. All Rights Reserved
                </div>
                
              </div>

@endsection