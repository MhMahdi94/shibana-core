 <!-- start sidebar section -->
 <div :class="{ 'dark text-white-dark': $store.app.semidark }">
     <nav x-data="sidebar"
         class="sidebar fixed bottom-0 top-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
         <div class="h-full bg-white dark:bg-[#0e1726]">
             <div class="flex items-center justify-between px-4 py-3">
                 <a href="index.html" class="main-logo flex shrink-0 items-center">
                     <img class="ml-[5px] w-8 flex-none" src="{{ asset('assets/images/logo.png') }}" alt="image" />
                     <span
                         class="align-middle text-2xl font-semibold ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light lg:inline">SHIBANA
                         ADMIN</span>
                 </a>
                 <a href="javascript:;"
                     class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
                     @click="$store.app.toggleSidebar()">
                     <svg class="m-auto h-5 w-5" width="20" height="20" viewBox="0 0 24 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                         <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                             stroke-linejoin="round" />
                         <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor"
                             stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                     </svg>
                 </a>
             </div>
             <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
                 {{-- x-data="{ activeDropdown: 'dashboard' }" --}}>
                 {{-- <li class="menu nav-item">
                    <button
                        type="button"
                        class="nav-link group"
                        :class="{'active' : activeDropdown === 'home'}"
                        @click="activeDropdown === 'home' ? activeDropdown = null : activeDropdown = 'home'"
                    >
                        <div class="flex items-center">
                            <svg
                                class="shrink-0 group-hover:!text-primary"
                                width="20"
                                height="20"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    opacity="0.5"
                                    d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                    fill="currentColor"
                                />
                            </svg>

                            <span class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                        </div>
                        <div class="rtl:rotate-180" :class="{'!rotate-90' : activeDropdown === 'dashboard'}">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </button>
                    <ul x-cloak x-show="activeDropdown === 'dashboard'" x-collapse class="sub-menu text-gray-500">
                        <li>
                            <a href="index.html" class="active">Sales</a>
                        </li>
                        <li>
                            <a href="analytics.html">Analytics</a>
                        </li>
                        <li>
                            <a href="finance.html">Finance</a>
                        </li>
                        <li>
                            <a href="crypto.html">Crypto</a>
                        </li>
                    </ul>
                </li> --}}

                 <li class="nav-item">
                     <ul>
                         <li class="nav-item ">
                             <a href="{{ route('admin.home.home') }}" class="group active">
                                 <div class="flex items-center">
                                     <svg class="shrink-0 group-hover:!text-primary" width="24" height="24"
                                         viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path opacity="0.5"
                                             d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                             fill="currentColor" />
                                         <path
                                             d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                             fill="currentColor" />
                                     </svg>
                                     <span
                                         class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                                 </div>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <h2
                     class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                     <svg class="hidden h-5 w-4 flex-none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                         <line x1="5" y1="12" x2="19" y2="12"></line>
                     </svg>
                     <span>User Managment</span>
                 </h2>

                 <li class="nav-item">
                     <ul>
                         <li class="nav-item">
                             <a href="{{ route('admin.admins.admins_index') }}" class="group">
                                 <div class="flex items-center">
                                     <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                         viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path opacity="0.5"
                                             d="M3 10.4167C3 7.21907 3 5.62028 3.37752 5.08241C3.75503 4.54454 5.25832 4.02996 8.26491 3.00079L8.83772 2.80472C10.405 2.26824 11.1886 2 12 2C12.8114 2 13.595 2.26824 15.1623 2.80472L15.7351 3.00079C18.7417 4.02996 20.245 4.54454 20.6225 5.08241C21 5.62028 21 7.21907 21 10.4167V11.9914C21 17.6294 16.761 20.3655 14.1014 21.5273C13.38 21.8424 13.0193 22 12 22C10.9807 22 10.62 21.8424 9.89856 21.5273C7.23896 20.3655 3 17.6294 3 11.9914V10.4167Z"
                                             fill="currentColor" />
                                         <path
                                             d="M14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z"
                                             fill="currentColor" />
                                         <path
                                             d="M12 17C16 17 16 16.1046 16 15C16 13.8954 14.2091 13 12 13C9.79086 13 8 13.8954 8 15C8 16.1046 8 17 12 17Z"
                                             fill="currentColor" />
                                     </svg>

                                     <span
                                         class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Admin</span>
                                 </div>
                             </a>
                         </li>


                     </ul>
                 </li>

                 {{-- Resturansts Managment --}}
                 <h2
                     class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                     <svg class="hidden h-5 w-4 flex-none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                         <line x1="5" y1="12" x2="19" y2="12"></line>
                     </svg>
                     <span>Resturansts Managment</span>
                 </h2>

                 <li class="nav-item">
                     <ul>
                         {{-- Cuisine --}}
                         <li class="nav-item">
                             <a href="{{ route('admin.cuisines.cuisines_index') }}" class="group">
                                 <div class="flex items-center">
                                     <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                         viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M18.9986 18H5.00195C5.01214 19.3969 5.08369 20.9119 5.58605 21.4142C6.17183 22 7.11464 22 9.00026 22H15.0003C16.8859 22 17.8287 22 18.4145 21.4142C18.9168 20.9119 18.9884 19.3969 18.9986 18Z"
                                             fill="#1C274C" />
                                         <path opacity="0.5"
                                             d="M7 5C4.23858 5 2 7.23858 2 10C2 12.0503 3.2341 13.8124 5 14.584V18H19L19 14.584C20.7659 13.8124 22 12.0503 22 10C22 7.23858 19.7614 5 17 5C16.7495 5 16.5033 5.01842 16.2626 5.05399C15.6604 3.27806 13.9794 2 12 2C10.0206 2 8.33961 3.27806 7.73736 5.05399C7.49673 5.01842 7.25052 5 7 5Z"
                                             fill="#1C274C" />

                                     </svg>

                                     <span
                                         class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Cuisine</span>


                                 </div>
                             </a>
                         </li>
                         {{-- Resturanst --}}
                         <li class="nav-item">
                             <a href="{{ route('admin.resturants.resturants_index') }}" class="group">
                                 <div class="flex items-center">
                                     <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                         viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M18.9986 18H5.00195C5.01214 19.3969 5.08369 20.9119 5.58605 21.4142C6.17183 22 7.11464 22 9.00026 22H15.0003C16.8859 22 17.8287 22 18.4145 21.4142C18.9168 20.9119 18.9884 19.3969 18.9986 18Z"
                                             fill="#1C274C" />
                                         <path opacity="0.5"
                                             d="M7 5C4.23858 5 2 7.23858 2 10C2 12.0503 3.2341 13.8124 5 14.584V18H19L19 14.584C20.7659 13.8124 22 12.0503 22 10C22 7.23858 19.7614 5 17 5C16.7495 5 16.5033 5.01842 16.2626 5.05399C15.6604 3.27806 13.9794 2 12 2C10.0206 2 8.33961 3.27806 7.73736 5.05399C7.49673 5.01842 7.25052 5 7 5Z"
                                             fill="#1C274C" />

                                     </svg>

                                     <span
                                         class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Resturants</span>


                                 </div>
                             </a>
                         </li>
                     </ul>
                 </li>

                 {{-- Food Managment --}}
                 <h2
                     class="-mx-4 mb-1 flex items-center bg-white-light/30 px-7 py-3 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                     <svg class="hidden h-5 w-4 flex-none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"
                         fill="none" stroke-linecap="round" stroke-linejoin="round">
                         <line x1="5" y1="12" x2="19" y2="12"></line>
                     </svg>
                     <span>Food Management</span>
                 </h2>

                 <li class="nav-item">
                     <ul>
                         {{-- Categories --}}
                         <li class="nav-item">
                             <a href="{{ route('admin.categories.categories_index') }}" class="group">
                                 <div class="flex items-center">
                                     <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                         viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M18.9986 18H5.00195C5.01214 19.3969 5.08369 20.9119 5.58605 21.4142C6.17183 22 7.11464 22 9.00026 22H15.0003C16.8859 22 17.8287 22 18.4145 21.4142C18.9168 20.9119 18.9884 19.3969 18.9986 18Z"
                                             fill="#1C274C" />
                                         <path opacity="0.5"
                                             d="M7 5C4.23858 5 2 7.23858 2 10C2 12.0503 3.2341 13.8124 5 14.584V18H19L19 14.584C20.7659 13.8124 22 12.0503 22 10C22 7.23858 19.7614 5 17 5C16.7495 5 16.5033 5.01842 16.2626 5.05399C15.6604 3.27806 13.9794 2 12 2C10.0206 2 8.33961 3.27806 7.73736 5.05399C7.49673 5.01842 7.25052 5 7 5Z"
                                             fill="#1C274C" />

                                     </svg>

                                     <span
                                         class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Category</span>


                                 </div>
                             </a>
                         </li>
                         {{-- Addons --}}
                         <li class="nav-item">
                             <a href="{{ route('admin.addons.addons_index') }}" class="group">
                                 <div class="flex items-center">
                                     <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                         viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M18.9986 18H5.00195C5.01214 19.3969 5.08369 20.9119 5.58605 21.4142C6.17183 22 7.11464 22 9.00026 22H15.0003C16.8859 22 17.8287 22 18.4145 21.4142C18.9168 20.9119 18.9884 19.3969 18.9986 18Z"
                                             fill="#1C274C" />
                                         <path opacity="0.5"
                                             d="M7 5C4.23858 5 2 7.23858 2 10C2 12.0503 3.2341 13.8124 5 14.584V18H19L19 14.584C20.7659 13.8124 22 12.0503 22 10C22 7.23858 19.7614 5 17 5C16.7495 5 16.5033 5.01842 16.2626 5.05399C15.6604 3.27806 13.9794 2 12 2C10.0206 2 8.33961 3.27806 7.73736 5.05399C7.49673 5.01842 7.25052 5 7 5Z"
                                             fill="#1C274C" />

                                     </svg>

                                     <span
                                         class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Addons</span>


                                 </div>
                             </a>
                         </li>
                         {{-- Meals --}}
                         <li class="nav-item">
                            <a href="{{ route('admin.meals.meals_index') }}" class="group">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18.9986 18H5.00195C5.01214 19.3969 5.08369 20.9119 5.58605 21.4142C6.17183 22 7.11464 22 9.00026 22H15.0003C16.8859 22 17.8287 22 18.4145 21.4142C18.9168 20.9119 18.9884 19.3969 18.9986 18Z"
                                            fill="#1C274C" />
                                        <path opacity="0.5"
                                            d="M7 5C4.23858 5 2 7.23858 2 10C2 12.0503 3.2341 13.8124 5 14.584V18H19L19 14.584C20.7659 13.8124 22 12.0503 22 10C22 7.23858 19.7614 5 17 5C16.7495 5 16.5033 5.01842 16.2626 5.05399C15.6604 3.27806 13.9794 2 12 2C10.0206 2 8.33961 3.27806 7.73736 5.05399C7.49673 5.01842 7.25052 5 7 5Z"
                                            fill="#1C274C" />

                                    </svg>

                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Meals</span>


                                </div>
                            </a>
                        </li>
                     </ul>
                 </li>
             </ul>


         </div>
     </nav>
 </div>
 <!-- end sidebar section -->
