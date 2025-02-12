@component('components.inputs.InputContainer')
    <textarea type="{{ $type ?? 'text' }}" name="{{ $name }}" placeholder="{{ $placeholder ?? '' }}">{!! old($name, $value ?? '') !!}</textarea>
    @include('components.inputs.ErrorMessage', ['name' => $name])
@endcomponent
