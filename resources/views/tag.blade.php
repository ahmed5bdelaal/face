@extends('layouts.app')
@section('title')
post
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="https://use.fontawesome.com/9da9b46707.js"></script>

@section('content')
<div class="container">
    <div class="">
        <div class="">
            <div class="">
                

                <div  style="" class="">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="album py-5 bg-light" style="width: 100%">
                        <div class="container" style="width: 100%">
                    
                          <div class="" style="width: 100%">
                            @if(count($tasks) > 0)
                            @foreach($tasks as $task)
                            <div class="" >
                              <div class="">
                              <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{url('uploads/'.$task->thumbnail)}}">
                                <div class="card-body">
                                <p class="card-text"><a href="{{url('/showV/'.$task->user_id)}}"><h3>{{$task->name}}</h3></a><br>{{$task->body}}</p>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                   
                                      {{-- <a href="{{url('/task/'.$task->id)}}" class="btn btn-sm btn-outline-secondary">حذف</a> --}}
                                    </div>
                                  <small class="text-muted">{{$task->created_at}}</small>
                                  </div>
                                  @if (count($coms) > 0)
                                  <h4>{{count($coms)}} Comments</h4>
                @foreach($coms AS $com)
                <div style="">
              <div class="row">
                <div class="col-lg-12">
                  <div class="comments-area">
                    
                    <div class="comment-list">
                      <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                          <div class="thumb">
                            <i class="fa fa-user" style="font-size:30px; width:30px;"></i>
                          </div>
                          <div class="desc">
                            <a href="{{url('/showV/'.$com->user_id)}}"> <h5>{{$com->name}}</h5></a>
                            <p class="date">{{$com->created_at}}</p>
                            <p class="comment">
                              {{$com->comment}}
                             
                              @if(count($repls) > 0)
                              
                              @foreach ($repls as $repl)
                                @if($repl->comment_id===$com->id)
                                @if($repl->user_id===Auth::user()->id)
                                <p class="reply">
                                  <a href="{{url('/showV/'.$repl->user_id)}}"> {{$repl->name}}</a>
                                  {{$repl->reply}}
                                   <form action="{{ url('/rep/'.$repl->id) }}" method="POST">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  
                                  <button type="submit" id="delete-task-{{ $repl->id }}" class="btn btn-sm btn-danger">
                                      <i class="fa fa-btn fa-trash"></i>حذف
                                  </button>
                                @else
                                <p class="reply">
                                  <a href="{{url('/showV/'.$repl->user_id)}}"> {{$repl->name}}</a>
                                  {{$repl->reply}} 
                                @endif
                                
                              </p>
                                @endif
                              
                              
                          @endforeach
                        
                          @endif
                        
                            </p>
                          </div>
                        </div>
                        @if(Auth::user()->id===$com->user_id)
                        <form action="{{ url('/com/'.$com->id.'/'.$task->id) }}" method="POST">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          
                          <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-sm btn-danger">
                              <i class="fa fa-btn fa-trash"></i>حذف
                          </button>
                          </form>
                         
                          @endif
                           
                          <form action="{{ url('/reply/'.$com->id.'/'.$task->id) }}" method="POST" >
                            @csrf
                            <label>رد</label>
                            <input type="text" name="reply" class="form-control">
                            <input type="submit" name="submit" value="رد">
                          </form>
                      </div>
                        @endforeach
                      @else
                      <h5>لا توجد تعليقات</h5>
                                                
                      @endif
                      @endforeach
                      @else
                      لا توجد مقالات
                        @endif
                      </div>

                    </div>
                   
                  <div class="comment-form">
                    <h4>Leave a Comment</h4>
                    <form action="{{ url('/com/'.$task->id) }}" method="POST" >
                      @csrf
                      
                      <div class="row">
                        <div class="offset-lg-2 col-lg-8 col-md-8 col-sm-10">
                          <textarea rows="3" name="comment" class="form-control" placeholder="Comment"></textarea>
                        </div>
                      </div><br />
                      <div class="form-group" style="text-align: center;">
                        <input type="submit" name="submit" value="اضافة" class="btn btn-primary py-3 px-5 submit-comment">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              @endsection
