{{-- Usage in blade file --}}

{{--
@include('components.form.select', [
    'label' => 'Status',
    'name' => 'status',
    'options' => ["1" => "Active", "2" => "Inactive"],
    'colClass' => 'col-12',
    'model' => $user ?? null,
    'autofocus' => true,
])
--}}

<div class="{{ $colClass ?? '' }}">
    {{-- Label for the select --}}
    <label for="{{ $name }}" class="form-label">{{ $label ?? ucfirst($name) }}</label>

    {{-- Select Field --}}
    <select id="{{ $name }}" name="{{ $name }}" class="form-select w-100">
        @foreach($options as $key=> $option)
        <option value="{{$key}}"
            @if($errors->has($name)) class="text-neg" @endif
            @if(isset($model) || old($name))
            @if(old($name) && old($name) === $key) selected
            @elseif(isset($model) && $model->$name === $key) selected
            @endif
            @endif
            >
            {{ $option }}
        </option>
        @endforeach
    </select>

    @if($errors->has($name))
    <div class="text-neg text-small">{{ $errors->first($name) }}</div>
    @endif

</div>  