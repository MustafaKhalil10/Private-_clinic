@props(['name', 'options' => [], 'value'=> null])

<div class="form-group">

    <label for="">{{ $name }}</label>

    <select name="{{ $name }}" class="form-control">
        @foreach ($options as $op_value)
            <option value="{{ $op_value }}" @selected(old($name, $value) == $op_value)>{{ $op_value }}</option>
        @endforeach
    </select>

</div>
