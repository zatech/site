@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <strong>Error.</strong>

        @foreach ($errors->all() as $error)
            <br>
            {{ $error }}
        @endforeach
    </div>
@endif
