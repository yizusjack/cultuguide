<div class="col-span-full mt-3 mb-3">
    <div class="flex">
        <label for="{{$name}}" class="block text-sm font-medium leading-6 text-gray-900">{{$label}}</label>

        @isset($attributes['required'])
                <span class="text-red-500 text-right"> * </span>
        @endisset

    </div>

    <div class="mt-2">
      <textarea id="{{$name}}" name="{{$name}}" rows="3" placeholder="{{$placeholder}}" {{$attributes}} class="form-control">{!! old($name) ? old($name) : $value !!}</textarea>
    </div>

    @error($name)
        <p class="text-red-500">{{$message}}</p>
    @enderror

</div>