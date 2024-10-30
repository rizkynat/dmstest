<!-- Desktop sidebar -->
<aside class="z-20 hidden w-48 overflow-y-auto bg-white md:block flex-shrink-0">
  <div class="py-4 mt-8 text-gray-500">
    <div class="px-6 ml-6 flex items-center">
      <a href="/dataentry"><span
          class="ml-3 text-primary-font"
          style="font-family: 'Podkova', serif;">Testing Application</span></a>
    </div>
    <ul class="mt-6">
      <li class="relative px-6 py-3">
        <span id="{{strtolower('Dashboard')}}" class="absolute inset-y-0 left-0 w-1 bg-primary rounded-tr-lg rounded-br-lg hidden" aria-hidden="true"></span>
        <a id="{{strtolower('Dashboard')}}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 cursor-pointer" @click="window.location='/{{ strtolower('dashboard')}}'">
          <x-svg class="w-5 h-5" icon="home" viewBox="24 24" fill="none" stroke="currentColor" strokeWidth=2>
          </x-svg>
          <span class="ml-4">Dashboard</span>
        </a>
      </li>
    </ul>
    @if(Auth::user()->role == 'Account Officer')
    <ul>
      <li class="relative px-6 py-3">
        <span id="{{strtolower('DataEntry')}}" class="absolute inset-y-0 left-0 w-1 bg-primary rounded-tr-lg rounded-br-lg hidden" aria-hidden="true"></span>
        <a id="{{strtolower('DataEntry')}}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 cursor-pointer" @click="window.location='/{{ strtolower('DataEntry')}}'">
          <x-svg class="w-5 h-5" icon="home" viewBox="24 24" fill="none" stroke="currentColor" strokeWidth=2>
          </x-svg>
          <span class="ml-4">DataEntry</span>
        </a>
      </li>
    </ul>
    @endif
    @if(Auth::user()->role == 'Admin')
    <ul>
      <li class="relative px-6 py-3">
        <span id="{{strtolower('Register')}}" class="absolute inset-y-0 left-0 w-1 bg-primary rounded-tr-lg rounded-br-lg hidden" aria-hidden="true"></span>
        <a id="{{strtolower('Register')}}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 cursor-pointer" @click="window.location='/{{ strtolower('Register')}}'">
          <x-svg class="w-5 h-5" icon="form" viewBox="24 24" fill="none" stroke="currentColor" strokeWidth=2>
          </x-svg>
          <span class="ml-4">Register</span>
        </a>
      </li>
    </ul>
    @endif
  </div>
</aside>
<!-- Mobile Sidebar -->
<div
  x-show="isSideMenuOpen"
  x-transition:enter="transition ease-in-out duration-150"
  x-transition:enter-start="opacity-0"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in-out duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0"
  class="fixed inset-0 z-10 flex items-end  bg-black bg-opacity-50 sm:items-center sm:justify-center">
</div>
<aside
  class="fixed inset-y-0 z-20 flex-shrink-0 w-48 mt-16 overflow-y-auto bg-white md:hidden"
  x-show="isSideMenuOpen"
  x-transition:enter="transition ease-in-out duration-150"
  x-transition:enter-start="opacity-0 transform -translate-x-20"
  x-transition:enter-end="opacity-100"
  x-transition:leave="transition ease-in-out duration-150"
  x-transition:leave-start="opacity-100"
  x-transition:leave-end="opacity-0 transform -translate-x-20"
  @click.away="closeSideMenu"
  @keydown.escape="closeSideMenu">
  <div class="py-4 mt-4 text-gray-500">
    <div class="px-6 ml-6 flex items-center">
      <a href="/dataentry"><span
          class="ml-3 text-primary-font"
          style="font-family: 'Podkova', serif;">Testing Application</span></a>
    </div>
    @if(Auth::user()->role == 'Account Officer')
    <ul class="mt-6">
    <li class="relative px-6 py-3">
        <span id="{{strtolower('DataEntry')}}" class="absolute inset-y-0 left-0 w-1 bg-primary rounded-tr-lg rounded-br-lg hidden" aria-hidden="true"></span>
        <a id="{{strtolower('DataEntry')}}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 cursor-pointer" @click="window.location='/{{ strtolower('DataEntry')}}'">
          <x-svg class="w-5 h-5" icon="home" viewBox="24 24" fill="none" stroke="currentColor" strokeWidth=2>
          </x-svg>
          <span class="ml-4">DataEntry</span>
        </a>
      </li>
    </ul>
    @endif
    @if(Auth::user()->role == 'Admin')
    <ul>
    <li class="relative px-6 py-3">
        <span id="{{strtolower('Register')}}" class="absolute inset-y-0 left-0 w-1 bg-primary rounded-tr-lg rounded-br-lg hidden" aria-hidden="true"></span>
        <a id="{{strtolower('Register')}}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 cursor-pointer" @click="window.location='/{{ strtolower('Register')}}'">
          <x-svg class="w-5 h-5" icon="form" viewBox="24 24" fill="none" stroke="currentColor" strokeWidth=2>
          </x-svg>
          <span class="ml-4">Register</span>
        </a>
      </li>
    </ul>
    @endif
    </ul>
  </div>
</aside>