<div>
    <h1>Whoops!</h1>
    <p>Looks like you mis-filled the form. Check: </p>
    {{--</div>--}}
    <div class="card-dark no-shadow no-margin small-pad">
    <span class="error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </span>
    </div>

</div>