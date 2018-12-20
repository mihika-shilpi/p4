@extends('master')

@section('form')

    <div>
        <h2>Editing Wish</h2>
        <p>Please be mindful to not change other people's wishes. You may edit them to add or improve them!</p>
        <br>

        <form method="POST"
              action="/{{ $wish->id }}/update"
              class="uk-form-stacked">
            {{ method_field('put') }}

            {{ csrf_field() }}

            <label>Title
                <input class="uk-input" type="text" name="title" value='{{ old('title', $wish->title) }}'>
            </label>

            <label>Description
                <input class="uk-input" type="text" name="description" value='{{ old('description', $wish->description) }}'>
            </label>

            <label>Tags
                <input class="uk-input" type="text" name="tags" value='{{old('tags')}}
@foreach($wish->tags as $tag){{$tag->name}}, @endforeach'>
            </label>

            <label>Your Name
                <input class="uk-input" type="text" name="writer" value='{{ old('writer', $wish->writer->getName() )}}'>
            </label>

            <button type='submit' class="primary" value="submit-true" name="Wish">
                d o n e !
            </button>

            <a href='/'>
                <button class="secondary" name="Cancel">c a n c e l</button>
            </a>
            {{--<button type='submit'--}}
            {{--class="primary icon"--}}
            {{--value="submit-true"--}}
            {{--name="Wish">--}}
            {{--<img src="/images/add.png">--}}
            {{--</button>--}}
            <input type='hidden' name='submitted' value='1'>

        </form>

        @if(count($errors) > 0)
            @include("Includes/Error")
        @endif

    </div>

@endsection

@section('wishes')

    @include('/Includes/allWishes')


@endsection


