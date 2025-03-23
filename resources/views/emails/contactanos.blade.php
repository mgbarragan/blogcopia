<x-mail::message>
# Correo electrónico

<x-mail::panel>
Este es el primer correo que mandaré por Laravel
Nombre:{{$data['nombre']}}
<br>Correo:{{$data['correo']}}
<br>Mensaje:{{$data['mensaje']}}
</x-mail::panel>
<x-mail::button url="{{route('home')}}">
Click aquí para aprobar
</x-mail::button>
</x-mail::message>