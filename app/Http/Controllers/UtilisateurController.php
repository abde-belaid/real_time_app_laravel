<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Models\Message;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(){

    //     $id=session()->get("id_user");
    //     dd($id);
    // }

    public function index()
    {
        $sender = Utilisateur::findOrFail(session('id_user'));
        $users=Utilisateur::where('id','!=',session('id_user'))->get();
        return view('messages')->with(['users' => $users,'sender'=>$sender]);
    }

    /**
     * Show the form for creating a new resource.
     */


    public function send(Request $request)
    {
        $newmessage = new Message();

        $content = $request->content;
        $sender_id = $request->sender_id;
        $receiver_id = $request->receiver_id;

        $newmessage->content = $content;
        $newmessage->sender_id = $sender_id;
        $newmessage->receiver_id = $receiver_id;

        $newmessage->save();

        event(new NewMessage($newmessage));

    // return response()->json(['success' => true]);
        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function findMessage($sender_id,$receiver_id)
    {
        // dd($receiver_id);
        $conversation=Message::orderBy("created_at")->whereRaw("sender_id in ($sender_id,$receiver_id) and receiver_id in ($sender_id,$receiver_id)")->get();
        // dd($conversation);
        // dd($messages);
        $sender = Utilisateur::findOrFail(session('id_user'));
        $receiver=Utilisateur::findOrFail($receiver_id);
        $users=Utilisateur::where('id','!=',session('id_user'))->get();
        return view("messages",compact("conversation","sender","users","receiver"));
        // $conversation=[];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
