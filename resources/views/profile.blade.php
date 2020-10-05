@extends('layouts.app')
@section('title')
Profile
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="album py-5 bg-light">
                        <div class="container">
                    
                          <div class="row">
                            @if (count($tasks) > 0)
                            @foreach($tasks as $task)
                            <div class="col-md-4">
                              <div class="card mb-4 shadow-sm">
                              <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{url('uploads/'.$task->thumbnail)}}">
                                <div class="card-body">
                                <p class="card-text">{{$task->name}}<br>{{$task->body}}</p>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                   
                                      {{-- <a href="{{url('/task/'.$task->id)}}" class="btn btn-sm btn-outline-secondary">حذف</a> --}}
                                    </div>
                                  <small class="text-muted">{{$task->created_at}}</small>
                                  </div>
                                </div>
                              </div>
                            </div>
                          @endforeach
                          @endif
                        </div>
                      </div>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
