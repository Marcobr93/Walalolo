@extends('layouts.app')

@section('content')

    <div class="text-center">
        <div class="text-center btnespacio">
            <button class="btn btn-dark">
                <a class="nav-link"
                   href="{{route('contraoferta.aceptada',array('user' => Auth::user()->nombre_usuario))}}">Ofertas
                    aceptadas</a>
            </button>
        </div>
    </div>

    @foreach($contraofertas->chunk(3) as $chunk)
        <div class="card-group row course-set courses__row producto">
            @foreach($chunk as $contraoferta)
                @if($contraoferta['estado_oferta'] === null)
                    @include('contraofertas.contraoferta')
                @endif
            @endforeach
        </div>
    @endforeach

    <div class="text-center">{{ $user->contraofertas()->paginate(9)->links('pagination::bootstrap-4') }}</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/lozad.js') }}" defer></script>
@endpush