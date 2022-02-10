@extends('layouts.Front-layout')

@section('page_title', 'إضافة بلاغ')

@section('content')

<div class="add">
    <div class="kill">
        <h3>تحذير</h3>
        <p>في حال قدمت بلاغا كاذبا سيتم اغلاق حسابك بشكل نهائي</p>
    </div>

    <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h2>قدم بلاغا حول الحالة التي في منطقتك</h2>
        <div class="gro">
            <p>ادخل بيانات مكان الحادثة</p>
            <div class="group ">
                <select name="city">
                    @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                    @endforeach
                </select>
                <input type="text" placeholder="الشارع" name="street">
            </div>
            <textarea name="content" id="" placeholder="اكتب وصف الحادثة أو المعيق.."></textarea>
        </div>

        <br>
        <div class="gro">
            <p>أضف صورة أو فيديو أو تسجيل صوتي للحدث</p>
            <input type="file" value="اضافة مرفق" name="media">
        </div>
        <br>
        <div class="text-center">
            <button>أضف</button>
        </div>

    </form>

</div>



@endsection