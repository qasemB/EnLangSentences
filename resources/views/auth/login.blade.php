@extends('layouts._main')

@section('content')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center row m-0 p-0">
        <form class="col-12 col-md-6 col-lg-4  mt-5">

            <h1 class="text-center">Login</h1>

            <div class="form-floating my-3" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="EX: 09121112233">
                <input type="number" class="form-control" id="register_phone" placeholder="Just number">
                <label for="register_phone">Phone number</label>
            </div>

            <div class="form-floating my-3" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="Letters and numbers + (@#$%)">
                <input type="number" class="form-control" id="register_pass" placeholder="Just number">
                <label for="register_pass">Password</label>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn_blue hoverable">Login</button>
            </div>

            <a href="/register" class="mt-5 d-block">I have not registered yet</a>
        </form>
    </div>
@endsection
