<x-mail::message>
Se acaban de procesar los audios de Carnaval con el siguiente reporte:

@if (count($processed) > 0)
<x-mail::panel>
## Archivos procesados:
</x-mail::panel>
<x-mail::table>
    | Fichero |
    | :--------- |
    @foreach ($processed as $file)
    | {{$file}} |
    @endforeach
</x-mail::table>
@endif

@if (count($errors) > 0)
<x-mail::panel>
## Errores
</x-mail::panel>
<x-mail::table>
    | Error | Fichero |
    | :--------- | :--------- |
    @foreach ($errors as $error_type => $error_files)
    @foreach($error_files as $file)
    | {{$error_type}} | {{$file}} |
    @endforeach
    @endforeach
</x-mail::table>
@endif

Gracias,<br />
{{ config('app.name') }}
</x-mail::message>