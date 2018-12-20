@foreach($wishes as $wish)
    <div class="card-dark">
        <h2>{{ $wish->title }}</h2>
        <p>{{ $wish->description }}</p>
        <h3>{{ $wish->writer->getName() }}</h3>
        <code>@foreach($wish->tags as $tag)
                #{{ $tag->name }}
            @endforeach</code>



        <form method='POST' action='/{{ $wish->id }}'>
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <button type='submit' class="icon secondary"><img src="/images/delete.png"></button>
        </form>

        <a href='/{{ $wish->id }}/edit'>
            <button class="icon primary"><img src="/images/edit.png"></button>
        </a>

    </div>
@endforeach