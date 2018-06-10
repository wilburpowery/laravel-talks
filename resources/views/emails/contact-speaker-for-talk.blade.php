@component('mail::message')
# Hey, {{ $talk->user->name }}

{{ $user->name }} is interested in having you give your talk "{{ $talk->title }}".

Below is his information, feel free to get in contact with him if you're interested:

@component('mail::table')
| Name       | Email         |
| ------------- |:-------------:|
| {{ $user->name }} | {{ $user->email }} |
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
