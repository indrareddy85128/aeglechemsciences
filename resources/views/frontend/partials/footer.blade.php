 <footer class="ltn__footer-area">
     <div class="footer-top-area">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-xl-3 col-md-6 col-sm-6 col-12">
                     <div class="footer-widget footer-about-widget">
                         <div class="footer-logo mb-10">
                             <div class="site-logo">
                                 <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="Logo">
                             </div>
                         </div>
                         <p>Aegle Chemsciences is recognized worldwide for its expertise in fine and specialty
                             chemicals, serving as a trusted partner to leading pharmaceutical companies.</p>

                     </div>
                 </div>
                 <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                     <div class="footer-widget footer-menu-widget clearfix">
                         <h4 class="footer-title">Quick Links</h4>
                         <div class="footer-menu">
                             <ul>
                                 <li><a href="{{ route('home') }}">Home</a></li>
                                 <li><a href="{{ route('about.us') }}">About Us</a></li>
                                 <li><a href="#"> Our Certificates</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                     <div class="footer-widget footer-menu-widget clearfix">
                         <h4 class="footer-title">Quick Links</h4>
                         <div class="footer-menu">
                             <ul>
                                 <li><a href="{{ route('products') }}">Products</a></li>
                                 <li><a href="#">Careers</a></li>
                                 <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-2 col-md-6 col-sm-6 col-12">
                     <div class="footer-widget footer-menu-widget clearfix">
                         <h4 class="footer-title">Customer Care</h4>
                         <div class="footer-menu">
                             <ul>
                                 <li><a href="{{ route('login') }}">Login</a></li>
                                 <li><a href="{{ route('dashboard') }}">My account</a></li>
                                 <li><a href="{{ route('cart.index') }}">Cart</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-3 col-md-6 col-sm-12 col-12">
                     <div class="footer-widget footer-newsletter-widget">
                         <h4 class="footer-title">Contact Us</h4>
                         <div class="footer-address">
                             <x-footer-contact />
                         </div>
                         <div class="ltn__social-media mt-20">
                             <x-social-media-list />
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="ltn__copyright-area ltn__copyright-2 border-top plr--5">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-6 col-12">
                     <div class="ltn__copyright-design clearfix">
                         <p>All Rights Reserved @ Aegle Chemsciences <span class="current-year"></span></p>
                     </div>
                 </div>
                 <div class="col-md-6 col-12">
                     <div class="ltn__copyright-design">
                         <p class="text-end">Designed by <a href="">Sunseaz.com</a></p>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </footer>
