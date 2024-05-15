@extends('layout.admin')
@section('content')
    <div class="panel">
        <div class="mb-5 flex items-center justify-between">
            <h5 class="text-lg font-semibold dark:text-white-light">Cuisines Table</h5>
            <a class="font-semibold hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-600"
                href="{{ route('admin.cuisines.cuisines_create') }}">
                <span class="flex items-center">
                    Add Cuisine
                </span>
            </a>
        </div>
        
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        {{-- <th>Email</th>
                        <th class="text-center">Status</th> --}}
                        <th class="text-center">Action </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <template x-for="data in {{ $admins }}" :key="data.id" > --}}
                    @foreach ($cuisines as $cuisine)
                        <tr>
                            <td class="whitespace-nowrap">{{ $cuisine->name }}
                            <input type="hidden" name="id" class="id" value="{{ $cuisine->id }}"> 
                        </td>
                            <td>
                                <img src="{{ url('uploads/'.$cuisine->image) }}" width="200" height="200" alt="" title="">
                               </td>
                            
                           
                            <td class="text-center">
                                {{-- <button type="button" x-tooltip="Show">
                                        <svg
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2"
                                        >
                                        <g opacity="0.5">
                                            <path d="M14 2.75C15.9068 2.75 17.2615 2.75159 18.2892 2.88976C19.2952 3.02503 19.8749 3.27869 20.2981 3.7019C20.7852 4.18904 20.9973 4.56666 21.1147 5.23984C21.2471 5.9986 21.25 7.08092 21.25 9C21.25 9.41422 21.5858 9.75 22 9.75C22.4142 9.75 22.75 9.41422 22.75 9L22.75 8.90369C22.7501 7.1045 22.7501 5.88571 22.5924 4.98199C22.417 3.97665 22.0432 3.32568 21.3588 2.64124C20.6104 1.89288 19.6615 1.56076 18.489 1.40314C17.3498 1.24997 15.8942 1.24998 14.0564 1.25H14C13.5858 1.25 13.25 1.58579 13.25 2C13.25 2.41421 13.5858 2.75 14 2.75Z" fill="#1C274C"/>
                                            <path d="M2.00001 14.25C2.41422 14.25 2.75001 14.5858 2.75001 15C2.75001 16.9191 2.75289 18.0014 2.88529 18.7602C3.00275 19.4333 3.21477 19.811 3.70191 20.2981C4.12512 20.7213 4.70476 20.975 5.71085 21.1102C6.73852 21.2484 8.09318 21.25 10 21.25C10.4142 21.25 10.75 21.5858 10.75 22C10.75 22.4142 10.4142 22.75 10 22.75H9.94359C8.10583 22.75 6.6502 22.75 5.51098 22.5969C4.33856 22.4392 3.38961 22.1071 2.64125 21.3588C1.95681 20.6743 1.58304 20.0233 1.40762 19.018C1.24992 18.1143 1.24995 16.8955 1.25 15.0964L1.25001 15C1.25001 14.5858 1.58579 14.25 2.00001 14.25Z" fill="#1C274C"/>
                                            <path d="M22 14.25C22.4142 14.25 22.75 14.5858 22.75 15L22.75 15.0963C22.7501 16.8955 22.7501 18.1143 22.5924 19.018C22.417 20.0233 22.0432 20.6743 21.3588 21.3588C20.6104 22.1071 19.6615 22.4392 18.489 22.5969C17.3498 22.75 15.8942 22.75 14.0564 22.75H14C13.5858 22.75 13.25 22.4142 13.25 22C13.25 21.5858 13.5858 21.25 14 21.25C15.9068 21.25 17.2615 21.2484 18.2892 21.1102C19.2952 20.975 19.8749 20.7213 20.2981 20.2981C20.7852 19.811 20.9973 19.4333 21.1147 18.7602C21.2471 18.0014 21.25 16.9191 21.25 15C21.25 14.5858 21.5858 14.25 22 14.25Z" fill="#1C274C"/>
                                            <path d="M9.94359 1.25H10C10.4142 1.25 10.75 1.58579 10.75 2C10.75 2.41421 10.4142 2.75 10 2.75C8.09319 2.75 6.73852 2.75159 5.71085 2.88976C4.70476 3.02503 4.12512 3.27869 3.70191 3.7019C3.21477 4.18904 3.00275 4.56666 2.88529 5.23984C2.75289 5.9986 2.75001 7.08092 2.75001 9C2.75001 9.41422 2.41422 9.75 2.00001 9.75C1.58579 9.75 1.25001 9.41422 1.25001 9L1.25 8.90369C1.24995 7.10453 1.24992 5.8857 1.40762 4.98199C1.58304 3.97665 1.95681 3.32568 2.64125 2.64124C3.38961 1.89288 4.33856 1.56076 5.51098 1.40314C6.65019 1.24997 8.10584 1.24998 9.94359 1.25Z" fill="#1C274C"/>
                                            </g>
                                            <path d="M12 10.75C11.3096 10.75 10.75 11.3096 10.75 12C10.75 12.6904 11.3096 13.25 12 13.25C12.6904 13.25 13.25 12.6904 13.25 12C13.25 11.3096 12.6904 10.75 12 10.75Z" fill="#1C274C"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.89243 14.0598C5.29747 13.3697 5 13.0246 5 12C5 10.9754 5.29748 10.6303 5.89242 9.94021C7.08037 8.56222 9.07268 7 12 7C14.9273 7 16.9196 8.56222 18.1076 9.94021C18.7025 10.6303 19 10.9754 19 12C19 13.0246 18.7025 13.3697 18.1076 14.0598C16.9196 15.4378 14.9273 17 12 17C9.07268 17 7.08038 15.4378 5.89243 14.0598ZM9.25 12C9.25 10.4812 10.4812 9.25 12 9.25C13.5188 9.25 14.75 10.4812 14.75 12C14.75 13.5188 13.5188 14.75 12 14.75C10.4812 14.75 9.25 13.5188 9.25 12Z" fill="#1C274C"/>
                                            
                                        </svg>
                                    </button> --}}

                                <a href="{{ route('admin.cuisines.cuisines_edit', $cuisine->id) }}" type="button"
                                    x-tooltip="Edit">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="h-4.5 w-4.5 ltr:mr-2 rtl:ml-2 text-warning">
                                        <path
                                            d="M15.2869 3.15178L14.3601 4.07866L5.83882 12.5999L5.83881 12.5999C5.26166 13.1771 4.97308 13.4656 4.7249 13.7838C4.43213 14.1592 4.18114 14.5653 3.97634 14.995C3.80273 15.3593 3.67368 15.7465 3.41556 16.5208L2.32181 19.8021L2.05445 20.6042C1.92743 20.9852 2.0266 21.4053 2.31063 21.6894C2.59466 21.9734 3.01478 22.0726 3.39584 21.9456L4.19792 21.6782L7.47918 20.5844L7.47919 20.5844C8.25353 20.3263 8.6407 20.1973 9.00498 20.0237C9.43469 19.8189 9.84082 19.5679 10.2162 19.2751C10.5344 19.0269 10.8229 18.7383 11.4001 18.1612L11.4001 18.1612L19.9213 9.63993L20.8482 8.71306C22.3839 7.17735 22.3839 4.68748 20.8482 3.15178C19.3125 1.61607 16.8226 1.61607 15.2869 3.15178Z"
                                            stroke="currentColor" stroke-width="1.5" />
                                        <path opacity="0.5"
                                            d="M14.36 4.07812C14.36 4.07812 14.4759 6.04774 16.2138 7.78564C17.9517 9.52354 19.9213 9.6394 19.9213 9.6394M4.19789 21.6777L2.32178 19.8015"
                                            stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                </a>
                                <button type="button" class="delete-btn" x-tooltip="Delete"
                                    data-route="{{ route('admin.cuisines.cuisines_destroy', $cuisine->id) }}"
                                    @click="showAlert({{ $cuisine->id }})">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="m-auto h-5 w-5 text-danger">
                                        <path d="M20.5001 6H3.5" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path
                                            d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                        <path opacity="0.5" d="M9.5 11L10 16" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path opacity="0.5" d="M14.5 11L14 16" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" />
                                        <path opacity="0.5"
                                            d="M6.5 6C6.55588 6 6.58382 6 6.60915 5.99936C7.43259 5.97849 8.15902 5.45491 8.43922 4.68032C8.44784 4.65649 8.45667 4.62999 8.47434 4.57697L8.57143 4.28571C8.65431 4.03708 8.69575 3.91276 8.75071 3.8072C8.97001 3.38607 9.37574 3.09364 9.84461 3.01877C9.96213 3 10.0932 3 10.3553 3H13.6447C13.9068 3 14.0379 3 14.1554 3.01877C14.6243 3.09364 15.03 3.38607 15.2493 3.8072C15.3043 3.91276 15.3457 4.03708 15.4286 4.28571L15.5257 4.57697C15.5433 4.62992 15.5522 4.65651 15.5608 4.68032C15.841 5.45491 16.5674 5.97849 17.3909 5.99936C17.4162 6 17.4441 6 17.5 6"
                                            stroke="currentColor" stroke-width="1.5" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    {{-- </template> --}}
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("form", () => ({
                tableData: [{
                    id: 1,
                    name: 'John Doe',
                    email: 'johndoe@yahoo.com',
                    date: '10/08/2020',
                    sale: 120,
                    status: 'Complete',
                    register: '5 min ago',
                    progress: '40%',
                    position: 'Developer',
                    office: 'London'
                }, ],
            }));
        });
    </script>
    <script>
        async function showAlert(id, token) {
            console.log(id);
            console.log(window.location.href + '/delete/' + id);
            $token = "{{ csrf_token() }}";
            console.log($token);
            new window.Swal({
                icon: 'question',
                title: 'Delete Cuisine',
                confirmButtonText: 'Delete this admin cuisine?',
                confirmButtonColor: '#FE5722',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
                showLoaderOnConfirm: true,
                customClass: 'sweet-alerts',
                closeOnCancel: true,
                preConfirm: () => {
                    return fetch(window.location.href + '/delete/' + id, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                        })

                        .then((response) => {
                            console.log(`resp: ${JSON.stringfy( response)}`);
                            return response.json();
                        })
                        .then((data) => {
                            console.log(`resp2: ${data}`);
                            new window.Swal({
                                title: data.ip,
                            });
                        })
                        .catch(() => {
                            const toast = window.Swal.mixin({
                                toast: true,
                                position: 'bottom-end',
                                showConfirmButton: false,
                                timer: 3000,
                                showCloseButton: false,
                                animation: true,
                                customClass: {
                                    popup: `color-danger`
                                },
                                target: document.getElementById('danger-toast')
                            });
                            toast.fire({
                                title: 'Admin Deleted Successfully',
                            });
                            location.reload();
                        });
                },
            });
        }
    </script>

    <script>
        $('.admin_status').on('change', function(){
          
            new window.Swal({
                icon: 'question',
                title: 'Update Admin Status',
                confirmButtonText: 'Do you update this admin status?',
                confirmButtonColor: '#FE5722',
                cancelButtonText: 'Cancel',
                showCancelButton: true,
                showLoaderOnConfirm: true,
                customClass: 'sweet-alerts',
                closeOnCancel: true,
                preConfirm: () => {
                    return fetch(window.location.href + '/update-status' , {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            },
                            data:{'status':$(this).is(':checked'), 'id':$('.id').val()}
                        })

                        .then((response) => {
                            console.log(`resp: ${JSON.stringfy( response)}`);
                            return response.json();
                        })
                        
                        .catch(() => {
                            // const toast = window.Swal.mixin({
                            //     toast: true,
                            //     position: 'bottom-end',
                            //     showConfirmButton: false,
                            //     timer: 3000,
                            //     showCloseButton: false,
                            //     animation: true,
                            //     customClass: {
                            //         popup: `color-danger`
                            //     },
                            //     target: document.getElementById('danger-toast')
                            // });
                            // toast.fire({
                            //     title: 'Admin Deleted Successfully',
                            // });
                            // location.reload();
                        });
                },
            });
        })
    </script>
@endsection
