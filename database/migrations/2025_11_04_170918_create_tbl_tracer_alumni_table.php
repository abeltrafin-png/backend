    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_tracer_alumni', function (Blueprint $table) {
            $table->id('id_tracer');
            $table->string('nim', 20);
            $table->string('nama_lengkap', 100);
            $table->string('program_studi', 100)->nullable();
            $table->year('tahun_lulus');
            $table->string('email', 100)->nullable();
            $table->string('no_hp', 20)->nullable();

            // Data pekerjaan
            $table->enum('status_pekerjaan', ['Bekerja', 'Wirausaha', 'Belum Bekerja', 'Melanjutkan Studi'])->default('Belum Bekerja');
            $table->string('nama_perusahaan', 150)->nullable();
            $table->string('jabatan', 100)->nullable();
            $table->string('bidang_pekerjaan', 100)->nullable();
            $table->text('alamat_perusahaan')->nullable();
            $table->date('tanggal_mulai')->nullable();
            $table->decimal('gaji_awal', 10, 2)->nullable();

            // Data tracer tambahan
            $table->integer('lama_mendapat_pekerjaan')->nullable()->comment('Dalam bulan setelah lulus');
            $table->enum('relevansi_pekerjaan', ['Sangat Relevan','Relevan','Kurang Relevan','Tidak Relevan'])->nullable();
            $table->enum('kepuasan_pekerjaan', ['Sangat Puas','Puas','Cukup','Kurang'])->nullable();
            $table->text('saran_untuk_kampus')->nullable();

            // Data waktu isi
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
        Schema::dropIfExists('tbl_tracer_alumni');
    }
};
