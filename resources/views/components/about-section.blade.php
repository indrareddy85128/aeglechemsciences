@if($about)
<div class="ltn__about-us-area pt-50 pb-50">
     <div class="container">
         <div class="row">
             <div class="col-lg-6 align-self-center">
                 <div class="about-us-img-wrap about-img-left">
                     <img src="{{ asset(Storage::url($about->image)) }}" alt="{{ $about->title }}">
                 </div>
             </div>
             <div class="col-lg-6 align-self-center">
                 <div class="about-us-info-wrap">
                     <div class="section-title-area ltn__section-title-2">
                         <h1 class="section-title">{{ $about->title }}</h1>
                     </div>
                     <p>{{ $about->description }}</p>
                     <a href="#" class="theme-btn-1 btn btn-effect-1 text-uppercase">Read More</a>
                 </div>
             </div>
         </div>
     </div>
 </div>
@endif
