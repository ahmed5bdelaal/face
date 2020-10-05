<?php

namespace App\Http\Controllers;
use App\Task;
use App\Comment;
use App\Repl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ReplController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $comment , $task)
    {
        if (Auth::check()) {
            Repl::create([
                
                'name' => Auth::user()->name,
                'reply' => $request->reply,
                'user_id' => Auth::user()->id,
                'comment_id' => $comment,
            ]);

            return redirect('/show1/'.$task);
        }

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Repl $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Repl $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repl $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repl $reply)
    {
        if (Auth::check()) {
            $reply = Repl::where(['id'=>$reply->id,'user_id'=>Auth::user()->id]);
            if ($reply->delete()) {
                return redirect()->back();
            }else{
                return redirect()->back();
            }
        }else{

        }
        return redirect()->back();
    }



}