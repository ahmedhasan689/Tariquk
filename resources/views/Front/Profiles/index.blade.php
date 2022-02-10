@extends('layouts.Front-layout')

@section('page_title', 'الملف الشخصي')

@section('content')
<div class="profile">
    <div class="head">
        <div class="cover">
            <div class="gg">
                <div class="imgProfile">
                    <img src="{{ $profile->image }}" alt="">

                </div>
                <div class="info">
                    <h4>{{ $profile->user->first_name }} {{ $profile->user->last_name }}</h4>
                    <span>{{ $profile->user->city->city_name }}</span>

                </div>
            </div>
            <div class="edit">
                <button>
                    <a href="{{ route('profile.edit', ['id' => $profile->id]) }}">تعديل الملف الشخصي</a>
                </button>
            </div>
            <!-- Button trigger modal -->

            <div class="addRoad">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    اضافة وجهتك
                </button>
            </div>


            <!-- Modal -->
            <div class="modal fade mt-5 " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center ">
                            <h5 class="modal-title" style="text-align: center; font-weight: bold; color: #d60d0d;" id="staticBackdropLabel">اضافة المناطق التي تريد تحديد وجهتك اليها </h5>

                        </div>
                        <div class="modal-body">
                            <div class="group">
                                <label for="street1">أضف منطقة</label> <br>
                                <input class="w-100" id="street1" type="text">
                            </div>
                            <div class="group">
                                <label for="street2">أضف منطقة</label> <br>
                                <input class="w-100" id="street2" type="text">
                            </div>
                            <div class="group">
                                <label for="street3">أضف منطقة</label> <br>
                                <input class="w-100" id="street3" type="text">
                            </div>
                            <div class="group">
                                <label for="street4">أضف منطقة</label> <br>
                                <input class="w-100" id="street4" type="text">
                            </div>
                            <div class="group">
                                <label for="street5">أضف منطقة</label> <br>
                                <input class="w-100" id="street5" type="text">
                            </div>
                            <br> <br>
                            <div class="group d-flex">
                                <input type="checkbox" style="margin-top: 5px; width: 15px; height: 15px;">
                                <p style="font-size: large; font-weight: bold; color: #d60d0d; margin-right: 5px;">اوافق على استلام SMS بالابلاغات على الشوارع</p>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button style="background-color: #d60d0d; color: #fff; font-weight: bold;" type="button" class="btn">موافق</button>

                            <button style="color:#fff ; background-color: #000; font-weight: bold;" type="button" class="btn " data-bs-dismiss="modal">اغلاق</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="myNew">
            <h2>بلاغاتي</h2>
            <div class="bodyCont">
                <div class="news">
                    <div class="right">
                        <h3>جسر وادي غزة مغلق بسبب التصليحات</h3>
                        <p>تفاصيل الحدث تفاصيل الحدث تفاصيل الحدث تفاصيل الحدث تفاصيل الحدث تفاصيل الحدث</p>
                        <div class="date">
                            <span>3:30pm</span>
                            <span>8/2/2022</span>
                        </div>
                    </div>
                    <div class="left">

                    </div>
                </div>
                <div class="news">
                    <div class="right">
                        <h3>غرق شارع المدارس بنصيرات بسبب الأمطار</h3>
                        <p>تفاصيل الحدث تفاصيل الحدث تفاصيل الحدث تفاصيل الحدث تفاصيل الحدث تفاصيل الحدث</p>
                        <div class="date">
                            <span>3:30pm</span>
                            <span>8/2/2022</span>
                        </div>
                    </div>
                    <div class="left">
                        <img src="img/9956d6af-12ee-4325-b49a-be8f18d17e03.jfif" alt="">
                    </div>
                </div>
                <div class="news">
                    <div class="right">
                        <h3>اغلاق شارع صلاح الدين / مدخل المغازي بسبب حادث سير</h3>
                        <p>تفاصيل الحدث تفاصيل الحدث تفاصيل الحدث تفاصيل الحدث تفاصيل الحدث تفاصيل الحدث</p>
                        <div class="date">
                            <span>3:30pm</span>
                            <span>8/2/2022</span>
                        </div>
                    </div>
                    <div class="left">

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection