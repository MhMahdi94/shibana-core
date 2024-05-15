@extends('layout.admin')
@section('content')
    <div class="panel">

        <div class="flex items-center justify-between">
            <h5 class="text-lg font-semibold dark:text-white-light">Add Meal</h5>
            <a class="btn btn-outline-orange  border-0 uppercase " href="{{ route('admin.meals.meals_index') }}">
                <span class="flex items-center">
                    Back
                </span>
            </a>
        </div>
    </div>
    <div class="my-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>



    <form action="{{ route('admin.meals.meals_store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-2 gap-2">
            {{-- Meal Info --}}
            <div class="panel ">
                <div class="mb-2 flex items-center justify-between">
                    <h5 class="text-lg font-semibold dark:text-white-light">Meal Info</h5>
                </div>
                <div class="mb-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                <div class="grid grid-cols-1 gap-2">
                    <div>
                        <label for="name">Enter Name</label>
                        <input id="name" name="name" type="text" placeholder="Enter Name" class="form-input"
                            required />
                    </div>

                    <div class="">
                        <label for="restaurant_id">Select Restaurant</label>
                        <select id="restaurant-select" class="text-white-dark !bg-none"
                            name="restaurant_id">
                            @foreach ($restuarants as $restaurant)
                                <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="">
                        <label for="category_id">Select Category</label>
                        <select id="category-select"  class=" text-white-dark !bg-none"
                            name="category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            {{-- Meal Desc --}}
            <div class="panel">
                <div class="mb-2 flex items-center justify-between">
                    <h5 class="text-lg font-semibold dark:text-white-light">Description</h5>
                </div>
                <div class="mb-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                <div>
                    <label for="meal_description">Meal Description</label>
                    <textarea id="meal_description" name="description" rows="3" class="form-textarea" placeholder="Enter Meal Description" required></textarea>
                </div>
            </div>
        </div>




        <div class="my-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
        {{-- Image & Price --}}
        <div class="panel">
            <div class="mb-2 flex items-center justify-between">
                <h5 class="text-lg font-semibold dark:text-white-light">Resturant Image & Cover</h5>
            </div>
            <div class="mb-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
            <div class=" grid grid-cols-2 gap-4">
                <div>
                    <label for="meal_image">Meal Image</label>
                    <input id="meal_image" name="meal_image" type="file" class="form-input" />
                    {{-- <input class="custom-file-container" class="h-48" data-upload-id="resturant_image" name="resturant_image" ></input> --}}
                </div>
                <div>
                    <label for="price">Enter Price</label>
                    <input id="price" name="price" type="text" placeholder="Enter Price" class="form-input"
                        required />
                </div>
            </div>
        </div>
        <div class="my-5 h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>

        {{-- Variation --}}
        <div class="panel">
            <div class="flex items-center justify-between">
                <h5 class="text-lg font-semibold dark:text-white-light">Add Variation</h5>
                <button class="btn btn-outline-orange  border-0 uppercase " id="add_variation">
                    <span class="flex items-center">
                        Add Variation
                    </span>
                </button>
            </div>

            
        </div>
        <div class="" id="add_new_variation">

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
            NiceSelect.bind(document.getElementById("restaurant-select"), options);
            NiceSelect.bind(document.getElementById("category-select"), options);
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

    <script>
        i=-1;
        $('#add_variation').on('click', function(e) {
            e.preventDefault();
            i++;
            $("#add_new_variation").append(`
                <div class="panel mt-2">
                        <div class="flex items-center justify-between">
                            <h5 class="text-lg font-semibold dark:text-white-light">#Variation Details</h5>
                            <button class="btn btn-outline-orange  border-0 uppercase' onclick="delete_item()" >
                                <span class="flex items-center text-red-500">
                                    Delete
                                </span>
                            </button>
                        </div>
                        <div class="grid grid-cols-1 gap-2 mt-4">
                            <div>
                                <label for="variation_name">Enter Variation Name</label>
                                <input id="variation_name" name="variation_name[]" type="text" placeholder="Enter Variation Name" class="form-input"
                                    required />
                            </div>
                        </div>

                        <div class="flex items-center justify-between mt-4" >
                            <h5 class="text-lg font-semibold dark:text-white-light">#Options</h5>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mt-4">
                            <div>
                                <label for="option_name">Enter Option Name</label>
                                <input id="option_name" name="option_name[${i}][]" type="text" placeholder="Enter Option Name" class="form-input"
                                    required />
                            </div>
                            <div>
                                <label for="option_value">Enter Option Value</label>
                                <input id="option_value" name="option_value[${i}][]" type="text" placeholder="Enter Option Value" class="form-input"
                                    required />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mt-4">
                            <div>
                                <label for="option_name">Enter Option Name</label>
                                <input id="option_name" name="option_name[${i}][]" type="text" placeholder="Enter Option Name" class="form-input"
                                    required />
                            </div>
                            <div>
                                <label for="option_value">Enter Option Value</label>
                                <input id="option_value" name="option_value[${i}][]" type="text" placeholder="Enter Option Value" class="form-input"
                                    required />
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mt-4">
                            <div>
                                <label for="option_name">Enter Option Name</label>
                                <input id="option_name" name="option_name[${i}][]" type="text" placeholder="Enter Option Name" class="form-input"
                                    required />
                            </div>
                            <div>
                                <label for="option_value">Enter Option Value</label>
                                <input id="option_value" name="option_value[${i}][]" type="text" placeholder="Enter Option Value" class="form-input"
                                    required />
                            </div>
                        </div>
                    </div>
                
            `);
            //alert('clicked');
        });

        
    </script>

    <script>
        function delete_item(event){
            event.preventDefault();
alert('adsd');
        }
    </script>
@endsection
