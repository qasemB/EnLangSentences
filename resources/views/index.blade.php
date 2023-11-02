<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/style.css" />

    <title>EnWords</title>
</head>

<body class="antialiased">

    <nav class="navbar bg_blue fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="/images/logo.png" alt="Bootstrap" width="30" height="24"
                    style="filter: drop-shadow(0 0 2px blue)">
            </a>
            <div class="rounded-circle border d-flex p-0 justify-content-center align-items-center navbar-toggler pointer"
                style="width:35px;height:35px" alt="Avatar" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                <img src="/images/avatar.png" class="w-100">
            </div>
            {{--        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"> --}}
            {{--            <span class="navbar-toggler-icon"></span> --}}
            {{--        </button> --}}
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <div class="rounded-circle border d-flex p-0 justify-content-center align-items-center"
                        style="width:35px;height:35px" alt="Avatar">
                        <img src="/images/avatar.png" class="w-100">
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Progress</a>
                        </li>
                    </ul>
                    {{--                <form class="d-flex mt-3" role="search"> --}}
                    {{--                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                    {{--                    <button class="btn btn-outline-success" type="submit">Search</button> --}}
                    {{--                </form> --}}
                </div>
            </div>
        </div>
    </nav>

    <main class="main_content row m-0 p-0 justify-content-center align-content-start px-2">
        <h3 class="text-center mt-4"> <span class="text_pink">Learn</span> English words, every day </h3>
        <h3 class="text-center mt-3"> By <span class="text_pink">your own sentences</span> </h3>

        <div id="typing_box" class="w-100 w-md-50 bg_dark text-white p-3 rounded shadow mt-3 transition_300">
        </div>

        <div class="w-100 w-md-50 p-3 rounded shadow mt-4">
            <label>Now it's your turn, write the above</label>
            <input id="typing_input" type="text" class="form-control">
        </div>

        <div class="text-end mt-3 w-100 w-md-50">
            <span class="hoverable_text pointer p-3">Next</span>
        </div>

        <h3 class="text-center mt-3 mb-4">And <br /> You can add</h3>

        <div class="text-center">
            <button class="btn btn-light text_blue shadow">your own sentence</button>
        </div>

        <script>
            var i = 0;
            var txt = 'The best way to remember new words is to learn them in +sentences';
            var speed = 50;

            let withColor = false

            function typeWriter() {
                if (i < txt.length) {
                    const letter = txt.charAt(i)
                    if (letter == "+") {
                        withColor = !withColor
                    } else {
                        if (withColor) {
                            document.getElementById("typing_box").innerHTML += `<span class="text_pink">${letter}</span>`;
                        } else {
                            document.getElementById("typing_box").innerHTML += letter;
                        }
                    }
                    i++;
                    setTimeout(typeWriter, speed);
                }
            }
            setTimeout(() => typeWriter(), 500)
            document.getElementById("typing_input").addEventListener("focusin", () => {
                document.getElementById("typing_box").classList.add("is_blur")
            })
            document.getElementById("typing_input").addEventListener("focusout", () => {
                document.getElementById("typing_box").classList.remove("is_blur")
            })
        </script>


    </main>

    <footer class="bg-light text-center d-flex justify-content-center align-items-center">
        © ENLangWords 2023
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
