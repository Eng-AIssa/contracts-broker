<x-app-layout>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Sector information') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <fieldset>

                        <legend class="fw-bold">{{ __('Sector Information') }}</legend>
                        <hr class="separator mb-3"/>

                        <div class="row my-2">
                            <div class="col-md-5 mb-3">
                                <x-custom-input-label for="sector-name" :value="__('Name')"/>

                                <x-custom-text-input id="sector-name" name="sector_name"
                                                     type="text" placeholder="{{ __('Sector Name') }}"
                                                     value="{{ $sector->name }}"
                                                     disabled="true"/>
                            </div>
                            <div class="col-md-5 mb-3 offset-md-1">
                                <x-custom-input-label for="code" :value="__('Sector Code')"/>

                                <x-custom-text-input id="code" name="code"
                                                     type="text" placeholder="{{ __('Symbol ex') }}: 4,A"
                                                     value="{{ $sector->code }}"
                                                     disabled="true"/>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-md-5 mb-3">
                                <x-custom-input-label for="registration-number" :value="__('Registration')"/>

                                <x-custom-text-input id="registration-number" name="registration_number"
                                                     type="text" placeholder="{{ __('Registration Number') }}"
                                                     value="{{ $sector->registration_number }}"
                                                     disabled="true"/>
                            </div>
                            <div class="col-md-5 mb-3 offset-md-1">
                                <x-custom-input-label for="contract-fees" :value="__('Contract Fees')"/>

                                <x-custom-text-input id="contract-fees" name="contract_fees"
                                                     type="number" placeholder="{{ __('In SAR') }}"
                                                     value="{{ $sector->fees }}"
                                                     disabled="true"/>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mt-4">

                        <legend class="fw-bold">{{ __('Manager Information') }}</legend>
                        <hr class="separator mb-3"/>

                        <div class="row my-2">
                            <div class="col-md-5 mb-3">
                                <x-custom-input-label for="manager-name" :value="__('Name')"/>

                                <x-custom-text-input id="manager-name" name="manager_name"
                                                     type="text" placeholder="{{ __('Manager Name') }}"
                                                     value="{{ $sector->manager_name }}"
                                                     disabled="true"/>
                            </div>
                            <div class="col-md-5 mb-3 offset-md-1">
                                <x-custom-input-label for="manager-id" :value="__('ID Number')"/>

                                <x-custom-text-input id="manager-id" name="manager_id"
                                                     type="text" placeholder="{{ __('Manager Id') }}"
                                                     value="{{ $sector->manager_id }}"
                                                     disabled="true"/>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-md-5 mb-3">
                                <x-custom-input-label for="manager-phone" :value="__('Phone')"/>

                                <x-custom-text-input id="manager-phone" name="manager_phone"
                                                     pattern="[0]{1}[5]{1}[0-9]{8}"
                                                     type="tel" placeholder="05xxxxxxxx"
                                                     value="{{ $sector->manager_phone }}"
                                                     disabled="true"/>
                            </div>
                            <div class="col-md-5 mb-3 offset-md-1">
                                <x-custom-input-label for="manager-email" :value="__('Email')"/>

                                <x-custom-text-input id="manager-email" name="manager_email"
                                                     type="email" placeholder="{{ __('Email Address') }}"
                                                     value="{{ $sector->manager_email }}"
                                                     disabled="true"/>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
