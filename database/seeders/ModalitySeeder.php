<?php

namespace Database\Seeders;

use App\Models\Modality;
use Illuminate\Database\Seeder;

class ModalitySeeder extends Seeder
{
    const MODALITIES = [
        'Comparsa',
        'Chirigota',
        'Coro',
        'Cuarteto',
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
        }
    }
}
