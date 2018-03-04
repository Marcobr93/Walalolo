@extends('layouts.app')

@section('content')
    <div class="container mb-4">
        <div class="row justify-content-md-center mt-5">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-dark blanco">Login</div>
                    <div class="card-body mt-2">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="email" class="col-lg-4 col-form-label text-lg-right ng">E-Mail</label>

                                <div class="col-lg-6">
                                    <input
                                            id="emailLogin"
                                            type="email"
                                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                            autofocus
                                    >

                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </div>
                                    @endif
                                </div>
                                @include('layouts.spinner')
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-lg-4 col-form-label text-lg-right ng">Contraseña</label>

                                <div class="col-lg-6">
                                    <input
                                            id="password"
                                            type="password"
                                            class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                            name="password"
                                            required
                                    >

                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 offset-lg-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Recuérdame
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-8 offset-lg-4">
                                    <button type="submit" class="btn btn-dark blanco">
                                        Entrar
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        ¿Olvidaste la contraseña?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('js/validacionRegistro.js') }}"></script>
@endpush
