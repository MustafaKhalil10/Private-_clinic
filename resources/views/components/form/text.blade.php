@props(['name', 'type', 'label' => null, 'value'=> null])

<div class="form-group">
    @if ($label)
        <label for="">{{ $label }}</label>
    @endif

    <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $value) }}"
        class="form-control @error($name)
            is-invalid @enderror">

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
