<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<nav x-data="{ open: false, sidebarOpen: false }"  class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- <nav x-data="{ open: false }" class="bg-slate-900 shadow-lg"> -->
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

            <button
                @click="sidebarOpen = true"
                class="mr-4 p-2 rounded-lg hover:bg-gray-100">

                <i class="fa-solid fa-bars text-xl"></i>

            </button>



                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <!-- <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" /> -->
                         <img style="height:45px;width:auto;" src="{{ asset('images/logo.jpg') }}" alt="Logo">
                    </a>
                </div>

                <!-- Navigation Links -->
                <!-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div> -->

                <!-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
                        {{ __('Category') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.*')">
                        {{ __('Product') }}
                    </x-nav-link>
                </div> -->

                <!-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('attributes.index')" :active="request()->routeIs('attributes.index')">
                        {{ __('Attribute Group') }}
                    </x-nav-link>
                </div> -->

                <!-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('brands.index')" :active="request()->routeIs('brands.index')">
                        {{ __('Brand') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.industries.index')" :active="request()->routeIs('admin.industries.index')">
                        {{ __('Industry') }}
                    </x-nav-link>
                </div> -->

                <!-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.contacts.index')" :active="request()->routeIs('admin.contacts.index')">
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.newsletter-subscribers.index')" :active="request()->routeIs('admin.newsletter-subscribers.index')">
                        {{ __('Subscriber') }}
                    </x-nav-link>
                </div> -->

                <!-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.offers.index')" :active="request()->routeIs('admin.offers.index')">
                        {{ __('Offer') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')">
                        {{ __('Users') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.index')">
                        {{ __('Orders') }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('admin.careers.index')" :active="request()->routeIs('admin.careers.index')">
                        {{ __('Careers') }}
                    </x-nav-link>
                </div> -->

                <!-- <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>Settings</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('admin.banners.index')" :active="request()->routeIs('admin.banners.index')">
                                {{ __('Banners') }}
                            </x-dropdown-link>
                        
                            <x-dropdown-link :href="route('admin.news.index')" :active="request()->routeIs('admin.news.index')">
                                {{ __('News') }}
                            </x-dropdown-link>
                        
                            <x-dropdown-link :href="route('admin.offers.index')" :active="request()->routeIs('admin.offers.index')">
                                {{ __('Offers') }}
                            </x-dropdown-link>
                        
                            <x-dropdown-link :href="route('admin.contacts.index')" :active="request()->routeIs('admin.contacts.index')">
                                {{ __('Contacts') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('admin.job-applications.index')" :active="request()->routeIs('admin.job-applications.index')">
                                {{ __('Job Applications') }}
                            </x-dropdown-link>
                        
                            <x-dropdown-link :href="route('attributes.index')" :active="request()->routeIs('attributes.index')">
                                {{ __('Attribute Group') }}
                            </x-dropdown-link>
                        
                            <x-dropdown-link :href="route('admin.newsletter-subscribers.index')" :active="request()->routeIs('admin.newsletter-subscribers.index')">
                                {{ __('Subscribers') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('admin.news.index')" :active="request()->routeIs('admin.news.index')">
                                {{ __('News') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('admin.product-questions.index')" :active="request()->routeIs('admin.product-questions.index')">
                                {{ __('Q & A') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('admin.safety-service-requests.index')" :active="request()->routeIs('admin.safety-service-requests.index')">
                                {{ __('Safety Service Request') }}
                            </x-dropdown-link>

                            <x-dropdown-link :href="route('admin.product-variants.index')" :active="request()->routeIs('admin.product-variants.index')">
                                {{ __('Product Variants') }}
                            </x-dropdown-link>
                        </x-slot>
                    </x-dropdown>
                </div> -->
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



    <div
    x-show="sidebarOpen"
    x-transition
    class="fixed inset-0 z-50"
    style="display:none;"
>

  <!-- <div
    class="relative w-72 h-full bg-slate-900 text-white shadow-2xl"> -->
    <div class="relative w-72 h-screen bg-slate-900 text-white shadow-2xl flex flex-col">

    <!-- Header -->
    <div class="flex items-center justify-between px-6 py-5 border-b border-slate-700">

        <div>
            <h2 class="text-xl font-bold">Global Products</h2>
            <p class="text-xs text-slate-400">Admin Panel</p>
        </div>

        <button
            @click="sidebarOpen = false"
            class="text-slate-400 hover:text-white">

            <i class="fa-solid fa-xmark text-xl"></i>

        </button>

    </div>

    <!-- Menu -->
    <!-- <div class="p-4 space-y-2"> -->
        <div class="p-4 space-y-2 flex-1 overflow-y-auto">

        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

            <i class="fa-solid fa-chart-line text-blue-400"></i>
            Dashboard

        </a>

        <!-- Catalog -->
        <div x-data="{ open: true }">
            <button @click="open = !open"
                class="w-full flex justify-between items-center px-4 py-3 text-slate-300 hover:bg-slate-800 rounded-lg">
                <span>
                    <i class="fa-solid fa-box mr-2 text-orange-400"></i>
                    Catalog
                </span>
                <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': open }"></i>
            </button>

            <div x-show="open" x-transition class="ml-6 mt-2 space-y-2">
                <a href="{{ route('categories.index') }}" class="block py-2 hover:text-white"><i class="fa-solid fa-tags text-green-400"></i> &nbsp;Categories</a>
                <a href="{{ route('admin.products.index') }}" class="block py-2 hover:text-white"><i class="fa-solid fa-box text-orange-400"></i> &nbsp;Products</a>
                <a href="{{ route('admin.product-variants.index') }}" class="block py-2 hover:text-white">🔀 Product Variants</a>
                <a href="{{ route('attributes.index') }}" class="block py-2 hover:text-white">⚙️ Attribute Groups</a>
                <a href="{{ route('admin.product-questions.index') }}" class="block py-2 hover:text-white">❓ Q & A</a>
                <a href="{{ route('brands.index') }}" class="block py-2 hover:text-white"><i class="fa-solid fa-copyright text-purple-400"></i> &nbsp;Brands</a>
                <a href="{{ route('admin.industries.index') }}" class="block py-2 hover:text-white"><i class="fa-solid fa-industry text-cyan-400"></i> &nbsp;Industries</a>
            </div>
        </div>

        <!-- <a href="{{ route('categories.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

            <i class="fa-solid fa-tags text-green-400"></i>
            Categories

        </a>

        <a href="{{ route('admin.products.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

            <i class="fa-solid fa-box text-orange-400"></i>
            Products

        </a> -->

        <!-- <a href="{{ route('brands.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

            <i class="fa-solid fa-copyright text-purple-400"></i>
            Brands

        </a>

        <a href="{{ route('industries.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

            <i class="fa-solid fa-industry text-cyan-400"></i>
            Industries

        </a> -->

        <!-- <a href="{{ route('orders.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

            <i class="fa-solid fa-cart-shopping text-red-400"></i>
            Orders

        </a> -->

        <!-- <a href="{{ route('admin.users.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">

            <i class="fa-solid fa-users text-yellow-400"></i>
            Users

        </a> -->

        <!-- <a href="{{ route('offers.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
            🎁 Offers
        </a> -->

        <!-- Sales -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="w-full flex justify-between items-center px-4 py-3 text-slate-300 hover:bg-slate-800 rounded-lg">
                <span>
                    <i class="fa-solid fa-cart-shopping mr-2 text-red-400"></i>
                    Sales
                </span>
                <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': open }"></i>
            </button>

            <div x-show="open" x-transition class="ml-6 mt-2 space-y-2">
                <a href="{{ route('admin.orders.index') }}" class="block py-2 hover:text-white"><i class="fa-solid fa-cart-shopping text-red-400"></i> &nbsp;Orders</a>
                <a href="{{ route('admin.offers.index') }}" class="block py-2 hover:text-white">🎁 Offers</a>
            </div>
        </div>
        
        <!-- Users -->
        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="w-full flex justify-between items-center px-4 py-3 text-slate-300 hover:bg-slate-800 rounded-lg">
                <span>
                    <i class="fa-solid fa-users mr-2 text-yellow-400"></i>
                    Users
                </span>
                <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': open }"></i>
            </button>

            <div x-show="open" x-transition class="ml-6 mt-2 space-y-2">
                <a href="{{ route('admin.users.index') }}" class="block py-2 hover:text-white"><i class="fa-solid fa-users text-yellow-400"></i> &nbsp;Users</a>
                <a href="{{ route('admin.newsletter-subscribers.index') }}" class="block py-2 hover:text-white">📧 &nbsp;Subscribers</a>
            </div>
        </div>

        <a href="{{ route('admin.banners.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
            🖼️ Banners
        </a>

        <a href="{{ route('admin.careers.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
            💼 Careers
        </a>

        <a href="{{ route('admin.news.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
            📰 News
        </a>

        <!-- <a href="{{ route('dashboard') }}">
    📊 Dashboard
</a>

<a href="{{ route('categories.index') }}">
    📁 Categories
</a>

<a href="{{ route('admin.products.index') }}">
    📦 Products
</a>

<a href="{{ route('brands.index') }}">
    🏷️ Brands
</a> -->

<!-- <a href="{{ route('industries.index') }}">
    🏭 Industries
</a> -->



<!-- <a href="{{ route('admin.users.index') }}">
    👥 Users
</a>

<a href="{{ route('orders.index') }}">
    🛒 Orders
</a> -->


        

        <!-- <a href="{{ route('admin.contacts.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
            📞 Contacts
        </a>

        <a href="{{ route('admin.job-applications.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
            📄 Job Applications
        </a> -->

        <!-- <a href="{{ route('attributes.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
            ⚙️ Attribute Groups
        </a> -->

        <!-- <a href="{{ route('admin.newsletter-subscribers.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
            📧 Subscribers
        </a> -->

        

        <!-- <a href="{{ route('admin.product-questions.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
            ❓ Q & A
        </a> -->

        <!-- <a href="{{ route('admin.safety-service-requests.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
            🛡️ Safety Requests
        </a> -->

        <!-- <a href="{{ route('admin.product-variants.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
            🔀 Product Variants
        </a> -->

        <div x-data="{ open: false }">
            <button @click="open = !open"
                class="w-full flex justify-between items-center px-4 py-3 text-slate-300 hover:bg-slate-800 rounded-lg">
                <span>
                    <i class="fa-solid fa-headset mr-2 text-cyan-400"></i>
                    Support
                </span>
                <i class="fa-solid fa-chevron-down" :class="{ 'rotate-180': open }"></i>
            </button>

            <div x-show="open" x-transition class="ml-6 mt-2 space-y-2">
                <a href="{{ route('admin.contacts.index') }}" class="block py-2 hover:text-white">📞 Contacts</a>
                <a href="{{ route('admin.job-applications.index') }}" class="block py-2 hover:text-white">📄 Job Applications</a>
                <a href="{{ route('admin.safety-service-requests.index') }}" class="block py-2 hover:text-white">🛡️ Safety Requests</a>
            </div>
        </div>

    </div>
</div>
  

</div>
</nav>
