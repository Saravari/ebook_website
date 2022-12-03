<header id="header">

<div id="topbar">
  <div class="container">
    <div class="social-links">
      <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
      <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
      <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
      <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
    </div>
  </div>
</div>

<div class="container">

  <div class="logo float-left">
    <h1 class="text-light"><a href="#intro" class="scrollto"><span>کتابسین</span></a></h1>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
        @auth
        <p class="profile-name"> <h5 class="btn btn-success"> {{ Auth::user()->name }}  خوش آمدید  </h5></p>
        @endauth
        <form  method="POST"  class="form-group" action="{{route('search')}}">
          @csrf

          <nav class="main-nav float-left d-none d-lg-block">
            <ul>
              <li>
                <div class="row mb-3">
                  <input  type="text"  name="name" class="form-control"  placeholder="جستجو">              
                </div>  
              </li>
                    <button type="submit" class="btn btn-primary">{{ __('جستجو') }}</button>          
              </li>
            </ul>
          </nav><!-- .main-nav -->
        </form>
    <nav class="main-nav float-left d-none d-lg-block">
      <ul>
          @auth
                    <li><a href="{{route('profile', Auth::user()->id)}}">پروفایل کاربری</a></li>
                  @if(Auth::user()->role==1)
                    <li><a href="{{route('admin.index')}}" target="_blank">پنل مدیریت</a></li>
                  @endif
                
              @else
                <li><a href="{{route('register')}}"><h5>عضویت</h5></a></li>
                <li><h3 ><a href="{{route('login')}}"><h5>ورود</h5></a></li>
          @endauth

     
      
          <li><a href="#about">در باره ما</a></li>
          <li><a href="#team">تیم ما</a></li>
          <li><a href="{{route('comment')}}">تماس با ما</a></li>
          @auth
                <li>
                  <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">خروج</button>
                  </form>
                <li>
          @endauth
      </ul>
    </nav><!-- .main-nav -->
  </div> 
</div>

</header><br><br><br><br><br><br><br><br>