@props(['active' => false])  {{-- Ini untuk menghilangkan atribut aktif --}}


{{-- if $active += class 'active' else += '' (empty class / not active class) --}}
<a {{ $attributes }} class="{{ $active ? 'active' : ''}}" aria-current="{{ $active ? 'page' :false }}">{{$slot}}</a>