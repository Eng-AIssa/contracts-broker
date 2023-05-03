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
                    <form method="POST" action="{{ route('sector.update', $sector->id) }}">
                        @csrf
                        @method('PUT')
                        <x-errors-list/>

                        <fieldset>

                            <legend class="fw-bold">{{ __('Sector Information') }}</legend>
                            <hr class="separator mb-3"/>

                            <div class="row my-2">
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="sector-name" :value="__('Name')"/>

                                    <x-custom-text-input id="sector-name" name="sector_name"
                                                         type="text" placeholder="{{ __('Sector Name') }}"
                                                         value="{{ $sector->name }}"
                                                         :error="$errors->get('sector_name')"/>

                                    <x-input-error :messages="$errors->get('sector_name')" class="mt-2"/>
                                </div>
                                <div class="col-md-5 mb-3 offset-md-1">
                                    <x-custom-input-label for="code" :value="__('Sector Code')"/>

                                    <x-custom-text-input id="code" name="code"
                                                         type="text" placeholder="{{ __('Symbol ex') }}: 4,A"
                                                         value="{{ $sector->code }}"
                                                         :error="$errors->get('code')"/>

                                    <x-input-error :messages="$errors->get('code')" class="mt-2"/>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="registration-number" :value="__('Registration')"/>

                                    <x-custom-text-input id="registration-number" name="registration_number"
                                                         type="text" placeholder="{{ __('Registration Number') }}"
                                                         value="{{ $sector->registration_number }}"
                                                         :error="$errors->get('registration_number')"/>

                                    <x-input-error :messages="$errors->get('registration_number')" class="mt-2"/>
                                </div>
                                <div class="col-md-5 mb-3 offset-md-1">
                                    <x-custom-input-label for="contract-fees" :value="__('Contract Fees')"/>

                                    <x-custom-text-input id="contract-fees" name="contract_fees"
                                                         type="number" placeholder="{{ __('In SAR') }}"
                                                         value="{{ $sector->fees }}"
                                                         :error="$errors->get('contract_fees')"/>

                                    <x-input-error :messages="$errors->get('contract_fees')" class="mt-2"/>
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
                                                         :error="$errors->get('manager_name')"/>

                                    <x-input-error :messages="$errors->get('manager_name')" class="mt-2"/>
                                </div>
                                <div class="col-md-5 mb-3 offset-md-1">
                                    <x-custom-input-label for="manager-id" :value="__('ID Number')"/>

                                    <x-custom-text-input id="manager-id" name="manager_id"
                                                         type="text" placeholder="{{ __('Manager Id') }}"
                                                         value="{{ $sector->manager_id }}"
                                                         :error="$errors->get('manager_id')"/>

                                    <x-input-error :messages="$errors->get('manager_id')" class="mt-2"/>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="manager-phone" :value="__('Phone')"/>

                                    <x-custom-text-input id="manager-phone" name="manager_phone"
                                                         pattern="[0]{1}[5]{1}[0-9]{8}"
                                                         type="tel" placeholder="05xxxxxxxx"
                                                         value="{{ $sector->manager_phone }}"
                                                         :error="$errors->get('manager_phone')"/>

                                    <x-input-error :messages="$errors->get('manager_phone')" class="mt-2"/>
                                </div>
                                <div class="col-md-5 mb-3 offset-md-1">
                                    <x-custom-input-label for="manager-email" :value="__('Email')"/>

                                    <x-custom-text-input id="manager-email" name="manager_email"
                                                         type="email" placeholder="{{ __('Email Address') }}"
                                                         value="{{ $sector->manager_email }}"
                                                         :error="$errors->get('manager_email')"/>

                                    <x-input-error :messages="$errors->get('manager_email')" class="mt-2"/>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="mt-4">
                            <div class="row">
                                <div class="col-md-7 d-flex justify-content-start">
                                    <x-primary-button style="height: 38px">{{ __('Update') }}</x-primary-button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
