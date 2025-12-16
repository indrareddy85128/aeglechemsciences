<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $metadetails->title ?? 'Aegle Chemsciences' }}</title>
    <meta name="keywords" content="{{ $metadetails->keywords ?? 'default, keywords' }}">
    <meta name="description" content="{{ $metadetails->description ?? 'Default description here' }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/img/favicon.png') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
</head>

<body>

    <div class="body-wrapper">

        @include('frontend.partials.header')

        @yield('content')

        @include('frontend.partials.footer')

        <a href="#" class="float" target="_blank">
            <i class="fab fa-whatsapp my-float"></i>
        </a>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        let ajaxRequest = null;
        let debounceTimer = null;

        $('#search-input').on('keyup', function() {
            let query = $(this).val().trim();

            clearTimeout(debounceTimer);

            if (query.length < 2) {
                $('#search-results').hide();
                return;
            }

            debounceTimer = setTimeout(() => {

                if (ajaxRequest) ajaxRequest.abort();

                ajaxRequest = $.ajax({
                    url: "{{ route('products.search') }}",
                    type: "GET",
                    data: {
                        search: query
                    },
                    success: function(data) {
                        let html = '';

                        if (data.products.length > 0) {
                            data.products.forEach(product => {
                                html += `
                                <li>
                                    <a href="/product/${product.slug}">
                                        ${product.name} / ${product.cas_number} / ${product.hsn_code}
                                    </a>
                                </li>`;
                            });
                        } else {
                            html = data.auth ?
                                '<p style="color:red;text-align:center;margin:0;">No records found</p>' :
                                '<p style="color:red;text-align:center;margin:0;">Please login</p>';
                        }

                        $('#results-list').html(html);
                        $('#search-results').show();
                    }
                });

            }, 300);
        });
    </script>


    <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>
