<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EduBridge</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        {{-- @vite(['resources/sass/app.scss', 'resource/js/app.js']) --}}

        <script defer src="js/app.js"></script>

    </head>
    <body class=" hidden position-relative">
        <nav class="navbar navbar-expand-lg shadow border-bottom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('images/logo.png') }}" alt="EduBridge Logo" height="40" class="d-inline-block align-top ms-md-5 mt-md-3">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact Us</a>
                        </li>
                    </ul>
                    <div class="button d-flex gap-4 me-4">
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/friend') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                    <button type="button" class="btn-custom-si rounded-5 ">Dashboard</button>
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                    ><button type="button" class="btn-custom rounded-5">Sign In</button>
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                        ><button type="button" class="btn-custom-si rounded-5 ">Sign Up</button>
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </nav>
    
        <section class="hero-section">
            <img src="{{ asset('images/background.png')}}" alt="Hero Image" class="hero-image">
        </section>
    

        <section class="hidden content-section text-center position-relative">
            <div class="container">
                <h1 class="display-8 mb-4 fw-bold fs-1" style="font-family: roboto serif;">Jembatan Menuju Masa Depan
                    Pendidikan
                    <br>yang
                    Lebih Baik
                </h1>
                <p class="lead mb-5">
                    Menyediakan akses mudah dan terjangkau ke pendidikan berkualitas bagi semua. EduBridge adalah <br>
                    platform pembelajaran yang menghubungkan siswa, guru, dan orang tua dalam satu aplikasi terpadu.
                </p>
                <a href="{{ route('login') }}">
                    <img src="images/StartTrial.png" alt="Start Trial" class="start-trial img-fluid" style="max-width: 400px;">
                </a>
            </div>
        </section>
    


        <section class="solution-section position-absolute">
            <div class="container-solution shadow rounded-5 position-relative ">
                <h2 class="hidden text-center m-md-5 fw-bold fs-1" style="font-family: roboto serif;">Solusi Pembelajaran Unggulan
                    untuk
                    Mencapai <br>Prestasi Tertinggi</h2>
                <div class="hidden row g-3 mt-md-1 card-custom justify-content-center">
                    <div class="col-md-5 d-flex" style="width: 350px;">
                        <img src="images/Diskusi.png" alt="" style="width: 350px;" class="img-card position-absolute">
                        <div class="text-center position-relative" style="margin-top: 100px; margin-left:20px">
                            <h4 class="position-relative"> Diskusi Mata Kuliah</h4>
                            <p class="text-dark position-relative mt-md-3">Platform diskusi yang memungkinkan siswa berdiskusi, bertanya, dan berbagi wawasan tentang materi kuliah dengan teman sekelas untuk memperdalam pemahaman.</p>
                        </div>
                    </div>
                    <div class="col-md-5 d-flex" style="width: 350px; margin-left:200px">
                        <img src="images/Kolaborasi.png" alt="" style="width: 350px;" class="img-card position-absolute">
                        <div class="text-center position-relative" style="margin-top: 100px; margin-left:20px">
                            <h4 class="position-relative"> Chat untuk Kolaborasi</h4>
                            <p class="text-dark position-relative mt-md-3">Kolaborasi memudahkan pengguna berkomunikasi secara real-time dalam satu platform, memungkinkan berbagi ide, mengoordinasi tugas, dan berdiskusi untuk meningkatkan kerja sama tim.</p>
                        </div>
                    </div>
                </div>
                <div class="hidden row mt-md-5 card-custom justify-content-center">
                    <div class="col-md-5 d-flex" style="width: 350px;">
                        <img src="images/Matchmaking.png" alt="" style="width: 350px;" class="img-card position-absolute">
                        <div class="text-center position-relative" style="margin-top: 100px;">
                            <h4 class="position-relative" style="width: 350px"> Matchmaking Teman Belajar</h4>
                            <p class="text-dark position-relative m-md-3">Mencari dan mencocokkan siswa dengan teman belajar yang memiliki minat, tantangan, atau tujuan belajar serupa, sehingga dapat saling mendukung dan belajar bersama.</p>
                        </div>
                    </div>
                    <div class="col-md-5 d-flex" style="width: 350px; margin-left:200px">
                        <img src="images/Mentor.png" alt="" style="width: 350px;" class="img-card position-absolute">
                        <div class="text-center position-relative" style="margin-top: 100px; margin-left:20px">
                            <h4 class="position-relative"> Pencari Mentor </h4>
                            <p class="text-dark position-relative mt-md-3">Memudahkan siswa menemukan mentor berkualitas yang dapat memberikan bimbingan sesuai kebutuhan untuk meningkatkan pemahaman terhadap materi secara mendalam.</p>
                        </div>
                    </div>
                </div>
        </section>

        <img src="images/Ornament.png" alt="Ornament" class=" hidden img-fluid position-absolute" style="width: 20%; max-width: 200px;">
    
        <section class="purple-section"></section>
    
    
        <section class="aboutUs-section position-relative">
            <div class="hidden container position-relative">
                <div class="row ">
                    <div class="col-md-6">
                        <img src="images/Group62.png" alt="About Us" class="about-us-img img-fluid">
                    </div>
                    <div class="col-md-5" style="margin-top: 100px; margin-left:40px">
                        <h3 class="fw-bold" style="color: rgb(178, 100, 252); font-family: roboto serif;">About us</h3>
                        <h1 class="fw-bold" style="font-family: roboto serif;">The core mission
                            <br>behind all our
                            <br>work
                        </h1>
                        <p>EduBridge adalah platform pendidikan yang dirancang untuk menjembatani kesenjangan dalam akses
                            pendidikan berkualitas. <br>Kami bertujuan untuk memberikan solusi pembelajaran yang <br>
                            efektif dan
                            inklusif bagi semua siswa.</p>
                        <div class="row">
                            <div class="col-md-5">
                                <h2 style="color: rgb(171, 81, 255);">330+</h1>
                                    <p style="font-size: 12px;"> Lembaga Pendidikan yang terbantu</p>
                            </div>
                            <div class="col-md-6">
                                <h2 style="color: rgb(171, 81, 255);">230+</h1>
                                    <p style="font-size: 12px;"> Inisiatif Pembelajaran Digital Terselenggara</p>
                            </div>
                        </div>
                        <img src="images/StartTrial.png" alt="" class="start-trial" style="width: 150px;">
                    </div>
                </div>
            </div>
        </section>
    
    
        <section class="hidden people-section">
            <div class="container position-relative d-flex justify-content-center align-items-center ">
                <div class="jesano-card z-1 rounded-5 align-content-center text-center" style="margin-top: 200px;">
                    <img src="images/Maskgroup.png" alt="" class="mb-md-4">
                    <p class="fw-bold fs-5">“Be genuine in your assessment, and
                        provide
                        constructive feedback to benefit
                        both
                        <br>potential
                        customers
                        and the company providing the product or service.”
                    </p>
                    <p class="fw-bold">Stefanus Jesano Pramathana</p>
                    <p>CEO of an EduBridge</p>
                    <button type="button" class="btn btn-outline-dark rounded-circle" style="width: 40px; height:40px">
                        < </button>
                            <button type="button" class="btn btn-outline-dark rounded-circle"
                                style="width: 40px; height:40px">
                                > </button>
                </div>
            </div>
        </section>
    
        <section class=" hidden footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <p class="fw-bold"> Home</p>
                        <p class="p-footer"><a href="#" class=" text-dark" style="text-decoration: none">Define</a></p>
                        <p class="p-footer"><a href="#" class=" text-dark" style="text-decoration: none">Features</a></p>
                    </div>
                    <div class="col-2">
                        <p class="fw-bold"> About Us</p>
                        <p class="p-footer"><a href="#" class=" text-dark" style="text-decoration: none">Testimoni</a></p>
                        <p class="p-footer"><a href="#" class=" text-dark" style="text-decoration: none">Platform</a></p>
                    </div>
                    <div class="col" style="margin-left: 50px; width:200px">
                        <img src="images/logo.png" alt="" style="width: 200px;">
                        <p>EduBridge berfungsi sebagai jembatan bagi akademika yang ingin belajar dan membutuhkan teman
                            serta mentor untuk memahami materi. Platform ini memungkinkan mahasiswa terhubung dengan
                            individu berminat akademis serupa, baik dari universitas yang sama maupun lintas kampus,
                            sehingga memperluas jaringan belajar dan kolaborasi.</p>
                    </div>
                    <div class="col-2" style="margin-left: 120px;">
                        <p class="fw-bold"> Stay Update </p>
                        <p class="p-footer"><a href="" class="text-dark" style="text-decoration: none"> Blog</a></p>
                        <p class="p-footer"><a href="" class="text-dark" style="text-decoration: none"> Subscribe to newsletter</a></p>
                        <p class="p-footer"><a href="" class=" text-dark" style="text-decoration: none"> Media Center</a></p>
                        <p class="p-footer"><a href="" class=" text-dark" style="text-decoration: none"> Contact Us</a></p>
                    </div>
                    <div class="col-1">
                        <p class="fw-bold"> Email</p>
                        <p class="p-footer"><a href="" class=" text-dark" style="text-decoration: none"> contact@edubridge.org</a></p>
                    </div>
                </div>
            </div>
        </section>
    
        <section class="hidden license-section mt-md-3 position-relative d-flex justify-content-center">
            <div style="width:1350px">
                <hr style="max-width:1350px;">
                <div class="container d-flex justify-content-center">
                    <img src="images/Group10.png" alt="" style="width: 15px; height:15px;" class="m-md-1">
                    <p class="fw-semibold">2024 EduBrigde | <span><a href="" class="text-dark"> Privacy Policy</a></span> |
                        <span><a href="" class="text-dark">Cookies Policy</a></span> | <span><a href="" class="text-dark">Terms
                                of Use</a></span>
                    </p>
                    <img src="images/Groupsosial.png" class="position-absolute" alt="" style="width: 150px; height:30px; margin-left:1200px">
                </div>
            </div>
        </section>
    </body>
</html>
