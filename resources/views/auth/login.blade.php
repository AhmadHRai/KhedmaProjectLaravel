@extends('layouts.masterlogin')
@section('content')

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">

                {{-- شعار واجهة تسجيل الدخول --}}
                <div><img src="/images/logo.png" alt="" width="90px"></div>

                <div id="login-column" class="col-md-6">
                    <div class="card">
                        <div class="card-header"> Login</div>
                        {{-- <div class="box"> --}}
                        {{-- <div class="shape1"></div>
                        <div class="shape2"></div>
                        <div class="shape3"></div>
                        <div class="shape4"></div>
                        <div class="shape5"></div>
                        <div class="shape6"></div>
                        <div class="shape7"></div> --}}
                        <div class="card-body">
                            <form class="form" action="">
                                <div class="form-group">
                                    <label for="email">{{ __('Email') }}</label><br>
                                    <input id="email" type="text"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        {{-- لاسترداد المدخلات من الطلب السابق old --}} value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('password ') }}</label><br>
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>
                                    {{-- لتحديد ما إذا كانت هناك رسائل خطأ لحقل معين has --}}
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            {{-- استرجاع رسالة الخطأ الأولى للحقل --}}
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-info btn-md">
                                        {{ __('Enter') }}
                                    </button>
                                </div>

                                {{-- <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                هل نسيت كلمة المرور
                                            </a>
                                        @endif
                                    </div>
                                </div> --}}

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

    </form>
@endsection
