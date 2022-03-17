<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tickets') }}
            </h2>
            <x-nav-link :href="route('tickets.index')" :active="request()->routeIs('tickets.*')">
                {{ __('Tickets') }}
            </x-nav-link>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('partials.alerts')
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="Users">Ticket</li>
                        </ol>
                    </nav>

                    <form action="{{ route('tickets.update', $getTicket->id) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <select name="status_id" class="status">
                            @foreach($ticketStatus as $status)
                                <option value="{{ $status->id }}"
                                    {{ $getTicket->status_id === $status->id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>

                        <button class="btn btn-outline-success" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
