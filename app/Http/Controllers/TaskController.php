<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Task;
use App\User;
use App\Policies\TaskPolicy;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repl;
use Carbon\Carbon;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Symfony\Contracts\Service\Attribute\Required;
use function GuzzleHttp\Promise\all;

class TaskController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected $tasks;
    
    public function index(){
        $tasks = Task::all();
        $tasks = task::paginate(6); 
         return view('btask',[
             'tasks'=>$tasks,
            
        ]);
    }
    public function showV($comment ,$task){
       
        if($task===Auth::user()->id){
             return redirect('/show/'.$task);
        }else{
            $tasks = task::where('user_id',$task)->get();
            return view('profile',
            [
                'tasks'=>$tasks,
                
            ]);
        }
         
 
     }
     public function show1($task ){
         $rep=Comment::select('id');
        $tasks = task::where('id',$task)->get();
        // $coms = Comment::where('task_id',$task)
        //        ->orderBy('created_at', 'desc')
        //        ->take(10)
        //        ->get();
        $coms=Task::find($task)->comment;
               $repls=Repl::all();
         return view('tag',[
             'tasks'=>$tasks,
             'coms'=>$coms,
             'repls'=>$repls
            
        ]);
    }
    
    public function show($task){
        $tasks = task::where('user_id',$task)->get();
         return view('home',[
             'tasks'=>$tasks,
            
        ]);
    }
    
    public function store(Request $request){

        $validate= $this->validate($request,[
            'name'=>'Required|max:50',
            'body'=>'Required|max:250',
        ]);
        if(!$validate){
            $request->session()->flash('success','في حاجة غلط يلا');
       return Redirect()->back();

        }
        if($request->file('thumbnail')===''){
       
        $user_login_id = auth()->id();
        $tasks=task::create([
        
            'name'=>$request->name,
            'body'=>$request->body,
            
            'user_id'=>$user_login_id
       ]);
       $request->session()->flash('success','البوست اتعدل ي عم');
       return Redirect()->back();

        }else{
            $file=$request->file('thumbnail');
        $time=Carbon::now();
        $dir=date_format($time,'y').'/'. date_format($time,'m');
        $fileName=date_format($time,'h').rand(1,9).'.'.$file->extension();
        Storage::disk('public')->putFileAs($dir,$file,$fileName);
        $user_login_id = auth()->id();
        $tasks=task::create([
            
             'name'=>$request->name,
             'body'=>$request->body,
             'thumbnail'=>$dir.'/'.$fileName,
             'user_id'=>$user_login_id,

        ]);
        $request->session()->flash('success','البوست اتنشر ي عم');
        return Redirect()->back();
        }
    }
    public function update(Request $request ,$task){
        $this->validate($request,[
            'name'=>'Required|max:50',
            'body'=>'Required|max:250'
       ]);
       if($request->file('thumbnail')===''){
        $tasks = task::where('id',$task)->update([
            'name'=>$request->name,
            'body'=>$request->body,
            
        ]);
         return redirect('/showid/'.Auth::user()->id);

       }else{
        $file=$request->file('thumbnail');
        $time=Carbon::now();
        $dir=date_format($time,'y').'/'. date_format($time,'m');
        $fileName=date_format($time,'h').rand(1,9).'.'.$file->extension();
        Storage::disk('public')->putFileAs($dir,$file,$fileName);
        $tasks = task::where('id',$task)->update([
            'name'=>$request->name,
            'body'=>$request->body,
            'thumbnail'=>$dir.'/'.$fileName,
        ]);
         return redirect('/showid/'.Auth::user()->id);
        }
    }
    public function edite($task){
        $this->authorize('destroy',$task);
        $tasks = task::where('id',$task)->get();
    
         return view('/update',[
             'tasks'=>$tasks,
            
        ]);
    }
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy',$task);
        $task->delete();
    
        return redirect('/showid/'.Auth::user()->id);
    }
}