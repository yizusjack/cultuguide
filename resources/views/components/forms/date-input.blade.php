<div class="sm:col-span-3 mt-3 mb-3">
    <div class="flex">
        <label for="{{$name}}" class="block text-sm font-medium leading-6 text-gray-900">{{$label}} </label>

        @isset($attributes['required'])
            <span class="text-red-500 text-right"> * </span>
        @endisset

    </div>
    <div class="mt-2">
        <input type="date" name="{{$name}}" id="{{$name}}" value="{{old($name) ?? $value}}" min="{{$min}}" max="{{$max}}" {{$attributes}} class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
    </div>
    @error($name)
        <h5 class="text-red-500">{{$message}}</h5>
    @enderror

</div>