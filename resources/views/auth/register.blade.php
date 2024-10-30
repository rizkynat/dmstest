@extends('layout.auth-master')
@section('title', 'Daftar')
@section('content')
<div class="flex items-center min-h-screen p-6 bg-gray-50 ">
  <div class="flex-1 h-full p-10 max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl">
    @if(session('success'))
    <div id="alert-success" class="z-[1000] text-green-700 bg-green-50 flex left-1/2 top-1/8 transform -translate-x-1/2 -translate-y-1/2 fixed p-4 mr-4 mt-4 mb-4 text-sm rounded-lg" role="alert">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 mr-3">
        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
      </svg>
      <span class="sr-only">Info</span>
      <div>
        <span id="alert-content-success" class="font-medium">
        {{session('success')}}
        </span>
      </div>
    </div>
    @endif
    @if($errors->any())
    <div id="alert-danger" class="z-[1000] text-red-700 bg-red-50 flex left-1/2 top-1/8 transform -translate-x-1/2 -translate-y-1/2 fixed p-4 mr-4 mt-4 mb-4 text-sm rounded-lg" role="alert">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 mr-3">
        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
      </svg>
      <span class="sr-only">Info</span>
      <div>
        <span id="alert-content-danger" class="font-medium">
          <ul>
            @foreach($errors->all() as $error)
            <li>- {{ $error }}</li>
            @endforeach
          </ul>
        </span>
      </div>
    </div>
    @endif
    <div class="flex flex-col overflow-y-auto md:flex-row">
      <div class="md:h-auto md:w-1/2">
        <img aria-hidden="true" class="p-12 object-scale-down w-full h-full" src="{{asset('/img/crm.png')}}" alt="Office" />
      </div>
      <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
        <div class="w-full">
          <h1 class="mb-4 text-xl font-semibold text-gray-700">
            Daftar
          </h1>
          <form id="form-register" method="POST" action="{{ route('storeRegister') }}">
            @csrf
            <label class="block text-sm">
              <span class="text-gray-700">Nama</span>
              <input type="text" id="name" name="name" value="{{ old('name') }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Jhon Orge" data-index="1" required />
            </label>
            <label class="block mt-4 text-sm">
              <span class="text-gray-700">Email</span>
              <input type="email" id="email" name="email" value="{{ old('email') }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="jhon@domain.com" data-index="2" required />
            </label>
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 ">Kata Sandi</span>
              <input type="password" id="password" name="password" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="***************" data-index="3" required />
            </label>
            <label class="block mt-4 text-sm">
              <span class="text-gray-700 ">Konfirmasi Kata Sandi</span>
              <input type="password" id="password_confirmation" name="password_confirmation" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="***************" data-index="4" required />
            </label>
            <label class="block mt-4 text-sm">
              <span class="text-gray-700">
                Role
              </span>
              <select id="role" type="text" name="role" class="block w-full bg-white p-2.5 rounded-lg mt-1 border border-gray-300 text-sm form-select focus:border-primary/90 focus:outline-none focus:shadow-outline-primary/75">
                <option value="Account Officer">Account Officer</option>
                <option value="Admin">Admin</option>
              </select>
            </label>
            <button id="daftar" type="su" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-primary border border-transparent rounded-lg active:bg-primary/90 hover:bg-primary/75 focus:outline-none focus:shadow-outline-primary">
              Daftar
            </button>
          </form>

          <p class="mt-4">
            <a class="text-sm font-medium text-primary hover:underline" href="/dashboard">
              Kembali
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  nextInput('#form-register', 'keydown');
</script>
<script type="text/javascript">
  $(document).ready(function() {

  });
</script>
@endsection