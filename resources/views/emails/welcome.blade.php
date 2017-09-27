@component('mail::message')
# Introduction

Thank you for registering!

@component('mail::button', ['url' => 'http://festival-manager.dev/'])
Go to website
@endcomponent

@component('mail::panel', ['url' => 'http://festival-manager.dev/'])

Keep track of your festivals amongst hundreds of users.

@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
