@if (session()->has('flash_notification.message'))
<div class="container">
<div class="alert alert-{{ session()->get('flash_notification.level') }}">
<a href="#" class="close" data-dismiss="alert" aria-hidden="true">&times;</a>
{!! session()->get('flash_notification.message') !!}
</div>
</div>
@endif