<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ secure_asset('main.css') }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand gradient-text" href="{{ url('/') }}">Przychodnia</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="#info-cards">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about-us">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#doctors">Doctors</a></li>
                    <li class="nav-item"><a class="nav-link" href="#blogs">Blogs</a></li>
                    @auth
                        @if (Auth::user()->role == 'pacjent')
                            <li class="nav-item"><a class="nav-link" href="{{ route('wizyty.index') }}">Wizyty</a></li>
                        @elseif (Auth::user()->role == 'lekarz')
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="akcjeDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Akcje
                                </a>
                                <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="akcjeDropdown">
                                    <a class="dropdown-item" href="{{ route('wizyty.index') }}">Wizyty</a>
                                    <a class="dropdown-item" href="{{ route('choroby.index') }}">Choroby</a>
                                    <a class="dropdown-item" href="{{ route('lekarstwa.index') }}">Lekarstwa</a>
                                    <a class="dropdown-item" href="{{ route('apteki.index') }}">Apteki</a>
                                    <a class="dropdown-item" href="{{ route('pacjenci.index') }}">Pacjenci</a>
                                    <a class="dropdown-item" href="{{ route('historia.index') }}">Historia Wizyt</a>
                                </div>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="akcjeDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Akcje
                                </a>
                                <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="akcjeDropdown">
                                    <a class="dropdown-item" href="{{ route('pacjenci.index') }}">Patients</a>
                                    <a class="dropdown-item" href="{{ route('lekarze.index') }}">Lekarze</a>
                                    <a class="dropdown-item" href="{{ route('apteki.index') }}">Apteki</a>
                                    <a class="dropdown-item" href="{{ route('choroby.index') }}">Choroby</a>
                                    <a class="dropdown-item" href="{{ route('lekarstwa.index') }}">Lekarstwa</a>
                                    <a class="dropdown-item" href="{{ route('wizyty.index') }}">Wizyty</a>
                                    <a class="dropdown-item" href="{{ route('historia.index') }}">Historia Wizyt</a>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item"><a class="nav-link nav-link-orange" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @else
                        <li class="nav-item"><a class="nav-link nav-link-orange" href="{{ url('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link nav-link-orange" href="{{ url('register') }}">SignUp</a></li>
                    @endauth
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images/1.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/2.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/3.jpg') }}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <section id="info-cards" class="info-cards">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                                <h3>120+</h3>
                                <p>Doctors At Work</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="bi bi-people-fill"></i>
                                </div>
                                <h3>1040+</h3>
                                <p>Happy Patients</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="bi bi-hospital"></i>
                                </div>
                                <h3>500+</h3>
                                <p>Bed Facility</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="bi bi-building"></i>
                                </div>
                                <h3>2137-</h3>
                                <p>Deaths</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="doctors" class="doctors">
            <div class="container">
                <h2 class="section-title">Our Doctors</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card doctor-card">
                            <div class="card-body text-center">
                                <div class="doctor-img-container">
                                    <img src="{{ asset('images/doctor1.jpg') }}" alt="Doctor" class="doctor-img">
                                </div>
                                <h3>Johny Deep</h3>
                                <p>Psychologist</p>
                                <div class="social-icons">
                                    <a href="https://www.instagram.com/johnnydepp/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/johnnydepp/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.instagram.com/johnnydepp/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.instagram.com/johnnydepp/"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card doctor-card">
                            <div class="card-body text-center">
                                <div class="doctor-img-container">
                                    <img src="{{ asset('images/doctor2.jpg') }}" alt="Doctor" class="doctor-img">
                                </div>
                                <h3>Young Leosia</h3>
                                <p>Plastic Surgeon</p>
                                <div class="social-icons">
                                    <a href="https://www.instagram.com/youngleosia/?hl=pl"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/youngleosia/?hl=pl"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.instagram.com/youngleosia/?hl=pl"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.instagram.com/youngleosia/?hl=pl"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card doctor-card">
                            <div class="card-body text-center">
                                <div class="doctor-img-container">
                                    <img src="{{ asset('images/doctor3.jpg') }}" alt="Doctor" class="doctor-img">
                                </div>
                                <h3>Erling Haaland</h3>
                                <p>Orthopaedist</p>
                                <div class="social-icons">
                                    <a href="https://www.instagram.com/erling.haaland/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/erling.haaland/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.instagram.com/erling.haaland/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.instagram.com/erling.haaland/"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card doctor-card">
                            <div class="card-body text-center">
                                <div class="doctor-img-container">
                                    <img src="{{ asset('images/doctor1.jpg') }}" alt="Doctor" class="doctor-img">
                                </div>
                                <h3>Krzysztof Krawczyk </h3>
                                <p>Laryngologist</p>
                                <div class="social-icons">
                                    <a href="https://www.instagram.com/krzysztofkrawczyk_official/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/krzysztofkrawczyk_official/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.instagram.com/krzysztofkrawczyk_official/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.instagram.com/krzysztofkrawczyk_official/"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card doctor-card">
                            <div class="card-body text-center">
                                <div class="doctor-img-container">
                                    <img src="{{ asset('images/doctor2.jpg') }}" alt="Doctor" class="doctor-img">
                                </div>
                                <h3>Lana Rhoades</h3>
                                <p>Sexologist</p>
                                <div class="social-icons">
                                    <a href="https://www.instagram.com/lanarhoades/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.instagram.com/lanarhoades/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.instagram.com/lanarhoades/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://www.instagram.com/lanarhoades/"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card doctor-card">
                            <div class="card-body text-center">
                                <div class="doctor-img-container">
                                    <img src="{{ asset('images/doctor3.jpg') }}" alt="Doctor" class="doctor-img">
                                </div>
                                <h3>Joseph Goebbels</h3>
                                <p>Fast Death Specialist</p>
                                <div class="social-icons">
                                    <a href="https://pl.wikipedia.org/wiki/Joseph_Goebbels"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://pl.wikipedia.org/wiki/Joseph_Goebbels"><i class="fab fa-instagram"></i></a>
                                    <a href="https://pl.wikipedia.org/wiki/Joseph_Goebbels"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://pl.wikipedia.org/wiki/Joseph_Goebbels"><i class="fab fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="about-us" class="about-us">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <img src="{{ asset('images/family.jpg') }}" alt="Family" class="img-fluid family-img">
                    </div>
                    <div class="col-md-6">
                        <h2 class="section-title">About Us</h2>
                        <h3>We Take Care Of Your Healthy Life</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dolorum dolorem nesciunt eos fuga minus eveniet ut accusantium distinctio provident autem nemo cumque corporis, odio ea. Ipsum eum quae modi officiis!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Modi corrupti dignissimos quas, exercitationem placeat hic dolore numquam facere sequi? Necessitatibus.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="services">
            <div class="container">
                <h2 class="section-title">Our Services</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="bi bi-clipboard2-check"></i>
                                </div>
                                <h3>Free Checkup</h3>
                                <p>Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="bi bi-truck"></i>
                                </div>
                                <h3>24/7 Ambulance</h3>
                                <p>Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="bi bi-person-check-fill"></i>
                                </div>
                                <h3>Experts Consultancy</h3>
                                <p>Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="bi bi-wrench"></i>
                                </div>
                                <h3>Modern Equipment</h3>
                                <p>Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="bi bi-award"></i>
                                </div>
                                <h3>Qualified Doctors</h3>
                                <p>Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="icon">
                                    <i class="bi bi-life-preserver"></i>
                                </div>
                                <h3>Emergency Services</h3>
                                <p>Lorem Ipsum Dolor Sit Amet Consectetur Adipisicing Elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="blogs" class="blogs">
            <div class="container">
                <h2 class="section-title">Our Blogs</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card" onclick="window.location.href='blog1.html'">
                            <img src="{{ asset('images/blog1.jpg') }}" class="card-img-top" alt="Blog Image">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span><i class="bi bi-calendar3"></i> 1st May, 2021</span>
                                    <span><i class="bi bi-person"></i> By Admin</span>
                                </div>
                                <h5 class="card-title">Drugs to help adults stop vaping … and other research</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, quam?</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" onclick="window.location.href='blog2.html'">
                            <img src="{{ asset('images/blog2.jpg') }}" class="card-img-top" alt="Blog Image">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span><i class="bi bi-calendar3"></i> 19st May, 2020</span>
                                    <span><i class="bi bi-person"></i> By Admin</span>
                                </div>
                                <h5 class="card-title">Global child mortality falls to historic low</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, quam?</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" onclick="window.location.href='blog3.html'">
                            <img src="{{ asset('images/blog3.jpg') }}" class="card-img-top" alt="Blog Image">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <span><i class="bi bi-calendar3"></i> 16st May, 2021</span>
                                    <span><i class="bi bi-person"></i> By Admin</span>
                                </div>
                                <h5 class="card-title">How sex can change a relationship</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, quam?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="#home">Home</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#doctors">Doctors</a></li>
                            <li><a href="#blogs">Blogs</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Our Services</h5>
                        <ul class="list-unstyled">
                            <li><a href="#services">Dental Care</a></li>
                            <li><a href="#services">Message Therapy</a></li>
                            <li><a href="#services">Cardiology</a></li>
                            <li><a href="#services">Diagnosis</a></li>
                            <li><a href="#services">Ambulance Service</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Contact Info</h5>
                        <ul class="list-unstyled">
                            <li><a href="tel:+1234567890"><i class="bi bi-telephone"></i> +123-456-789</a></li>
                            <li><a href="tel:+1112223333"><i class="bi bi-telephone"></i> +111-222-333</a></li>
                            <li><a href="mailto:shaikhanas@gmail.com"><i class="bi bi-envelope"></i> Pacześniak@gmail.com</a></li>
                            <li><a href="mailto:anasbhai@gmail.com"><i class="bi bi-envelope"></i> Matłosz@gmail.com</a></li>
                            <li><a href="https://www.google.com/maps/place/Baranówka,+35-001+Rzeszów/@50.0591837,21.9793494,18z/data=!4m6!3m5!1s0x473cfb6873fd7ce1:0x5ab6525fa216dd69!8m2!3d50.0545318!4d21.9824999!16s%2Fg%2F1wfvlf9y?hl=pl-PL&entry=ttu"><i class="bi bi-geo-alt"></i> Baranówka Rzeszów</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Follow Us</h5>
                        <ul class="list-unstyled">
                            <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                            <li><a href="https://www.instagram.com/kuraszeg/"><i class="fab fa-instagram"></i> Instagram</a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i> LinkedIn</a></li>
                            <li><a href="#"><i class="fab fa-pinterest"></i> Pinterest</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Created By <a href="https://www.instagram.com/_szelgas_/">Mr. Bartłomiej Pacześniak</a> | All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
