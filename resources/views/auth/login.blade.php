@extends('layouts._main')

@section('content')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center row m-0 p-0">
        @if ($errors->any())
            <div class="col-12 col-md-6 alert alert-danger mt-2" id="error_alert">
                <ul class="m-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form
        class="col-12 col-md-6 col-lg-4 mt-5"
        method="POST"
        action="{{ route('login') }}"
        >
        @csrf
            <h1 class="text-center">Login</h1>
            <div class="form-floating my-3" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="EX: 09121112233">
                <input name="phone" type="number" class="form-control" id="register_phone" placeholder="Just number" value="{{old("phone")}}">
                <label for="register_phone">Phone number</label>
            </div>

            <div class="form-floating my-3" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="Letters and numbers + (@#$%)">
                <input name="password" type="password" class="form-control" id="register_pass" placeholder="Just number" value="{{old("password")}}">
                <label for="register_pass">Password</label>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn_blue hoverable">Login</button>
            </div>

            <a href="/register" class="mt-5 d-block">I have not registered yet</a>
        </form>
    </div>
@endsection
