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
                        Detail Data Entry - {{ $application->nama_nasabah }}
                    </h2>
                    <div class="mb-4 grid gap-6 w-full">
                        <div class="min-w-0 p-4 bg-white rounded-lg shadow-md">
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
                            @if(session('error'))
                            <div id="alert-danger" class="z-[1000] text-red-700 bg-red-50 flex left-1/2 top-1/8 transform -translate-x-1/2 -translate-y-1/2 fixed p-4 mr-4 mt-4 mb-4 text-sm rounded-lg" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 mr-3">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span id="alert-content-danger" class="font-medium">
                                        {{session('error')}}
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
                            <div id="alert-info" class="w-full text-blue-700 bg-blue-50 flex p-4 mr-4 mt-4 mb-4 text-sm rounded-lg" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 mr-3">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span id="alert-content-info" class="font-medium">
                                        Anda dapat melihat atau mengedit data dibawah
                                    </span>
                                </div>
                            </div>
                            <div class="mt-8 flex gap-4">
                                <form action="{{ route('destroyLoan', $application->id) }}" method="POST" onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button id="resetFormButton" class="w-full bg-red-600 mb-10 hover:bg-red-700 text-white px-4 py-2 rounded-md">Hapus data permanen?</button>

                                </form>
                            </div>
                            <form action="{{ route('updateLoan', $application->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="grid grid-cols-2 gap-4">

                                    <div class="mb-4">
                                        <label for="nama-nasabah" class="block text-sm font-medium text-gray-700 mb-2">Nama <span class="text-red-600">*</span></label>
                                        <input type="text" id="nama-nasabah" name="nama_nasabah" value="{{ $application->nama_nasabah }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan Nama">
                                    </div>

                                    <div class="mb-4">
                                        <label for="nik" class="block text-sm font-medium text-gray-700 mb-2">NIK <span class="text-red-600">*</span></label>
                                        <input type="number" id="nik" name="nik" value="{{ $application->nik }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan Kode Pos">
                                    </div>
                                    <div class="mb-4">
                                        <label for="tempat-lahir" class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir <span class="text-red-600">*</span></label>
                                        <input type="text" id="tempat-lahir" name="tempat_lahir" value="{{ $application->tempat_lahir }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan Tempat Lahir">
                                    </div>
                                    <div class="mb-4">
                                        <label for="tgl-lahir" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir <span class="text-red-600">*</span></label>
                                        <input type="date" id="tgl-lahir" name="tgl_lahir" value="{{ $application->tgl_lahir }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan Tanggal Lahir">
                                    </div>
                                    <div class="mb-4">
                                        <label for="jenis-kelamin" class="block text-sm font-medium mb-2">Jenis kelamin <span class="text-red-600">*</span></label>
                                        <select
                                            id="jenis-kelamin"
                                            name="jenis_kelamin"
                                            class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary">
                                            <option value="" {{ !$application->jenis_kelamin ? 'selected' : '' }}>Pilih</option>
                                            <option value="pria" {{ $application->jenis_kelamin === 'pria' ? 'selected' : '' }}>Pria</option>
                                            <option value="wanita" {{ $application->jenis_kelamin === 'wanita' ? 'selected' : '' }}>Wanita</option>
                                        </select>

                                    </div>

                                    <div class="mb-4">
                                        <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap <span class="text-red-600">*</span></label>
                                        <textarea id="alamat" name="alamat" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan Alamat Lengkap" required>
                                        {{ $application->alamat }}
                                        </textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="kelurahan" class="block text-sm font-medium text-gray-700 mb-2">Kelurahan <span class="text-red-600">*</span></label>
                                        <input type="text" id="kelurahan" name="kelurahan" value="{{ $application->kelurahan }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan Kelurahan">
                                    </div>


                                    <div class="mb-4">
                                        <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-2">Kecamatan <span class="text-red-600">*</span></label>
                                        <input type="text" id="kecamatan" name="kecamatan" value="{{ $application->kecamatan }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan Kecamatan">
                                    </div>

                                    <div class="mb-4">
                                        <label for="kabupaten" class="block text-sm font-medium text-gray-700 mb-2">Kabupaten <span class="text-red-600">*</span></label>
                                        <input type="text" id="kabupaten" name="kabupaten" value="{{ $application->kabupaten }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan Kabupaten">
                                    </div>
                                    <div class="mb-4">
                                        <label for="provinsi" class="block text-sm font-medium text-gray-700 mb-2">Provinsi <span class="text-red-600">*</span></label>
                                        <input type="text" id="provinsi" name="provinsi" value="{{ $application->provinsi }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan Provinsi">
                                    </div>
                                    <div class="mb-4">
                                        <label for="kode-pos" class="block text-sm font-medium text-gray-700 mb-2">Kode Pos <span class="text-red-600">*</span></label>
                                        <input type="number" id="kode-pos" name="kode_pos" value="{{ $application->kode_pos }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan Kode Pos">
                                    </div>
                                    <div class="mb-4">
                                        <label for="no-rek" class="block text-sm font-medium text-gray-700 mb-2">No. Rek tabungan <span class="text-red-600">*</span></label>
                                        <input type="number" id="no-rek" name="no_rek" value="{{ $application->no_rek }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan No Rekening">
                                    </div>
                                    <div class="mb-4">
                                        <label for="no-hp" class="block text-sm font-medium text-gray-700 mb-2">No. HP <span class="text-red-600">*</span></label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 px-3 flex items-center text-gray-500">+62</span>
                                            <input id="no-hp" type="number" name="no_hp" value="{{ $application->no_hp }}" class="block pl-12 w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none" placeholder="Masukan Nomor Handphone">
                                        </div>
                                        <!-- <div class="relative">

                                        <input id="no-hp" type="number" name="no_hp" class="block w-full p-2.5 border border-gray-300 pl-20 mt-1 text-sm focus:border-primary/80 focus:outline-none focus:shadow-outline-purple form-input" placeholder="Masukan Nomor Handphone">
                                        <span class="absolute inset-y-0 px-4 text-sm flex justify-center items-center font-medium text-white transition-colors duration-150 bg-primary border border-transparent rounded-l-md active:bg-primary hover:bg-primary focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                            +62
                                        </span>

                                    </div> -->
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
                                        <input type="email" id="email" name="email" value="{{ $application->email }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan Alamat Email">
                                    </div>
                                    <div class="mb-4">
                                        <label for="ktp" class="block text-sm font-medium text-gray-700 mb-2">Upload KTP <span class="text-red-600">*</span></label>
                                        <div class="flex">
                                            <input id="ktp" name="ktp" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" type="file">
                                            <button id="download-ktp" type="button" class="bg-primary text-white ml-4 rounded-md px-4 py-2 hover:bg-green-400">Download</button>
                                        </div>
                                        <img src="/storage/ktp/{{ $application->ktp }}" class="w-20 mt-2 border border-gray-600" alt="">

                                    </div>
                                </div>

                                <div id="alert-danger" class="w-full text-red-700 bg-red-50 flex p-4 mr-4 mt-4 mb-4 text-sm rounded-lg" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 mr-3">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span id="alert-content-danger" class="font-medium">
                                            Isi semua data yang bertanda (*)
                                        </span>
                                    </div>
                                </div>
                                <!-- Informasi Permohonan -->
                                <div class="mt-6">
                                    <h4 class="mb-4 font-semibold text-gray-800">Informasi Permohonan</h4>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="mb-4">
                                            <label for="jml-penghasilan" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Penghasilan <span class="text-red-600">*</span></label>
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 px-3 flex items-center text-gray-500">Rp</span>
                                                <input id="jml-penghasilan" name="jml_penghasilan" type="number" value="{{ $application->jml_penghasilan }}" class="pl-10 w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none">
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="jml-penghasilan-other" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Penghasilan Lainnya <span class="text-red-600">*</span></label>
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 px-3 flex items-center text-gray-500">Rp</span>
                                                <input id="jml-penghasilan-other" name="jml_penghasilan_other" value="{{ $application->jml_penghasilan_other }}" type="number" class="pl-10 w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none">
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="jml-permohonan" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Permohonan <span class="text-red-600">*</span></label>
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 px-3 flex items-center text-gray-500">Rp</span>
                                                <input id="jml-permohonan" name="jml_permohonan" value="{{ $application->jml_permohonan }}" type="number" class="pl-10 w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none">
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="j-waktu-permohonan" class="block text-sm font-medium text-gray-700 mb-2">Jangka Waktu <span class="text-red-600">*</span></label>
                                            <div class="relative">
                                                <input id="j-waktu-permohonan" name="j_waktu_permohonan" value="{{ $application->j_waktu_permohonan }}" type="number" class="w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none">
                                                <span class="absolute inset-y-0 right-0 px-4 flex items-center rounded-lg text-white bg-green-400">Bulan</span>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="max-pembiayaan" class="block text-sm font-medium text-gray-700 mb-2">Maksimal Hasil Pembiayaan yang dapat diajukan <span class="text-red-600">*</span></label>
                                            <div class="flex">
                                                <div class="relative w-full">
                                                    <span class="absolute inset-y-0 left-0 px-3 flex items-center text-gray-500">Rp</span>
                                                    <input id="max-pembiayaan" name="max_pembiayaan" value="{{ $application->max_pembiayaan }}" type="number" class="block pl-10 w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none">
                                                </div>
                                                <button class="px-3 ml-4 rounded-lg flex items-center text-white bg-primary hover:bg-green-400">Hitung</button>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label for="tujuan-pembiayaan" class="block text-sm font-medium text-gray-700 mb-2">Tujuan Pembiyaan</label>
                                            <input type="text" id="tujuan-pembiayaan" name="tujuan_pembiayaan" value="{{ $application->tujuan_pembiayaan }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" placeholder="Masukan Tujuan Pembiyaan">
                                        </div>

                                        <div class="mb-4">
                                            <label for="status-kawin" class="block text-sm font-medium text-gray-700 mb-2">Status Perkawinan <span class="text-red-600">*</span></label>
                                            <select id="status-kawin" name="status_kawin" class="w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none">
                                                <option value="" {{ !$application->status_kawin ? 'selected' : '' }}>Pilih</option>
                                                <option value="menikah" {{ $application->status_kawin === 'menikah' ? 'selected' : '' }}>Menikah</option>
                                                <option value="belum menikah" {{ $application->status_kawin === 'belum menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                            </select>
                                        </div>

                                        <div class="mb-4">
                                            <label for="npwp" class="block text-sm font-medium text-gray-700 mb-2">Upload NPWP <span class="text-red-600">*</span></label>
                                            <div class="flex">
                                                <input id="npwp" name="npwp" value="{{ request('npwp', old('npwp')) }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" type="file">
                                                <button id="download-npwp" type="button" class="bg-primary text-white ml-4 rounded-md px-4 py-2 hover:bg-green-400">Download</button>
                                            </div>

                                            <img src="/storage/npwp/{{ $application->npwp }}" class="w-20 mt-2 border border-gray-600" alt="">

                                        </div>

                                        <div class="mb-4">
                                            <label for="slip-gaji" class="block text-sm font-medium text-gray-700 mb-2">Upload Slip Gaji <span class="text-red-600">*</span></label>
                                            <div class="flex">
                                                <input id="slip-gaji" name="slip_gaji" value="{{ request('slip_gaji', old('slip_gaji')) }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" type="file">
                                                <button id="download-slip-gaji" type="button" class="bg-primary text-white ml-4 rounded-md px-4 py-2 hover:bg-green-400">Download</button>
                                            </div>

                                            <img src="/storage/slip_gaji/{{ $application->slip_gaji }}" class="w-20 mt-2 border border-gray-600" alt="">

                                        </div>
                                    </div>
                                </div>

                                <div id="alert-danger" class="w-full text-red-700 bg-red-50 flex p-4 mr-4 mt-4 mb-4 text-sm rounded-lg" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5 mr-3">
                                        <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span id="alert-content-danger" class="font-medium">
                                            Pembiayaan yang dapat diajukan akan terisi Automatic dari System, Semua data yang bertanda (*) Wajib di isi semua.
                                        </span>
                                    </div>
                                </div>

                                <!-- Informasi Data Pekerjaan -->
                                <div class="mt-6">
                                    <h4 class="mb-4 font-semibold text-gray-800">Informasi Data Pekerjaan</h4>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="nama-instansi" class="block text-sm font-medium text-gray-700 mb-2">Nama Instansi <span class="text-red-600">*</span></label>
                                            <input id="nama-instansi" name="nama_instansi" value="{{ $application->nama_instansi }}" type="text" class="w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none" placeholder="Masukan Nama Instansi">
                                        </div>

                                        <div>
                                            <label for="no-instansi" class="block text-sm font-medium text-gray-700 mb-2">No Instansi <span class="text-red-600">*</span></label>
                                            <input id="no-instansi" name="no_instansi" value="{{ $application->no_instansi }}" type="text" class="w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none" placeholder="Masukan No Instansi">
                                        </div>

                                        <div>
                                            <label for="jabatan" class="block text-sm font-medium text-gray-700 mb-2">Golongan/Jabatan <span class="text-red-600">*</span></label>
                                            <input id="jabatan" name="jabatan" value="{{ $application->jabatan }}" type="text" class="w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none" placeholder="Masukan Golongan/Jabatan">
                                        </div>
                                        <div>
                                            <label for="nip" class="block text-sm font-medium text-gray-700 mb-2">NIP <span class="text-red-600">*</span></label>
                                            <input id="nip" name="nip" value="{{ $application->nip }}" type="number" class="w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none" placeholder="Masukan NIP">
                                        </div>

                                        <div>
                                            <label for="masa-kerja" class="block text-sm font-medium text-gray-700 mb-2">Masa Kerja <span class="text-red-600">*</span></label>
                                            <input id="masa-kerja" name="masa_kerja" value="{{ $application->masa_kerja }}" type="date" class="w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none">
                                        </div>
                                        <div>
                                            <label for="nama-atasan" class="block text-sm font-medium text-gray-700 mb-2">Nama Atasan <span class="text-red-600">*</span></label>
                                            <input id="nama-atasan" name="nama_atasan" value="{{ $application->nama_atasan }}" type="text" class="w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none" placeholder="Masukan Nama Atasan">
                                        </div>
                                        <div>
                                            <label for="alamat-kantor" class="block text-sm font-medium text-gray-700 mb-2">Alamat Kantor <span class="text-red-600">*</span></label>
                                            <input id="alamat-kantor" name="alamat_kantor" value="{{ $application->alamat_kantor }}" type="text" class="w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none" placeholder="Masukan Alamat Kantor">
                                        </div>
                                    </div>
                                </div>

                                <!-- Dokumen Checklist -->
                                <div class="mt-6 bg-green-400 p-4 rounded-lg shadow-md">
                                    <h4 class="mb-4 text-white font-semibold">Dokumen Checklist</h4>
                                    <table class="w-full bg-white rounded-lg">
                                        <thead>
                                            <tr class="bg-gray-100">
                                                <th class="border px-4 py-2">No</th>
                                                <th class="border px-4 py-2">Dokumen</th>
                                                <th class="border px-4 py-2">Checklist</th>
                                                <th class="border px-4 py-2">Tinjau</th>
                                                <th class="border px-4 py-2">Upload</th>
                                                <th class="border px-4 py-2">Download</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <label for="npwp" class="block text-sm font-medium text-gray-700 mb-2">Upload NPWP <span class="text-red-600">*</span></label>
                                            <tr>
                                                <td class="border px-4 py-2">1</td>
                                                <td class="border px-4 py-2">Karpeg</td>
                                                <td class="border px-4 py-2 text-center"><input id="cb-karpeg" type="checkbox"></td>
                                                <td class="border px-4 py-2"> <img src="/storage/karpeg/{{ $application->karpeg }}" class="w-20 mt-2 border border-gray-600" alt=""></td>
                                                <td class="border px-4 py-2">
                                                    <input id="karpeg" name="karpeg" value="{{ request('karpeg', old('karpeg')) }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" type="file">
                                                </td>
                                                <td class="border px-4 py-2"><button id="download-karpeg" type="button" class="bg-primary text-white px-4 py-2 rounded-md">Download</button></td>
                                            </tr>
                                            <tr>
                                                <td class="border px-4 py-2">2</td>
                                                <td class="border px-4 py-2">Taspen</td>
                                                <td class="border px-4 py-2 text-center"><input id="cb-taspen" type="checkbox"></td>
                                                <td class="border px-4 py-2"> <img src="/storage/taspen/{{ $application->taspen }}" class="w-20 mt-2 border border-gray-600" alt=""></td>
                                                <td class="border px-4 py-2">
                                                    <input id="taspen" name="taspen" value="{{ request('taspen', old('taspen')) }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" type="file">
                                                </td>
                                                <td class="border px-4 py-2"><button id="download-taspen" type="button" class="bg-primary text-white px-4 py-2 rounded-md">Download</button></td>
                                            </tr>
                                            <tr>
                                                <td class="border px-4 py-2">3</td>
                                                <td class="border px-4 py-2">SK 80%</td>
                                                <td class="border px-4 py-2 text-center"><input id="cb-sk80" type="checkbox"></td>
                                                <td class="border px-4 py-2"> <img src="/storage/sk80/{{ $application->sk80 }}" class="w-20 mt-2 border border-gray-600" alt=""></td>
                                                <td class="border px-4 py-2">
                                                    <input id="sk80" name="sk80" value="{{ request('sk80', old('sk80')) }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" type="file">
                                                </td>
                                                <td class="border px-4 py-2"><button id="download-sk80" type="button" class="bg-primary text-white px-4 py-2 rounded-md">Download</button></td>
                                            </tr>
                                            <tr>
                                                <td class="border px-4 py-2">4</td>
                                                <td class="border px-4 py-2">SK 100%</td>
                                                <td class="border px-4 py-2 text-center"><input id="cb-sk100" type="checkbox"></td>
                                                <td class="border px-4 py-2"> <img src="/storage/sk100/{{ $application->sk100 }}" class="w-20 mt-2 border border-gray-600" alt=""></td>
                                                <td class="border px-4 py-2">
                                                    <input id="sk100" name="sk100" value="{{ request('sk100', old('sk100')) }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" type="file">
                                                </td>
                                                <td class="border px-4 py-2"><button id="download-sk100" type="button" class="bg-primary text-white px-4 py-2 rounded-md">Download</button></td>
                                            </tr>
                                            <tr>
                                                <td class="border px-4 py-2">5</td>
                                                <td class="border px-4 py-2">SK Terakhir</td>
                                                <td class="border px-4 py-2 text-center"><input id="cb-sk-terakhir" type="checkbox"></td>
                                                <td class="border px-4 py-2"> <img src="/storage/sk_terakhir/{{ $application->sk_terakhir }}" class="w-20 mt-2 border border-gray-600" alt=""></td>
                                                <td class="border px-4 py-2">
                                                    <input id="sk-terakhir" name="sk_terakhir" value="{{ request('sk-terakhir', old('sk-terakhir')) }}" class="block w-full bg-white p-2.5 border border-gray-300 rounded-lg mt-1 text-sm focus:border-primary focus:outline-none focus:shadow-outline-primary form-input" type="file">
                                                </td>
                                                <td class="border px-4 py-2"><button id="download-sk-terakhir" type="button" class="bg-primary text-white px-4 py-2 rounded-md">Download</button></td>
                                            </tr>
                                            <!-- Tambahkan baris lain sesuai kebutuhan -->
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Data Pengajuan Pembiayaan -->
                                <div class="mt-6">
                                    <h4 class="mb-4 font-semibold text-gray-800">Data Pengajuan Pembiayaan</h4>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div class="mb-4">
                                            <label for="total-angsuran" class="block text-sm font-medium text-gray-700 mb-2">Total Angsuran Pembiayaan <span class="text-red-600">*</span></label>
                                            <div class="relative">
                                                <span class="absolute inset-y-0 left-0 px-3 flex items-center text-gray-500">Rp</span>
                                                <input id="total-angsuran" name="total_angsuran" value="{{ $application->total_angsuran }}" type="number" class="pl-10 w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none">
                                            </div>
                                        </div class="mb-4">
                                        <div class="mb-4">
                                            <label for="j-waktu-biaya" class="block text-sm font-medium text-gray-700 mb-2">Jangka Waktu <span class="text-red-600">*</span></label>
                                            <div class="relative">
                                                <input id="j-waktu-biaya" name="j_waktu_biaya" value="{{ $application->j_waktu_biaya }}" type="number" class="w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none">
                                                <span class="absolute inset-y-0 right-0 px-4 flex items-center rounded-lg text-white bg-green-400">Bulan</span>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="cabang" class="block text-sm font-medium text-gray-700 mb-2">Cabang<span class="text-red-600">*</span></label>
                                            <select id="cabang" name="cabang" class="w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none">
                                                <option value="" {{ !$application->cabang ? 'selected' : '' }}>Pilih</option>
                                                <option value="jakarta" {{ $application->cabang === 'jakarta' ? 'selected' : '' }}>Jakarta</option>
                                                <option value="riau" {{ $application->cabang === 'riau' ? 'selected' : '' }}>Riau</option>
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="capem" class="block text-sm font-medium text-gray-700 mb-2">Capem<span class="text-red-600">*</span></label>
                                            <select id="capem" name="capem" class="w-full bg-white border border-gray-300 rounded-lg p-2.5 focus:border-primary focus:outline-none">
                                                <option value="" {{ !$application->capem ? 'selected' : '' }}>Pilih</option>
                                                <option value="jakarta barat" {{ $application->capem === 'jakarta barat' ? 'selected' : '' }}>Jakarta Barat</option>
                                                <option value="jakarta selatan" {{ $application->capem === 'jakarta selatan' ? 'selected' : '' }}>Jakarta Selatan</option>
                                                <option value="kampar" {{ $application->capem === 'kampar' ? 'selected' : '' }}>Kampar</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="mt-8 flex gap-4">
                                        <button type="submit" class="w-full bg-green-600 t hover:bg-green-700 text-white px-4 py-2 rounded-md">Simpan</button>
                                    </div>

                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </main>

            <x-footer />
        </div>
    </div>
    <script type="text/javascript">
        // delete data
        function confirmDelete(event) {
            // Show confirmation dialog
            if (!confirm('Apakah anda yakin untuk menghapus?')) {
                event.preventDefault(); // Stop form submission if user cancels
            }
        }

        // Get the form and reset button elements
        document.querySelector('#download-ktp').addEventListener('click', () => {
            const ktpFile = document.querySelector('#ktp').files[0];
            if (ktpFile) {
                const url = URL.createObjectURL(ktpFile);
                const a = document.createElement('a');
                a.href = url;
                a.download = ktpFile.name;
                a.click();
                URL.revokeObjectURL(url);
            } else {
                alert('Tidak ada KTP yang diupload.');
            }
        });

        document.querySelector('#download-npwp').addEventListener('click', () => {
            const ktpFile = document.querySelector('#npwp').files[0];
            if (ktpFile) {
                const url = URL.createObjectURL(ktpFile);
                const a = document.createElement('a');
                a.href = url;
                a.download = ktpFile.name;
                a.click();
                URL.revokeObjectURL(url);
            } else {
                alert('Tidak ada NPWP yang diupload.');
            }
        });

        document.querySelector('#download-slip-gaji').addEventListener('click', () => {
            const ktpFile = document.querySelector('#slip-gaji').files[0];
            if (ktpFile) {
                const url = URL.createObjectURL(ktpFile);
                const a = document.createElement('a');
                a.href = url;
                a.download = ktpFile.name;
                a.click();
                URL.revokeObjectURL(url);
            } else {
                alert('Tidak ada Slip Gaji yang diupload.');
            }
        });

        document.querySelector('#karpeg').addEventListener('click', () => {
            document.getElementById('cb-karpeg').checked = true;
        })
        document.querySelector('#download-karpeg').addEventListener('click', () => {
            const ktpFile = document.querySelector('#karpeg').files[0];
            if (ktpFile) {
                const url = URL.createObjectURL(ktpFile);
                const a = document.createElement('a');
                a.href = url;
                a.download = ktpFile.name;
                a.click();
                URL.revokeObjectURL(url);
            } else {
                alert('Tidak ada Karpeg yang diupload.');
            }
        });

        document.querySelector('#taspen').addEventListener('click', () => {
            document.getElementById('cb-taspen').checked = true;
        })
        document.querySelector('#download-taspen').addEventListener('click', () => {
            const ktpFile = document.querySelector('#taspen').files[0];
            if (ktpFile) {
                const url = URL.createObjectURL(ktpFile);
                const a = document.createElement('a');
                a.href = url;
                a.download = ktpFile.name;
                a.click();
                URL.revokeObjectURL(url);
            } else {
                alert('Tidak ada Taspen yang diupload.');
            }
        });

        document.querySelector('#sk80').addEventListener('click', () => {
            document.getElementById('cb-sk80').checked = true;
        })
        document.querySelector('#download-sk80').addEventListener('click', () => {
            const ktpFile = document.querySelector('#sk80').files[0];
            if (ktpFile) {
                const url = URL.createObjectURL(ktpFile);
                const a = document.createElement('a');
                a.href = url;
                a.download = ktpFile.name;
                a.click();
                URL.revokeObjectURL(url);
            } else {
                alert('Tidak ada SK 80% yang diupload.');
            }
        });

        document.querySelector('#sk100').addEventListener('click', () => {
            document.getElementById('cb-sk100').checked = true;
        })
        document.querySelector('#download-sk100').addEventListener('click', () => {
            const ktpFile = document.querySelector('#sk100').files[0];
            if (ktpFile) {
                const url = URL.createObjectURL(ktpFile);
                const a = document.createElement('a');
                a.href = url;
                a.download = ktpFile.name;
                a.click();
                URL.revokeObjectURL(url);
            } else {
                alert('Tidak ada SK 100% yang diupload.');
            }
        });

        document.querySelector('#sk-terakhir').addEventListener('click', () => {
            document.getElementById('cb-sk-terakhir').checked = true;
        })
        document.querySelector('#download-sk-terakhir').addEventListener('click', () => {
            const ktpFile = document.querySelector('#sk-terakhir').files[0];
            if (ktpFile) {
                const url = URL.createObjectURL(ktpFile);
                const a = document.createElement('a');
                a.href = url;
                a.download = ktpFile.name;
                a.click();
                URL.revokeObjectURL(url);
            } else {
                alert('Tidak ada SK Terakhir yang diupload.');
            }
        });
    </script>

    @endsection