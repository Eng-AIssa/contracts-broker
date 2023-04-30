<x-app-layout>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Owner') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('owner.store') }}">
                        @csrf
                        @method('POST')
                        <x-errors-list/>

                        <fieldset>

                            <legend class="fw-bold">{{ __('Owner Information') }}</legend>
                            <hr class="separator mb-3"/>

                            <div class="row my-2">
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="name" :value="__('Owner Name')"/>

                                    <x-custom-text-input id="name" name="name"
                                                         type="text" placeholder="Name"
                                                         value="{{ old('name') }}"
                                                         :error="$errors->get('name')"/>

                                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                                </div>
                                <div class="col-md-5 mb-3 offset-md-1">
                                    <x-custom-input-label for="id-number" :value="__('Owner ID')"/>

                                    <x-custom-text-input id="id-number" name="id_number"
                                                         type="text" placeholder="Id Number"
                                                         value="{{ old('id_number') }}"
                                                         :error="$errors->get('id_number')"/>

                                    <x-input-error :messages="$errors->get('id_number')" class="mt-2"/>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="mt-4">

                            <legend class="fw-bold">{{ __('Contact Information') }}</legend>
                            <hr class="separator mb-3"/>

                            <div class="row my-2">
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="phone" :value="__('Phone')"/>

                                    <x-custom-text-input id="phone" name="phone"
                                                         pattern="[0]{1}[5]{1}[0-9]{8}"
                                                         type="tel" placeholder="05xxxxxxxx"
                                                         value="{{ old('phone') }}"
                                                         :error="$errors->get('phone')"/>

                                    <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                                </div>
                                <div class="col-md-5 mb-3 offset-md-1">
                                    <x-custom-input-label for="email" :value="__('Email')"/>

                                    <x-custom-text-input id="email" name="email"
                                                         type="email" placeholder="Email Address"
                                                         value="{{ old('email') }}"
                                                         :error="$errors->get('email')"/>

                                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                                </div>
                            </div>
                        </fieldset>

                        <div class="alert alert-secondary w-75 py-2 px-3">
                            <b>{{ __('Note:') }}</b> {{ __('Password will be auto generated as Owner Id at first Login') }}
                        </div>

                        <fieldset class="mt-4">
                            <div class="row">
                                <div class="col-md-7 d-flex justify-content-start">
                                    <x-primary-button style="height: 38px">{{ __('Save') }}</x-primary-button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
