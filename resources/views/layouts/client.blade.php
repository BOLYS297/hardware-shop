<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">
    <meta  name="description" content="la boutique de matériel de bricolage en ligne">
    <title>@yield('title')</title>
    <link href="{{asset('assets/img/logo.png')}}" rel="icon" sizes="16×16">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
      crossorigin="anonymous"
    ></script>
        <script>
            // Initialize Bootstrap 5 tooltips
            document.addEventListener('DOMContentLoaded', function () {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                    new bootstrap.Tooltip(tooltipTriggerEl)
                })
            });
        </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="{{asset('assets/css/index.css')}}" rel="stylesheet" media="all" type="text/css">
    <script src="{{asset('assets/js/index.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" rel="stylesheet">
</head>
<body>
    <header>
        <div id="header" class="first-header container-fluid text-black">

            <div id="logo" class="container ms-3 ">
                <h6 class="text-uppercase pt-1 " id="welcome-message">welcome in our <b class="text-danger"> hardware</b></h6>
                    <img src="{{asset('assets/img/logo.png')}}" alt="Logo" class="img-responsive py-3 px-3">
                <h4 class="text-uppercase text-danger ms-1"><strong>hardware <span class="text-black">shop</span></strong></h4>
            </div>

            <div class="container w-50 " id="search-bar">
            <form   action="{{ route('client.produits') }}" method="GET">
            <select name="categorie" onchange="this.form.submit()" class="form-select">
                <option value="">all categories</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ request('categorie') == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
            </form>
                {{-- <button type="button" class="btn btn-primary btn-all-categories w-25 form-group " title="view all categories" data-bs-toggle="tooltip" id="allcategories">all categories</button> --}}
                <form action="{{route('client.produits')}}" method="GET" class="form-inline d-flex w-100">
                    <input type="text" class="form-control" placeholder="Search your products..." name="q" value="{{ request('q') }}">
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search">🔍</span></button>
                </form>
            </div>
            <div class="followus">
                <span class="text-uppercase me-2"><b>Follow us on:</b></span>
                <a href="#" class="icons me-2 icons-dark"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="icons me-2 icons-dark"><i class="fab fa-twitter"></i></a>
                <a href="#" class="icons me-2 icons-dark"><i class="fab fa-linkedin"></i></a>
            </div>
            <div class="trackorder">
                <a href="#" class="icons me-2 icons-dark"><i class="fas fa-location-dot"></i></a>
                <span class="text-uppercase me-2"><b>Follow one order</b></span>
            </div>
            <div class="icon mt-1">
                <a href="{{route('client.panier')}}" class="icons me-2 icons-dark" id="btnPanier" data-bs-toggle="modal" data-bs-target="#panierModal"><i class="fas fa-cart-shopping" title="cart"></i></a>
                <a href="{{route('client.wishlist')}}" class="icons me-2 icons-danger"><i class="fa fa-heart fa-heartbeat"></i></a>
                <div class="dropdown ">
                    <a href="#" class="icons me-2 icons-dark dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user "></i></a>
                      {{-- <ul class="dropdown-menu">
                        <li><a href="#" class="text-center text-decoration-none">Mon compte</a></li>
                        <li class="devider"></li>
                        <li><a href="#" class="text-center text-decoration-none">Se connecter</a></li>
                        <li class="devider"></li>
                        <li><a href="#" class="text-center text-decoration-none">S'inscrire</a></li>
                      </ul> --}}
                </div>
                {{-- <div class="offcanvas offcanvas-end" tabindex="-1" id="cartPanel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title">🛒 Mon Panier</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul id="cart-items" class="list-group mb-3"></ul>
                        <h5>Total : <span id="total">0</span> FCFA</h5>
                    </div>
                </div> --}}
                <!-- Modal -->
                <div class="modal fade" id="panierModal" tabindex="-1" aria-labelledby="panierModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="panierModalLabel">Votre panier</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>

                    <div class="modal-body" id="panierModalContent">
                        <p class="text-center text-muted">Chargement...</p>
                    </div>

                    <div class="modal-footer d-flex justify-content-between">
                        <a href="{{ route('client.panier') }}" class="btn btn-outline-primary">Voir le panier</a>
                        <a href="{{ route('client.commandes.store') }}" class="btn btn-success">Passer la commande</a>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden" id="nav">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal nav-link">Dashboard</a>
                        @elseif(Auth::user()->role === 'client')
                            <a href="{{ route('client.dashboard') }}" class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal nav-link">Dashboard</a>
                        @endif
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="btn btn-default inline-block px-5 py-1 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="btn btn-success inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
            </div>

        </div>
        <div class="navbar container-fluid bg-warning text-black w-100 navbar-group-vertical"  id="navbar">
            {{-- <button type="button" class="btn navbar-toggle" data-bs-toggle="collapse" data-bs-target="#nav-links" >
                <span class="navbar-toggler-icon"></span>
            </button> --}}
            <button type="button" class="border-0 rounded-pill ms-5"><div class="all text-uppercase bg-white p-2"><h6><b>All Categories</b></h6></div></button>
            <div class="navbar me-5" id="nav-links">
                <a href="{{route('home')}}" class="nav-item nav-link text-uppercase me-3"><b>Home</b></a>
                <a href="{{route('client.produits')}}" class="nav-item nav-link text-uppercase me-3"><b>Shop</b></a>
                <a href="{{route('client.about')}}" class="nav-item nav-link text-uppercase me-3"><b>About us</b></a>
                <a href="{{route('client.contact')}}" class="nav-item nav-link text-uppercase me-3"><b>Contact us</b></a>
                <a href="{{route('client.blog')}}" class="nav-item nav-link text-uppercase me-3"><b>Blog</b></a>
                {{-- <a href="{{ route('admin.login.direct') }}" class="btn btn-success me-3 py-1 mt-3 justify-content-center  mt-3" id="admin-login-button" title="reserved for Admin">
                Admin
                </a> --}}
            </div>
            <div class="contact"><a href="tel:671394910"><h4 class="me-5"><i class="fas fa-phone"></i><b>671 39 49 10</b></h4></a></div>
        </div>
    </header>
    <!-- Carousel section -->
    <main>
        @yield('content')
    </main>
    <!--Footer section-->
    <footer id="footer" class="pt-5">
        <div class="footer1" id="footer1">
            <div id="hardware-shop" class="hardware-shop-group-vertical ">
              <h4 class="text-white text-center"><b>HARDWARE SHOP<br> 1st online technology <br>marcket <br>on New York</b></h4>
              <h6 class="text-white text-center mt-5">Lorem ipsum dolor, sit amet<br> consectetur adipisicing elit.<br> Earum asperiores deleniti<br> soluta odio mollitia velit<br> iure ab corporis sunt<br> magnam impedit <br>perspiciatis, vero ex <br>quae dolorum corrupti,<br> totam iste aliquam.</h6>
              <h3 class="text-danger text-center text-uppercase mt-5"><b>671 39 49 10</b></h3>
              <h6 class="text-white text-center text-uppercase mt-5">257 Thatcher Road St,<br> Brooklyn,Manhattan,<br>NY 10092</h6>
              <h5 class="text-danger text-center text-uppercase mt-5"><a href="mailto:dd9159360@gmail.com" style="text-decoration: none;"><b>dd9159360@gmail.com</b></a></h5>
            </div>
            <div id="p-categories">
                <h4 class="text-white text-center text-uppercase"><b>Product Categories</b></h4>
                <div class="text-white text-center" id="product-categories">
                    <h5><b><a href="#" class="text-white">Exercices</a></b></h5>
                    <h5><b><a href="#" class="text-white">Tools</a></b></h5>
                    <h5><b><a href="#" class="text-white">Materials</a></b></h5>
                    <h5><b><a href="#" class="text-white">Equipment</a></b></h5>
                    <h5><b><a href="#" class="text-white">Accessories</a></b></h5>
                    <h5><b><a href="#" class="text-white">Promotions</a></b></h5>
                    <h5><b><a href="#" class="text-white">News</a></b></h5>
                    <h5><b><a href="#" class="text-white">Mesurings Tools</a></b></h5>
                    <h5><b><a href="#" class="text-white">Cuting Tools</a></b></h5>
                </div>
            </div>
            <div id="enterprise">
                <h4 class="text-white text-center text-uppercase "><b>Enterprise</b></h4>
                <div class="text-white text-center pt-5" id="product-categories">
                    <h5><b><a href="#" class="text-white">About us</a></b></h5>
                    <h5><b><a href="#" class="text-white">Contact</a></b></h5>
                    <h5><b><a href="#" class="text-white">Career</a></b></h5>
                    <h5><b><a href="#" class="text-white">Blog</a></b></h5>
                    <h5><b><a href="#" class="text-white">Sitemap</a></b></h5>
                    <h5><b><a href="#" class="text-white">Storelocation</a></b></h5>
                    <a href="#" class="text-white text-uppercase"><div class="buy-now rounded-3 " id="buy-now"><b>buy now</b></div></a>
                </div>
            </div>
            <div id="help-center">
                <h4 class="text-white text-center text-uppercase"><b>Help center</b></h4>
                <div class="text-white text-center pt-5" id="product-categories">
                    <h5><b><a href="#" class="text-white">Customer Service</a></b></h5>
                    <h5><b><a href="#" class="text-white">Policy</a></b></h5>
                    <h5><b><a href="#" class="text-white">Terms & Conditions</a></b></h5>
                    <h5><b><a href="#" class="text-white">Trach Order</a></b></h5>
                    <h5><b><a href="#" class="text-white">FAQs</a></b></h5>
                    <h5><b><a href="#" class="text-white">My Account</a></b></h5>
                    <h5><b><a href="#" class="text-white">Product Support</a></b></h5>
                </div>
            </div>
            <div id="partner">
                <h4 class="text-white text-center text-uppercase"><b>partner</b></h4>
                <div class="text-white text-center pt-5" id="product-categories">
                    <h5><b><a href="#" class="text-white">Become Seller</a></b></h5>
                    <h5><b><a href="#" class="text-white">Affiliate</a></b></h5>
                    <h5><b><a href="#" class="text-white">Advertise</a></b></h5>
                    <h5><b><a href="#" class="text-white">Partnership</a></b></h5>
                </div>
            </div>
        </div>
        <div class="footer2" id="footer2">
            <p class="text-center text-white fs-4"><b>subscribe & get 10% off for your first order</b></p>
            <form action="#" method="get" class="form-inline w-50 ">
                <input type="text" class="form-control" placeholder="Enter our email">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search fs-4 text-white text-uppercase">suscribe</span></button>
            </form>
            <p class="text-center text-white pt-3"><b>By subscribing, you’re accepted the our Policy</b></p>
        </div>
        <div class="footer3 mt-3 bg-white w-100 container " id="footer3"></div>
        <div id="footer4" class="footer4 d-flex justify-content-between container ">
            <p class="fs-6 pt-5 text-white">© 2024 Hardware Shop . All Rights Reserved</p>
            <img src="assets/img/footer-card-img.png" alt="footer-card-img" class="h-100 pt-5">
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
          document.getElementById('btnPanier').addEventListener('click', function() {
    fetch('{{ route('panier.modal') }}')
        .then(response => response.json())
        .then(data => {
            document.getElementById('panierModalContent').innerHTML = data.html;
            var panierModal = new bootstrap.Modal(document.getElementById('panierModal'));
            panierModal.show();
        })
        .catch(error => {
            document.getElementById('panierModalContent').innerHTML = "<p class='text-danger text-center'>Erreur de chargement du panier.</p>";
        });
});
</script>
</body>
</html>
