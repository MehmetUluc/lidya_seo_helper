<?php

namespace LidyaPos\SeoHelper\Providers;

use LidyaPos\Base\Events\CreatedContentEvent;
use LidyaPos\Base\Events\DeletedContentEvent;
use LidyaPos\Base\Events\UpdatedContentEvent;
use LidyaPos\SeoHelper\Listeners\CreatedContentListener;
use LidyaPos\SeoHelper\Listeners\DeletedContentListener;
use LidyaPos\SeoHelper\Listeners\UpdatedContentListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UpdatedContentEvent::class => [
            UpdatedContentListener::class,
        ],
        CreatedContentEvent::class => [
            CreatedContentListener::class,
        ],
        DeletedContentEvent::class => [
            DeletedContentListener::class,
        ],
    ];
}
