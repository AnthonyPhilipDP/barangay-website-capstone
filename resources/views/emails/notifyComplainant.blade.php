@component('mail::message')
#We recieved and reviewing your complaint.
#

@component('mail::button', ['url' => 'https://puntauno.ml'])
Visit our barangay website to view your complaint/s.
@endcomponent

Thank you,<br>
{{ config('app.name') }}
@endcomponent
