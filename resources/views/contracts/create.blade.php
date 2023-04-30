<x-app-layout>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Contract') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('contract.store') }}">
                        @csrf
                        @method('POST')
                        <x-errors-list/>

                        <fieldset>

                            <legend class="fw-bold">{{ __('Contract Details') }}</legend>
                            <hr class="separator mb-3">

                            <div class="row my-2">
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="entry-date" :value="__('Entry Date')"/>

                                    <x-date-input id="entry-date" name="entry_date"
                                                  value="{{ old('entry_date') }}"
                                                  :error="$errors->get('entry_date')"/>

                                    <x-input-error :messages="$errors->get('entry_date')" class="mt-2"/>
                                </div>
                                <div class="col-md-5 mb-3 offset-md-1">
                                    <x-custom-input-label for="leaving-date" :value="__('Leaving Date')"/>

                                    <x-date-input id="leaving-date" name="leaving_date"
                                                  value="{{ old('leaving_date') }}"
                                                  :error="$errors->get('leaving_date')"/>

                                    <x-input-error :messages="$errors->get('leaving_date')" class="mt-2"/>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="mt-4">

                            <legend class="fw-bold">{{ __('Units Information') }}</legend>
                            <hr class="separator mb-3"/>

                            <div class="row my-2">
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="unit-code" :value="__('Unit Code')"/>

                                    <x-dropdown-input id="unit-code" name="unit_code"
                                                      :value="__('Select Unit')"
                                                      :error="$errors->get('unit_code')">
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}" {{isSelected(old('unit_code'), $unit->id)}}>
                                                {{$unit->code}}
                                            </option>
                                        @endforeach
                                    </x-dropdown-input>

                                    <x-input-error :messages="$errors->get('unit_code')" class="mt-2"/>
                                </div>
                                <div class="col-md-5 mb-3 offset-md-1">
                                    <x-custom-input-label for="rental-fees" :value="__('Rental Fees')"/>

                                    <x-custom-text-input id="rental-fees" name="rental_fees"
                                                         type="number" placeholder="In SAR"
                                                         value="{{ old('rental_fees') }}"
                                                         :error="$errors->get('rental_fees')"/>

                                    <x-input-error :messages="$errors->get('rental_fees')" class="mt-2"/>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="mt-4">

                            <legend class="fw-bold">{{ __('Resident Information') }}</legend>
                            <hr class="separator mb-3"/>

                            <div class="row my-2">
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="resident-name" :value="__('Resident Name')"/>

                                    <x-custom-text-input id="resident-name" name="resident_name"
                                                         type="text" placeholder="Name"
                                                         value="{{ old('resident_name') }}"
                                                         :error="$errors->get('resident_name')"/>

                                    <x-input-error :messages="$errors->get('resident_name')" class="mt-2"/>
                                </div>
                                <div class="col-md-5 mb-3 offset-md-1">
                                    <x-custom-input-label for="resident-id" :value="__('Resident ID')"/>

                                    <x-custom-text-input id="resident-id" name="resident_id"
                                                         type="text" placeholder="Id Number"
                                                         value="{{ old('resident_id') }}"
                                                         :error="$errors->get('resident_id')"/>

                                    <x-input-error :messages="$errors->get('resident_id')" class="mt-2"/>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="resident-email" :value="__('Resident Email')"/>

                                    <x-custom-text-input id="resident-email" name="resident_email"
                                                         type="email" placeholder="Email Address"
                                                         value="{{ old('resident_email') }}"
                                                         :error="$errors->get('resident_email')"/>

                                    <x-input-error :messages="$errors->get('resident_email')" class="mt-2"/>
                                </div>
                                <div class="col-md-5 mb-3 offset-md-1">
                                    <x-custom-input-label for="resident-nationality"
                                                          :value="__('Resident Nationality')"/>

                                    <x-custom-text-input id="resident-nationality" name="resident_nationality"
                                                         type="text" placeholder="Nationality"
                                                         value="{{ old('resident_nationality') }}"
                                                         :error="$errors->get('resident_nationality')"/>

                                    <x-input-error :messages="$errors->get('resident_nationality')" class="mt-2"/>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="row my-2">
                                <div class="col-md-5 mb-3">
                                    <x-checkbox-input id="terms-and-conditions" name="terms_and_conditions"
                                                      :error="$errors->get('terms_and_conditions')">

                                        <x-custom-input-label for="terms-and-conditions"
                                                              style="font-weight:400!important;"
                                                              :value="__('Accept Terms & Conditions')"/>
                                    </x-checkbox-input>

                                    <x-input-error :messages="$errors->get('terms_and_conditions')" class="mt-2"/>
                                </div>
                            </div>
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
