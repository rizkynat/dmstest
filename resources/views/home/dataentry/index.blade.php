@extends('layout.master')
@section('title', 'Dataentry')
@section('content')
</head>

<body>
  <div class="flex h-screen bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen}">
    <!-- Sidebar -->
    <x-sidebar />
    <div class="flex flex-col flex-1 w-full">
      <x-global-search />
      <!-- Main -->
      <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto">

          <h2 class="my-6 text-2xl font-semibold text-gray-700">
            Tasklist Data Entry
          </h2>
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
          <div class="mb-4 p-4 rounded-lg shadow-md">
            <!-- Search Form -->
            <form method="GET" action="{{ route('indexLoan') }}" class="grid grid-cols-2 gap-4">
              <div>
                <label for="nama_pemohon" class="block text-sm font-medium text-gray-700">Nama Pemohon</label>
                <input type="text" name="nama_pemohon" id="nama_pemohon"
                  class="mt-1 block w-full border-gray-300 border rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
              </div>

              <div>
                <label for="no_ktp" class="block text-sm font-medium text-gray-700">No. KTP</label>
                <input type="text" name="no_ktp" id="no_ktp"
                  class="mt-1 block w-full border-gray-300 border rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
              </div>

              <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">Tanggal - Aplikasi Start</label>
                <input type="date" name="start_date" id="start_date"
                  class="mt-1 block w-full border-gray-300 border rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
              </div>

              <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">Tanggal Aplikasi - End Date</label>
                <input type="date" name="end_date" id="end_date"
                  class="mt-1 block w-full border-gray-300 border rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
              </div>

              <div>
                <label for="cabang" class="block text-sm font-medium text-gray-700">Cabang</label>
                <input type="text" name="cabang" id="cabang"
                  class="mt-1 block w-full border-gray-300 border rounded-md shadow-sm focus:ring-green-500 focus:border-green-500">
              </div>

              <div class="flex items-end gap-4">
                <button type="submit"
                  class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-md shadow">
                  Cari
                </button>

                <button id="deleteSearchButton" type="reset"
                  class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md shadow">
                  Hapus
                </button>
              </div>
            </form>

            <!-- Data Table -->
            <div class="w-full mt-8 overflow-hidden rounded-lg shadow-md">
              <div class="overflow-x-auto">
                <table id="table-invoice" class="min-w-full table-auto bg-white border-collapse border border-gray-300">
                  <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 bg-gray-100 border-b">
                      <th class="px-4 py-3 border">#</th>
                      <th class="px-4 py-3 border">Nama Pemohon</th>
                      <th class="px-4 py-3 border">No Aplikasi</th>
                      <th class="px-4 py-3 border">KTP</th>
                      <th class="px-4 py-3 border">Tanggal Aplikasi</th>
                      <th class="px-4 py-3 border">Cabang</th>
                      <th class="px-4 py-3 border">Nama AO</th>
                      <th class="px-4 py-3 border"><a href="/dataentry/create" class="bg-white hover:bg-gray-300 text-black font-bold py-1 px-3 rounded shadow">
                          Tambah Data
                        </a href="/dataentry/create"></th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-gray-200">
                    @foreach($applications as $index => $application)
                    <tr class="text-sm text-gray-700">
                      <td class="px-4 py-3">{{ $index + 1 }}</td>
                      <td class="px-4 py-3">{{ $application->nama_nasabah }}</td>
                      <td class="px-4 py-3">{{ $application->id }}</td>
                      <td class="px-4 py-3">{{ $application->nik }}</td>
                      <td class="px-4 py-3">{{ $application->created_at->format('d/m/Y H:i') }}</td>
                      <td class="px-4 py-3">{{ $application->cabang }}</td>
                      <td class="px-4 py-3">ao</td>
                      <td class="px-4 py-3">
                        <a href="/dataentry/{{$application->id}}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-1 px-3 rounded shadow">
                          Detail
                        </a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

                <!-- If no data available -->
                @if($applications->isEmpty())
                <div class="py-4 text-center text-gray-500">
                  Tidak ada data tersedia
                </div>
                @endif
              </div>

              <!-- Pagination -->
              <div class="mt-4">
                {{ $applications->links('pagination::tailwind') }}
              </div>
              
            </div>
          </div>

        </div>
      </main>

      <x-footer />
    </div>
  </div>
  <script type="text/javascript">
    const deleteSearchButton = document.getElementById('deleteSearchButton');
    deleteSearchButton.addEventListener('click', () => {
      // Remove query parameters from the URL without reloading the page
      const url = new URL(window.location);
      url.search = ''; // Clear query parameters
      window.history.replaceState({}, '', url);
    });
  </script>

  @endsection