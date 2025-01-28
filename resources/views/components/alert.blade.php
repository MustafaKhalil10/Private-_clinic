@props(['type'])

@if (session()->has($type))
    @if ($type == 'info')
        <div class="alert alert-danger m-3">
            {{ session($type) }}
        </div>
    @else
        <div class="alert alert-success m-3">
            {{ session($type) }}
        </div>
    @endif
@endif
