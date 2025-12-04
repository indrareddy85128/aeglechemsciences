<div class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
    data-bg="{{ asset('frontend/assets/img/bg/breadcrumb.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                    <div class="section-title-area ltn__section-title-2">
                        <h1 class="section-title white-color">{{ $title }}</h1>
                    </div>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            @foreach ($links as $link)
                                @if ($loop->last)
                                    <li>{{ $link['name'] }}</li>
                                @else
                                    <li><a href="{{ $link['url'] }}">{{ $link['name'] }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
