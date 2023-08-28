<?php

namespace App\Library;

use App\Models\GroupActing;
use App\Models\Modality;

class ManageAudioFiles
{
    public static function getFiles(string $path = null): array|bool
    {
        if (! $path) {
            return false;
        }

        $files = scandir($path, SCANDIR_SORT_ASCENDING);

        return $files;
    }

    public static function getInfoFromFiles(array $files): array|bool
    {
        $actings = [];
        $errors = [];

        //Files format is MODALITY, GROUP - PHASE.mp3
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'mp3') {
                $filename = pathinfo($file, PATHINFO_FILENAME);

                $modality = '';
                $group = '';
                $phase = '';

                $filenameWithSpaces = preg_replace('/_+/', ' ', $filename);
                //Explode by first , character
                $filenameModality = explode(',', $filenameWithSpaces, 2);
                $modality = $filenameModality[0] ?? '';

                if (isset($filenameModality[1])) {
                    //Explode by last - character
                    $filenamePhase = preg_split('~-(?=[^-]*$)~', $filenameModality[1]);
                    $group = trim($filenamePhase[0]) ?? '';
                    $phase = isset($filenamePhase[1]) ? ucwords(trim($filenamePhase[1])) : '';

                    if ($phase == 'Gran Final') {
                        $phase = 'Final';
                    }
                }

                if (! $modality || ! $group || ! $phase) {
                    $errors['NOT_FILLED'][] = $filename;

                    continue;
                }

                $modalities = Modality::all()->pluck('name')->toArray();

                if (! in_array($modality, $modalities)) {
                    $errors['INVALID_MODALITY'][] = $filename;

                    continue;
                }

                if (! in_array($phase, GroupActing::PHASES)) {
                    $errors['INVALID_PHASE'][] = $filename;

                    continue;
                }

                $actings[] = [
                    'modality' => $modality,
                    'group' => $group,
                    'phase' => $phase,
                    'filename' => $file,
                    'year' => env('APP_AUDIO_YEAR', ''),
                ];
            }
        }

        return [
            'actings' => $actings,
            'errors' => $errors,
        ];
    }
}
