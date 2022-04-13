<?php

namespace Tests\Unit;

use App\Managers\Tour\ITourManager;
use PHPUnit\Framework\TestCase;

class RegisterTourTest extends TestCase
{
    public function priceCalculateTest()
    {
        $tourFactory = app(ITourManager::class);
        $tourFactory = $tourFactory->make('land',21);
        $tourPrice = $tourFactory->calculatePrice();
        $this::assertEquals(234353 , $tourPrice);
    }
}
