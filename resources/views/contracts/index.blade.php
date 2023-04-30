<x-app-layout>
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Contract') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="row flex justify-content-around mx-5 ">
            <div
                class=" col-5 col-md-2 flex justify-center items-center mb-md-4 mb-2 bg-white pointer overflow-hidden h-16 shadow-md  ">
                <b>{{$statuses->confirmed}}</b> {{ __(". Confirmed")}}
            </div>
            <div
                class=" col-5 col-md-2 flex justify-center items-center mb-md-4 mb-2  bg-white hover:bg-gray-50 pointer overflow-hidden h-16 shadow-md">
                On {{ __('Hold # ')}}
            </div>
            <div
                class=" col-5 col-md-2 flex justify-center items-center mb-md-4 mb-2  bg-white hover:bg-gray-50 pointer overflow-hidden h-16 shadow-md">
                {{ __('Payment # ')}}
            </div>
            <div
                class=" col-5 col-md-2 flex justify-center items-center mb-md-4 mb-2  bg-white hover:bg-gray-50 pointer overflow-hidden h-16 shadow-md">
                {{ __('Payment # ')}}
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table id="contracts" class="table table-striped table-auto table-striped-bg-default mt-3">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Unit') }}</th>
                            <th scope="col">{{ __('Owner') }}</th>
                            <th scope="col">{{ __('Entry Data') }}</th>
                            <th scope="col">{{ __('Leave Data') }}</th>
                            <th scope="col">{{ __('Fees') }}</th>
                            <th scope="col">{{ __('Status')}}</th>
                            <th scope="col">{{ __('Created at')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contracts as $contract)
                            <tr>
                                <td>{{$contract->id}}</td>
                                <td>{{$contract->unit_code}}</td>
                                <td>{{$contract->owner_name}}</td>
                                <td>{{$contract->entry_date}}</td>
                                <td>{{$contract->leaving_date}}</td>
                                <td>{{$contract->rental_fees}}</td>
                                <td>{{$contract->status}}</td>
                                <td>{{$contract->created_at->diffForHumans()}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
