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
                            <li class="breadcrumb-item active" aria-current="Users">Tickets</li>
                        </ol>
                    </nav>

                    <form action="{{ route('tickets.destroyAll') }}" method="POST">
                    @csrf
                    @method('POST')
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"><input type="checkbox" class="selectAll"></th>
                                @if(auth()->user()->hasAnyRole('Administrator') ||
                                    auth()->user()->hasAnyRole('Support'))
                                <th scope="col">ID</th>
                                <th scope="col">Requested by</th>
                                @endif
                                <th scope="col">Topic</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col" class="text-center">
                                    @if(auth()->user()->hasAnyRole('Customer') ||
                                        auth()->user()->hasAnyRole('Manager'))
                                        <a href="{{ route('tickets.create') }}">
                                            <button type="button" class="btn btn-outline-primary btn-sm">New Ticket</button>
                                        </a>
                                    @endif
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(auth()->user()->hasAnyRole('Administrator') ||
                                auth()->user()->hasAnyRole('Support'))
                                @foreach($ticketList as $ticket)
                                    <tr>
                                        <td>
                                            <input type="checkbox"
                                                   name="checkedTicket[]"
                                                   value="{{ $ticket->id }}">
                                        </td>
                                        <td>{{ $ticket->id }}</td>
                                        <td>{{ $ticket->user->name }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($ticket->topic, 20) }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($ticket->description, 40) }}</td>

                                        <td>
                                            <select name="status_id" class="status" data-ticket-id="{{ $ticket->id }}">
                                                @foreach($ticketStatus as $status)
                                                    <option value="{{ $status->id }}"
                                                        {{ $ticket->status_id === $status->id ? 'selected' : '' }}>
                                                        {{ $status->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <a href="{{ route('tickets.read', $ticket->id) }}">
                                                <button type="button" class="btn btn-outline-primary btn-sm">Reply</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif

                            @foreach($getOwnTickets as $ticket)
                                <tr>
                                    <td>
                                        <input type="checkbox"
                                               name="checkedTicket[]"
                                               value="{{ $ticket->id }}">
                                    </td>
                                    <td>{{ \Illuminate\Support\Str::limit($ticket->topic, 25) }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($ticket->description, 40) }}</td>
                                    @if($ticket->status->name == 'In Progress')
                                        <td class="text-danger">{{ $ticket->status->name }}</td>
                                    @else
                                        <td class="text-success">{{ $ticket->status->name }}</td>
                                    @endif

                                    <td class="text-center">
                                        <a href="{{ route('tickets.read', $ticket->id) }}">
                                            <button type="button" class="btn btn-outline-primary btn-sm">Reply</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>

                        <div class="container">
                            {{ $ticketList->links() }}
                        </div>
                        <br/>
                            <button type="submit" class="deleteAllBtn btn btn-outline-danger disabled">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>

        $(document).on('click', 'input[class="selectAll"]', function (){
            if(this.checked){
                $('input[name="checkedTicket[]"]').each(function (){
                    this.checked = true;
                });
            }else{
                $('input[name="checkedTicket[]"]').each(function(){
                    this.checked = false;
                });
            }

            deleteAllBtn();
        });

        $(document).on('change', 'input[name="checkedTicket[]"]', function (){
            if( $('input[name="checkedTicket[]"]').length === $('input[name="checkedTicket[]"]:checked').length ) {
                $('input[class="selectAll"]').prop('checked', true);
            }else{
                $('input[class="selectAll"]').prop('checked', false);
            }

            deleteAllBtn();
        });

        function deleteAllBtn() {
            if ( $('input[name="checkedTicket[]"]:checked').length > 0 ){
                $('button.deleteAllBtn').text('Delete ('+$('input[name="checkedTicket[]"]:checked').length+')')
                    .removeClass('disabled')
            }else{
                $('button.deleteAllBtn').text('Delete').addClass('disabled');
            }
        }

        $(document).on('change', '.status', function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let id = $(this).attr('data-ticket-id');
            let url = '{{ route('tickets.update', ':id') }}';
            url = url.replace(':id', id);
            let status_id = $(this).val();

            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    'status_id': status_id,
                    _method: 'PATCH',
                },

                success: function(){
                },
                error: function(){
                    console.log('Data was not changed.');
                },

            })
        })

    </script>
</x-app-layout>
