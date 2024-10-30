<header class="z-10 py-4 bg-white shadow-md">
  <div class="container flex items-center justify-between h-full px-6 mx-auto text-primary">
    <!-- Mobile hamburger -->
    <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-primary" @click="toggleSideMenu" aria-label="Menu">
      <x-svg class="h-6 w-6" icon="hamburger" viewBox="20 20" fill="currentColor">
      </x-svg>
    </button>
    <!-- Search input -->
    <div class="flex justify-center flex-1 lg:mr-32">
      <div class="relative w-full max-w-xl mr-6 focus-within:text-primary">
        <div class="tooltip flex items-center">

          <input id="search-bar" class=" w-full pl-4 py-2.5 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-primary form-input" type="search" placeholder="Cari" aria-label="Search" />
          <span id="tooltip-search-bar" class='tooltiptext rounded shadow-lg p-2  bg-black text-white'>cari</span>
          <button id="search-bar-btn" type="submit" class="p-2.5 ml-2 text-white bg-primary rounded-lg hover:bg-primary/75 focus:ring-4 focus:outline-none focus:shadow-outline-primary ">
            <x-svg class="h-4 w-4" icon="search" viewBox="20 20" fill="currentColor">
            </x-svg>
          </button>
        </div>
      </div>
    </div>
    <ul class="flex items-center flex-shrink-0 space-x-6">
      <!-- Theme toggler -->
      <li class="flex">
        <span class="text-black font-semibold mr-1">
          {{ucwords(Auth::user()->role)}}
        </span>
      </li>
      <!-- Notifications menu -->

      <!-- Profile menu -->
      <li class="relative">
        <button class="align-middle rounded-full focus:shadow-outline-primary focus:outline-none " x-on:mouseenter="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
          <x-svg class="h-8 w-8" icon="profile" viewBox="24 24" fill="none" stroke="#1a1c23" stroke-width="2">
          </x-svg>
        </button>
        <template x-if="isProfileMenuOpen">
          <ul x-transition:leave="transition ease-in duration-150" x-transiton:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border-gray-100 rounded-md shadow-md " aria-label="submenu">
            <li class="flex justify-between items-center mb-2">
              <div class="flex gap-4">
                <a href="/profil">
                  <img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;s=aa3a807e1bbdfd4364d1f449eaa96d82" alt="" aria-hidden="true">
                </a>

                <span>{{Auth::user()->name}}</span>
              </div>
              <a href="/logout">
                <button type="button" class="text-white bg-primary hover:bg-primary/75 focus:border-primary font-medium rounded-lg text-xs px-1 py-1 focus:outline-none">
                  <svg class="w-4 h-4" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                  </svg>
                </button>
              </a>
            </li>
            <li id="profile-section">
              <p class="text-base font-bold leading-none text-gray-900"></p>
              <p class="text-sm font-normal">{{Auth::user()->email}}
              </p>
              <p class="mb-2 text-sm font-light">Role: <span class="font-bold"></span>{{Auth::user()->role}}</p>
            </li>

          </ul>

        </template>
      </li>
    </ul>
  </div>
</header>