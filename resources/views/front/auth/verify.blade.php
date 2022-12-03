@extends('front.index')
<br><br><br><br><br><br><br>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('فعالسازی حساب کاربری') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __(' لینک فعالسازی برای ایمیل شما ارسال شد') }}
                        </div>
                    @endif

                    {{ __(' یک ایمیل برای شما ارسال شد، لطفا برای فعالسازی ایمیل خود را بررسی کنید.') }}
                    <br><br>
                    {{ __('اگر ایمیل برای شما ارسال نشده است!') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('اینجا کلیک کنید') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
