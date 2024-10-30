<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_nasabah', 'nik', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin',
        'alamat', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'kode_pos',
        'no_rek', 'no_hp', 'email', 'ktp', 'jml_penghasilan', 'jml_penghasilan_other',
        'jml_permohonan', 'j_waktu_permohonan', 'max_pembiayaan', 'tujuan_pembiayaan',
        'status_kawin', 'npwp', 'slip_gaji', 'nama_instansi', 'no_instansi', 'jabatan',
        'nip', 'masa_kerja', 'nama_atasan', 'alamat_kantor', 'karpeg', 'taspen', 
        'sk80', 'sk100', 'sk_terakhir', 'total_angsuran', 'j_waktu_biaya', 'cabang', 'capem'
    ];
}
