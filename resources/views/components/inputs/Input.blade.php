@component('components.inputs.InputContainer')
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" value="{{ old($name, $value ?? '') }}"
        placeholder="{{ $placeholder ?? '' }}">
    @include('components.inputs.ErrorMessage', ['name' => $name])
@endcomponent
