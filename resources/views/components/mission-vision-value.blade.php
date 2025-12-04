 <div class="ltn__team-details-area section-bg-1">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="ltn__team-details-member-info-details">
                     <div class="row ltn__custom-gutter mt-50 mb-20">
                         @foreach ($missionvisionvalues as $missionvisionvalue)
                             <div class="col-xl-4 col-sm-6 col-12">
                                 <div
                                     class="ltn__feature-item ltn__feature-item-6 {{ $loop->iteration == 2 ? 'active' : '' }}">
                                     <div class="ltn__feature-icon">
                                         <img src="{{ asset(Storage::url($missionvisionvalue->image)) }}"
                                             alt="{{ $missionvisionvalue->title }}">
                                     </div>
                                     <div class="ltn__feature-info">
                                         <h3>{{ $missionvisionvalue->title }}</h3>
                                         <p>{{ $missionvisionvalue->description }}</p>
                                     </div>
                                 </div>
                             </div>
                         @endforeach
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
