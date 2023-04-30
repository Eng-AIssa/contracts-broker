<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Owners') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between mb-5 mx-1">
                <div
                    class="inline-flex overflow-hidden bg-white shadow-md border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
                    <button
                        class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-indigo-200 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
                        {{ __("Sector 1") }}
                    </button>

                    <button
                        class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                        {{ __("Sector 2") }}
                    </button>

                    <button
                        class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                        {{ __("Sector 3") }}
                    </button>
                </div>

                <div class="relative flex items-center shadow-md mt-4 md:mt-0">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400 dark:text-gray-600">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                        </svg>
                    </span>

                    <input type="text" placeholder="Search"
                           class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-600 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                </div>
            </div>
            <!-- component -->
            <div class=" overflow-y-hidden w-auto rounded-lg border border-gray-200 shadow-md my-5 mx-1">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="pl-6 py-4 font-medium text-gray-900">#</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Name')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Id Number')}}</th>
                        {{--<th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Email')}}</th>--}}
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Phone')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Units')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Last Contract')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach($owners as $owner)
                        <tr class="hover:bg-gray-50">
                            <th class=" pl-6 py-4 font-normal text-gray-900">
                                {{$owner->id}}
                            </th>
                            <td class="px-6 py-4 font-normal text-gray-900">
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">{{$owner->name}}</div>
                                    <div class="text-gray-400">{{$owner->email}}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap	">
                                {{$owner->id_number}}
                            </td>
                            {{--<td class="px-6 py-4 ">
                                {{$owner->email}}
                            </td>--}}
                            <td class="px-6 py-4 ">
                                {{$owner->phone}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    @foreach($owner->units as $unit)
                                        <span
                                            class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600">
                                        {{$unit->code}}
                                    </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <span
                                        class="inline-flex items-center text-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                        {{$owner->last_contract_id ?? "don't have any"}}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <a x-data="{ tooltip: 'Delete' }" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke-width="1.5"
                                             stroke="currentColor"
                                             class="h-6 w-6"
                                             x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                        </svg>
                                    </a>
                                    <a x-data="{ tooltip: 'Edite' }" href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5"
                                             stroke="currentColor"
                                             class="h-6 w-6"
                                             x-tooltip="tooltip">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
