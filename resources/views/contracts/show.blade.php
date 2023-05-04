<x-app-layout>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contract') }}  {{'#' . $contract->id}}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <fieldset>

                        <legend class="fw-bold">{{ __('Contract Details') }}</legend>
                        <hr class="separator mb-3">

                        <div class="row my-2">
                            <div class="col-md-5 mb-3">
                                <x-custom-input-label for="entry-date" :value="__('Entry Date')"/>

                                <x-date-input id="entry-date" name="entry_date"
                                              value="{{ $contract->entry_date }}"
                                              disabled="true"/>
                            </div>
                            <div class="col-md-5 mb-3 offset-md-1">
                                <x-custom-input-label for="leaving-date" :value="__('Leaving Date')"/>

                                <x-date-input id="leaving-date" name="leaving_date"
                                              value="{{ $contract->leaving_date }}"
                                              disabled="true"/>
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
                                                  disabled="true">
                                    <option value="{{$contract->unit->id}}" selected>
                                        {{$contract->unit->code}}
                                    </option>
                                </x-dropdown-input>
                            </div>
                            <div class="col-md-5 mb-3 offset-md-1">
                                <x-custom-input-label for="rental-fees" :value="__('Rental Fees')"/>

                                <x-custom-text-input id="rental-fees" name="rental_fees"
                                                     type="number" placeholder="In SAR"
                                                     value="{{ $contract->rental_fees }}"
                                                     disabled="true"/>
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
                                                     value="{{ $contract->resident_name }}"
                                                     disabled="true"/>
                            </div>
                            <div class="col-md-5 mb-3 offset-md-1">
                                <x-custom-input-label for="resident-id" :value="__('Resident ID')"/>

                                <x-custom-text-input id="resident-id" name="resident_id"
                                                     type="text" placeholder="Id Number"
                                                     value="{{ $contract->resident_id_number }}"
                                                     disabled="true"/>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-md-5 mb-3">
                                <x-custom-input-label for="resident-email" :value="__('Resident Email')"/>

                                <x-custom-text-input id="resident-email" name="resident_email"
                                                     type="email" placeholder="Email Address"
                                                     value="{{ $contract->resident_email }}"
                                                     disabled="true"/>
                            </div>
                            <div class="col-md-5 mb-3 offset-md-1">
                                <x-custom-input-label for="resident-nationality"
                                                      :value="__('Resident Nationality')"/>

                                <x-custom-text-input id="resident-nationality" name="resident_nationality"
                                                     type="text" placeholder="Nationality"
                                                     value="{{ $contract->resident_nationality }}"
                                                     disabled="true"/>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
