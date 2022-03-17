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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('control.users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>

                    <form action="{{ route('control.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                        <div class="row row-cols-lg g-3">
                            <div class="form-group col-md-3">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlInput1">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="form-group col-md-5 ">
                                <label for="role">Role</label><br/>
                                @foreach($roles as $role)
                                    <label><input type="checkbox" name="role[]" {{ ($user->hasAnyRole($role->name)) ? 'checked' : '' }} value="{{ $role->id }}"> {{ $role->name }}</label>
                                @endforeach
                            </div>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-outline-success">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
