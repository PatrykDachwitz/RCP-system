<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class RefreshUrlApi extends Command
{
    private $pathFileWithUrl;

    public function __construct()
    {
        parent::__construct();
        $this->pathFileWithUrl = config('app.file_routes_api');
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'url-api:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command refresh data in file json with list url api';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $routesSaveToFile = [];
        $collectionRoute = Route::getRoutes();
        foreach ($collectionRoute->getRoutesByName() as $key => $route) {
            $routesSaveToFile[] = [
                'name' => $key,
                'method' => $route->methods()[0],
                'url' => $route->uri(),
                'parameter' => $route->parameterNames() ?? null,
            ];
        }
        Storage::put("/public" . $this->pathFileWithUrl, json_encode($routesSaveToFile));
    }
}
