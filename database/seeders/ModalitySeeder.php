<?php

namespace Database\Seeders;

use App\Models\Modality;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModalitySeeder extends Seeder
{
    const MODALITIES = [
        'Comparsas',
        'Chirigotas',
        'Coros',
        'Cuartetos',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (self::MODALITIES as $modalityName) {
            $modality = new Modality();
            $modality->name = $modalityName;
            $modality->save();
            // DB::table('modalities')->insert([
            //     'name' => $modalityName,
            //     'slug' => Str::slug($modalityName),
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            // ]);
        }
    }
}
