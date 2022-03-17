<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Panel') }}
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
                            <li class="breadcrumb-item"><a href="{{ route('control.users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>

                    <form action="{{ route('control.users.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row row-cols-lg g-3">
                            <div class="form-group col-md-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group col-md-5 ">
                                <label for="role">Role</label><br/>
                                @foreach($roles as $role)
                                    <label><input type="checkbox" name="role[]" value="{{ $role->id }}"> {{ $role->name }}</label>
                                @endforeach
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Password">Confirm password</label>
                                <input type="password" name="password_confirmation" class="form-control">
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
