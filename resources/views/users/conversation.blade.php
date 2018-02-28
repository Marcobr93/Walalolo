@extends('layouts.app')

@section('content')
    @if($conversation->privateMessages->isEmpty())
        <div class="col-lg-12 text-center mt-4">
            <h3>No hay mensajes directos con este usuario.</h3>
        </div>
    @endif
    @foreach($conversation->privateMessages as $message)
        <div class="row form-group col-lg-9">

            <div class="text-right form-group col-lg-4 center container">
                <a href="/user/{{ $message->user->slug }}">
                    <img class="rounded-circle mt-1 lozad img-responsive img-fluid img-portfolio img-hover ancho_max_imagen_conversation"
                         data-src="{{ $message->user->avatar }}"
                         alt="Foto del usuario {{ $message->user->nombre_usuario }}"/>
                </a>
            </div>

            <div class="card form-group col-lg-8 my-2 container justify-content-md-center">
                <div class="card-header bg-transparent border-primary">
                    <h5 class="card-text ng">
                    {{ $message->user->nombre_usuario }}
                    </h5>
                </div>
                <div class="card-body bg-light">
                    <h5 class="card-text">
                        {{ $message->content }}
                    </h5>
                </div>
                <div class="card-footer bg-transparent border-primary">
                    <h5>
                        {{ $message->created_at }}
                    </h5>
                </div>
            </div>

        </div>
    @endforeach
@endsection

@push('scripts')
    <script src="{{ asset('js/lozad.js') }}"></script>
@endpush