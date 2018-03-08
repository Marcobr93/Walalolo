@extends('layouts.app')

@section('content')
    @foreach($conversations as $conversation)
        <div class="row form-group col-lg-9">

            <div class="text-right form-group col-lg-4 center container">
                <a data-toggle="tooltip" data-placement="left"
                   title="Conversación con {{ \App\Conversation::user($conversation)->nombre_usuario }}"
                   href="{{ route('conversation.show', $conversation->id) }}">
                    <img class="rounded-circle mt-1 lozad img-responsive img-fluid img-portfolio img-hover ancho_max_imagen_conversation"
                         data-src="{{ \App\Conversation::user($conversation)->avatar }}"
                         onerror="src='{{ asset('images/userXDefecto.jpeg') }}'"
                         alt="Foto del usuario {{ \App\Conversation::user($conversation)->nombre_usuario }}"/>
                </a>
            </div>

            <div class="card form-group col-lg-8 my-2 container justify-content-md-center">
                <div class="card-header bg-transparent border-primary">
                    <a href="{{ route('conversation.show', $conversation->id) }}">
                        <h5 class="card-text ng">
                            {{ \App\Conversation::user($conversation)->nombre_usuario }}
                        </h5>
                    </a>
                </div>

                <div class="card-footer bg-transparent border-primary">
                    <h5>
                        {{ $conversation->created_at }}
                    </h5>
                </div>
            </div>

        </div>
    @endforeach
@endsection

@push('scripts')
    <script src="{{ asset('js/lozad.js') }}" defer></script>
@endpush
