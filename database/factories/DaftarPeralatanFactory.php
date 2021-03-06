<?php

namespace Database\Factories;

use App\Models\Merk;
use App\Models\Seri;
use App\Models\Jenis;
use App\Models\peralatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class DaftarPeralatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $divisi = ['Perencanaan', 'SISDA', 'PSDA', 'Sungai dan Rawa', 'Operasional'];
        $jenis = Jenis::pluck('id');
        $seri = Seri::pluck('id');
        $merk = Merk::pluck('id');
        // $peralatan = peralatan::pluck('id');
        return [
            'seri_id' => $this->faker->randomElement($seri),
            'jenis_id' => $this->faker->randomElement($jenis),
            'merk_id' => $this->faker->randomElement($merk),
            // 'peralatan_id' => $this->faker->randomElement($peralatan),
            'kode_barang' => mt_rand(1, 10),
            'tahun_pengadaan' => $this->faker->year(),
            'divisi' => $this->faker->randomElement($divisi),
            'info' => $this->faker->sentence(),
        ];
    }
}
