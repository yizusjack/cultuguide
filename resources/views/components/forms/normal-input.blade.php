<div class="sm:col-span-3 mt-3 mb-3">
    <div class="flex">
        <label for="{{$name}}" class="block text-sm font-medium leading-6 text-gray-900">{{$label}} </label> 
        
        @isset($attributes['required'])
            <span class="text-red-500 text-right"> * </span>
        @endisset

    </div>
    <div class="mt-2">
        <input type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{old($name) ?? $value}}" {{$attributes}} placeholder="{{$placeholder}}" class="form-control">
    </div>
    @error($name)
        <h5 class="text-red-500">{{$message}}</h5>
    @enderror

</div>