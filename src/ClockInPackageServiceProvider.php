<?php

namespace ReesMcIvor\ClockIn;

use Illuminate\Support\ServiceProvider;
class ClockInPackageServiceProvider extends ServiceProvider
{

    protected $namespace = 'ReesMcIvor\ClockIn\Http\Controllers';

    protected bool $isTenancy;

    public function __construct($app)
    {
        parent::__construct($app);
        $this->isTenancy = class_exists('Stancl\Tenancy\TenancyServiceProvider');
    }

    public function boot()
    {
        if($this->app->runningInConsole()) {
            $migrationPath = $this->isTenancy ? 'migrations/tenant' : 'migrations';
            $this->publishes([
                __DIR__ . '/../database/migrations/tenant' => database_path($migrationPath),
                __DIR__ . '/../publish/tests' => base_path('tests/ClockIn'),
                //__DIR__ . '/../publish/config' => base_path('config'),
            ], 'reesmcivor-clockin');
        }

        $this->loadRoutesFrom(__DIR__.'/routes/tenant.php');
    }

    protected function mapTenantRoutes()
    {
        Route::middleware(array_filter(['web', $this->isTenancy ? 'tenant' : '']))
            ->namespace($this->namespace)
            ->group($this->modulePath('routes/tenant.php'));
    }

    private function modulePath($path)
    {
        return __DIR__ . '/../../' . $path;
    }
}
