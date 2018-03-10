@extends('layouts.app')

@section('content')

    <div class="text-center">
        <div class="text-center btnespacio">
            <button class="btn btn-dark">
                <a class="nav-link"
                   href="{{route('contraoferta.aceptada', Auth::user()->slug)}}">Ofertas
                    aceptadas</a>
            </button>
        </div>
    </div>

    @foreach($contraofertas->chunk(3) as $chunk)
        <div class="card-group row course-set courses__row producto">
            @foreach($chunk as $contraoferta)
                @if($contraoferta['estado_oferta'] === "En proceso")
                    @include('contraofertas.contraoferta')
                @endif
            @endforeach
        </div>
    @endforeach

    <div class="col-lg-6 offset-lg-3">
        <div class="pagination mx-auto text-center mb-4">
            {{ $user->contraofertas()->paginate(9)->links('pagination::bootstrap-4') }}
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/lozad.js') }}" defer></script>
@endpush