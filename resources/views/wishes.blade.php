@extends('master')

@section('form')

    <div>
        <h2>Add a Wish</h2>
        <p>Fill in a wish for the world!</p>
        <br>

        <form method="POST"
              action="/create"
              class="uk-form-stacked">

            {{ csrf_field() }}

            <label>Title
                <input class="uk-input" type="text" name="title" value='{{ old('title') }}'>
            </label>

            <label>Description
                <input class="uk-input" type="text" name="description" value='{{ old('description') }}'>
            </label>

            <label>Tags (separate tags with commas)
                <input class="uk-input" type="text" name="tags" value='{{ old('tags') }}'>
            </label>

            <label>Your Name
                <input class="uk-input" type="text" name="writer" value='{{ old('writer') }}'>
            </label>

            <button type='submit' class="primary" value="submit-true" name="Wish">
                w i s h !
            </button>

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


