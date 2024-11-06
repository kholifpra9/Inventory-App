<!-- component -->
 @hasrole('staf gudang')
<div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800">
  <div class="fixed flex flex-col top-0 left-0 w-64 bg-white h-full border-r">
    <div class="flex items-center justify-center h-14 border-b">
        <x-application-logo class="block h-9 w-auto fill-current text-green-600 dark:text-gray-200" />
        <br>
    </div>
    <!-- Pastikan bagian ini menggunakan `flex-grow flex flex-col` -->
    <div class="overflow-y-auto overflow-x-hidden flex-grow flex flex-col">
      <ul class="flex flex-col py-4 space-y-1 h-full">
        <li class="px-5">
          <div class="flex flex-row items-center h-8">
            <div class="text-sm font-light tracking-wide text-gray-800">{{ Auth::user()->name }}</div>
          </div>
        </li>
        <li class="px-5">
          <div class="flex flex-row items-center h-8">
            <div class="text-sm font-light tracking-wide text-gray-500">Menu</div>
          </div>
        </li>
        <li>
            
          <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Beranda</span>
          </x-nav-link>
        </li>
        <li>
          <x-nav-link :href="route('barang.index')" :active="request()->routeIs('barang.index')" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Barang</span>
            <!-- <span class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-indigo-500 bg-indigo-50 rounded-full">New</span> -->
          </x-nav-link>
        </li>
        <li>
          <x-nav-link :href="route('barang_masuk.index')" :active="request()->routeIs('barang_masuk.index')" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
            <svg   class="w-5 h-5"  fill="#000000" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect x="19" y="18.92" width="60" height="16" rx="4" ry="4"></rect><rect x="19" y="40.92" width="27" height="16" rx="4" ry="4"></rect><rect x="19" y="62.92" width="27" height="16" rx="4" ry="4"></rect><path d="M64.95,72.49a1.45,1.45,0,0,0,2.1,0l11.5-11.4a1.45,1.45,0,0,0,0-2.1L67,47.49a1.45,1.45,0,0,0-2.1,0l-2.1,2.1a1.45,1.45,0,0,0,0,2.1l3.6,3.6a1,1,0,0,1-.7,1.7H53.6a1.63,1.63,0,0,0-1.6,1.5v3A1.71,1.71,0,0,0,53.6,63H65.75a1,1,0,0,1,.7,1.7l-3.6,3.6a1.45,1.45,0,0,0,0,2.1Z"></path></g></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Barang Masuk</span>
          </x-nav-link>
        </li>
        <li>
          <x-nav-link :href="route('barang_keluar.index')" :active="request()->routeIs('barang_keluar.index')" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5"  fill="#000000" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><rect x="19" y="18.92" width="60" height="16" rx="4" ry="4"></rect><rect x="19" y="40.92" width="27" height="16" rx="4" ry="4"></rect><rect x="19" y="62.92" width="27" height="16" rx="4" ry="4"></rect><path d="M64.95,72.49a1.45,1.45,0,0,0,2.1,0l11.5-11.4a1.45,1.45,0,0,0,0-2.1L67,47.49a1.45,1.45,0,0,0-2.1,0l-2.1,2.1a1.45,1.45,0,0,0,0,2.1l3.6,3.6a1,1,0,0,1-.7,1.7H53.6a1.63,1.63,0,0,0-1.6,1.5v3A1.71,1.71,0,0,0,53.6,63H65.75a1,1,0,0,1,.7,1.7l-3.6,3.6a1.45,1.45,0,0,0,0,2.1Z"></path></g></svg>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Barang Keluar</span>
            <!-- <span class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-indigo-500 bg-indigo-50 rounded-full">New</span> -->
          </x-nav-link>
        </li>
        <li>
          <x-nav-link :href="route('permintaan_barang.index')" :active="request()->routeIs('permintaan_barang.index')" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M18.5703 22H14.0003C11.7103 22 10.5703 20.86 10.5703 18.57V11.43C10.5703 9.14 11.7103 8 14.0003 8H18.5703C20.8603 8 22.0003 9.14 22.0003 11.43V18.57C22.0003 20.86 20.8603 22 18.5703 22Z" fill="#292D32"></path> <path d="M13.43 5.43V6.77C10.81 6.98 9.32 8.66 9.32 11.43V16H5.43C3.14 16 2 14.86 2 12.57V5.43C2 3.14 3.14 2 5.43 2H10C12.29 2 13.43 3.14 13.43 5.43Z" fill="#292D32"></path> <path d="M18.1291 14.2501H17.2491V13.3701C17.2491 12.9601 16.9091 12.6201 16.4991 12.6201C16.0891 12.6201 15.7491 12.9601 15.7491 13.3701V14.2501H14.8691C14.4591 14.2501 14.1191 14.5901 14.1191 15.0001C14.1191 15.4101 14.4591 15.7501 14.8691 15.7501H15.7491V16.6301C15.7491 17.0401 16.0891 17.3801 16.4991 17.3801C16.9091 17.3801 17.2491 17.0401 17.2491 16.6301V15.7501H18.1291C18.5391 15.7501 18.8791 15.4101 18.8791 15.0001C18.8791 14.5901 18.5391 14.2501 18.1291 14.2501Z" fill="#292D32"></path> </g></svg>
              
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Permintaan Barang</span>
            @if($jumlahPermintaan > 0)
            <span class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">{{ $jumlahPermintaan }}</span>
            @endif
          </x-nav-link>
        </li>
        <li>
          <x-nav-link :href="route('laporan_barang.index')" :active="request()->routeIs('laporan_barang.index')" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6">
            <span class="inline-flex justify-center items-center ml-4">
              <svg class="w-5 h-5" fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M39,32h22c1.1,0,2-0.9,2-2v-4c0-3.3-2.7-6-6-6H43c-3.3,0-6,2.7-6,6v4C37,31.1,37.9,32,39,32z"></path> </g> <path d="M72,25h-2c-0.6,0-1,0.4-1,1v4c0,4.4-3.6,8-8,8H39c-4.4,0-8-3.6-8-8v-4c0-0.6-0.4-1-1-1h-2c-3.3,0-6,2.7-6,6 v43c0,3.3,2.7,6,6,6h44c3.3,0,6-2.7,6-6V31C78,27.7,75.3,25,72,25z M66.8,49L47.6,68.2c-0.5,0.5-1.1,0.8-1.8,0.8 c-0.7,0-1.4-0.3-1.9-0.8L33.2,57.5c-0.5-0.5-0.5-1.1,0-1.6l2.1-2.1c0.5-0.5,1.1-0.5,1.6,0l8.8,8.8l17.3-17.3c0.5-0.5,1.1-0.5,1.6,0 l2.1,2.1C67.2,47.9,67.2,48.6,66.8,49z"></path> </g></svg>
              
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Laporan Barang</span>
            @if($jumlahLaporan > 0)
              <span class="px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">{{ $jumlahLaporan }}</span>
            @endif
          </x-nav-link>
        </li>
        
  <br>
  <br>
  <br><br>
        <li class="mt-auto">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')" class="relative flex flex-row items-center h-11 focus:outline-none bg-red-400 hover:bg-gray-50 text-gray-600 hover:text-gray-800 border-l-4 border-transparent hover:border-indigo-500 pr-6"
                onclick="event.preventDefault();
                         this.closest('form').submit();">
              <span class="inline-flex justify-center items-center ml-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
              </span>
              {{ __('Logout') }}
            </x-responsive-nav-link>
          </form>
        </li>
      </ul>
    </div>
  </div>
</div>

@else
<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- Navigation Links -->
               
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('permintaan_barang.form')" :active="request()->routeIs('permintaan_barang.form')">
                        {{ __('Permintaan Barang') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('laporan_barang.form')" :active="request()->routeIs('laporan_barang.form')">
                        {{ __('Laporan Barang') }}
                    </x-nav-link>
                </div>
                
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

@endhasrole