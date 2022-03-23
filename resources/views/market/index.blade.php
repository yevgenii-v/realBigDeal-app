<x-app-layout>
    <x-slot name="header">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Market') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" style="display: flex">
                    <div class="col-lg-3" style="border: 1px solid #8182F8; margin-right: 15px;">
                        <div class="allCategories">
                            <div style="background:#8182F8;
                                        color: #ffffff;
                                        padding: 10px 25px 10px 40px;
                                        position: relative;
                                        cursor: pointer;"
                                        class="categories">
                                <i class="fa fa-bars" style="margin-right: 10px"></i>
                                <span>All Categories</span>
                            </div>
                            <ul class="nav flex-column" >
                                <li class="nav-item">
                                    @foreach($categories as $category)
                                        <a class="nav-link" style="color: #6b7280;" href="#">{{ $category->title }}</a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="input-group mb-3" style="display: flex">
                        <div class="input-group mb-3" style="align-items: start; margin-left: 15px; margin-right: 5px;">
                            <input type="text" class="form-control">
                            <button type="button" style="background: #8182F8;
                                                     color: #ffffff;
                                                     height: 42px;
                                                     width: 80px;">
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
