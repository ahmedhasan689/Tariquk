@extends ('layouts.Front-layout')

@section('page_title', 'تواصل معنا')

@section('content')
<div class="contactPage mt-5" data-aos="fade-down">
    <div class="cont">
        <h2>تواصل معنا</h2>
        <div class="mb-3">

            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="الاسم">
        </div>
        <div class="mb-3">

            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="الايميل">
        </div>
        <div class="mb-3">

            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="رقم الجوال ">
        </div>
        <div class="mb-3">

            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="ضع رسالتك هنا"></textarea>
        </div>
    </div>
    <div class="bt text-center">
        <button class="btn">send</button>
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