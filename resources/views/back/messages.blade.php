@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li style="color:red">
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div><br>
    @endif

    @if (session('warning'))
    <div class="alert alert-danger">
         یک خطا رخ داده است:{{session('warning')}}
    </div><br>
    @endif