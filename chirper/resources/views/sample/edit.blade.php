<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
    <form method="POST" action="{{ route('sample.update', $sample) }}">
        @csrf
        @method('patch')
            <div class="flex space-x-4"> <!-- Use flex and space-x to place the children with spacing -->
                <div class="flex-1">
                    <input
                        type="text"
                        name="number1"
                        placeholder="{{ __('Give me a number') }}"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        pattern="[1-9]\d{0,2}"
                        maxlength="3"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                        value="{{ $sample->number1}}"
                    >
                    <x-input-error :messages="$errors->get('number1')" class="mt-2" />
                </div>

                <div class="flex-1">
                    <input
                        type="text"
                        name="number2"
                        placeholder="{{ __('Give me a number') }}"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        pattern="[1-9]\d{0,2}"
                        maxlength="3"
                        oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                        value="{{ $sample->number2}}"
                    >
                    <x-input-error :messages="$errors->get('number2')" class="mt-2" />
                </div>
            </div>

            <select
                name="solution"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-5"
            >
                <option value="{{ $sample->solution }}">{{ $sample->solution }}</option>
                <option value="+" @if(old('solution') == '+') selected @endif>+</option>
                <option value="-" @if(old('solution') == '-') selected @endif>-</option>
                <option value="*" @if(old('solution') == '*') selected @endif>*</option>
                <option value="/" @if(old('solution') == '/') selected @endif>/</option>
            </select>

            <x-input-error :messages="$errors->get('solution')" class="mt-2" />

            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="{{ route('sample.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>