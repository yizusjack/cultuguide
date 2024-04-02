<div class="sm:col-span-3 mt-3 mb-3">

    <div class="flex">
        <label for={{$name}} class="block text-sm font-medium leading-6 text-gray-900">{{$label}}</label>

        @isset($attributes['required'])
                <span class="text-red-500 text-right"> * </span>
        @endisset

    </div>

    <div class="mt-2">
      <select id={{$name}} name={{$name}} {{ $attributes }}class="block w-full rounded-md border-0 py-1.5 p-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" @selected(old($name) == $key ?? $value == $key)>
                {{ $value }}
            </option>
        @endforeach
      </select>

        @error($name)
            <h5 class="text-red-500">{{$message}}</h5>
        @enderror

    </div>
</div>