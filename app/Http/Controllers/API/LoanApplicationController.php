<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LoanApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class LoanApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Build the query to filter data based on search inputs
        $query = LoanApplication::query();

        // Apply filters based on the form inputs
        if ($request->filled('nama_pemohon')) {
            $query->where('nama_nasabah', 'like', '%' . $request->nama_pemohon . '%');
        }

        if ($request->filled('no_ktp')) {
            $query->where('nik', $request->no_ktp);
        }

        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [
                $request->start_date,
                $request->end_date
            ]);
        }

        if ($request->filled('cabang')) {
            $query->where('cabang', $request->cabang);
        }

        // Paginate the filtered results
        $applications = $query->paginate(2);
        return view('home.dataentry.index', compact('applications'))->with('request', $request);
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
                'nik' => 'required|numeric|unique:loan_applications',
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
        // Retrieve the application by ID with error handling
        $application = LoanApplication::findOrFail($id);

        return view('home.dataentry.detail', compact('application'));
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
        try {
            $loan = LoanApplication::findOrFail($id);  // Find the existing application

            $validated = $request->validate([
                'nama_nasabah' => 'string|max:255',
                'nik' => ['required', 'numeric', Rule::unique('loan_applications')->ignore($loan->id)],
                'tempat_lahir' => 'string|max:50',
                'tgl_lahir' => 'date',
                'jenis_kelamin' => ['required', Rule::in(['pria', 'wanita'])],
                'alamat' => 'string|max:255',
                'kelurahan' => 'string|max:50',
                'kecamatan' => 'string|max:50',
                'kabupaten' => 'string|max:255',
                'provinsi' => 'string|max:255',
                'kode_pos' => 'numeric',
                'no_rek' => 'numeric',
                'no_hp' => 'numeric',
                'email' => 'nullable|string|email|max:255',
                'jml_penghasilan' => 'numeric',
                'jml_penghasilan_other' => 'numeric',
                'jml_permohonan' => 'numeric',
                'j_waktu_permohonan' => 'numeric',
                'max_pembiayaan' => 'numeric',
                'tujuan_pembiayaan' => 'string|max:255',
                'status_kawin' => ['required', Rule::in(['menikah', 'belum menikah'])],
                'nama_instansi' => 'string|max:255',
                'no_instansi' => 'string|max:255',
                'jabatan' => 'string|max:255',
                'nip' => 'numeric',
                'masa_kerja' => 'date',
                'nama_atasan' => 'string|max:255',
                'alamat_kantor' => 'string|max:255',
                'total_angsuran' => 'numeric',
                'j_waktu_biaya' => 'numeric',
                'cabang' => 'string|max:50',
                'capem' => 'string|max:50',
                // Optional file fields
                'ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'npwp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'slip_gaji' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'karpeg' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'taspen' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'sk80' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'sk100' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'sk_terakhir' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            ]);

            // Handle optional file updates with the storeFile helper
            $fileFields = ['ktp', 'npwp', 'slip_gaji', 'karpeg', 'taspen', 'sk80', 'sk100', 'sk_terakhir'];
            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $validated[$field] = storeFile($request->file($field), $field, $loan->$field);
                }
            }

            // Update the record with new data
            $loan->update($validated);

            return redirect('/dataentry')->with('success', 'Loan Application berhasil diperbahurui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('showLoan', $id)
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            $loan = LoanApplication::findOrFail($id);

            // Delete associated files from storage
            $fileFields = ['ktp', 'npwp', 'slip_gaji', 'karpeg', 'taspen', 'sk80', 'sk100', 'sk_terakhir'];

            foreach ($fileFields as $field) {
                if ($loan->$field) {
                    Storage::delete($loan->$field);  // Delete each file if exists
                }
            }

            // Delete the record from the database
            $loan->delete();

            return redirect('/dataentry')->with('success', 'Loan Application berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete the loan application: ' . $e->getMessage());
        }
    }
}
