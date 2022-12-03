<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  
  <link rel="stylesheet" href="{{url('/back/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{url('/back/assets/vendors/iconfonts/ionicons/css/ionicons.css')}}">
  <link rel="stylesheet" href="{{url('/back/assets/vendors/iconfonts/typicons/src/font/typicons.css')}}">
  <link rel="stylesheet" href="{{url('/back/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{url('/back/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{url('/back/assets/vendors/css/vendor.bundle.addons.css')}}">
 
  <link rel="stylesheet" href="{{url('/back/assets/css/shared/style.css')}}">
 
  <link rel="stylesheet" href="{{url('/back/assets/css/demo_1/style.css')}}">
  <link rel="stylesheet"  href="{{url('back/assets/css/chosen.min.css')}}" />
 
  <link rel="shortcut icon" href="{{url('/back/assets/images/favicon.png')}}" />

  


<body>


 
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>

  <div class="container-scroller">
   
  
    <div class="container-fluid page-body-wrapper">
    
   
    @include('back.sidebar')
    @yield('content')
    
    
    </div>
   
  </div>
  
  <script src="{{url('/back/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{url('/back/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
 
  <script src="{{url('/back/assets/js/shared/off-canvas.js')}}"></script>
  <script src="{{url('/back/assets/js/shared/misc.js')}}"></script>
  
  <script src="{{url('/back/assets/js/demo_1/dashboard.js')}}"></script>
  <script src="{{url('back/assets/js/chosen.jquery.min.js')}}"></script>


  <script>
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('button-image').addEventListener('click', (event) => {
      event.preventDefault();
      window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
    });
  });
  // set file link
  function fmSetLink($url) {
    document.getElementById('image_label').value = $url;
  }
</script>
</body>

</html>