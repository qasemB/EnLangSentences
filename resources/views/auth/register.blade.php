@extends('layouts._main')

@section('content')
    <div class="w-100 h-100 d-flex justify-content-center align-items-center row flex-column m-0 p-0">
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
        action="{{ route('register', ['id' => 1]) }}"
        >
            @csrf
            <h1 class="text-center">Join us</h1>
            <div class="form-floating my-3" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="EX: 09121112233 (11 Digits)">
                <input name="phone" type="number" class="form-control" id="register_phone" placeholder="Just number" value="{{old('phone')}}">
                <label for="register_phone">Phone number</label>
            </div>
            <div class="form-floating my-3" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="Letters + Numbers + (@#$%) At least 8">
                <input name="password" type="password" class="form-control" id="register_pass" placeholder="Just number">
                <label for="register_pass">Password</label>
            </div>
            <div class="form-floating my-3" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="Repeat the above">
                <input name="password_confirmation" type="password" class="form-control" id="register_con_pass"
                    placeholder="Just number">
                <label for="register_con_pass">Confirm password</label>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn_blue hoverable">Register</button>
            </div>

            <a href="/login" class="d-block mt-5">I have already registered</a>
        </form>
    </div>
@endsection
