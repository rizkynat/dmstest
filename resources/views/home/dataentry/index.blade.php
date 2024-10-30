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
        <div class="container px-6 mx-auto grid">
          <h2 class="my-6 text-2xl font-semibold text-gray-700">
            Tasklisk Data Entry
          </h2>
          <div class="flex items-center mb-4">
            
          </div>
          <!-- Content -->
          <div class="grid gap-6 mb-6 md:grid-cols-2 xl:grid-cols-4">
          </div>

          <div class="mb-4 grid gap-6 md:grid-cols-2">
            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs">
              <h4 class="mb-4 font-semibold text-gray-800">
                Keuangan
              </h4>
              <div id="chart-first">
              </div>
            </div>

            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs">
              <h4 class="mb-4 font-semibold text-gray-800">
                Top 5 Penulis
              </h4>
              <div id="chart-second">
              </div>
            </div>

            <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs">
              <h4 class="mb-4 font-semibold text-gray-800">
                Top 5 Instansi
              </h4>
              <div id="chart-third">
              </div>
            </div>
          </div>
        </div>
      </main>

      <x-footer />
    </div>
  </div>


  @endsection