<!DOCTYPE html>
<html lang="ar" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$mainsettingAll->name}}</title>
        <script src="{{ asset('/js/jquery-3.3.1.min.js') }}" defer></script>
        <script src="{{ asset('/js/popper.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.min.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('/css/bootstrap-rtl.min.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body  style="background: linear-gradient(135deg, rgb(219, 218, 218) 50%, rgb(64, 112, 112) 50%); background-blend-mode: multiply">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a style="color: #fff" href="{{ url('/home') }}">Home</a>
                    @else
                        <a style="color: #fff" href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">

                <div class="row">
                    <div class="col-md-6">
                        <img width="80%" src="images/img_main.png" alt="">
                    </div>
                    <div class="col-md-6">
                        <div class="title m-b-md">
                            {{$mainsettingAll->name}}
                            
                        </div>

                        <div class="links">
                            <p>{{$mainsettingAll->description}}</p>
                            <button type="button" class="btn btn-secondary"><i class="bx bxl-play-store"></i> Google Play</button>
                            <button type="button" class="btn btn-secondary"><i class="bx bxl-apple"></i> App Store</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
