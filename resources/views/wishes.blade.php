@extends('master')

@section('content')

    <div class="bandeau" style="background-image:url(/images/cover19.jpg)">
        <h1 class="white">Wishes 2019</h1>
        <p class="white">Every year we make new resolutions - to be fitter, better, kinder - what about making resolutions for the world? From the serious to the ludicrous, we invite you to imagine 2019's resolutions.</p>
    </div>



    <div class="row">
        <div class="card-dark col-span-2-6 no-shadow no-margin right-rule">
            <div>
                <h2>Add a Wish</h2>
                <p>Fill in a wish for the world!</p>
                <br>

                <form method="GET"
                      action="/create"
                      class="uk-form-stacked">

                    {{ csrf_field() }}

                    <label>Title
                        <input class="uk-input" type="text" name="title" value='{{ old('title') }}'>
                    </label>

                    <label>Description
                        <input class="uk-input" type="text" name="description" value='{{ old('description') }}'>
                    </label>

                    <label>Tags
                        <input class="uk-input" type="text" name="tags" value='{{ old('tags') }}'>
                    </label>

                    <label>Your Name
                        <input class="uk-input" type="text" name="writer" value='{{ old('user') }}'>
                    </label>

                    <button type='submit' class="primary" value="submit-true" name="Wish">
                        w i s h !
                    </button>
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
        </div>


        <div class="card-primary col-span-4-6 no-shadow no-margin">
            {{--<div>--}}

                @foreach($wishes as $wish)
                    <div class="card-dark">
                    <h2>{{ $wish->title }}</h2>
                    <p>{{ $wish->description }}</p>
                    <h3>{{ $wish->writer->getName() }}</h3>
                        <code>{{ $wish->tag->getName() }}</code>
                        <button class="icon secondary"><img src="/images/delete.png"></button>
                        <button class="icon primary"><img src="/images/edit.png"></button>

                    </div>
                @endforeach


            {{--</div>--}}
    </div>


@endsection
