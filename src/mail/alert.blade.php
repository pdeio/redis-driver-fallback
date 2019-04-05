@component('mail::message')
<h1> Redis Cache Driver stops working at {{$now}}</h1>


@component('mail::button', ['url' => config('app.url')])
Go to {{ config('app.url')}}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent