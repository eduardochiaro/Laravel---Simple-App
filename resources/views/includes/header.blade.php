
@if (Auth::check())
<a href="{{route('admin.logout')}}">LOG OUT</a>
@else
<a href="{{route('admin.login')}}">ADMIN</a>
@endif
