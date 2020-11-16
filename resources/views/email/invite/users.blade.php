@component('mail::message')
# Hello

You are invited from {{ $data['team'] }} team.

@component('mail::button', ['url' => $data['accept'], 'color' => 'primary'])
Accept Invitation
@endcomponent

@component('mail::button', ['url' => $data['decliend'], 'color' => 'error'])
    Decliend
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
