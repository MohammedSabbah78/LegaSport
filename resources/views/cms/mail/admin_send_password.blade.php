@component('mail::message')
# Welcome {{$admin->name}}
Thanks for your cooperation and support,
@component('mail::panel')
To access CMS your password is {{$password}} <br>
click on below button to login
@endcomponent

@component('mail::button', ['url' => 'www.google.com'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent