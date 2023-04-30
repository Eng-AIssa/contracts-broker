<x-app-layout>
    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Owners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table id="owners" class="table table-striped table-striped-bg-default mt-3">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('Name') }}</th>
                            <th scope="col">{{ __('Id Number')}}</th>
                            <th scope="col">{{ __('Email')}}</th>
                            <th scope="col">{{ __('Phone')}}</th>
                            <th scope="col">{{ __('Last Contract')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($owners as $owner)
                            <tr>
                                <td>{{$owner->id}}</td>
                                <td>{{$owner->userable->id_number}}</td>
                                <td>{{$owner->name}}</td>
                                <td>{{$owner->email}}</td>
                                <td>{{$owner->userable->phone}}</td>
                                {{--<td>{{$owner->lastContract?->id}}</td>--}}
                                <td>{{$owner->last_contract_id ?? "don't have any"}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
