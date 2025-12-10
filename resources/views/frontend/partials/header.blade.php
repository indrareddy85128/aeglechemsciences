 <header class="ltn__header-area ltn__header-3">

     <div class="ltn__header-top-area">
         <div class="container">
             <div class="row">
                 <div class="col-md-7">
                     <div class="ltn__top-bar-menu">
                         <x-header-contact />
                     </div>
                 </div>
                 <div class="col-md-5">
                     <div class="top-bar-right text-end">
                         <div class="ltn__top-bar-menu">
                             <ul>
                                 <li>
                                     <div class="ltn__social-media">
                                         <x-social-media-list />
                                     </div>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>


     <div class="ltn__header-middle-area">
         <div class="container">
             <div class="row">
                 <div class="col">
                     <div class="site-logo">
                         <a href="{{ route('home') }}"><img src="{{ asset('frontend/assets/img/logo.png') }}"
                                 alt="Logo"></a>
                     </div>
                 </div>
                 <div class="col header-contact-serarch-column d-none d-lg-block">
                     <div class="header-contact-search">
                         <div class="header-search-2">
                             <form id="search-form">
                                 <input type="text" id="search-input"
                                     placeholder="Search Chemical Name / CAS Number / HSN Code" />
                                 <button type="button">
                                     <span><i class="icon-search"></i></span>
                                 </button>
                             </form>
                             <div id="search-results"
                                 style="display:none; position:absolute; top:60px; left:30%; width:40%; background:#fff; border:1px solid #ddd; border-radius:4px; box-shadow:0 4px 12px rgba(0,0,0,0.1); z-index:9999;">
                                 <ul id="results-list"></ul>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col">
                     <div class="ltn__header-options">
                         <ul>
                             <li>
                                 <div class="ltn__drop-menu user-menu">
                                     <ul>
                                         <li>
                                             <a href="javascript:void(0)"><i class="icon-user"></i></a>
                                             <ul>
                                                 @guest
                                                     <li><a href="{{ route('login') }}">Login</a></li>
                                                 @endguest
                                                 @auth
                                                     <li><a href="{{ route('dashboard') }}">My Account</a></li>
                                                     <li>
                                                         <form method="POST" action="{{ route('logout') }}"
                                                             style="display: inline;">
                                                             @csrf
                                                             <button type="submit" tabindex="-1"
                                                                 style="font-size:16px; padding:0 0 0 0; outline:none; box-shadow:none;"
                                                                 class="btn">
                                                                 Logout
                                                             </button>
                                                         </form>
                                                     </li>
                                                 @endauth
                                             </ul>
                                         </li>
                                     </ul>
                                 </div>
                             </li>
                             <li>
                                 <div class="mini-cart-icon mini-cart-icon-2">
                                     <a href="{{ route('cart.index') }}">
                                         <span class="mini-cart-icon">
                                             <i class="icon-shopping-cart"></i>
                                             <x-cart-count />
                                         </span>
                                     </a>
                                 </div>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div
         class="header-bottom-area ltn__border-top ltn__header-sticky ltn__sticky-bg-secondary ltn__secondary-bg section-bg-1 menu-color-white d-none d-lg-block">
         <div class="container">
             <div class="row">
                 <div class="col header-menu-column justify-content-center">
                     <div class="header-menu header-menu-2">
                         <nav>
                             <div class="ltn__main-menu">
                                 <ul>
                                     <li><a href="{{ route('home') }}">Home</a></li>
                                     <li><a href="{{ route('about.us') }}">About Us</a>
                                     </li>
                                     <li><a href="#">Our Certificates</a></li>
                                     <li class="menu-icon"><a href="{{ route('products') }}">Products</a>
                                         <ul>
                                             <x-category-list-menu />
                                         </ul>
                                     </li>
                                     <li><a href="#">Careers</a></li>
                                     <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                                 </ul>
                             </div>
                         </nav>
                     </div>
                 </div>
             </div>
         </div>
     </div>

 </header>


 <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
     <div class="ltn__utilize-menu-inner ltn__scrollbar">
         <div class="ltn__utilize-menu-head">
             <div class="site-logo">
                 <a href="#"><img src="{{ asset('frontend/assets/img/logo.png') }}" alt="Logo"></a>
             </div>
             <button class="ltn__utilize-close">×</button>
         </div>
         <div class="ltn__utilize-menu-search-form">
             <form id="search-form">
                 <input type="text" id="search-input" placeholder="Search Chemical Name / CAS Number / HSN Code" />
                 <button type="button">
                     <span><i class="icon-search"></i></span>
                 </button>
             </form>
             <div id="search-results"
                 style="display:none; position:absolute; top:60px; left:30%; width:40%; background:#fff; border:1px solid #ddd; border-radius:4px; box-shadow:0 4px 12px rgba(0,0,0,0.1); z-index:9999;">
                 <ul id="results-list"></ul>
             </div>
         </div>
         <div class="ltn__utilize-menu">
             <ul>
                 <li><a href="{{ route('home') }}">Home</a>
                 </li>
                 <li><a href="{{ route('about.us') }}">About Us</a>
                 </li>
                 <li><a href="#">Our Certificates</a>
                 </li>
                 <li><a href="{{ route('products') }}">Products</a>
                     <ul class="sub-menu">
                         <x-category-list-menu />
                     </ul>
                 </li>
                 <li><a href="#">Carrers</a>
                 </li>
                 <li><a href="{{ route('contact.us') }}">Contact</a></li>
             </ul>
         </div>
         <div class="ltn__social-media-2">
             <x-social-media-list />
         </div>
     </div>
 </div>

 <div class="ltn__utilize-overlay"></div>


 <div class="mobile-header-menu-fullwidth">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="mobile-menu-toggle d-lg-none">
                     <span>MENU</span>
                     <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                         <svg viewBox="0 0 800 600">
                             <path
                                 d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                 id="top"></path>
                             <path d="M300,320 L540,320" id="middle"></path>
                             <path
                                 d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                 id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                             </path>
                         </svg>
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </div>
