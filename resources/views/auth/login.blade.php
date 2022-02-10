@extends ('layouts.Front-layout')

@section('page_title', 'تسجيل الدخول')

@section('content')
<div class="login">
    <div class="row">

        <div class="col-lg-6">
            @if($type == 'user')
            <h1 class="text-center">
                مستخدم
            </h1>
            @elseif($type == 'subadmin')
            <h1 class="text-center">
                مساعد مسؤول
            </h1>
            @else
            <h1 class="text-center">
                مسؤول
            </h1>
            @endif

            <h2>
                مرحبا! شكرا لعودتك
            </h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" style="text-align: center; color: #FFF; background-color: #D60D0D; width: 470px; margin-right: 57px; padding-top: 6px; padding-bottom: 2px;" />

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <input type="hidden" name="type" value="{{ $type }}">
                <input type="email" placeholder="البريد الالكتروني" name="email">
                <input type="password" placeholder="كلمة السر" name="password">
                <a class="reset" href="">هل نسيت كلمةالمرور؟</a>
                <button type="submit">تسجيل الدخول</button>
            </form>

            <br>
        </div>
        <div class="col-lg-6">
            <div class="image w-100">
                <img src="{{ asset('Front/img/login.jfif') }}" alt="">
                <div class="info">
                    <h3>سجل الان!</h3>
                    <p>لتصلك اخر الأخبار والتحديثات للمشاكل البيئية والطبيعية في منطقتك</p>
                    <button>
                        <a href="{{ route('register') }}"> تسجيل </a>
                    </button>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection