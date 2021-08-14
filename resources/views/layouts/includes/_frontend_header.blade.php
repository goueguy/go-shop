<!-- Header -->
<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main d-flex flex-md-row">
                            <li class="d-flex flex-lg-row"><i class="ti-headphone-alt"></i>+060 (800) 801-582</li>
                            <li class="d-flex flex-lg-row"><i class="ti-email"></i> support@shophub.com</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            {{-- <li><i class="ti-location-pin"></i> Store location</li>
                            <li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li> --}}
                            <li><i class="ti-user"></i> <a href="/register">{{__('content.register')}}</a></li>
                            <li><i class="ti-power-off"></i><a href="{{route("home")}}">SE CONNECTER</a></li>

                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <div class="middle-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-12">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="{{asset('assets/images/logo.png')}}" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <!-- Search Form -->
                    <div class="search-top">
                        <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                        <!-- Search Form -->
                        <div class="search-top">
                            <form class="search-form">
                                <input type="text" placeholder="Search here..." name="search">
                                <button value="search" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                        <!--/ End Search Form -->
                    </div>
                    <!--/ End Search Form -->
                    <div class="mobile-nav"></div>
                </div>
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            {{-- <select>
                                <option selected="selected">All Category</option>
                                <option>watch</option>
                                <option>mobile</option>
                                <option>kid’s item</option>
                            </select> --}}
                            <form>
                                <input name="search" placeholder="Cherchez un produit, une marque ou une catégorie....." type="search">
                                <button class="btnn"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <div class="right-bar">
                        <!-- Search Form -->
                        {{-- <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        </div> --}}
                        {{-- <div class="sinlge-bar">
                            <a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
                        </div> --}}
                        <div class="sinlge-bar shopping">
                                <a href="{{route('panier.panier')}}" class="single-icon"><i class="fa fa-shopping-cart"> Panier</i> <span class="total-count">2</span></a>
                            <!-- Shopping Item -->
                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>2 Articles</span>
                                    <a href="#">Voir le panier</a>
                                </div>
                                <ul class="shopping-list">
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        <h4><a href="#">Woman Ring</a></h4>
                                        <p class="quantity">1x - <span class="amount">25.000 FCFA</span></p>
                                    </li>
                                    <li>
                                        <a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                                        <a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
                                        <h4><a href="#">Woman Necklace</a></h4>
                                        <p class="quantity">1x - <span class="amount">25.000 FCFA</span></p>
                                    </li>
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">50.000 FCFA</span>
                                    </div>
                                    <a href="{{route('panier.checkout')}}" class="btn animate">Acheter</a>
                                </div>
                            </div>
                            <!--/ End Shopping Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-3">

                        <div class="all-category">
                            @section('sidebar')
                                <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATÉGORIES</h3>
                                <ul class="main-category">
                                    @if(isset($categories))
                                        @foreach ($categories as $category)
                                            <li><a href="{{route('articles.list',$category->slug)}}">{{$category->name}}<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                                <ul class="sub-category">
                                                    @foreach ($category->subcategory as $sub)
                                                        <li><a href="{{$sub->id}}">{{$sub->name}}<i class="" aria-hidden="true"></i></a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach
                                    @endif


                                    {{-- <li><a href="#">{{__('content.Woman_fashion')}} <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <ul class="sub-category">
                                            <li><a href="#">Vêtements<i class="" aria-hidden="true"></i></a></li>
                                            <li><a href="#">Chaussures</a></li>
                                            <li><a href="#">Accessoire</a></li>
                                            <li><a href="#">Maison & Ameublement</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">{{__('content.Man_fashion')}}<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <ul class="sub-category">
                                            <li><a href="#">Vêtements<i class="" aria-hidden="true"></i></a></li>
                                            <li><a href="#">Chaussures</a></li>
                                            <li><a href="#">Accessoire</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#">{{__('content.Car')}} <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                        <ul class="sub-category">
                                            <li><a href="#">Peugeot<i class="" aria-hidden="true"></i></a></li>
                                            <li><a href="#">Mercedes</a></li>
                                            <li><a href="#">Toyota</a></li>
                                        </ul>
                                    </li> --}}


                                </ul>
                            @show
                        </div>
                    </div>
                    <div class="{{Request::is('article/*') ? 'col-lg-12':'col-lg-9'}} col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">
                                    <div class="nav-inner">
                                        <ul class="nav main-menu menu navbar-nav">
                                            @foreach ($menuItems as $item)
                                                <li><a href="{{$item->link}}">{{$item->name}}</a></li>
                                            @endforeach
                                            {{-- <li><a href="/">{{__('content.home')}}</a></li>
                                            <li><a href="#">{{__('content.shop')}}</a></li>
                                            <li><a href="#">{{__('content.ventes_flash')}}</a></li>
                                            <li><a href="#">{{__('content.meilleures_ventes')}}</a></li> --}}
                                            {{-- <li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
                                                <ul class="dropdown">
                                                    <li><a href="shop-grid.html">Shop Grid</a></li>
                                                    <li><a href="shop-list.html">Shop List</a></li>
                                                    <li><a href="shop-single.html">shop Single</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                </ul>
                                            </li> --}}
                                            {{-- <li><a href="#">Pages<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="about-us.html">About Us</a></li>
                                                    <li><a href="login.html">Login</a></li>
                                                    <li><a href="register.html">Register</a></li>
                                                    <li><a href="mail-success.html">Mail Success</a></li>
                                                    <li><a href="404.html">404</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Blog<i class="ti-angle-down"></i></a>
                                                <ul class="dropdown">
                                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                                    <li><a href="blog-grid-sidebar.html">Blog Grid Sidebar</a></li>
                                                    <li><a href="blog-single.html">Blog Single</a></li>
                                                    <li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="contact.html">Contact Us</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!--/ End Header -->
