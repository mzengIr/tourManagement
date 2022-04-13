<?php

namespace App\Repositories;

class TourRepository extends Repository
{
    public function model()
    {
        return \App\Models\Tour::class;
    }
}
