<x-app-layout>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Unit') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('unit.store') }}">
                        @csrf
                        @method('POST')
                        <x-errors-list/>

                        <fieldset>

                            <legend class="fw-bold">{{ __('Unit Details') }}</legend>
                            <hr class="separator mb-3">

                            <div class="row my-2">
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="unit-code" :value="__('Unit Code')"/>

                                    <x-custom-text-input id="unit-code" name="unit_code"
                                                         type="text" placeholder="ex: unit-1231"
                                                         value="{{ old('unit_code') }}"
                                                         :error="$errors->get('unit_code')"/>

                                    <x-input-error :messages="$errors->get('unit_code')" class="mt-2"/>
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
                                                      :error="$errors->get('sector')">
                                        @foreach($sectors as $sector)
                                            <option
                                                value="{{$sector->id}}" {{isSelected(old('sector'), $sector->id)}}>
                                                {{$sector->name}}
                                            </option>
                                        @endforeach
                                    </x-dropdown-input>

                                    <x-input-error :messages="$errors->get('sector')" class="mt-2"/>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="owner" :value="__('owner')"/>

                                    <x-dropdown-input id="owner" name="owner"
                                                      :value="__('Select Owner')"
                                                      :error="$errors->get('owner')">
                                        @foreach($owners as $owner)
                                            <option value="{{$owner->id}}" {{isSelected(old('owner'), $owner->id)}}>
                                                {{$owner->name}}
                                            </option>
                                        @endforeach
                                    </x-dropdown-input>

                                    <x-input-error :messages="$errors->get('owner')" class="mt-2"/>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="responsible" :value="__('Responsible')"/>

                                    <x-dropdown-input id="responsible" name="responsible"
                                                      :value="__('Select Responsible')"
                                                      :error="$errors->get('responsible')">
                                        @foreach($owners as $owner)
                                            <option value="{{$owner->id}}" {{isSelected(old('responsible'), $owner->id)}}>
                                                {{$owner->name}}
                                            </option>
                                        @endforeach
                                    </x-dropdown-input>

                                    <x-input-error :messages="$errors->get('responsible')" class="mt-2"/>
                                </div>
                                <div class="col-md-5 mb-3">
                                    <x-custom-input-label for="responsible-as" :value="__('Responsible As')"/>

                                    <x-dropdown-input id="responsible-as" name="responsible_as"
                                                      :value="__('Select Form')"
                                                      :error="$errors->get('responsible_as')">
                                        {{--@foreach($owners as $owner)
                                            <option value="{{$owner->id}}" {{isSelected(old('owner'), $owner->id)}}>
                                                {{$owner->name}}
                                            </option>
                                        @endforeach--}}
                                        @foreach($responsibility_forms as $form)
                                            <option value="{{$form}}" {{isSelected(old('responsible_as'), $form)}}>
                                                {{$form}}
                                            </option>
                                        @endforeach
                                    </x-dropdown-input>

                                    <x-input-error :messages="$errors->get('responsible_as')" class="mt-2"/>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="row mt-3">
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
