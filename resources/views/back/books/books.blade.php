
@extends('back.index')
@section('content')
@section('title')
پنل مدیریت 
@endsection
<div class="main-panel">

        <div class="content-wrapper">
          <!-- Page Title Header Starts-->
          <div class="row page-title-header">
            <div class="col-12">
              <div class="page-header">
                <h4 class="page-title">مدیریت</h4>
              </div>
            </div>
             
          </div>
          <!-- Page Title Header Ends-->
        <div class="row">
          <div>
            <a href="{{route('admin.books.create')}}", class="badge badge-success">کتاب جدید</a>
          </div>               
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  @include('back.messages')
                  
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>نام کتاب</th>
                          <th>نام مستعار</th>
                          <th>نویسنده</th>
                          <th>دسته بندی</th>
                          <th>بازدید</th>
                          <th>وضعیت</th>
                          <th>مدیریت</th>
                          <th>کاربر</th>
                        </tr>
                      </thead>
                      <tbody>

                    @foreach($books  as  $book)

                      
                      @switch($book->status)
                        @case(0)
                        @php
                        $url= route('admin.books.status',$book->id);  
                        $status = '<a href="'.$url.'"  class="badge badge-warning">غیرفعال</a>' @endphp
                        @break
                        @case(1)
                        @php
                        $url= route('admin.books.status',$book->id);  
                        $status ='<a href="'.$url.'"  class="badge badge-success">فعال</a>' @endphp
                        @break
                      @endswitch
                      
                        <tr>
                          <td>{{$book->name}}</td>
                          <td>{{$book->slug}}</td>
                          <td>{{$book->writer}}</td>
                          <td>
                          @foreach($book->categories()->pluck('name')  as  $category)
                           <span class="badge badge-success">{{$category}}</span>
                          @endforeach
                          </td>
                          <td>{{$book->hit}}</td>
                          <td>{!!$status!!}</td>
                          <td>
                            <a href="{{route('admin.books.edit',$book->id)}}"><label class="badge badge-success">ویرایش</label></a>
                            <a href="{{route('admin.books.destroy',$book->id)}}" onclick="return confirm('آیا آیتم مورد نظر حزف شود')"><label class="badge badge-danger">حذف</label></a>
                          </td>
                          <td>{{$book->user->name}}</td>
                        </tr>
                    @endforeach

                       </tr>
                      </tbody>
                    </table>
                  </div>

                  {{$books->links()}}
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
