<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Units') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:flex md:items-center md:justify-between mb-5 mx-1">
                <div
                    class="inline-flex overflow-hidden shadow-md bg-white border divide-x rounded-lg rtl:flex-row-reverse">
                    <a href="{{route('unit.index')}}">
                        <button
                            class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm hover:bg-gray-100
                            {{request()->is('unit') ? 'bg-indigo-200' : ''}}">
                            {{ __("View All") }}
                        </button>
                    </a>
                    @foreach($sectors as $sector)
                        @if($loop->index == 5)
                            @break
                        @endif
                        <a href="{{route('indexBySector', $sector->id)}}">
                            <button
                                class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm hover:bg-gray-100
                            {{request()->is('units/' . $sector->id) ? 'bg-indigo-200' : ''}}">
                                {{ $sector->name }}
                            </button>
                        </a>
                    @endforeach
                </div>

                <div class="relative flex items-center shadow-md mt-4 md:mt-0">
                    <span class="absolute">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                             stroke="currentColor" class="w-5 h-5 mx-3 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                        </svg>
                    </span>

                    <input type="text" placeholder="Search"
                           class="block w-full py-1.5 pr-5 text-gray-700 bg-white border border-gray-200 rounded-lg md:w-80 placeholder-gray-400/70 pl-11 rtl:pr-11 rtl:pl-5 focus:border-blue-400 focus:ring-blue-300 focus:outline-none focus:ring focus:ring-opacity-40">
                </div>
            </div>
            <!-- component -->
            <div class=" overflow-y-hidden w-auto rounded-lg border border-gray-200 shadow-md my-5 mx-1">
                <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                    <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="pl-6 py-4 font-medium text-gray-900">{{__('#')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Code')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Owner')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Sector')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Responsible')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">{{__('Responsible As')}}</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                    @foreach($units as $unit)
                        <tr class="hover:bg-gray-50">
                            <th class=" pl-6 py-4 font-normal text-gray-900">
                                {{$unit->id}}
                            </th>
                            <td class="px-6 py-4 whitespace-nowrap	">
                                {{$unit->code}}
                            </td>
                            <td class="px-6 py-4 font-normal text-gray-900">
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">{{$unit->owner_name}}</div>
                                    <div class="text-gray-400">{{$unit->owner_mail}}</div>
                                </div>
                            </td>
                            <td class="px-6 py-4 ">
                                <span
                                    class="inline-flex items-center text-center gap-1 rounded-full bg-blue-50 px-2 py-1 text-xs font-semibold text-blue-600">
                                {{$unit->sector_name}}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-normal text-gray-900">
                                <div class="text-sm">
                                    <div class="font-medium text-gray-700">{{$unit->responsible_name}}</div>
                                    <div class="text-gray-400">{{$unit->responsible_mail}}</div>
                                </div>
                            </td>
                            <td class="py-4 px-6 text-sm font-medium text-gray-900">
                                <span
                                    class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2.5 py-1 text-xs font-semibold text-green-600">
                                    {{$unit->responsible_as}}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-4">
                                    <a href="{{route('unit.show', $unit->id)}}">
                                        <svg fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </a>
                                    <a href="{{route('unit.edit', $unit->id)}}">
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
                <!-- Pagination -->
                <div class="p-1 ">{{ $units->links() }}  </div>
            </div>
        </div>
    </div>
</x-app-layout>
