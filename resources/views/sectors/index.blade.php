<x-app-layout>
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Sectors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(!$sectors->isEmpty())
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <table id="sectors" class="table table-striped table-striped-bg-default mt-3">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Code')}}</th>
                                <th scope="col">{{ __('Registration')}}</th>
                                <th scope="col">{{ __('Fees')}}</th>
                                <th scope="col">{{ __('Manager Name')}}</th>
                                <th scope="col">{{ __('Manager Email')}}</th>
                                <th scope="col">{{ __('Manager Phone')}}</th>
                                <th scope="col">{{ __('Manager Id')}}</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sectors as $sector)
                                <tr>
                                    <td>{{$sector->id}}</td>
                                    <td>{{$sector->name}}</td>
                                    <td>{{$sector->code}}</td>
                                    <td>{{$sector->registration_number}}</td>
                                    <td>{{$sector->fees}}</td>
                                    <td>{{$sector->manager_name}}</td>
                                    <td>{{$sector->manager_email}}</td>
                                    <td>{{$sector->manager_phone}}</td>
                                    <td>{{$sector->manager_id}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @else
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <p class="text-lg ">There is no Data to show !</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

</x-app-layout>
