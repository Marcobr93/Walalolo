@extends('layouts.app')

@section('content')
    @foreach($conversation->privateMessages as $message)
        <div class="card col-lg-4 my-1 container justify-content-md-center">
            <div class="card-header bg-transparent border-primary">
                {{ $message->user->nombre_usuario }}
            </div>
            <div class="card-body bg-light">
                <p class="card-text">
                {{ $message->content }}
            </div>
            <div class="card-footer bg-transparent border-primary">
                <h4 class="price ng">
                    {{ $message->created_at }}
                </h4>
            </div>
        </div>
    @endforeach
@endsection

