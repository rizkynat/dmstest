@props([
'li_name_page'=>'Pages','icon'=>null,'is_dropdown'=>False, 'li_data_dropdowns'=>[['name'=>'page_1', 'url'=> '/page_1',
'access_role' => ''],
['name'=>'page_2', 'url'=>'/page_2']]
])

@php
$is_dropdown = filter_var($is_dropdown, FILTER_VALIDATE_BOOLEAN);
@endphp

@if(!$is_dropdown)
@if((Auth::user()->role != 'Account Officer' && in_array($li_name_page, ['DataEntry'])) ||
(Auth::user()->role != 'Admin' && in_array($li_name_page, ['Register'])))
@else

<li class="relative px-6 py-3">
  <span id="{{strtolower($li_name_page)}}" class="absolute inset-y-0 left-0 w-1 bg-primary rounded-tr-lg rounded-br-lg hidden" aria-hidden="true"></span>
  <a id="{{strtolower($li_name_page)}}" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 cursor-pointer" @click="window.location='/{{ strtolower($li_name_page)}}'">
    @if(isset($icon))
    <x-svg class="w-5 h-5" icon="{{ $icon }}" viewBox="24 24" fill="none" stroke="currentColor" strokeWidth=2>
    </x-svg>
    @endif
    <span class="ml-4">{{ $li_name_page }}</span>
  </a>
  @endif
</li>
@endif