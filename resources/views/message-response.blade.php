<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="row flex justify-center items-center">
                        <img src="{{url('/Exclamation.png')}}" width="175px" height="175px" alt="success sticker"
                             style="padding-right: 20px"/>
                        <p style="font-size: 40px;">{{ $message }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
