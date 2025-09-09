{{-- 
@include('components.form.date', [
    'name' => 'dob',
    'label' => 'Date of Birth',
    'model' => $user ?? null,
    'autofocus' => true,
    'placeholder' => 'YYYY-MM-DD',
    'colClass' => 'col-12',
])
--}}


<div class="{{ $colClass ?? 'col-md-6' }}">
    <label for="{{ $name }}" class="form-label">{{ $label ?? ucfirst($name) }}</label>
    <input type="date" id="{{ $name }}" name="{{ $name }}"
        class="{{ $class ?? '' }} @error($name) is-invalid @enderror" placeholder="{{ $placeholder ?? 'YYYY-MM-DD' }}"
        @if (!empty($autofocus)) autofocus @endif @if (!empty($disabled)) disabled @endif
        value="{{ old($name) ?? (isset($model) && isset($model->$name) ? \Carbon\Carbon::parse($model->$name)->format('Y-m-d') : '') }}">

    @error($name)
        <div class="invalid-feedback d-block">
            {{ $message }}
        </div>
    @enderror

</div>
