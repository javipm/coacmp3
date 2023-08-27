<?php

namespace App\Console\Commands;

use App\Library\ManageAudioFiles;
use Illuminate\Console\Command;

class RefreshActings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refresh-actings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Search files in the audio directory for actings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = public_path().env('APP_AUDIO_FILES', '');
        $files = ManageAudioFiles::getActings($path);

        dd($files);
    }
}
