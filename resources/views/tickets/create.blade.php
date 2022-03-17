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
                            <li class="breadcrumb-item active" aria-current="page">{{ __('Create') }}</li>
                        </ol>
                    </nav>

                    <form action="{{ route('tickets.store') }}" method="POST">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="topic">{{ __('Topic') }}</label>
                            <input name="topic" type="text" class="form-control" aria-describedby="topic">
                        </div>
                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea name="description" type="text" class="form-control" aria-describedby="description" rows="5"></textarea>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-outline-primary">Send</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
