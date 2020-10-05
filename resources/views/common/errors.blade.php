<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

@if (count($errors) > 0)
    <!-- Form Error List -->
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>,
        footer: '<a href>Why do I have this issue?</a>'
      })
      </script>
        
    </div>
@endif
{{-- @if (count($errors) > 0)
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}