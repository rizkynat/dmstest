<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoanApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_application', function (Blueprint $table) {
            $table->id();
            $table->string('nama_nasabah', 255);
            $table->string('nik', 16);
            $table->string('tempat_lahir', 50);
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string('alamat', 255);
            $table->string('kelurahan', 50);
            $table->string('kecamatan', 50);
            $table->string('kabupaten', 255);
            $table->string('provinsi', 255);
            $table->integer('kode_pos');
            $table->string('no_rek', 50);
            $table->string('no_hp', 20);
            $table->string('email', 255)->unique();
            $table->string('ktp');  // Stores the file path
            $table->decimal('jml_penghasilan', 15, 2);
            $table->decimal('jml_penghasilan_other', 15, 2);
            $table->decimal('jml_permohonan', 15, 2);
            $table->integer('j_waktu_permohonan');
            $table->decimal('max_pembiayaan', 15, 2);
            $table->string('tujuan_pembiayaan', 255);
            $table->enum('status_kawin', ['menikah', 'belum menikah']);
            $table->string('npwp');  // Stores the file path
            $table->string('slip_gaji');  // Stores the file path
            $table->string('nama_instansi', 255);
            $table->string('no_instansi', 255);
            $table->string('jabatan', 255);
            $table->string('nip', 20);
            $table->date('masa_kerja');
            $table->string('nama_atasan', 255);
            $table->string('alamat_kantor', 255);
            $table->string('karpeg');  // Stores the file path
            $table->string('taspen');  // Stores the file path
            $table->string('sk80');  // Stores the file path
            $table->string('sk100');  // Stores the file path
            $table->string('sk_terakhir');  // Stores the file path
            $table->decimal('total_angsuran', 15, 2);
            $table->integer('j_waktu_biaya');
            $table->string('cabang', 50);
            $table->string('capem', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan_application');
    }
}
