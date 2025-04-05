<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Lekarstw</title>
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
                    <li class="nav-item"><a class="nav-link" href="{{ url('/main') }}">Home</a></li>
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
        <section id="lekarstwa" class="lekarstwa py-5">
            <div class="container">
                <h2 class="section-title mt-2">Lista Lekarstw</h2>
                <div class="btn mb-3">
                    <a href="{{ route('lekarstwa.create') }}" class="btn btn-outline-primary">Dodaj Lekarstwo</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped text-white mt-5 mb-4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nazwa</th>
                                <th>Dostępność</th>
                                <th>Akcje</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lekarstwa as $lekarstwo)
                            <tr>
                                <td>{{ $lekarstwo->id }}</td>
                                <td>{{ $lekarstwo->nazwa }}</td>
                                <td>{{ $lekarstwo->dostepnosc ? 'Dostępne' : 'Niedostępne' }}</td>
                                <td>
                                    <a href="{{ route('lekarstwa.edit', $lekarstwo->id) }}" class="btn btn-sm btn-outline-warning">Edytuj</a>
                                    <form action="{{ route('lekarstwa.destroy', $lekarstwo->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Usuń</button>
                                    </form>
                                </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer mt-5">
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
                        <li><a href="#services">Massage Therapy</a></li>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
