<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Team;
use App\Models\Match;
use App\Models\Player;
use Illuminate\Http\Request;
use PhpParser\Parser\Multiple;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{

    public function index()
    {
        $matches = Match::with(['team1', 'team2', 'goals.player'])->get();
        return view('admin.matches.index', compact('matches'));
    }


    public function create()
    {
        $team1s = Team::get()->pluck('name', 'id')->prepend('Please select team', '');
        $team2s = Team::get()->pluck('name', 'id')->prepend('Please select team...', '');
        return view('admin.matches.create', compact('team1s', 'team2s'));
    }


    public function store(Request $request)
    {
        $match = Match::create($request->all());
        return Redirect()->route('matches.index');
    }


    public function show(Match $match)
    {
        $matches = Match::all();
        return view('admin.matches.show', compact('matches'));
    }



    public function edit(Match $match)
    {
        //
    }

    public function update(Request $request, Match $match)
    {
        //
    }
    public function destroy(Match $match)
    {
        $match->delete();
        return redirect()->route('matches.index')->with('success', 'Match removed successfully');
    }

    public function addScores(Match $match)
    {
        $team1 = $match->team1_id;
        $team2 = $match->team2_id;
        $players = Player::select(
            DB::raw("CONCAT(first_name,' ',last_name) AS name"),
            'id'
        )
            ->where('team_id', $team1)->orWhere('team_id', $team2)
            ->pluck('name', 'id');
        return view('admin.matches.add_scores', compact('players', 'match'));
    }

    public function updateScores(Request $request, Match $match, Goal $goal)
    {
        $requestData = $request->all();
        try {
            DB::beginTransaction();
            if ($requestData['goals']) {
                foreach ($requestData['goals'] as $gol) {
                    $goal = new Goal();
                    $goal->time = $gol['time'];
                    $goal->player_id = $gol['player_id'];
                    $match->goals()->save($goal);
                }
            }
            $match->status = 1;
            $match->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
        }
        return redirect()->back()->with('success', 'Goals has been saved');
    }

    public function goalReveal(Match $match)
    { }
}
