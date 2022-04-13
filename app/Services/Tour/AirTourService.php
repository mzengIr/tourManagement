<?php

namespace App\Services\Tour;


class AirTourService implements ITourService
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
        return round(($price - ((9/100) * $price) ) * $days);
    }
}
