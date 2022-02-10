@extends('layouts.Front-layout')

@section('page_title', 'التسجيل')

@section('content')
        <!-- Validation Errors -->
        <div class="sign">
            <h2>انشاء حساب جديد</h2>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <x-auth-validation-errors class="mb-4" :errors="$errors" style="text-align: center; background-color: #d60d0d; color: white;font-size: 18px;" />

                <div class="group">
                    <input type="text" placeholder="الاسم الأول" name="first_name">
                    <input type="text" placeholder="الاسم الأخير" name="last_name">
                </div>
                <div class="group">
                    <select name="city">
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                        @endforeach         
                    </select>
                    <input type="text" placeholder="الشارع" name="street">
                </div>

                <div class="group">
                    <input type="email" placeholder="البريد الالكتروني" name="email">
                </div>

                <div class="group">
                    <input type="password" placeholder="كلمة المرور " name="password">
                </div>

                <div class="group">
                    <input type="password" placeholder="تأكيد كلمة المرور" name="re-password">
                </div>

                <div class="group">
                    <input type="text" placeholder="رقم الجوال" name="phone_number">
                </div>

                <div class="groupSign text-center">
                    <button type="submit">
                        تسجيل
                    </button>
                </div>
            </form>

        </div>
@endsection