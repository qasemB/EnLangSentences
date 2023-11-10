@extends('layouts._main')

@section('content')
    <h3 class="text-center mt-5">You are offline</h3>
    <h3 class="text-center">Please connect to the Internet</h3>
    <h3 class="text-center">to return to the application</h3>

    <div id="offline_elem" class="my-5 text-center" title="ارتباط شما با اینترنت قطع است">
        <i class="fa-solid fa-wifi text-danger"></i>
        <span class="text-danger">!</span>
    </div>

    <h3 class="text-center">شما آفلاین هستید </h3>
    <h3 class="text-center">لطفا به اینترنت متصل شوید</h3>
    <h3 class="text-center">تا به اپلیکیشن برگردید</h3>

@endsection
