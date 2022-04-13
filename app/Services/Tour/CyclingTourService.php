<?php

namespace App\Services\Tour;

class CyclingTourService implements ITourService
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }
    public function calculatePrice()
    {
        $price = $this->model->price;
        $days = $this->model->days;
        $participants = $this->model->participants->count();
        return round(($price / $participants ) * $days);
    }
}
