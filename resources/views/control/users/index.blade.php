<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Control Panel') }}
            </h2>
            <x-nav-link :href="route('control.users.index')" :active="request()->routeIs('control.users.*')">
                {{ __('Users') }}
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
                            <li class="breadcrumb-item active" aria-current="Users">Users</li>
                        </ol>
                    </nav>

                    <form action="{{ route('control.users.destroyAll') }}" method="POST">
                    @csrf
                    <table class="table">
                        <thead>
                        <tr>
                            @can('deleteAll', \App\Models\User::all())
                                <th scope="col"><input type="checkbox" class="selectAll"></th>
                            @endcan
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col" class="text-center">Impersonate</th>
                            @can('create', \App\Models\User::class)
                                <th scope="col" class="text-center">
                                    <a href="{{ route('control.users.create') }}">
                                        <button type="button" class="btn btn-outline-primary btn-sm">New Profile</button>
                                    </a>
                                </th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($paginateUsers as $user)
                            <tr>
                                @can('deleteAll', $paginateUsers)
                                <td>
                                    @if($user->id != 1 && $user->id != \Illuminate\Support\Facades\Auth::user()->id)
                                        <input type="checkbox" name="checkedUser[]" value="{{ $user->id }}">
                                    @endif
                                </td>
                                @endcan
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ Str::mask($user->email, '*', 4, -6) }}</td>
                                <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td class="text-center">
                                    @if(!$user->roles->containsStrict('id', \App\Models\Role::IS_ADMIN) && !session()->has('impersonate'))
                                        <a href="{{ route('control.impersonate', $user->id) }}">
                                            <button type="button" class="btn btn-outline-success btn-sm">Login As</button>
                                        </a>
                                    @else
                                        <button type="button" class="btn btn-outline-success btn-sm disabled">Login As</button>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @can('update', \App\Models\User::class)
                                        @if($user->id == 1)
                                            <button type="button" class="btn btn-outline-primary btn-sm disabled">Edit Profile</button>
                                        @else
                                            <a href="{{ route('control.users.edit', $user->id) }}">
                                                <button type="button" class="btn btn-outline-primary btn-sm">Edit Profile</button>
                                            </a>
                                        @endif
                                    @endcan

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="container">
                        {{ $paginateUsers->links() }}
                    </div>
                    <br/>
                    @can('deleteAll', \App\Models\User::all())
                        <button type="submit" class="deleteAllBtn btn btn-outline-danger disabled">Delete</button>
                    @endcan
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', 'input[class="selectAll"]', function (){
            if(this.checked){
                $('input[name="checkedUser[]"]').each(function (){
                    this.checked = true;
                });
            }else{
                $('input[name="checkedUser[]"]').each(function(){
                    this.checked = false;
                });
            }

            deleteAllBtn();
        });

        $(document).on('change', 'input[name="checkedUser[]"]', function (){
            if( $('input[name="checkedUser[]"]').length === $('input[name="checkedUser[]"]:checked').length ) {
                $('input[class="selectAll"]').prop('checked', true);
            }else{
                $('input[class="selectAll"]').prop('checked', false);
            }

            deleteAllBtn();
        });

        function deleteAllBtn() {
            if ( $('input[name="checkedUser[]"]:checked').length > 0 ){
                $('button.deleteAllBtn').text('Delete ('+$('input[name="checkedUser[]"]:checked').length+')')
                    .removeClass('disabled')
            }else{
                $('button.deleteAllBtn').text('Delete').addClass('disabled');
            }
        }
    </script>
</x-app-layout>
