<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>وظفني </title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ URL::asset('assets/images/wadhefni-icon.png') }}"/>
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ URL::asset('assets/css/Home_styles.css') }}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand brand-logo-mini" href="#">
                    <img src="{{ URL::asset('assets/images/wadhefni-icon.png') }}" alt="وظفني" width="50" height="50">
                </a>
                @if (Auth::user())
                    <a class="btn btn-primary" href="{{ route('dashboard') }}">لوحة التحكم</a>
                @else
                <a class="btn btn-primary" href="{{ route('login') }}">تسجيل الدخول</a>

                @endif
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <!-- Page heading-->
                            <h1 class="mb-5">اكتشف فرص العمل عن بعد التي تناسب مهاراتك</h1>
                            <form class="form-subscribe" id="contactForm" data-sb-form-api-token="API_TOKEN">
                                <!-- Email address input-->
                                <div class="row">
                                    <div class="col">
                                        <input class="form-control form-control-lg" id="search" type="search" placeholder="ابحث عن وظيفة" />
                                    </div>
                                    <div class="col-auto"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">ابحث</button></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <h2>
                    لماذا تبدأ رحلتك في العمل عن بعد
                </h2>
                <br>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-hourglass-split m-auto text-primary"></i></div>
                            <h3>توفير الوقت والتكاليف</h3>
                            <p class="lead mb-0">وفر المجهود والوقت الإضافي والتكاليف الناتجة عن الانتقال إلى مقر العمل يوميا</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-clipboard-check m-auto text-primary"></i></div>
                            <h3>زيادة الإنتاجية</h3>
                            <p class="lead mb-0">ركز فقط على أدائك وإنجاز مهامك دون مواجهة أي تحديات ناتجة عن بيئة العمل</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-stars m-auto text-primary"></i></div>
                            <h3>فرص عمل أفضل</h3>
                            <p class="lead mb-0">ابحث عن الوظيفة المناسبة لمهاراتك واهتماماتك واعمل مع أفضل الشركات من مختلف الدول</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Image Showcases-->
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/images/5.webp')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>خدمة كتابة السيرة الذاتية</h2>
                        <p class="lead mb-0">استعن بخبراء التوظيف لمساعدتك في كتابة سيرة ذاتية احترافية

                            احصل على استشارة فردية بالتواصل مباشرة مع خبراء التوظيف للتعرف على خبراتك ومهاراتك
                            اختر من بين نماذج متنوعة تستهدف مجالات العمل قابلة للتخصيص بما يتناسب مع ذوقك الشخصي
                            استلم سيرة ذاتية مهنية مخصصة تحقق المعايير القياسية وتزيد فرص تميزك على المتقدمين
                        </p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('assets/images/1.webp')"></div>
                    <div class="col-lg-6 my-auto showcase-text">
                        <h2>تقديم سهل وسريع للوظائف</h2>
                        <p class="lead mb-0">
                            بعد إنشاء وإعداد ملفك الشخصي في بعيد يمكنك تصفح قسم الوظائف وستجد جميع الوظائف المعلنة ضمن التصنيفات والمجالات المطلوبة، ثم يمكنك اختيار الوظيفة المناسبة لك بعد قراءة متطلبات وشروط العمل.
                            </p>
                    </div>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('assets/images/11.png')"></div>
                    <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                        <h2>زيد دخلك مع الوظيفة</h2>
                        <p class="lead mb-0"> استثمر مهاراتك وخبراتك في الوظيفة المناسبة وحقق دخل ملائم دون التقيد بنطاقك الجغرافي اعمل على نطاق واسع بيئة عمل متنوعة واستفد من تجارب وخبرات جديدة في مجالك.نسق ساعات العمل مع الشركة التي تعمل معها وحقق التوازن بين حياتك المهنية والشخصية</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="features-icons bg-light text-center ">
            <div class="container">
                <h2 class="mb-2">وظائف في كافة المجالات</h2>
                <p class="font-weight-light mb-0">تصفح الوظائف في التخصصات المختلفة وتقدم للوظيفة المناسبة</p>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary"></i></div>
                            <h4>وظائف برمجة وتطوير عن بعد</h4>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-graph-up m-auto text-primary"></i></div>
                            <h4>وظائف تسويق ومبيعات عن بعد</h4>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-clipboard-check m-auto text-primary"></i></div>
                            <h4>وظائف برمجة وتطوير عن بعد</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Latest Jobs-->
        <section class="bg-light text-center ">
            <div class="container">
                <h2 class="mb-2"> أحدث الوظائف</h2>
                <p class="font-weight-light mb-0">رشح نفسك وتقدم ﻷحدث الوظائف</p>
                <br>
                <br>
                <div class="row">
                    @foreach ($jobs as $job)

                    <div class="col-lg-4">
                        <div class="card mb-4 box-shadow">
                            <div class="card-body" style="height:  250px;">
                                <h5 class="card-title" style="text-align: center;">{{ Str::words($job->title, 3, '...') }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted" style=" text-align: center; ">{{ $job->employment_type }}</h6>
                                <p class="card-text" style="text-align: center;"><small>نطاق الراتب : {{ $job->salary_range }}</small></p>
                                <p class="card-text">{{ Str::words($job->description, 40, '...') }}</p>
                            </div>
                            <p class="card-text" style=" color: red; text-align: center; ">ينتهي التقديم في : {{ $job->expires_at }}</p>
                            <br> <br>
                            <a href="{{route('applications.create',$job->id)}}" class="btn btn-primary btn-block ">التقدم للوظيفة</a>
                            <br>
                            <br>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Call to Action-->
        <section class="call-to-action text-white text-center" id="signup">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <h2 class="mb-4">ابحث عن أفضل الوظائف عن بعد في العالم العربي</h2>
                        <div class="col-auto"><button class="btn btn-primary btn-lg" id="submitButton" type="submit">تصفح جميع الوظائف</button></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-start my-auto">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item"><a href="#!">عن وظفني</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">تواصل معنا</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!">الأسئلة الشائعة</a></li>
                            <li class="list-inline-item">⋅</li>
                            <li class="list-inline-item"><a href="#!"> سياسة الخصوصية</a></li>
                        </ul>
                        <p class="mb-0"> &copy; {{trans('main_trans.Copyright')}} <span id="copyright">
                            <script>
                                document.getElementById('copyright').appendChild(document
                                    .createTextNode(new Date().getFullYear()))
                            </script>
                        </span>. <a href="#"> </a>{{trans('main_trans.Name_Programer')}}</p>
                         </div>
                    <div class="col-lg-6 h-100 text-center text-lg-end my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-facebook fs-3"></i></a>
                            </li>
                            <li class="list-inline-item me-4">
                                <a href="#!"><i class="bi-twitter fs-3"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!"><i class="bi-instagram fs-3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
