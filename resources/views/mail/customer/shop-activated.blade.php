@component('mail::message')
# Congratulations

Your shop "{{ $shopName }}" is now active

@component('mail::button', ['url' => url('/shops', $shopId)])
Visit Your Shop
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
