<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="x-icon" href="assets/images/logo_icon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Penerimaan Mahasiswa Baru</title>

</head>

<body class="flex flex-col min-h-screen">
    <nav class="max-w-full bg-red-700">
        <div class="flex flex-wrap items-center justify-between p-3">
            <a class="flex justify-center ml-16 space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('assets/images/logo.png') }}" class="h-10" alt="Logo" />
                <div class="text-sm text-slate-100 font-semibold ml-2">Penerimaan<br>Mahasiswa Baru</div>
            </a>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul class="flex font-medium p-4 mx-4 md:p-0 mt-4 rounded-lg bg-red-700 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">
                    <li>
                        <a href="/home" class="block py-2 px-3 font-semibold text-slate-50 rounded hover:text-slate-400 hover:underline md:hover:bg-transparent md:hover:1 md:p-0">Home</a>
                    </li>
                    <li>
                        <a href="/about" class="block py-2 px-3 font-semibold text-slate-50 rounded hover:text-slate-400 hover:underline md:hover:bg-transparent md:hover:1 md:p-0">About</a>
                    </li>
                    <li>
                        <a href="/contact" class="block py-2 px-3 font-semibold text-slate-50 rounded hover:text-slate-400 hover:underline md:hover:bg-transparent md:hover:1 md:p-0">Contact</a>
                    </li>
                    @auth
                    @if (Auth::user()->isAdmin())
                    <li>
                        <a href="/user" class="block py-2 px-3 font-semibold text-slate-50 rounded hover:text-slate-400 hover:underline md:hover:bg-transparent md:hover:1 md:p-0">User</a>
                    </li>
                    <li>
                        <a href="/mahasiswa" class="block py-2 px-3 font-semibold text-slate-50 rounded hover:text-slate-400 hover:underline md:hover:bg-transparent md:hover:1 md:p-0">Mahasiswa</a>
                    </li>
                    <li>
                        <a href="/information" class="block py-2 px-3 font-semibold text-slate-50 rounded hover:text-slate-400 hover:underline md:hover:bg-transparent md:hover:1 md:p-0">Information</a>
                    </li>
                    @endif
                    @if (Auth::user()->isCamaba())
                    <li>
                        <a href="/mahasiswa/create" class="block py-2 px-3 font-semibold text-slate-50 rounded hover:text-slate-400 hover:underline md:hover:bg-transparent md:hover:1 md:p-0">Daftar Mahasiswa</a>
                    </li>
                    <li>
                        <a href="{{ route('mahasiswa.status',Auth::user()->id) }}" class="block py-2 px-3 font-semibold text-slate-50 rounded hover:text-slate-400 hover:underline md:hover:bg-transparent md:hover:1 md:p-0">Cek Status Mahasiswa</a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-auth">
                @guest
                <div>
                    <ul class="flex font-medium mx-4 md:p-0 mt-4 rounded-lg bg-red-700 md:space-x-8 ml-28 md:flex-row md:mt-0 md:border-0">
                        <li>
                            <a href="/user/login" class="block py-2 px-3 font-semibold text-slate-50 rounded hover:text-slate-400 hover:underline md:hover:bg-transparent md:hover:1 md:p-0">Log in</a>
                        </li>
                        <li>
                            <a href="/user/register" class="block py-2 px-3 font-semibold text-slate-50 rounded hover:text-slate-400 hover:underline md:hover:bg-transparent md:hover:1 md:p-0">Sign Up</a>
                        </li>
                    </ul>
                </div>
                @endguest
                @auth
                <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse my-4">
                    <div class="px-4 py-3">
                        <span class="block text-sm  text-slate-50 truncate">{{Auth::user()->nama_user}}</span>
                    </div>
                    <button type="button" class="flex text-sm bg-slate-100 rounded-full md:me-0 focus:ring-4 focus:ring-slate-200" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        <img class="object-cover w-8 h-8 rounded-full shadow-lg" src="{{ asset('storage/' . (Auth::user()->profile_picture ?? 'user.png')) }}" alt="User profile picture" />
                    </button>
                    <!-- Dropdown login menu -->
                    <div class="hidden absolute right-0 z-10 w-48 mt-2 origin-top-right bg-red-700 divide-y divide-gray-100 rounded-lg shadow-lg border-2 border-gray-100" id="user-dropdown">
                        <div class="px-4 py-3">
                            <span class="block text-sm my-2 text-slate-50 font-semibold">{{ Auth::user()->role->nama_role }}</span>
                            <span class="block text-sm my-2 text-slate-50">{{ Auth::user()->email }}</span>
                        </div>
                        <ul class="py-2 font-semibold" aria-labelledby="user-menu-button">
                            <li>
                                <form id="keluar" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2 text-sm text-slate-50 hover:bg-red-800">
                                        <div class="text-white">Sign out</div>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-sticky" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>
                    </div>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Content Start -->
    <div class="grow">
        @yield('content')
    </div>

    <!-- Footer -->

    <footer class="bg-red-700 inset-x-0 bottom-0">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0 text-slate-50">
                    <p>Kampus A Universitas Multi Data Palembang,<br>
                        Lantai 4 Jalan Rajawali No 14 Palembang,<br>
                        Sumatera Selatan, Indonesia<br>
                        Telepon. +62 711 376400.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-slate-50 uppercase">Follow us</h2>
                        <ul class="text-slate-50 font-medium">
                            <li class="mb-4">
                                <a href="https://github.com/FelixKey" class="hover:underline ">Github</a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/universitasmdp/" class="hover:underline">Instagram</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-slate-50 uppercase">Legal</h2>
                        <ul class="text-slate-50 font-medium">
                            <li class="mb-4">
                                <a href="#" class="hover:underline">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-slate-100 sm:text-center">© 2024 <a class="hover:underline">FelixKeyy</a>. All Rights Reserved.
                </span>
                <div class="flex mt-4 sm:justify-center sm:mt-0">
                    <a href="#" class="text-slate-100 hover:text-gray-100 ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Facebook page</span>
                    </a>
                    <a href="#" class="text-slate-100 hover:text-gray-100 ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                            <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z" />
                        </svg>
                        <span class="sr-only">Discord community</span>
                    </a>
                    <a href="#" class="text-gray-100 hover:text-gray-0 ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                            <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Twitter page</span>
                    </a>
                    <a href="#" class="text-gray-100 hover:text-gray-100 ms-5">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">GitHub account</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>