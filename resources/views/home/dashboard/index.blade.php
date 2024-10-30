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
            Dashboard
          </h2>
          <div class="grid gap-6 mb-6 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-md">
              <div>
                <p class="mb-2 text-sm font-medium text-gray-600">
                  Total Aplication
                </p>
                <p id="remaining-finance" class="text-lg font-semibold text-gray-700">
                    0
                </p>
              </div>
            </div>
          </div>
      </div>
      </main>

      <x-footer />
    </div>
  </div>
  <script type="text/javascript">

  </script>

  @endsection