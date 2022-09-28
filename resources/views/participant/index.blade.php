<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Participants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="bg-white relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="flex justify-between items-center">
                        <form class="m-4" method="GET" action="{{ route('participant.index') }}">
                            <div class="flex">
                                <div class="relative w-full">
                                    <select class="w-56 rounded-lg py-2 w-full z-20 text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="event_filter" name="event_filter">
                                        <option value="" selected>All Events</option>
                                        @foreach( $events as $event )
                                        <option value="{{ $event->id }}" @if (request()->input('event_filter')==$event->id) selected @endif>{{ $event->name }}</option>
                                        @endforeach
                                    </select>
                                    <select class="w-56 rounded-lg py-2 w-full z-20 text-sm text-gray-900 bg-gray-50 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" id="school_filter" name="school_filter">
                                        <option value="" selected>All Schools</option>
                                        @foreach( $schools as $school )
                                        <option value="{{ $school->user->id }}" @if (request()->input('school_filter')==$school->user->id) selected @endif>{{ $school->user->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-jet-button class="inline-flex">
                                        {{ __('Filter') }}
                                    </x-jet-button>
                                </div>
                            </div>
                        </form>
                        <form class="m-4" method="GET" action="{{ route('participant.index') }}">
                            <div class="flex w-56">
                                <div class="relative w-full">
                                    <input name="search" class="inline-flex rounded-lg py-2 w-full z-20 text-sm text-gray-900 bg-gray-50  border border-gray-300 focus:ring-blue-500 focus:border-blue-500" type="search" value="{{ request()->input('search') }}" placeholder="Search..." required />
                                    <x-jet-button class="absolute top-0 right-0">
                                        <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                        <span class="sr-only">Search</span>
                                    </x-jet-button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Name') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Section') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('Event') }}
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    {{ __('School') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($participants as $participant)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $participant->name }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $participant->event->section->name }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $participant->event->name }}
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $participant->user->name }}
                                </td>
                            </tr>
                            @empty
                            <tr class="bg-white border-b">
                                <td colspan="2" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ __('No Events Found') }}
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="px-6 py-4">
                        {{ $participants->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>