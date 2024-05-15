@extends('layout.admin')
@section('content')
    <div class="panel">
        <div class="mb-2 flex items-center justify-between">
            <h5 class="text-lg font-semibold dark:text-white-light">Edit Addon</h5>
            {{-- <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600" href="{{ route('admin.admins.admins_create') }}">
            <span class="flex items-center">
                Add
            </span>
        </a> --}}

        </div>
        <div class="mb-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
        <form action="{{ route('admin.addons.addons_update',$addon->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label for="name">Enter Name</label>
                    <input id="name" name="name" type="text" placeholder="Enter Name" value="{{ $addon->name }}" class="form-input"
                        required />
                </div>
                <div>
                    <label for="price">Price</label>
                    <input id="price" name="price" type="text"  class="form-input" placeholder="10$" value="{{ $addon->price }}"
                    required />
                </div>
                <div class="">
                    <label for="restuarant_id">Select Restuarant</label>
                    <select id="seachable-select" name="restuarant_id">
                        @foreach ($restuarants as $restuarant)
                            <option value="{{ $restuarant->id }}" {{ $addon->restuarant_id == $restuarant->id? 'selected':'' }}>{{ $restuarant->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-4 gap-1">
                    <button type="submit" 
                        class="btn btn-orange !mt-6  border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                        Submit
                    </button>

                    <a type=""  href="{{ route('admin.addons.addons_index') }}"
                        class="btn btn-outline-orange !mt-6  border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                        Back
                    </a>

            </div>
        </form>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function(e) {
            // seachable 
            var options = {
                searchable: true
            };
            NiceSelect.bind(document.getElementById("seachable-select"), options);
        });
    </script>
    <script src="{{ asset('assets/js/nice-select2.js') }}"></script>
@endsection
