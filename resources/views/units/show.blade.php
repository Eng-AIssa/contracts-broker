<x-app-layout>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Unit Information') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <fieldset>

                        <legend class="fw-bold">{{ __('Unit Details') }}</legend>
                        <hr class="separator mb-3">

                        <div class="row my-2">
                            <div class="col-md-5 mb-3">
                                <x-custom-input-label for="unit-code" :value="__('Unit Code')"/>

                                <x-custom-text-input id="unit-code" name="unit_code"
                                                     type="text" placeholder="ex: unit-1231"
                                                     value="{{ $unit->code }}"
                                                     disabled="true"/>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="mt-4">

                        <legend class="fw-bold">{{ __('Unit Ownership') }}</legend>
                        <hr class="separator mb-3"/>

                        <div class="row my-2">
                            <div class="col-md-5 mb-3">
                                <x-custom-input-label for="unit-code" :value="__('Sector')"/>

                                <x-dropdown-input id="sector" name="sector"
                                                  :value="__('Select Sector')"
                                                  disabled="true">
                                    <option value="{{$unit->sector->id}}" selected>
                                        {{$unit->sector->name}}
                                    </option>
                                </x-dropdown-input>
                            </div>
                            <div class="col-md-5 mb-3">
                                <x-custom-input-label for="owner" :value="__('owner')"/>

                                <x-dropdown-input id="owner" name="owner"
                                                  :value="__('Select Owner')"
                                                  disabled="true">
                                    <option value="{{$unit->owner->id}}" selected>
                                        {{$unit->owner->name}}
                                    </option>
                                </x-dropdown-input>
                            </div>
                        </div>

                        <div class="row my-2">
                            <div class="col-md-5 mb-3">
                                <x-custom-input-label for="responsible" :value="__('Responsible')"/>

                                <x-dropdown-input id="responsible" name="responsible"
                                                  :value="__('Select Responsible')"
                                                  disabled="true">
                                    <option value="{{$unit->responsible->id}}" selected>
                                        {{$unit->responsible->name}}
                                    </option>
                                </x-dropdown-input>
                            </div>
                            <div class="col-md-5 mb-3">
                                <x-custom-input-label for="responsible-as" :value="__('Responsible As')"/>

                                <x-dropdown-input id="responsible-as" name="responsible_as"
                                                  :value="__('Select Form')"
                                                  disabled="true">
                                    <option value="{{$unit->responsible_as}}" selected>
                                        {{$unit->responsible_as}}
                                    </option>
                                </x-dropdown-input>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
