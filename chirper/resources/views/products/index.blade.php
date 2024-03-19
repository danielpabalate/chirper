<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('product.store') }}">
            @csrf
            <div class="flex space-x-4">
                <div class="flex-1">
                    <input
                        type="text"
                        name="product_name"
                        placeholder="{{ __('Name of product') }}"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        pattern="[A-Za-z ]+"
                        oninput="this.value = this.value.replace(/[^A-Za-z ]/g, '');"
                        maxlength=20;
                        value="{{ old('product_name') }}"
                        autocomplete="off"
                    >
                    <x-input-error :messages="$errors->get('product_name')" class="mt-2" />

                    <input
                        type="text"
                        name="product_qty"
                        placeholder="{{ __('Quantity') }}"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        pattern="[0-9]+(\.[0-9]+)?"
                        maxlength="4"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                        value="{{ old('product_qty') }}"
                        autocomplete="off"
                    >
                    <x-input-error :messages="$errors->get('product_qty')" class="mt-2" />
                </div>

                <div class="flex-1">
                    <input
                        type="text"
                        name="product_price"
                        placeholder="{{ __('Quantity') }}"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        pattern="\d+(\.\d{1,2})?"
                        maxlength="9"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                        value="{{ old('product_price') }}"
                        autocomplete="off"
                    >
                    <x-input-error :messages="$errors->get('product_price')" class="mt-2" />
                </div>
            </div>


            <x-primary-button class="mt-4">{{ __('Pass') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
