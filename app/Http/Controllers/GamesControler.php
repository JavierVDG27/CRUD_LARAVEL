<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Videogame;
use App\Models\Category;
use App\Http\Requests\storeVideogame;
use App\Mail\VideogameMail;
use Illuminate\Support\Facades\Mail;

class GamesControler extends Controller
{
    //
    public function index(){
        //$videogames = array('Fifa 22', 'NBA 22', 'Mario Kart', 'Super Mario');
        $videogames = Videogame::orderBy('id', 'desc')->get();
        return view('index', ['games'=>$videogames]);
    }
    public function create() {
        $categorias = Category::all();
        return view('create',['categorias'=>$categorias]);
        
    }
    public function help($name_game, $categoria = null){
        $date = Now();
        return view('show', ['nameVideogame'=>$name_game,
                             'categorygame'=>$categoria,
                             'fecha'=>$date]);
     }
     public function storeVideogame(storeVideogame $request){

        // $request->validate([
        //     'name_game'=> 'required|min:5|max:10'
        // ]);

        // $game = new Videogame;
        // $game->name = $request->name_game;
        // $game->category_id = $request->categoria_id;
        // $game->active = 1;
        // $game->save();

        Videogame::create($request->all());

        // foreach (['aleksandergc@gmail.com'] as $recipient){
        // Mail::to($recipient)->send(new VideogameMail());
        // }

        return redirect()->route('games');
     }

     public function view($game_id){
        $game = Videogame::find($game_id);
        $categorias = Category::all();
        return view('update', ['categorias'=>$categorias,'game'=>$game]);
     }

     public function updateVideogame(Request $request){
        $request->validate([
            'name_game'=> 'required|min:5|max:10'
        ]);

        $game= Videogame::find($request->game_id);
        $game->name = $request->name_game;
        $game->category_id = $request->categoria_id;
        $game->active = 1;
        $game->save();

        return redirect()->route('games');
 
    }

    public function delete($game_id){

        $game= Videogame::find($game_id);
        $game->delete();
        return redirect()->route('games');
 

    }

}
