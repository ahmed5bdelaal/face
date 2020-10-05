@extends('layouts/app')

@section('content')
    

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="animate__animated animate__backInDown">Ahmed abdelaal</h1>
      <p class="lead text-muted animate__animated animate__backInUp">هلا والله</p>
      @if (session()->has('success'))
      <script>
        Swal.fire({
  title: '{{session()->get('success')}}',
  showClass: {
    popup: 'animate__animated animate__zoomInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__zoomOutDown'
  }
})
    </script>
      @endif
      <button class="btn btn-primary my-2" onclick="openForm()">اضافة محتوي</button>
      <div class="form-popup" id="myForm">
        <form action="{{ url('task') }}" class="form-container" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <h1>اضافة مقالة</h1>
          
          <label for="title"><b>عنوان المقالة</b></label>
          <input type="text" placeholder="العنوان" name="name" >
      
          <label for="body"><b>محتوي المقالة</b></label>
          <input type="text" placeholder="محتوي المقالة" name="body" required>
          <input class="form-control" type="file" name="thumbnail" accept="image/*"><br>
          <button type="submit" class="btn">اضافة</button>
          <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
      <input type="text" name="search" placeholder="البحث">
      </p>
    </div>
  </section>
  
  <div class="album py-5 bg-light">
    
    <div class="container" >

      <div class="row">
        
        @if (count($tasks) > 0)
        @foreach($tasks as $task)
       
        <div class="col-md-4 animate__animated animate__backInDownd" style="margin-left: auto;
        margin-right: auto;" >
          <div class="card mb-4 shadow-sm">
          <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="{{url('uploads/'.$task->thumbnail)}}">
            <div class="card-body">
            <p class="card-text" style="margin-bottom: 0;" >{{$task->name}}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
              </div>
              <small class="text-muted">{{$task->created_at}}</small>
            </div>
            <p class="card-text">{{$task->body}}</p>
            </div>
            <a href="{{url('/show1/'.$task->id)}}" class="btn btn-sm btn-outline-secondary">المذيد</a>
          </div>
        </div>
      
      @endforeach
      @endif
    
      </div>
    </div>
  </div>
  <div style="text-align: center">
         {{$tasks->links()}}
  </div>
  @endsection
  