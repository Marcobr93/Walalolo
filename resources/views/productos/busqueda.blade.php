@extends('layouts.app')

@section('content')
    <div class="bg-color2">
        <div id="paginacion">
            @include('productos.producto')
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/lozad.js') }}" defer></script>
@endpush