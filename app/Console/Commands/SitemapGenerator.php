<?php

namespace App\Console\Commands;

use App\Models\GroupActing;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SitemapGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sitemap-generator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap for current website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.1))
            ->add(Url::create('/search')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                ->setPriority(0.5))
            ->add(Url::create('/comparsas')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.5))
            ->add(Url::create('/chirigotas')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.5))
            ->add(Url::create('/coros')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.5))
            ->add(Url::create('/cuartetos')
                ->setLastModificationDate(Carbon::yesterday())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.5));

        $actings = GroupActing::orderBy('created_at', 'desc')->get();

        foreach ($actings as $acting) {
            $sitemap->add(
                Url::create(route('group-acting', ['modality' => $acting->group->modality->slug, 'year' => $acting->group->year, 'group' => $acting->group->slug, 'phase' => strtolower($acting->phase)]))
                    ->setLastModificationDate($acting->created_at)
            );
        }

        $sitemap->writeToFile(public_path().'/'.'sitemap.xml');
    }
}
