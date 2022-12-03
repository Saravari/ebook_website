
@extends('back.index')
@section('content')
@section('title')
پنل مدیریت کاربران
@endsection
<div class="main-panel">

        <div class="content-wrapper">
          <!-- Page Title Header Starts-->
          <div class="row page-title-header">
            <div class="col-12">
              <div class="page-header">
                <h4 class="page-title">مدیریت کاربران</h4>
              </div>
            </div>
             
          </div>
          <!-- Page Title Header Ends-->
        <div class="row">
                    
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  @include('back.messages')
                    
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>نام ونام خانوادگی</th>
                          <th>ایمیل</th>
                          <th>تلفن</th>
                          <th>نقش کاربری</th>
                          <th>وضعیت</th>
                          <th>مدیریت</th>
                        </tr>
                      </thead>
                      <tbody>

                      @foreach($users  as  $user)
                        @switch($user->role)
                        @case(1)
                        @php $role='مدیر' @endphp
                        @break
                        @case(2)
                        @php $role='کاربر' @endphp
                        @break
                        @endswitch

                        @switch($user->status)
                        @case(0)
                        @php
                        $url= route('admin.status',$user->id);  
                        $status = '<a href="'.$url.'"  class="badge badge-warning">غیرفعال</a>' @endphp
                        @break
                        @case(1)
                        @php
                        $url= route('admin.status',$user->id);  
                        $status ='<a href="'.$url.'"  class="badge badge-success">فعال</a>' @endphp
                        @break
                        @endswitch
                        
                        <tr>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->phoe}}</td>
                          <td>{{$role}}</td>
                          <td>{!!$status!!}</td>
                          <td>
                            <a href="{{route('admin.profile',$user->id)}}"><label class="badge badge-success">ویرایش</label></a>
                            <a href="{{route('admin.delete',$user->id)}}" onclick="return confirm('آیا آیتم مورد نظر حزف شود')"><label class="badge badge-danger">حزف</label></a>
                          </td>
                        </tr>
                      @endforeach

                       </tr>
                      </tbody>
                    </table>
                  </div>
                  {{$users->links()}}
                </div>
              </div>

        </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('back.footer')
        <!-- partial -->
</div>

@endsection
