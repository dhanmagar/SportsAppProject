<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class teamController extends Controller
{

    public function index()
    {

        $teams = Team::orderby('id', 'desc')->get();
        return view('admin.teams.index', compact('teams'));

    }


    public function create()
    {

        return view('admin.teams.create');

    }

    public function store(Request $request)
    {     
        $request->validate([
            'name' => 'required',
            ]);
            if($request->file('logo')){
                $logoName = time().'-'.$request->file('logo')->getClientOriginalName();
                if (!file_exists(public_path('/images'))) {
                  mkdir(public_path('/images'), 0755, true);
                }
                $oldFileName = $team->logo;
                if($request->file('logo')->move(public_path('/images'), $logoName)){
                    $team->logo = $logoName;
                }
                if($oldFileName && file_exists(public_path('/image').'/'.$oldFileName)){
                  unlink(public_path('/image').'/'.$oldFileName);
                }
            }
        team::create($request->all()); 
        return redirect()->route('teams.index')->with('success','team created successfully.');
    
    }


    public function show(Team $team)
    {

        return view('admin.teams.show',compact('team'));

    }


    public function edit(Team $team)
    {

        return view('admin.teams.edit',compact('team'));

    }


    public function update(Request $request, Team $team)
    {
        $request->validate([
            'name' => "required|unique:teams,name,$team->id",
        ]);
        
        if($request->file('logo')){
           
            $logoName = time().'-'.$request->file('logo')->getClientOriginalName();
            if (!file_exists(public_path('/images'))) {
              mkdir(public_path('/images'), 0755, true);
            }
            $oldFileName = $team->logo;
            if($request->file('logo')->move(public_path('/images'), $logoName)){
                $team->logo = $logoName;
            }
            if($oldFileName && file_exists(public_path('/image').'/'.$oldFileName)){
              unlink(public_path('/image').'/'.$oldFileName);
            }
        }
        $team->update($request->all());
        
        return redirect()->route('teams.index')->with('success','team updated successfully');

    }


    public function destroy(team $team)
    {
        
        $team->delete();
        return redirect()->route('teams.index')->with('success','team deleted successfully');
        
    }
}
