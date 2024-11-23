@extends('layouts.auth.app',[
'title' => 'Halaman Login'
])

@section('content')
<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">{{ config('app.name') }}</h1>
                            </div>

                            @include('components.alert-message')

                            <form action="{{ route('login') }}" class="user" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="email"
                                        aria-describedby="emailHelp" placeholder="Masukkan email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password"
                                        id="password" placeholder="Masukkan password" autocomplete>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" name="remember" class="custom-control-input"
                                            id="remember">
                                        <label class="custom-control-label" for="remember">Ingat Saya</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection
