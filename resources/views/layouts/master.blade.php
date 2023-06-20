<!DOCTYPE html>
@php $lang = app()->getLocale('lang'); @endphp
@if ($lang == 'en')
    <html lang="en" dir="ltr">
@else
    <html lang="ar" dir="rtl">
@endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta property="og:site_name" content="{{ $mainsetting->name }}">
    <link rel="shortcut icon" href="/images/hadeellogo.png">

    {{-- get section --}}
    <meta property="og:type" content="website" />
    @yield('metagraph')
    <!-- Social Media Analytics !-->
    {{-- <meta property="fb:app_id" content="your_app_id" />
        <meta name="twitter:site" content="@website-username"> --}}
    <!-- Anything Else !-->
    {{-- section end --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- JS Files -->
    <script src="{{ asset('/js/anime.min.js') }}" defer></script>
    <script src="{{ asset('/js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('/js/parallax.min.js') }}" defer></script>
    <script src="{{ asset('/js/lity.min.js') }}" defer> </script>
    <script src="{{ asset('/js/wow.min.js') }}" defer> </script>
    {{-- Photo --}}
    <script src="{{ asset('/js/jquery.gallery.js') }}" defer> </script>
    <script src="{{ asset('/js/modernizr.custom.53451.js') }}" defer></script>
    {{-- end Photo --}}
    <script src="{{ asset('/js/scriptds.js') }}" defer> </script>

    <!-- CSS Files -->
    <!-- CSS -->


    @if ($lang == 'en')
        <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style2.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.en.css') }}">

    @else
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/style2.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('/css/stylemobaile.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/lity.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/font/fontawesome.css') }}">

    {{-- خاص بالفهرسة google --}}
    <meta name="google-site-verification" content="{{ $mainsetting->urlgoogle }}" />
</head>

<body>
    @include('includes.navbar')
    {{-- @include('includes.messages') --}}
    @yield('content')

    <!-- 12 -->
    <section class="bg_11">
        <div class="container">
            <div class="row">
                {{-- 1 --}}
                {{-- <div class="col-md-3 col-sm-6 col-12">
        <h5 class="titel_12">{{trans('lang.master11')}}</h5>
        @foreach ($postTypAll as $postType)
          <p>{{$postType->name}}</p>
        @endforeach
      </div> --}}
                {{-- 2 --}}
                <div class="col-md-4 col-sm-6 col-12">
                    <h5 class="titel_12">{{ trans('lang.master12') }}</h5>
                    <p><a href="/importanturls/" style="color: white">{{ trans('lang.navbar02') }}</a></p>
                    <p><a href="/news/" style="color: white">{{ trans('lang.navbar04') }}</a></p>
                    <p><a href="/section/" style="color: white">{{ trans('lang.navbar03') }}</a></p>
                </div>
                {{-- 3 الاخبار --}}
                <div class="col-md-4 col-sm-6 col-12">
                    <h5 class="titel_12">{{ trans('lang.master13') }}</h5>
                    @foreach ($nodeAll as $node)
                        <div class="media mb-5">
                            <img src="{{ asset('storage/thumbnails/' . $node->path_img) }}" class="mr-3 imgfooter"
                                alt="...">
                            <div class="media-body">
                                <a href="{{ '/news/' . $node->id }}" style="color: white">
                                    <p class="mt-0"> {{ str_limit($node->title, $limit = 70, $end = ' ..') }} </p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{-- 4 --}}
                <div class="col-md-4 col-sm-6 col-12">
                    <h5 class="titel_12">{{ trans('lang.master06') }}</h5>
                    <div class="col-md-6 col-6 ico_12">

                        <div class="row">
                            <i class="fas fa-map-marker-alt icon_12_l"></i>
                            <p>{{ $mainsetting->address3en }}</p>
                        </div>

                        <div class="row">
                            <i class="fas fa-mobile-alt icon_12_l"></i>
                            <p><a href="tel:{{ $mainsetting->phone2 }}"
                                    style="color: white">{{ $mainsetting->phone2 }}</a></p>
                        </div>

                        <div class="row">
                            <p><i class="fas fa-envelope-open-text icon_12_l"></i><a
                                    href="mailto:{{ $mainsetting->email }}"
                                    style="color: white">{{ $mainsetting->email }}</a></p>
                        </div>

                    </div>

                    <h5 class="titel_12_top"></h5>
                    <h5> {{ trans('lang.master07') }}</h5>
                    <div class="display_12">
                        <!-- أيقونات التواصل الاجتماعي -->
                        @foreach ($socialmediasAll as $socialmedia)
                            <a href="{{ $socialmedia->url }}" target="_blank" style="color: white;"><i
                                    class="{{ $socialmedia->name }} icon_12"></i></a>
                        @endforeach
                        <!-- أيقونات التواصل الاجتماعي end-->
                    </div>

                </div>

            </div>
        </div>

    </section>


    <!-- footer -->
    <section class="footer">
        <div class="row">
            <div class="col-md-6 col-12">{{ trans('lang.master08') }}</div>
            <div class="col-md-6 col-12">
                <a href="#" target="_blank" style="color: aliceblue;">{{ trans('lang.master09') }} AIAMN NEJAD</a>
            </div>
        </div>
    </section>
    <!-- footer end -->

</body>

</html>
