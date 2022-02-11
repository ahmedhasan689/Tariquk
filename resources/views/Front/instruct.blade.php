@extends ('layouts.Front-layout')

@section('page_title', 'الإرشادات')

@section('content')
<div class="instruct text-center">
    <h2>ارشادات ونصائح</h2>
    <p>تعلم كيف تتصرف في الأزمات</p>
    <div class="cont">
        <div class="row">
            <div class="col-lg-3">
                <div class="image">
                    <img src="{{ asset('Front/img/fire.jfif') }}" alt="">
                </div>
            </div>
            <div class="col-lg-9">
                <h2>ماذا أفعل في الحرائق</h2>
                <div class="ss d-flex">
                    <p>تفاصيل موضوع نصيحة تفاصيل موضوع نصيحة تفاصيل موضوع نصيحة تفاصيل موضوع نصيحة تفاصيل موضوع نصيحةتفاصيل موضوع نصيحةتفاصيل موضوع تفاصيل موضوع نصيحةتفاصيل موضوع تفاصيل موضوع نصيحةتفاصيل موضوع تفاصيل موضوع نصيحةتفاصيل موضوع تفاصيل موضوع
                        نصيحةتفاصيل موضوع نصيحةتفاصيل موضوع نصيحة </p>
                    <a href="details.html">عرض المزيد</a>
                </div>

            </div>
        </div>


    </div>
    <div class="cont">
        <div class="row">
            <div class="col-lg-3">
                <div class="image">
                    <img src="{{ asset('Front/img/car.jfif') }}" alt="">
                </div>
            </div>
            <div class="col-lg-9">
                <h2>ماذا أفعل في الحرائق</h2>
                <div class="ss d-flex">
                    <p>تفاصيل موضوع نصيحة تفاصيل موضوع نصيحة تفاصيل موضوع نصيحة تفاصيل موضوع نصيحة تفاصيل موضوع نصيحةتفاصيل موضوع نصيحةتفاصيل موضوع تفاصيل موضوع نصيحةتفاصيل موضوع تفاصيل موضوع نصيحةتفاصيل موضوع تفاصيل موضوع نصيحةتفاصيل موضوع تفاصيل موضوع
                        نصيحةتفاصيل موضوع نصيحةتفاصيل موضوع نصيحة </p>
                    <a href="details.html">عرض المزيد</a>
                </div>

            </div>
        </div>


    </div>
    <div class="cont">
        <div class="row">
            <div class="col-lg-3">
                <div class="image">
                    <img src="{{ asset('Front/img/fire.jfif') }}" alt="">
                </div>
            </div>
            <div class="col-lg-9">
                <h2>ماذا أفعل في الحرائق</h2>
                <div class="ss d-flex">
                    <p class="par">تفاصيل موضوع نصيحة تفاصيل موضوع نصيحة تفاصيل موضوع نصيحة تفاصيل موضوع نصيحة تفاصيل موضوع نصيحةتفاصيل موضوع نصيحةتفاصيل موضوع تفاصيل موضوع نصيحةتفاصيل موضوع تفاصيل موضوع نصيحةتفاصيل موضوع تفاصيل موضوع نصيحةتفاصيل موضوع تفاصيل موضوع
                        نصيحةتفاصيل موضوع نصيحةتفاصيل موضوع نصيحة </p>
                    <a class="view" href="details.html">عرض المزيد</a>
                </div>

            </div>
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