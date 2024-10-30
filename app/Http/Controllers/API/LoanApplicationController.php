<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LoanApplication;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LoanApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.dataentry.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.dataentry.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'nama_nasabah' => 'required|string|max:255',
            'nik' => 'required|numeric',
            'tempat_lahir' => 'required|string|max:50',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => ['required', Rule::in(['pria', 'wanita'])],
            'alamat' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:50',
            'kecamatan' => 'required|string|max:50',  
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|numeric',
            'no_rek' => 'required|numeric',
            'no_hp' => 'required|numeric',
            'email' => 'string|email|max:255',
            'ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'jml_penghasilan' => 'required|numeric',
            'jml_penghasilan_other' => 'required|numeric',
            'jml_permohonan' => 'required|numeric',
            'j_waktu_permohonan' => 'required|numeric',
            'max_pembiayaan' => 'required|numeric',
            'tujuan_pembiayaan' => 'required|string|max:255',
            'status_kawin' => ['required', Rule::in(['menikah', 'belum menikah'])],
            'npwp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'slip_gaji' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'nama_instansi' => 'required|string|max:255',
            'no_instansi' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nip' => 'required|numeric',
            'masa_kerja' => 'required|date',
            'nama_atasan' => 'required|string|max:255',
            'alamat_kantor' => 'required|string|max:255',
            'karpeg' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'taspen' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'sk80' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'sk100' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'sk_terakhir' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'total_angsuran' => 'required|numeric',
            'j_waktu_biaya' => 'required|numeric',
            'cabang' => 'required|string|max:50',
            'capem' => 'required|string|max:50',
        ]);

        // Store files with unique names
        $ktpPath = storeFile($request->file('ktp'), 'ktp');
        $npwpPath = storeFile($request->file('npwp'), 'npwp');
        $slipGajiPath = storeFile($request->file('slip_gaji'), 'slip_gaji');
        $karpegPath = storeFile($request->file('karpeg'), 'karpeg');
        $taspenPath = storeFile($request->file('taspen'), 'taspen');
        $sk80Path = storeFile($request->file('sk80'), 'sk80');
        $sk100Path = storeFile($request->file('sk100'), 'sk100');
        $skTerakhirPath = storeFile($request->file('sk_terakhir'), 'sk_terakhir');

        LoanApplication::create(array_merge($validated, [
            'ktp' => $ktpPath,
            'npwp' => $npwpPath,
            'slip_gaji' => $slipGajiPath,
            'karpeg' => $karpegPath,
            'taspen' => $taspenPath,
            'sk80' => $sk80Path,
            'sk100' => $sk100Path,
            'sk_terakhir' => $skTerakhirPath,
        ]));

        return redirect()->back()->with('success', 'Loan Application berhasil di upload!');
    } catch (\Illuminate\Validation\ValidationException $e) {
        return redirect()->route('createLoan', $request->except('_token'))
            ->withErrors($e->validator);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
    }
}
