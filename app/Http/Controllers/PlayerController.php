<?php

namespace App\Http\Controllers;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\Team;

class playerController extends Controller
{
   
    public function index()
    {
        
        $players = Player::with(['team'])->orderBy('id','desc')->simplePaginate(6);
        return view('admin.players.index',compact('players'));
    }

    
    public function create()
    {
       
        $teams = Team::pluck('name','id');
        return view('admin.players.create', compact('teams'));
    }

    
    public function store(Request $request, Player $player,Team $team)
     {   
        $request->validate([
            'first_name' => 'bail|required|unique:players|max:255',
            'last_name' => 'required',
            'team_id'=>'required',
        ]);
        $player = new Player;
        $player->first_name = $request->get('first_name');
        $player->last_name = $request->get('last_name');
        $player->team_id = $request->get('team_id');
        $player->save();
        return Redirect()->route('players.index');
        
        
    }

    public function show(Player $player)
    {
        return view('admin.players.show', compact('player'));
    }

    public function edit(Player $player)
    {
        $teams = Team::pluck('name','id');
        return view('admin.players.edit',compact('player','teams'));
    }

    public function update(Request $request, Player $player)
    {   
        $request->validate([
            'first_name' => 'bail|required|max:255',
            'last_name' => 'required',
            'team_id'=>'required',
        ]);
        $player->first_name = $request->get('first_name');
        $player->last_name = $request->get('last_name');
        $player->team_id = $request->get('team_id');
        $player->save();
        return Redirect()->route('players.index');
    }     
    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('players.index')->with('success','player deleted successfully');
    }
}
