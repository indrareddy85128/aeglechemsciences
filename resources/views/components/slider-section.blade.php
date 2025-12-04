@if ($slider)
    <div class="ltn__slider-area ltn__slider-3"
        style="background: url('{{ asset(Storage::url($slider->image)) }}') center/cover no-repeat; background-position: bottom;">
        <div class="ltn__slide-one-active slick-slide-arrow-1 slick-slide-dots-1">
            <div class="ltn__slide-item ltn__slide-item-2 ltn__slide-item-3">
                <div class="ltn__slide-item-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 align-self-center">
                                <div class="slide-item-info">
                                    <div class="slide-item-info-inner ltn__slide-animation">
                                        <h1 class="slide-title animated ">{!! $slider->title !!}</h1>
                                        <div class="slide-brief animated">
                                            <p>{{ $slider->description }}.
                                            </p>
                                        </div>
                                        <div class="btn-wrapper animated">
                                            <a href="#"
                                                class="theme-btn-1 btn btn-effect-1 text-uppercase">Explore
                                                Products</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
