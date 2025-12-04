@if ($whychooseus)
    <div class="ltn__why-choose-us-area pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="why-choose-us-info-wrap">
                        <div class="section-title-area ltn__section-title-2">
                            <h1 class="section-title">{{ $whychooseus->title }}</h1>
                        </div>
                        <div class="row">
                            @foreach ($whychooseus->points as $point)
                                <div class="col-lg-12 col-md-6">
                                    <div class="why-choose-us-feature-item">
                                        <div class="why-choose-us-feature-icon">
                                            <img src="{{ asset('storage/' . $point['image']) }}"
                                                alt="{{ $point['title'] }}">
                                        </div>
                                        <div class="why-choose-us-feature-brief">
                                            <h3>{{ $point['title'] }}</h3>
                                            <p>{{ $point['description'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="why-choose-us-img-wrap">
                        <div class="why-choose-us-img-1 text-left">
                            <img src="{{ asset(Storage::url($whychooseus->image_one)) }}"
                                alt="{{ $whychooseus->title }}">
                        </div>
                        <div class="why-choose-us-img-2 text-end">
                            <img src="{{ asset(Storage::url($whychooseus->image_two)) }}"
                                alt="{{ $whychooseus->title }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
