@extends('layouts.app')

@section('content')
    <ul class="nav nav-pills nav-justified">
        <a id="abrirModalMD" class="nav-item nav-link active btn-primary mx-4 mt-1">Mensaje Directo</a>
    </ul>

@endsection

@push('scripts')
    <script src="{{ asset('js/izimodal.min.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>
@endpush