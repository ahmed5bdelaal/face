<?php

namespace App\Http\Controllers;
use App\Task;
use App\Comment;
use App\Repl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(Request $request ,$task)
    {
        if (Auth::check()) {
            Comment::create([
                'name' => Auth::user()->name,
                'comment' => $request->comment,
                'user_id' => Auth::user()->id,
                'task_id'  =>$task 
            ]);

            return redirect('/show1/'.$task)->with('success','Comment Added successfully..!');
        }else{
            return back()->withInput()->with('error','Something wrong');
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment ,$task)
    {
        if (Auth::check()) {

            $reply = Repl::where(['comment_id'=>$comment->id]);
            $comment = Comment::where(['user_id'=>Auth::user()->id, 'id'=>$comment->id]);
            if ($reply->count() > 0 && $comment->count() > 0) {
                $reply->delete();
                $comment->delete();
                return redirect('/show1/'.$task);
            }else if($comment->count() > 0){
                $comment->delete();
                return redirect('/show1/'.$task);
                
            }else{
                return redirect('/show1/'.$task);
                
            }

        }    
    }
}