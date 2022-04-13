<?php

namespace App\Managers\Tour;

use App\Services\Tour\ITourService;

interface ITourManager
{
    public function make($name,$id): ITourService;

}
