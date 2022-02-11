@extends ('layouts.Front-layout')

@section('page_title', 'الرئيسية')

@section('content')
<div class="header" class="d-block w-100">
    <div class="image">
        <img src="{{ asset('Front/img/slid.jfif') }}" alt="">
    </div>

    <div class="row text-center">
        <div class="col-lg-6">
            <div class="but">
                <button>
                    <a href="{{ route('report.create') }}"> ابلاغ عن حدث</a>
                </button>
            </div>

        </div>
        <div class="col-lg-6 left">
            <div class="par">
                <p>كن عونا ومساعدا للجميع</p>
                <p>أبلغنا في حال تعرضت منطقتك لأي حدث</p>
            </div>

        </div>
    </div>
</div>

<div class="recent">
    <div class="bb d-flex justify-content-between">
        <h2> اخر الحوادث </h2>
        <a href="instruct.html">عرض المزيد</a>
    </div>
    <div class="row">
        <div class="col-lg-6 right">
            @foreach ($reports as $report)
            <div class="news">
                <div class="date">
                    <span>{{ $report->created_at->diffForHumans() }}</span>

                </div>
                <p>
                    {{ $report->content }}
                </p>
            </div>
            @endforeach



        </div>
        <div class="col-lg-6 left">
            @if($report->media)
            <div class="left">
                @if($report->media_ext == 'mp4' || $report->media_ext == 'mkv')
                <video width="618" height="220" controls>
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
            <div class="news" style="margin-top: -70px;">
                <p>
                    {{ $report->content }}
                </p>
                <div class="date">
                    <span>{{ $report->created_at->diffForHumans() }}</span>
                </div>

            </div>

        </div>
    </div>
</div>
<div class="advice">
    <div class="bb d-flex justify-content-between">
        <h2>اهم النصائح </h2>
        <a href="instruct.html">عرض المزيد</a>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="cont">
                <div class="image">
                    <img src="{{ asset('Front/img/fire.jfif') }}" alt="">
                </div>
                <p>
                    <a href="#"> كيف تتصرف في حال واجهت حريق</a>
                </p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="cont">
                <div class="image">
                    <img src="{{ asset('Front/img/car.jfif') }}" alt="">
                </div>
                <p><a href="details.html">نصائح في حال غرق سيارتك في الأمطار</a> </p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="cont">
                <div class="image">
                    <img src="{{ asset('Front/img/fire.jfif') }}" alt="">
                </div>
                <p>
                    <a href="{{ route('instruct') }}"> كيف تتصرف في حال واجهت حريق</a>
                </p>
            </div>
        </div>

    </div>
</div>
<div class="contact">
    <h1>تواصل معنا</h1>
    <p>في حال واجهتك مشكلة في الموقع يمكنك التواصل معنا <a href="{{ route('contact') }}">من هنا</a></p>
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