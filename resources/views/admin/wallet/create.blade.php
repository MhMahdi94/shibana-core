@extends('layout.admin')
@section('content')
<div class="panel">

    <div class="flex items-center justify-between">
        <h5 class="text-lg font-semibold dark:text-white-light">Add Restaurant</h5>
        <a class="btn btn-outline-orange  border-0 uppercase "
                href="{{ route('admin.resturants.resturants_index') }}">
                <span class="flex items-center">
                    Back
                </span>
            </a>
    </div>
</div>
    <div class="my-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>



    <form action="{{ route('admin.resturants.resturants_store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="panel ">
            <div class="mb-2 flex items-center justify-between">
                <h5 class="text-lg font-semibold dark:text-white-light">Restaurant Info</h5>
            </div>
            <div class="mb-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label for="name">Enter Name</label>
                    <input id="name" name="name" type="text" placeholder="Enter Name" class="form-input"
                        required />
                </div>
                <div>
                    <label for="owner_name">Enter Owner Name</label>
                    <input id="owner_name" name="owner_name" type="text" placeholder="Enter Owner Name"
                        class="form-input" required />
                </div>
                <div>
                    <label for="email">Enter Email</label>
                    <input id="email" name="email" type="email" placeholder="Enter email" class="form-input"
                        required />
                </div>
                <div>
                    <label for="mobile_no">Enter Mobile No</label>
                    <input id="mobile_no" name="mobile_no" type="text" placeholder="Enter Mobile Number"
                        class="form-input" required />
                </div>
                <div>
                    <label for="address">Enter Address</label>
                    <input id="address" name="address" type="text" placeholder="Enter Address" class="form-input"
                        required />
                </div>
                <div class="">
                    <label for="cuisine_id">Select Cuisine</label>
                    <select id="seachable-select" name="cuisine_id">
                        @foreach ($cuisines as $cuisine)
                            <option value="{{ $cuisine->id }}">{{ $cuisine->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="longitude">Longitude</label>
                    <input id="longitude" name="longitude" type="text" placeholder="Longitude" class="form-input"
                        required />
                </div>
                <div>
                    <label for="latitude">Latitude</label>
                    <input id="latitude" name="latitude" type="text" placeholder="Latitude" class="form-input"
                        required />
                </div>
            </div>
        </div>
        <div class="my-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
        {{-- Image & Cover --}}
        <div class="panel">
            <div class="mb-2 flex items-center justify-between">
                <h5 class="text-lg font-semibold dark:text-white-light">Resturant Image & Cover</h5>
            </div>
            <div class="mb-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
            <div class=" grid grid-cols-2 gap-4">
                <div>
                    <label for="restuarant_image">Image</label>
                    <input id="restuarant_image" name="restuarant_image" type="file" class="form-input" />
                    {{-- <input class="custom-file-container" class="h-48" data-upload-id="resturant_image" name="resturant_image" ></input> --}}
                </div>
                <div>
                    <label for="restuarant_cover">Cover</label>
                    <input id="restuarant_cover" name="restuarant_cover" type="file" class="form-input" />

                    {{-- <input class="custom-file-container" data-upload-id="resturant_cover" name="resturant_cover"></input> --}}
                </div>
            </div>
        </div>
        <div class="my-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
        
        {{-- Account Details --}}
        <div class="panel">
            <div class="mb-2 flex items-center justify-between">
                <h5 class="text-lg font-semibold dark:text-white-light">Account Details</h5>
            </div>
            <div class="mb-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
            <div class=" grid grid-cols-2 gap-4">
                <div>
                    <label for="username">Enter Username</label>
                    <input id="username" name="username" type="text" placeholder="Enter Username" class="form-input"
                        required />
                </div>
                <div>
                    <label for="password">Enter Password</label>
                    <input id="password" name="password" type="password" placeholder="Enter Password" class="form-input"
                        required />
                </div>
            </div>
        </div>
        <div class="my-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
        <div class="grid grid-cols-4 gap-1">
            <button type="submit"
                class="btn btn-orange !mt-6  border-0 uppercase shadow-[0_10px_20px_-10px_rgba(67,97,238,0.44)]">
                Submit
            </button>
            <a class="btn btn-outline-orange !mt-6  border-0 uppercase "
                href="{{ route('admin.resturants.resturants_index') }}">
                <span class="flex items-center">
                    Close
                </span>
            </a>
        </div>
    </form>

    {{-- </div> --}}

    <!-- script -->
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
    <script src="{{ asset('assets/js/file-upload-with-preview.iife.js') }}"></script>
    <script>
        new FileUploadWithPreview.FileUploadWithPreview('resturant_image', {
            images: {
                baseImage: '{{ asset('assets/images/file-preview.png') }}',
                backgroundImage: '',
            },

        });
        new FileUploadWithPreview.FileUploadWithPreview('resturant_cover', {
            images: {
                baseImage: '{{ asset('assets/images/file-preview.png') }}',
                backgroundImage: '',
            },
        });
    </script>
@endsection
