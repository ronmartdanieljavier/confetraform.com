@component('mail::message')
# Introduction

You have application to review.

@component('mail::button', ['url' => $url])
    Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
