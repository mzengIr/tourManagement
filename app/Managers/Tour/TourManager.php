<?php

namespace App\Managers\Tour;

use App\Repositories\TourRepository;
use App\Services\Tour\AirTourService;
use App\Services\Tour\CyclingTourService;
use App\Services\Tour\ITourService;
use App\Services\Tour\LandTourService;
use Illuminate\Support\Arr;

class TourManager implements ITourManager
{
    private $tours = [];
    private $app;
    private $tourRepository;
    public function __construct($app)
    {
        $this->app = $app;
        $this->tourRepository = resolve('TourRepository');
    }

    public function make($name,$id): ITourService
    {
        $service = Arr::get($this->tours, $name);
        if ($service) {
            return $service;
        }
        $createMethod = 'create' . ucfirst($name) . 'TourService';
        if (!method_exists($this, $createMethod)) {
            throw new \Exception("Tour $name is not supported");
        }
        $service = $this->{$createMethod}($id);
        $this->tours[$name] = $service;
        return $service;
    }
    private function createAirTourService($id): AirTourService
    {
        $model = $this->tourRepository->find($id);
        return new AirTourService($model);
    }

    private function createLandTourService($id): LandTourService
    {
        $model = $this->tourRepository->find($id);
        return new LandTourService($model);
    }

    private function createCycleTourService($id): CyclingTourService
    {
        $model = $this->tourRepository->find($id);
        return new CyclingTourService($model);
    }

}
