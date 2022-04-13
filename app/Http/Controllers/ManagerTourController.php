<?php

namespace App\Http\Controllers;

use App\Events\UserRegisteredInTour;
use App\Mail\UserInformationRegistered;
use App\Managers\Tour\ITourManager;
use App\Repositories\TourRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class ManagerTourController extends Controller
{
    public function register(Request $request,UserRepository $userRepository,TourRepository  $tourRepository)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'national_code' => 'required|unique:users|max:10',
            'phone' => 'required|max:12',
            'birthday' => 'required|date',
            'tour_id' => 'required'
        ]);
        $data = [
            'email' => 'test2@yahoo.com',
            'password' => '123123',
            'name' => $request['name'],
            'national_code' => $request['national_code'],
            'phone' => $request['phone'],
            'birthday' => $request['birthday']
        ];
        $user = $userRepository->create($data);
        $user->tours()->attach($request['tour_id']);
        $tour = $tourRepository->find($request['tour_id']);
        $tourFactory = app(ITourManager::class);
        $tourFactory = $tourFactory->make($tour->type,$tour->id);
        $tourPrice = $tourFactory->calculatePrice();
        event(new UserRegisteredInTour($user,$tour,$tourPrice));
        return ['tourPrice' => $tourPrice];
    }
}
