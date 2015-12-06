@if(count($errors) > 0)
    <!-- Form error list -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong</strong>
        <br><br>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
    @endforeach
@endif