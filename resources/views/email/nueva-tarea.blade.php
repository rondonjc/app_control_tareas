<x-mail::message>
# {{$tarea}}

La tarea termina el dia {{$fecha_limite}}

<x-mail::button :url="$url">
Click aqui par ver la tarea
</x-mail::button>

Atentamente,<br>
{{ config('app.name') }}
</x-mail::message>
