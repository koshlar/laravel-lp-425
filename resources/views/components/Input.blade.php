<div class="input_container">
    <input type="{{ $type ?? 'text' }}" name="{{ $name }}" value="{{ old($name, $value ?? '') }}"
        placeholder="{{ $placeholder ?? '' }}">
    @error($name)
        <p class="error">{{ $message }}</p>
    @enderror
</div>
