@component('mail::message')
#Please claim your document at the barangay.

@component('mail::button', ['url' => 'https://puntauno.ml'])
Visit our barangay website to view your request/s.
@endcomponent

Thank you,<br>
{{ config('app.name') }}
@endcomponent
