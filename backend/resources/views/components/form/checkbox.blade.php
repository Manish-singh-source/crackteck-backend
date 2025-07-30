{{-- 
@include('components.form.checkbox', [
    'name' => 'terms',
    'label' => 'I agree to the terms and conditions',
    'model' => $user ?? null,
    'required' => true,
]) 
--}}


<div class="{{ $colClass ?? '' }}">
    <div class="form-check">
        <input type="checkbox" name="{{ $name }}" id="{{ $id }}"
            class="form-check-input @error($name) is-invalid @enderror" value="{{ $value ?? '1' }}"
            @if (old($name, isset($model) && isset($model->$name) ? $model->$name : false)) checked @endif @if (!empty($required)) required @endif
            @if ($errors->has($name)) aria-describedby="{{ $name }}-feedback" @endif>

        <label class="form-check-label" for="{{ $id }}">
            {{ $label ?? breakString($name) }}
        </label>

        {{-- Error message --}}
        @error($name)
            <div id="{{ $name }}-feedback" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
