<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
{{--            {{ __('All Contracts') }}--}}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between mb-5 mx-1">
                <div
                    class="inline-flex overflow-hidden shadow-md bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
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
                        <th scope="col" class="pl-6 py-4 font-medium text-gray-900">{{__('#')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Name')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Code')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Registration')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Fees')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Manager Name')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Manager Phone')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Manager Id')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach($sectors as $sector)
                        <tr class="hover:bg-gray-50">
                            <th class=" pl-6 py-4 font-normal text-gray-900">
                                {{$sector->id}}
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap	">
                                {{$sector->name}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap	">
                                {{$sector->code}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap	">
                                {{$sector->registration_number}}
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-white">
                            <span
                                class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600">
                                {{__("SR")}}{{$sector->fees}}
                            </span>
                            </td>
                            <td class="px-6 py-4 font-normal text-gray-900">
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">{{$sector->manager_name}}</div>
                                    <div class="text-gray-400">{{$sector->manager_email}}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                {{$sector->manager_phone}}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                <span
                                    class="inline-flex items-center text-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                    {{$sector->manager_id}}
                                </span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <a href="{{route('sector.show', $sector->id)}}">
                                        <svg fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </a>
                                    <a href="{{route('sector.edit', $sector->id)}}">
                                        <svg fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
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
