@extends('layouts.Front-layout')

@section('page_title', 'تعديل الملف الشخصي')

@section('content')
<div class="editProfile">





    <form action="{{ route('profile.update', ['id' => $profile->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" style="text-align: center; color: #FFF; background-color: #D60D0D; width: 911px; margin-right: -114px; padding-top: 6px; padding-bottom: 2px; font-size: 20px;" />

        <a href="#">
            <div class="image mb-5">
                <img id="output" src="{{ $profile->image }}" alt="">
                <label for="avatar">
                    <i for="avatar" class="fas fa-camera"></i>
                </label>
                <div class="background" style="margin-top: -26px;">
                </div>
            </div>
            <input id="avatar" type="file" style="display: none;" onchange="loadFile(event)" name="avatar">
        </a>
        <div class="input-group mb-3 " style="display: flex;">

            <input type="text" class="form-control first " value="{{ $profile->user->first_name }}" aria-label="Username" aria-describedby="basic-addon1" name="first_name">
            <input type="text" class="form-control last" value="{{ $profile->user->last_name }}" aria-label="Username" aria-describedby="basic-addon1" name="last_name">
        </div>
        <!-- <div class=" mb-3">
            <label for="exampleInputName" class="form-label">اسم المستخدم</label>
            <input type="text" class="form-control" value="محمد" id="exampleInputName" aria-describedby="emailHelp">
        </div> -->
        <div class=" mb-3">
            <label for="exampleInputEmail1" class="form-label">الايميل</label>
            <input type="email" class="form-control" value="{{ $profile->user->email }}" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        </div>
        <div class=" mb-3">
            <label for="exampleInputPassword1" class="form-label">رقم الجوال</label>
            <input type="text" class="form-control" name="phone_number" value="{{ $profile->user->phone_number }}" id="exampleInputPassword1">
        </div>
        <div class="chan">
            <a href="#" class="change mt-3">تغيير كلمة السر</a>
            <div class="form mt-4">

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">كلمة السر الحالية</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 ">
                    <label for="exampleInputPassword1" class="form-label">كلمة السر الجديدة</label>
                    <input type="password" name="new-password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 ">
                    <label for="exampleInputPassword1" class="form-label">اعادة كتابة كلمة السر الجديدة</label>
                    <input type="password" name="re-password" class="form-control" id="exampleInputPassword1">
                </div>

            </div>
        </div>
        <div class="bt text-center mt-4">
            <button type="submit" class="btn btn-dark">حفظ التعديلات</button>
        </div>

    </form>
</div>

@endsection