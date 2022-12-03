
@extends('front.index')

@section('content')


@include('front.navbar')

  <main id="main">
  <section id="intro">
    <div class="container d-flex">
          <div class="d-flex justify-content-center align-self-center">
              <div  class="row form-group">
                    @foreach($books as $book)
                      <div class="col-sm-3">
                       <img src="<?php echo '/photos/1/'.basename($book->image)?>"  width="250px" height="180px"alt="">
                       <h5><a href="{{route('bookshow',$book->slug)}}">{{$book->name}}</a></h5>
                       <p><?php echo substr(strip_tags($book->description),0,200).'...';  ?></p>
                     </div >
                    @endforeach
              </div>
                    
          </div>

            <div class="d-flex justify-content-center">
              <p>{{$books->links()}}</p>
           </div>
    </div>


  </section>

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">

      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-6">
            <div class="about-img">
              <img src="img/about-img.jpg" alt="">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content">
              <h2>درباره ما</h2>
              <h3>من یعقوب پیری هستمم.</h3>
              <p>کارشناس It.</p>
              <p>این اولین پروژه ای است که با زبان  php و فریمورک لاراول نوشتم.</p>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> لطفا از طریق منوئ تماس با ما نظرات و پیشنهادهای خود را برای من بنویسید.</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

    </section><br><br><br><br><!-- #about -->


    <!--==========================
   

      Team Section
    ============================-->
    <section id="team" class="section-bg">
      <div class="container">
        <div class="section-header">
          <h3>تیم ما</h3>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="img/team-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>یعقوب پیری</h4>
                  <span>مدیر سایت</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><br><br><br><br><!-- #team --><br><br><br><br><br>


    
         @include('front.footer')

   
  </main>
@endsection