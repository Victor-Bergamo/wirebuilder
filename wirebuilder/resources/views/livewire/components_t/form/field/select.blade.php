<div class="col-span-6 sm:col-span-3">
    <label for="{!! $idField !!}" class="block text-sm font-medium text-gray-700">{!! $label !!}</label>
    <select id="{!! $idField !!}" name="{!! $name !!}" autocomplete="country-name"
        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        
        @foreach ($options as $select => $option)
            <option value="{!! $select !!}"> {!! $option !!}</option>
        @endforeach
    </select>
</div>