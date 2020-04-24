
@if (session('message'))

@php
    $type=session('message');
@endphp
<div class="alert alert-{{ $type['type'] }}">
    <h3 class="text-center"><strong>{{ $type['msg'] }}!</strong></h3>
</div>


@endif
