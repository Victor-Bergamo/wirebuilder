<div class="mt-5 md:mt-0 md:col-span-2">
    {{-- form start --}}
    {!! $form->open() !!}
    {{-- {!! $form->render() !!} --}}
    {{-- {{ dd($crafter->fields()) }} --}}

    {{-- <form action="#" method="POST"> --}}
    <div class="shadow overflow-hidden sm:rounded-md">
        {{-- body --}}
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                
                @foreach ($crafter->fields() as $field)
                    {!! $field->render() !!}
                @endforeach

                {{-- <div class="col-span-6">
                    <label for="street-address" class="block text-sm font-medium text-gray-700">Street
                        address</label>
                    <input type="text" name="street-address" id="street-address" autocomplete="street-address"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                    <input type="text" name="city" id="city" autocomplete="address-level2"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="region" class="block text-sm font-medium text-gray-700">State /
                        Province</label>
                    <input type="text" name="region" id="region" autocomplete="address-level1"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                    <label for="postal-code" class="block text-sm font-medium text-gray-700">ZIP / Postal
                        code</label>
                    <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div> --}}
            </div>
        </div>

        {!! $form->footer() !!}
    </div>
    {{-- </form> --}}
    {!! $form->close() !!}
    {{-- form end --}}
</div>
