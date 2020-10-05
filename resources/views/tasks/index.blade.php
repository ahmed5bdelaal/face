@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Task Form -->
                    <form action="{{ url('task') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control">
                                <input type="text" name="body" id="task-body" class="form-control">
                            </div>
                        </div>
                        <input class="form-control" type="file" name="thumbnail" accept="image/*">
                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <input type="submit" class="btn btn-default" value="Add Task">
                                   
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
            <!-- Current Tasks -->
          