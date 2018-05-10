<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Models\Episode;
use App\Models\Event;

use Carbon\Carbon;

class HomeController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
		$episodes = Episode::whereNotNull('posted_at')
			->orderBy('posted_at', 'desc')
			->limit(3)->get();
		$request['date'] = Carbon::now();
		$calendar = $this->calendar($request);
        return view('home.index', compact('episodes', 'calendar'));
    }
	
	public function calendar(Request $request) {
		$date = Carbon::parse($request['date']);
		$first = $date->copy()->startOfMonth();
		$last = $date->copy()->lastOfMonth()->addDay();
		$events = Event::whereBetween('starts_at', [$first, $last])->get();
		return (string) view('event.calendar', compact('events', 'date'));
	}
	
	public function day(Request $request) {
		$date = Carbon::parse($request['date']);
		$events = Event::where('starts_at', $date)->get();
		return (string) view('home.day', compact('events', 'date'));
	}
	
	public function cast() {
		$users = User::where('is_guest', false)->get();
		
		return view('home.cast', compact('users'));
	}
	public function archive() {
		$episodes = Episode::whereNotNull('posted_at')->paginate(5);
		
		return view('home.archive', compact('episodes'));
	}
}
