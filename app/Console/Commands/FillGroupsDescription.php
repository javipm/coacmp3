<?php

namespace App\Console\Commands;

use App\Library\SpinnerTextDescriptions;
use App\Models\Group;
use App\Models\GroupActing;
use Illuminate\Console\Command;

class FillGroupsDescription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fill-groups-description';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill description field for actings that are completed';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $actings = GroupActing::where(['description' => null])->get();

        foreach ($actings as $acting) {
            if ($acting->group->is_completed) {
                $description = SpinnerTextDescriptions::getForActing($acting);
                $acting->description = $description;
                $acting->save();
            }
        }

        $groups = Group::where(['description' => null])->get();

        foreach ($groups as $group) {
            if ($group->is_completed) {
                $description = SpinnerTextDescriptions::getForGroup($group);
                $group->description = $description;
                $group->save();
            }
        }
    }
}
