@extends('layouts.app')

@section('content')
    @include('users.pruebamodal')
    <div class="card col-12 d-inline-flex">
        <div class="row p-5">
            <a id="abrirModalValorar" class="nav-item nav-link active btn-primary mx-4 mt-1">Valorar</a>
        </div>
    </div>

@endsection

@push('scripts')

    <script src="{{ asset('js/izimodal.min.js') }}" ></script>
    <script src="{{ asset('js/modal.js') }}"  ></script>
@endpush