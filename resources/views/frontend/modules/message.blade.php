
@if (session('message'))

@php
    $type=session('message');
@endphp
<div class="alert alert-{{ $type['type'] }}">
    <strong>{{ $type['msg'] }}!</strong>
</div>


@endif
