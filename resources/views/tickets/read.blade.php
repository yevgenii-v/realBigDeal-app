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
                            <li class="breadcrumb-item"><a href="{{ route('tickets.index') }}">{{ __('Tickets') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Reply') }}</li>
                        </ol>
                    </nav>

                    <div class="alert alert-primary" style="width:fit-content" role="alert">
                        <label for="topic">Topic: </label>
                        <strong>{{ $ticket->topic }}</strong>
                        <br>
                        <label for="description">Description: </label>
                        <strong>{{ $ticket->description }}</strong>
                        <br><br>
                        {{ $ticket->created_at }}
                    </div><br>

                    @foreach($conversation as $ask)
                        <div class="alert alert-primary
                        @if($ask->user_id == auth()->user()->id)
                            float-end
                        @else
                            float-start
                        @endif"
                             role="alert">
                            <strong>{{ $ask->user->name}}:</strong>
                            {{ $ask->message }}
                            <br><br>
                            {{ $ask->created_at }}
                        </div><br><br><br><br><br><br><br><br>
                    @endforeach

                    @if($ticket->status_id === \App\Models\TicketStatus::IN_PROGRESS)
                        <form action="{{ route('tickets.postReply') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input name="ticket_id" type="hidden" value="{{ $ticket->id }}">
                                <textarea name="message" type="text" class="form-control" placeholder="Write a message..." ></textarea>
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Send</button>
                            </div>
                        </form>
                    @else
                        <h3>Ticket Status: {{ $ticket->status->name }}</h3>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
