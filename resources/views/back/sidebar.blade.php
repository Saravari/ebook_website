<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="text-wrapper">
                <h4><p class="profile-name">{{ Auth::user()->name }}</p></h4>
                مدیر سایت
              </div>
            </a>
          </li>
          <li class="nav-item nav-category">مدیریت سایت</li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon typcn typcn-coffee"></i>
              <span class="menu-title">پنل مدیریت</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.users')}}">کاربران </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.categories')}}">دسته بندیها</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.books')}}">کتابها</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('admin.comments')}}">نظرات</a>
                </li>
              </ul>
            </div>
          </li>
      
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon typcn typcn-document-add"></i>
              <span class="menu-title">صفحات</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/blank-page.html"> صفحه ی خالی </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/login.html"> ورود </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/register.html"> ثبت نام </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                </li>
              </ul>
            </div>
          </li>
          
        </ul>
      </nav>