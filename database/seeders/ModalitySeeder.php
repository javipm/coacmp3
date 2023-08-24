<?php

namespace Database\Seeders;

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
        foreach (self::MODALITIES as $modality) {
            DB::table('modalities')->insert([
                'name' => $modality,
                'slug' => Str::slug($modality),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        }
    }
}
