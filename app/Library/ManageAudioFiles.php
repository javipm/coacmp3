<?php

namespace App\Library;

use App\Models\Modality;
use App\Models\GroupActing;

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

    public static function getInfoFromFiles(array $files, string $path): array|bool
    {
        $actings = [];
        $errors = [];

        //Files format is MODALITY, GROUP - PHASE.mp3
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'mp3') {
                $filename = pathinfo($file, PATHINFO_FILENAME);
                $file_original_date = filemtime($path.'/'.$file);

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

                    if ($phase == 'Semifinal') {
                        $phase = 'Semifinales';
                    }
                }

                if (! $modality || ! $group || ! $phase) {
                    $errors['INVALID_FILE_FORMAT'][] = $filename;

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
                    'filename_date' => date('Y-m-d H:i:s', $file_original_date),
                    'year' => date('Y', $file_original_date),
                ];
            }
        }

        return [
            'actings' => $actings,
            'errors' => $errors,
        ];
    }
}
