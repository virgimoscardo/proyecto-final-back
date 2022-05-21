@component('mail::message')
# {{ $mensaje->name }} le ha mandado un mensaje a la pagina

El mensaje era:

{{ $mensaje->message }}


Gracias,<br>
{{ config('app.name') }}
@endcomponent