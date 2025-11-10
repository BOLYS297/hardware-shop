@extends('layouts.client')
 @section('title','home')
  @section('content')
   <section id="section">
        <div class="container-fluid article">
            <div id="promoCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Promo 1"></button>
                    <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="1" aria-label="Promo 2"></button>
                    <button type="button" data-bs-target="#promoCarousel" data-bs-slide-to="2" aria-label="Promo 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active" >
                        <div class="row align-items-center">
                            <div class="info1" id="info1">
                                <h5 class="text-danger pt-4" id="Design"><b>Design for</b></h5>
                                <p class="hero-title text-black text-uppercase fs-2"><b>innovative tools</b></p>
                                <p class="hero-subtitle text-black text-uppercase ps-0 fs-4"><b>star tools at <span class="text-danger">$99</span> only</b></p>
                                <p class="text-black ps-5 pt-4 fs-6">Quality products to <br> satisfy you</p>
                                <div class="ps-3 pt-5"><a href="{{route('client.produits')}}"><button type="button" class="btn border-0 rounded-0 ps-3 pt-2"><b class="fs-3 text-black text-uppercase">Shop Now</b></button></a></div>
                            </div>
                            <div id="price" class="text-black text-uppercase fs-6"><b>$99 only</b></div>
                            <div class="">
                                <div id="perceuse"><img src="{{ asset('assets/img/p1.png') }}" alt="perceuse" class="img-fluid-responsive mb-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row align-items-center">
                            <div class="info1" id="info1">
                                <h5 class="text-danger pt-4" id="Design"><b>Design for</b></h5>
                                <p class="hero-title text-black text-uppercase fs-2"><b>innovative tools</b></p>
                                <p class="hero-subtitle text-black text-uppercase ps-0 fs-4"><b>star tools at <span class="text-danger">$99</span> only</b></p>
                                <p class="text-black ps-5 pt-4 fs-6">Quality products to <br> satisfy you</p>
                                <div class="ps-3 pt-5"><a href="{{route('client.produits')}}"><button type="button" class="btn border-0 rounded-0 ps-3 pt-2"><b class="fs-3 text-black text-uppercase">Shop Now</b></button></a></div>
                            </div>
                            <div id="price" class="text-black text-uppercase fs-6"><b>$99 only</b></div>
                            <div class="">
                                <div id="drilling-img2"><img src="assets/img/drilling-img2.png" alt="drilling-img2" class="img-fluid-responsive"></div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row align-items-center">
                            <div class="info1" id="info1">
                                <h5 class="text-danger pt-4" id="Design"><b>Design for</b></h5>
                                <p class="hero-title text-black text-uppercase fs-2"><b>innovative tools</b></p>
                                <p class="hero-subtitle text-black text-uppercase ps-0 fs-4"><b>star tools at <span class="text-danger">$99</span> only</b></p>
                                <p class="text-black ps-5 pt-4 fs-6">Quality products to <br> satisfy you</p>
                                <div class="ps-3 pt-5"><a href="{{route('client.produits')}}"><button type="button" class="btn border-0 rounded-0 ps-3 pt-2"><b class="fs-3 text-black text-uppercase">Shop Now</b></button></a></div>
                            </div>
                            <div id="price" class="text-black text-uppercase fs-6"><b>$99 only</b></div>
                            <div class="">
                                <div id="drilling-img2"><img src="assets/img/top-product-img5.png" alt="top-product-img5" class="img-fluid-responsive"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#promoCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Précédent</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#promoCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Suivant</span>
                </button>
            </div>
        </div>
        <div class="tools d-flex flex-direction-xs-column" id="tools">
            <div id="tool1">
                <div class="info" id="info">
                    <h5 class="text-danger text-uppercase" id="position"><b>the best place to buy </b></h5>
                    <p class="hero-title text-black fs-2" id="Xbox" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"><b>Xbox consoles</b></p>
                    <p class="text-black ps-3 fs-6" id="Save">Save up to 50% on select Xbox <br><span id="games">games</span>.<br><span class="ps-4">Get 3 months of PC Game </span> <br> <span class="ps-5">Pass for $2 USD</span></p>
                    <div class="ps-5 pt-5"><a href="{{route('client.produits')}}"><button type="button" class="btn border-0 " id="shop-now"><b class="fs-3 text-black text-uppercase">Shop Now</b></button></a></div>
                </div>
                <img src="assets/img/product-img1.png" alt="product-img1" class="img-fluid-responsive">
            </div>
            <div id="tool2">
                <div class="info" id="info">
                    <p class="hero-title text-black fs-4" id="Xbox"><b>Pipe fitting Piping <br>and plumbing</b></p>
                    <h5 class="text-danger text-uppercase" id="USD"><b>$299 usd </b></h5>
                    <div class="ps-5 pt-5" id="shop"><a href="{{route('client.produits')}}"><button type="button" class="btn border-0 " id="shop-now"><b class="fs-5 text-black text-uppercase">Shop Now</b></button></a></div>
                </div>
                <img src="assets/img/product-img2.png" alt="product-img2" class="img-fluid-responsive">
            </div>
            <div id="tool3">
                <div class="info" id="info">
                    <p class="hero-title text-black fs-4" id="Xbox"><b>Steel Ball valve <br>Fastener </b></p>
                    <h5 class="text-danger text-uppercase" id="USD"><b>$299 usd </b></h5>
                    <div class="ps-5 pt-5" id="shop"><a href="{{route('client.produits')}}"><button type="button" class="btn border-0 " id="shop-now"><b class="fs-5 text-black text-uppercase">Shop Now</b></button></a></div>
                </div>
                <img src="assets/img/product-img3.png" alt="product-img3" class="img-fluid-responsive">
            </div>
        </div>
        <div id="our-top-products" class="container mt-5">
            <h3 class="text-black me-3" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;"><b>Our Top Products</b></h3>
            <div class="product-group-horizontal d-flex justify-content-between mt-4 gap-3 " id="top">
                @forelse($produits as $produit)
                <div id="product-item" class="product-item ">
                    <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                        <i class="fas fa-star"></i>
                        <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                    </div>
                    <img src="{{ asset('storage/' . $produit->image_principale) }}" alt="sanitary3" class="img-fluid-responsive pt-5 ps-2">
                    <h6 class="text-black text-uppercase p-2"><b>{{$produit->nom}}<br><span class="text-danger">{{$produit->prix}} FCFA</span></b></h6>
                    <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                        <form action="{{ route('client.panier.ajouter', $produit->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm">
                                    <a href="#" class="d-flex text-black" >
                                    <div class="pt-3 btn btn-primary btn-add-cart" data-id="{{ $produit->id }}"><i class="fas fa-shopping-cart"></i></div>
                                    <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                                    </a>
                                </button>
                        </form>
                    </div>
                    <div class="value d-flex  text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                        <a href="{{route('client.produits',$produit->id)}}" class="text-black">
                        <h6 class="m-2 mt-2"><b>visit product</b></h6>
                        </a>
                    </div>
                </div>
                @empty
                <div id="product-item" class="product-item ">
                    <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                        <i class="fas fa-star"></i>
                        <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                    </div>
                    <img src="assets/img/sanitary-img1.png" alt="sanitary1" class="img-fluid-responsive pt-5 ps-2">
                    <h6 class="text-black text-uppercase p-2"><b>Plastic Pipe<br><span class="text-danger">110,00 $</span></b></h6>
                    <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                        <a href="#" class="d-flex text-black" >
                        <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                        <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                        </a>
                    </div>
                    <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                        <a href="#" class="text-black">
                        <h6 class="m-2 mt-2"><b>visit product</b></h6>
                        </a>
                    </div>
                </div>
                <div id="product-item" class="product-item ">
                    <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                        <i class="fas fa-star"></i>
                        <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                    </div>
                    <img src="assets/img/sanitary-img2.png" alt="sanitary2" class="img-fluid-responsive pt-5 ps-2">
                    <h6 class="text-black text-uppercase p-2"><b>valve Chlorinated<br><span class="text-danger">110,00 $</span></b></h6>
                    <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                        <a href="#" class="d-flex text-black" >
                        <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                        <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                        </a>
                    </div>
                    <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                        <a href="#" class="text-black">
                        <h6 class="m-2 mt-2"><b>visit product</b></h6>
                        </a>
                    </div>
                </div>
                <div id="product-item" class="product-item ">
                    <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                        <i class="fas fa-star"></i>
                        <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                    </div>
                    <img src="assets/img/sanitary-img4.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                    <h6 class="text-black text-uppercase p-2"><b>Flush toilet Ceramic<br><span class="text-danger">110,00 $</span></b></h6>
                    <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                        <a href="#" class="d-flex text-black" >
                        <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                        <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                        </a>
                    </div>
                    <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                        <a href="#" class="text-black">
                        <h6 class="m-2 mt-2"><b>visit product</b></h6>
                        </a>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
        <div class="pub d-flex justify-content-between mt-5 container" id="pub">
            <div class="pub1 ms-5"><a href=""><img src="assets/img/pub1.png" alt="Publicité 1" class="img-fluid-responsive"></a></div>
            <div class="pub2 me-5" id="pub2"><a href=""><img src="assets/img/pub2.png" alt="Publicité 2" class="img-fluid-responsive"></a></div>
        </div>
        <div id="other-product" class="container mt-5 d-flex gap-5">
            <div id="special-product" class=" rounded-5 d-grid gap-3 justify-content-center">
                <h4 class="text-black me-3"><b>Dewalt Drilling<br>Tools</b></h4>
                <img src="assets/img/drilling-img.png" alt="Dewalt Drilling Tools" class="">
                <a href="#" class="d-flex text-black bg-white rounded-5 w-50 ms-5">
                    <h6 class="ms-4 my-2 text-uppercase"><b>view<br>all</b></h6>
                </a>
            </div>
            <div id="simple-product" class="">
                <div id="product-item" class="product-item ">
                    <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                        <i class="fas fa-star"></i>
                        <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                    </div>
                    <img src="assets/img/drilling-img6.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                    <h6 class="text-black text-uppercase p-2"><b>Villeroy & Boch Sink<br><span class="text-danger">110,00 $</span></b></h6>
                    <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                        <a href="#" class="d-flex text-black" >
                        <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                        <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                        </a>
                    </div>
                    <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                        <a href="#" class="text-black">
                        <h6 class="m-2 mt-2"><b>visit product</b></h6>
                        </a>
                    </div>
                </div>
                <div id="product-item" class="product-item ">
                    <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                        <i class="fas fa-star"></i>
                        <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                    </div>
                    <img src="assets/img/drilling-img5.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                    <h6 class="text-black text-uppercase p-2"><b>Villeroy & Boch Sink<br><span class="text-danger">110,00 $</span></b></h6>
                    <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                        <a href="#" class="d-flex text-black" >
                        <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                        <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                        </a>
                    </div>
                    <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                        <a href="#" class="text-black">
                        <h6 class="m-2 mt-2"><b>visit product</b></h6>
                        </a>
                    </div>
                </div>
                <div id="product-item" class="product-item ">
                    <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                        <i class="fas fa-star"></i>
                        <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                    </div>
                    <img src="assets/img/drilling-img4.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                    <h6 class="text-black text-uppercase p-2"><b>Circular Saw<br><span class="text-danger">110,00 $</span></b></h6>
                    <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                        <a href="#" class="d-flex text-black" >
                        <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                        <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                        </a>
                    </div>
                    <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                        <a href="#" class="text-black">
                        <h6 class="m-2 mt-2"><b>visit product</b></h6>
                        </a>
                    </div>
                </div>
                <div id="product-item" class="product-item ">
                    <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                        <i class="fas fa-star"></i>
                        <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                    </div>
                    <img src="assets/img/drilling-img3.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                    <h6 class="text-black text-uppercase p-2"><b>Circular Saw<br><span class="text-danger">110,00 $</span></b></h6>
                    <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                        <a href="#" class="d-flex text-black" >
                        <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                        <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                        </a>
                    </div>
                    <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                        <a href="#" class="text-black">
                        <h6 class="m-2 mt-2"><b>visit product</b></h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="new-product" class="container  rounded-5">
            <div id="product-item" class="product-item ">
                <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                    <i class="fas fa-star"></i>
                    <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                </div>
                <img src="assets/img/drilling-img3.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                <h6 class="text-black text-uppercase p-2"><b>Circular Saw<br><span class="text-danger">110,00 $</span></b></h6>
                <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                    <a href="#" class="d-flex text-black" >
                    <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                    <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                    </a>
                </div>
                <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                    <a href="#" class="text-black">
                    <h6 class="m-2 mt-2"><b>visit product</b></h6>
                    </a>
                </div>
            </div>
            <div id="product-item" class="product-item ">
                <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                    <i class="fas fa-star"></i>
                    <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                </div>
                <img src="assets/img/drilling-img3.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                <h6 class="text-black text-uppercase p-2"><b>Circular Saw<br><span class="text-danger">110,00 $</span></b></h6>
                <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                    <a href="#" class="d-flex text-black" >
                    <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                    <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                    </a>
                </div>
                <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                    <a href="#" class="text-black">
                    <h6 class="m-2 mt-2"><b>visit product</b></h6>
                    </a>
                </div>
            </div>
            <div id="product-item" class="product-item ">
                <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                    <i class="fas fa-star"></i>
                    <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                </div>
                <img src="assets/img/drilling-img3.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                <h6 class="text-black text-uppercase p-2"><b>Circular Saw<br><span class="text-danger">110,00 $</span></b></h6>
                <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                    <a href="#" class="d-flex text-black" >
                    <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                    <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                    </a>
                </div>
                <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                    <a href="#" class="text-black">
                    <h6 class="m-2 mt-2"><b>visit product</b></h6>
                    </a>
                </div>
            </div>
            <div id="product-item" class="product-item ">
                <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                    <i class="fas fa-star"></i>
                    <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                </div>
                <img src="assets/img/drilling-img3.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                <h6 class="text-black text-uppercase p-2"><b>Circular Saw<br><span class="text-danger">110,00 $</span></b></h6>
                <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                    <a href="#" class="d-flex text-black" >
                    <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                    <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                    </a>
                </div>
                <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                    <a href="#" class="text-black">
                    <h6 class="m-2 mt-2"><b>visit product</b></h6>
                    </a>
                </div>
            </div>
            <div id="product-item" class="product-item ">
                <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                    <i class="fas fa-star"></i>
                    <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                </div>
                <img src="assets/img/drilling-img3.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                <h6 class="text-black text-uppercase p-2"><b>Circular Saw<br><span class="text-danger">110,00 $</span></b></h6>
                <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                    <a href="#" class="d-flex text-black" >
                    <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                    <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                    </a>
                </div>
                <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                    <a href="#" class="text-black">
                    <h6 class="m-2 mt-2"><b>visit product</b></h6>
                    </a>
                </div>
            </div>
            <div id="product-item" class="product-item ">
                <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                    <i class="fas fa-star"></i>
                    <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                </div>
                <img src="assets/img/drilling-img3.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                <h6 class="text-black text-uppercase p-2"><b>Circular Saw<br><span class="text-danger">110,00 $</span></b></h6>
                <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                    <a href="#" class="d-flex text-black" >
                    <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                    <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                    </a>
                </div>
                <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                    <a href="#" class="text-black">
                    <h6 class="m-2 mt-2"><b>visit product</b></h6>
                    </a>
                </div>
            </div>
        </div>
        <div class="product-group-horizontal d-flex justify-content-between gap-5 container" id="discount">
            <div class="discount-item-group-vertical p-3 rounded-5 gap-5 ms-5" id="discount-item1">
                <div class="discount-1 d-flex align-items-center gap-3">
                    <a href="#"><img src="assets/img/tap-product-img1.png" alt="tap-product-img1" class=""></a>
                    <h6 class="amount"><b>12 Inch Over Head <br>Rain Shower <br><del class="bg-danger"> 124,00$</del><span class="text-danger">1110,00 $</span></b></h6>
                </div><br>
                <div class="discount-1 d-flex align-items-center gap-3">
                <a href="#"><img src="assets/img/tap-product-img2.png" alt="tap-product-img2" class=""></a>
                    <h6 class="amount"><b>12 Inch Over Head <br>Rain Shower <br><del class="bg-danger"> 124,00$</del><span class="text-danger">1110,00 $</span></b></h6>
                </div><br>
                <div class="discount-1 d-flex align-items-center gap-3">
                    <a href="#"><img src="assets/img/tap-product-img3.png" alt="tap-product-img3" class=""></a>
                    <h6 class="amount"><b>12 Inch Over Head <br>Rain Shower <br><del class="bg-danger"> 124,00$</del><span class="text-danger">1110,00 $</span></b></h6>
                </div><br>
                <div class="discount-1 d-flex align-items-center gap-3">
                    <a href="#"><img src="assets/img/tap-product-img4.png" alt="tap-product-img4" class=""></a>
                    <h6 class="amount"><b>12 Inch Over Head <br>Rain Shower <br><del class="bg-danger"> 124,00$</del><span class="text-danger">1110,00 $</span></b></h6>
                </div>
            </div>
            <div class="discount-item-group-vertical rounded-5" id="discount-item2">
                <h3 class="text-black me-3 text-uppercase d-flex justify-content-center " id="save-up"><b>Save up to 35%</b></h3>
                <h5 class="text-danger text-center">on this article</h5>
                <img src="assets/img/sanitary-img1.png" alt="sanitary-img1" class="img-fluid-responsive rounded-5 p-3">
            </div>
            <div class="discount-item-group-vertical p-3 rounded-5 gap-5 me-5" id="discount-item3">
                <div class="discount-1 d-flex align-items-center gap-3">
                    <a href="#"><img src="assets/img/tap-product-img1.png" alt="tap-product-img1" class=""></a>
                    <h6 class="amount"><b>12 Inch Over Head <br>Rain Shower <br><del class="bg-danger"> 124,00$</del><span class="text-danger">1110,00 $</span></b></h6>
                </div><br>
                <div class="discount-1 d-flex align-items-center gap-3">
                <a href="#"><img src="assets/img/tap-product-img2.png" alt="tap-product-img2" class=""></a>
                    <h6 class="amount"><b>12 Inch Over Head <br>Rain Shower <br><del class="bg-danger"> 124,00$</del><span class="text-danger">1110,00 $</span></b></h6>
                </div><br>
                <div class="discount-1 d-flex align-items-center gap-3">
                    <a href="#"><img src="assets/img/tap-product-img3.png" alt="tap-product-img3" class=""></a>
                    <h6 class="amount"><b>12 Inch Over Head <br>Rain Shower <br><del class="bg-danger"> 124,00$</del><span class="text-danger">1110,00 $</span></b></h6>
                </div><br>
                <div class="discount-1 d-flex align-items-center gap-3">
                    <a href="#"><img src="assets/img/tap-product-img4.png" alt="tap-product-img4" class=""></a>
                    <h6 class="amount"><b>12 Inch Over Head <br>Rain Shower <br><del class="bg-danger"> 124,00$</del><span class="text-danger">1110,00 $</span></b></h6>
                </div>
            </div>
        </div>
        <div class="product-group-horizontal  container-fluid justify-content-center" id="new">
            <div class="group d-flex" id="new-info">
                <div id="divider1" class="text-white ">
                    <div class="discount-1 d-flex align-items-center gap-3 mt-5 ms-5">
                    <i class="fas fa-money-check-dollar" id="dollar"></i>
                    <h3 class="amount">100% satisfied <br>or refunded</h3>
                    </div>
                </div>
                <div id="divider2" class="text-white w-25">
                    <div class="discount-1 d-flex align-items-center gap-3 mt-5 ms-5">
                    <i class="fas fa-headset" id="headset"></i>
                    <h3 class="amount">Assistance 24h/24 <br>et 7j/7</h3>
                    </div>
                </div>
                <div id="divider3" class="text-white ">
                    <div class="discount-1 d-flex align-items-center gap-3 mt-5 ms-5">
                    <i class="fas fa-truck" id="truck"></i>
                    <h3 class="amount text-uppercase">Delivery <br>free</h3>
                    </div>
                </div>
            </div>
            <div id="block" class="w-100 container-fluid">

            </div>
            <div id="other" class="container d-flex gap-5">
            <div id="special" class="rounded-5 d-grid gap-3 justify-content-center">
                <h4 class="text-black me-3"><b>Handyman Power <br>Tools</b></h4>
                <img src="assets/img/power-tool-img.png" alt="Handyman Power Tools" class="">
                <a href="#" class="d-flex text-black bg-white rounded-5 w-50 ms-5">
                    <h6 class="ms-4 my-2 text-uppercase"><b>view<br>all</b></h6>
                </a>
            </div>
            <div id="simple-product" class="">
                <div id="product-item" class="product-item ">
                    <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                        <i class="fas fa-star"></i>
                        <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                    </div>
                    <img src="assets/img/drilling-img6.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                    <h6 class="text-black text-uppercase p-2"><b>Villeroy & Boch Sink<br><span class="text-danger">110,00 $</span></b></h6>
                    <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                        <a href="#" class="d-flex text-black" >
                        <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                        <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                        </a>
                    </div>
                    <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                        <a href="#" class="text-black">
                        <h6 class="m-2 mt-2"><b>visit product</b></h6>
                        </a>
                    </div>
                </div>
                <div id="product-item" class="product-item ">
                    <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                        <i class="fas fa-star"></i>
                        <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                    </div>
                    <img src="assets/img/drilling-img5.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                    <h6 class="text-black text-uppercase p-2"><b>Villeroy & Boch Sink<br><span class="text-danger">110,00 $</span></b></h6>
                    <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                        <a href="#" class="d-flex text-black" >
                        <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                        <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                        </a>
                    </div>
                    <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                        <a href="#" class="text-black">
                        <h6 class="m-2 mt-2"><b>visit product</b></h6>
                        </a>
                    </div>
                </div>
                <div id="product-item" class="product-item ">
                    <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                        <i class="fas fa-star"></i>
                        <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                    </div>
                    <img src="assets/img/drilling-img4.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                    <h6 class="text-black text-uppercase p-2"><b>Circular Saw<br><span class="text-danger">110,00 $</span></b></h6>
                    <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                        <a href="#" class="d-flex text-black" >
                        <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                        <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                        </a>
                    </div>
                    <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                        <a href="#" class="text-black">
                        <h6 class="m-2 mt-2"><b>visit product</b></h6>
                        </a>
                    </div>
                </div>
                <div id="product-item" class="product-item ">
                    <div class="value d-flex bg-primary text-white justify-content-center align-items-center position-absolute rounded-5 p-1 m-2">
                        <i class="fas fa-star"></i>
                        <h6 class="ms-2 mt-2"><b>4.8</b></h6>
                    </div>
                    <img src="assets/img/drilling-img3.png" alt="sanitary4" class="img-fluid-responsive pt-5 ps-2">
                    <h6 class="text-black text-uppercase p-2"><b>Circular Saw<br><span class="text-danger">110,00 $</span></b></h6>
                    <div class="value d-flex bg-white text-black justify-content-center align-items-center position-absolute rounded-3 p-1" id="cart">
                        <a href="#" class="d-flex text-black" >
                        <div class="pt-3"><i class="fas fa-shopping-cart"></i></div>
                        <h6 class="mx-2 my-2 text-uppercase"><b>add<br>cart</b></h6>
                        </a>
                    </div>
                    <div class="value d-flex text-white justify-content-center align-items-center position-absolute rounded-2" id="visit-product">
                        <a href="#" class="text-black">
                        <h6 class="m-2 mt-2"><b>visit product</b></h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div id="testimony" class="testimony-group-vertical container w-100 pt-5 mb-3">
            <div id="title"><h5 class="title text-danger text-center"> Testimomies</h5></div>
            <div id="subtitle"><h3 class="subtitle text-black text-uppercase text-center pt-3"><b>Product Reviews</b></h3></div>
            <div class="description"><h6 class="text-black text-center pt-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br> Facilis voluptatum asperiores quo, <br>ut nisi atque dolor ab eum aspernatur,<br> veniam esse, voluptates maxime at <br> sequi officiis ipsa delectus sed?</h6></div>
            <div class="testy d-flex gap-3 justify-content-center pt-5">
                <img src="assets/img/testimonial-img.png" alt="testimonial-img class="">
                <div class="info-testy-group-vertical">
                    <h4 class="text-black text">
                        <b>BOLYS TIWA <br>
                            <span class="fs-6 text-uppercase text-success">plumber</span><br>
                        </b>
                    </h4>
                    <i class="fas fa-angle-left ms-3"></i>
                    <i class="fas fa-angle-right ms-5"></i>
                </div>
            </div>
        </div>
    </section>
@endsection
