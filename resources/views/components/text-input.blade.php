<div>
    @props(['disabled' => false, 'field' => '', 'value' => ''])

    <input
        {{ $disabled ? 'disabled' : '' }}
        {!! $attributes->merge(['class' => 'form-input rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}
        value="{{ $value }}"
    >

    @error($field)
        <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
    @enderror
</div>
