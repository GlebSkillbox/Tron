@component('mail::message')
# Вам новое обращение:

Отправитель {{ $feedback->owner_email }}

{{ $feedback->message }}

Ждём Вас снова,<br>
{{ config('app.name') }}
@endcomponent
