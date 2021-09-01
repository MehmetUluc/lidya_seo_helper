<?php

namespace LidyaPos\SeoHelper\Providers;

use LidyaPos\Base\Supports\Helper;
use LidyaPos\Base\Traits\LoadAndPublishDataTrait;
use LidyaPos\SeoHelper\Contracts\SeoHelperContract;
use LidyaPos\SeoHelper\Contracts\SeoMetaContract;
use LidyaPos\SeoHelper\Contracts\SeoOpenGraphContract;
use LidyaPos\SeoHelper\Contracts\SeoTwitterContract;
use LidyaPos\SeoHelper\SeoHelper;
use LidyaPos\SeoHelper\SeoMeta;
use LidyaPos\SeoHelper\SeoOpenGraph;
use LidyaPos\SeoHelper\SeoTwitter;
use Illuminate\Support\ServiceProvider;

/**
 * @since 02/12/2015 14:09 PM
 */
class SeoHelperServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(SeoMetaContract::class, SeoMeta::class);
        $this->app->bind(SeoHelperContract::class, SeoHelper::class);
        $this->app->bind(SeoOpenGraphContract::class, SeoOpenGraph::class);
        $this->app->bind(SeoTwitterContract::class, SeoTwitter::class);

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('packages/seo-helper')
            ->loadAndPublishConfigurations(['general'])
            ->loadAndPublishViews()
            ->loadAndPublishTranslations()
            ->publishAssets();

        $this->app->register(EventServiceProvider::class);

        $this->app->booted(function () {
            $this->app->register(HookServiceProvider::class);
        });
    }
}
