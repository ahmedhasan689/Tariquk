<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('Front/css/style.css') }}">
    <title>
        @yield('page_title')
    </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="cont">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('Front/img/logo.png') }}" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('home') }}">الصفحة الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('report.index') }}">الحوادث</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('instruct') }}">الارشادات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">تواصل معنا</a>
                    </li>
                </ul>

            </div>

            @auth
            <form class="d-flex" id="logout-form" action="{{ route('logout', 'web') }}" method="POST">
                @csrf
                @method('POST')

                <div class="dropdown">
                    <div class="profile" class=" dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Auth::user()->profile->image }}" alt="">
                    </div>

                    <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenu2" style="margin-left: -50px;">
                        <li class="text-center">
                            <button class="dropdown-item" type="button">
                                <a href="{{ route('profile.index') }}">البروفايل</a>
                            </button>
                        </li>
                        <!-- <hr> -->
                        <li class="text-center">
                            <button class="dropdown-item" type="button">
                                <a href="edit.html">تعديل البروفايل</a>
                            </button>
                        </li>

                        <li class="text-center">
                            <button class="dropdown-item" type="button">
                                <a href="#">مساعدة</a>
                            </button>
                        </li>

                        <li class="text-center">
                            <button class="dropdown-item" type="submit">
                                تسجيل الخروج
                            </button>
                        </li>
                    </ul>
            </form>
        </div>

        </form>
        @endauth

        @guest
        <form class="d-flex">
            <button class="log btn btn-outline-success" type="submit">
                <a href="{{ route('selection') }}">تسجيل الدخول</a>
            </button>
        </form>
        @endguest
       

        </div>
    </nav>


    <!-- Main Content -->
    <main>
        @yield('content')
    </main>


    @yield('footer')

    <!-- End Main Content -->

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>
    <script src="{{ asset('Front/js/main.js') }}">
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>