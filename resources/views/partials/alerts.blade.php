@if (session('successLogin'))
    <script>
        handleToastify("You have successfully logged in", "success")
    </script>
    {{-- <x-toast type="success" :message="session('successLogin')" /> --}}
@endif
