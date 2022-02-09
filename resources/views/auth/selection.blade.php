@extends ('layouts.Front-layout')

@section('page_title', 'طريقة الدخول')

@section('content')
<div class="wrapper">
    <section class="height-100vh d-flex align-items-center page-section-ptb login">
        <div class="container"  style="margin-top: 20px;">
            <div class="row justify-content-center no-gutters vertical-align" style="box-shadow: 2px 3px 4px; padding:10px 15px">

                <div style="border-radius: 15px;" class="col-lg-8 col-md-8 bg-white">
                    <div class="login-fancy pb-40 clearfix">
                        <h3 style="font-family: 'Cairo', sans-serif" class="mb-30">حدد طريقة الدخول</h3>
                        
                        <div class="form-inline">
                            <a class="btn btn-default col-lg-3" title="مستخدم" href="{{ route('login.form', 'user') }}" style="margin-left: 30px;">
                                <img alt="user-img" width="100px;" src="{{ asset('Front/img/user.jpg') }}">
                            </a>
                            <a class="btn btn-default col-lg-3" title="مسؤول" href="{{ route('login.form', 'admin') }}" style="margin-left: 30px;">
                                <img alt="user-img" width="100px;" src="{{ asset('Front/img/admin.jpg') }}">
                            </a>
                            <a class="btn btn-default col-lg-3" title="مساعد مسؤول" href="{{ route('login.form', 'subadmin') }}" style="margin-left: 30px;">
                                <img alt="user-img" width="100px;" src="{{ asset('Front/img/subadmin.jpg') }}">
                            </a>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>
@endsection