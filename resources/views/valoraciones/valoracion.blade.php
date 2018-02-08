@foreach($user->valoraciones as $valoracion)
    <p>Usuario: {{ \App\User::where('id', $valoracion['valora_user_id'])->first()->nombre_usuario }}
        Valoración:{{ $valoracion->valoracion }}</p>
@endforeach