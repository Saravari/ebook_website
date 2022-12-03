
@extends('back.index')
@section('content')
@section('title')
پنل مدیریت نظرات
@endsection
<div class="main-panel">

        <div class="content-wrapper">
          <!-- Page Title Header Starts-->
          <div class="row page-title-header">
            <div class="col-12">
              <div class="page-header">
                <h4 class="page-title">مدیریت نظرات</h4>
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
                          <th>پیام</th>
                          <th>نویسنده</th>
                          <th>ایمیل</th>
                          <th>موضوع</th>
                          <th>وضعیت</th>
                          <th>مدیریت</th>
                        </tr>
                      </thead>
                      <tbody>

                    @foreach($comments  as  $comment)

                      
                      @switch($comment->status)
                        @case(0)
                        @php
                        $url= route('admin.comments.status',$comment->id);  
                        $status = '<a href="'.$url.'"  class="badge badge-warning">غیرفعال</a>' @endphp
                        @break
                        @case(1)
                        @php
                        $url= route('admin.comments.status',$comment->id);  
                        $status ='<a href="'.$url.'"  class="badge badge-success">فعال</a>' @endphp
                        @break
                      @endswitch
                      
                        <tr>
                          <td>{{$comment->message}}</td>
                          <td>{{$comment->user_name}}</td>
                          <td>{{$comment->email}}</td>
                          <td>{{$comment->subject}}</td>
                          <td>{!!$status!!}</td>
                          <td>
                            <a href="{{route('admin.comments.edit',$comment->id)}}"><label class="badge badge-success">ویرایش</label></a>
                            <a href="{{route('admin.comments.destroy',$comment->id)}}" onclick="return confirm('آیا آیتم مورد نظر حزف شود')"><label class="badge badge-danger">حذف</label></a>
                          </td>
                        </tr>
                    @endforeach

                       </tr>
                      </tbody>
                    </table>
                  </div>

                  {{$comments->links()}}
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
