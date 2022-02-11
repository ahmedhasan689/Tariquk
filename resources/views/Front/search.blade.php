@extends('layouts.Front-layout')

@section('page_title', 'البلاغات')

@section('content')

<div class="event">
    <div class="list ">
        <ul class="nav text-center">
            <li class="nav-item left">
                <a class="nav-link active " aria-current="page" href="#">جباليا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> بيت لاهيا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">بيت حانون</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">غزة</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">الوسطى</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">خانيونس</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">رفح</a>
            </li>
        </ul>
    </div>

    <div class="cont">
        <form action="{{ route('search') }}" method="GET">
            @csrf
            <div class="search text-center">
                <input type="text" placeholder="ابحث عن اسم الشارع" name="search" id="search">
            </div>
            <button class="btn bg-transparent" style="position: absolute; top: 257px; z-index: 5; height: 37px; margin-top: -4; margin-left: 1px; left:335px">
                <i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </form>

        <div class="bodyCont">
            <!-- <div class="news">
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
            </div> -->
            @foreach($reports as $report)
            <div class="news" id="div_data">
                <div class="right">
                    <h3>{{ $report->street }}</h3>
                    <p>{{ $report->content }}</p>
                    <div class="date">
                        <span>{{ $report->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                @if($report->media)
                <div class="left">
                    @if($report->media_ext == 'mp4' || $report->media_ext == 'mkv')
                    <video width="470" height="175" controls>
                        <source src="{{ asset('uploads') . '/' . $report->media}}" alt="">
                    </video>
                    @elseif($report->media_ext == 'jpg' || $report->media_ext == 'jpeg' || $report->media_ext == 'png')
                    <img src="{{ asset('uploads') . '/' . $report->media}}" alt="">
                    @elseif($report->media_ext == 'mp3' || $report->media_ext == 'm4a')
                    <audio controls style="margin-top: 50px; margin-right: 100px;">
                        <source src="{{ asset('uploads') . '/' . $report->media}}">
                    </audio>
                    @endif
                </div>
                @endif
            </div>
            @endforeach

            <!-- <div class="news">
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
            </div> -->
        </div>

    </div>
</div>


@endsection

@section('footer')
<footer class="footer text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 mb-5 mb-lg-0" style="margin: 0 auto;">
                <h4 class="text-uppercase mb-4">روابط تهمك</h4>
                <ul class="os">
                    <li><i class="bx bx-chevron-right"></i> <a href="#">الرئيسية</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">من نحن</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">خدماتنا</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">تواصل معنا</a></li>

                </ul>
            </div>
            <!-- Footer Location-->
            <div class="col-lg-2 mb-5 mb-lg-0" style="margin: 0 auto;">
                <h4 class="text-uppercase mb-4">تواصل معنا</h4>
                <ul class="os">
                    <li><i class="bx bx-chevron-right"></i> <a href="#">+972500000</a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">2629999
                        </a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">5edma@gmail.com
                        </a></li>
                    <li><i class="bx bx-chevron-right"></i> <a href="#">FAQ</a></li>

                </ul>
            </div>

            <!-- Footer Social Icons-->
            <div class="col-lg-4 mb-5 mb-lg-0">
                <h4 class="text-uppercase mb-4">حول الموقع</h4>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
            </div>
        </div>
    </div>
</footer>
@endsection
