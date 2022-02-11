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
        <div class="search text-center">
            <input type="text" placeholder="ابحث عن اسم الشارع">
        </div>

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
            <div class="news">
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