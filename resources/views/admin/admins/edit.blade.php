@extends('layout.admin')
@section('content')
    <div class="panel">
        <div class="mb-2 flex items-center justify-between">
            <h5 class="text-lg font-semibold dark:text-white-light">Edit Admin</h5>
            {{-- <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600" href="{{ route('admin.admins.admins_create') }}">
            <span class="flex items-center">
                Add
            </span>
        </a> --}}

        </div>
        <div class="mb-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
        <form action="{{ route('admin.admins.admins_update',$admin->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="name">Enter Name</label>
                    <input id="name" name="name" type="text" placeholder="Enter Name" value="{{ $admin->name }}" class="form-input" required />
                </div>
                <div>
                    <label for="email">Enter Email</label>
                    <input id="email" name="email" type="text" placeholder="Enter Email" value="{{ $admin->email }}" class="form-input" required/>
                </div>
                <div>
                    <label for="mobile_no">Enter Mobile Number</label>
                    <input id="mobile_no" name="mobile_no" type="text" placeholder="Enter Mobile_no" value="{{ $admin->mobile_no }}" class="form-input" required />
                </div>
                {{-- <div>
                    <label for="password">Enter Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter password" class="form-input" required />
                </div> --}}
            </div>
            <div class="grid grid-cols-4 gap-1">
                    <button type="submit" 
                        class="btn btn-orange !mt-6  border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                        Submit
                    </button>

                    <a type=""  href="{{ route('admin.admins.admins_index') }}"
                        class="btn btn-outline-orange !mt-6  border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                        Back
                    </a>

            </div>
        </form>

    </div>
@endsection
