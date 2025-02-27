@component('components.inputs.InputContainer')
    <select name="{{ $name }}" id={{ $id ?? $name }} value="{{ old($name, $value ?? '') }}"
        placeholder="{{ $placeholder ?? '' }}" @class($class ?? '')>
        @foreach ($options as $option)
            <option @selected(old($name) && old($name) == $option[$valueKey]) value="{{ $option[$valueKey] }}">
                {{ $option[$titleKey] }}
            </option>
        @endforeach
    </select>
    @include('components.inputs.ErrorMessage', ['name' => $name])
@endcomponent
