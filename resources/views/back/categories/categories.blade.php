
@extends('back.index')
@section('content')
@section('title')
پنل مدیریت دسته بندی
@endsection
<div class="main-panel">

        <div class="content-wrapper">
          <!-- Page Title Header Starts-->
          <div class="row page-title-header">
            <div class="col-12">
              <div class="page-header">
                <h4 class="page-title">مدیریت دسته بندی</h4>
              </div>
            </div>
             
          </div>
          <!-- Page Title Header Ends-->
        <div class="row">
          <div>
            <a href="{{route('admin.categories.create')}}", class="badge badge-success">دسته بندی جدید</a>
          </div>                 
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  @include('back.messages')
                  
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>نام</th>
                          <th>نام مستعار</th>
                         
                          <th>مدیریت</th>
                        </tr>
                      </thead>
                      <tbody>

                      @foreach($categories  as  $category)
                      
                        <tr>
                          <td>{{$category->name}}</td>
                          <td>{{$category->slug}}</td>
                          <td>
                            <a href="{{route('admin.categories.edit',$category->id)}}"><label class="badge badge-success">ویرایش</label></a>
                            <a href="{{route('admin.categories.destroy',$category->id)}}" onclick="return confirm('آیا آیتم مورد نظر حزف شود')"><label class="badge badge-danger">حذف</label></a>
                          </td>
                        </tr>
                      @endforeach

                       </tr>
                      </tbody>
                    </table>
                  </div>
                  {{$categories->links()}}
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
