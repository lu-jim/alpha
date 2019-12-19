
@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-5">Update Article</h1>

            <form method="POST" action="/articles/{{$article->id}}">
            @csrf
            @method('PUT')

                <div class="field">
                    <label for="title" class="label">Title</label>

                    <div class="control">
                        <input class="input" type="text" name="title" id="title" value="{{$article->title}}">
                    </div>
                </div>
                
                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea" 
                            name="excerpt" 
                            id="excerpt"> 
                            {{ $article->excerpt }} 
                            @error('excerpt')
                                <p class="help is-danger"> {{ $errors->first('excerpt') }} </p>
                            @enderror
                        </textarea>
                    </div>
                </div>
                
                <div class="field">
                    <label for="body" class="label">Body</label>

                    <div class="control">
                    <textarea class="textarea" name="body" id="body"> {{ $article->body }} </textarea>
                    </div>
                </div>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link">Submit</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>

@endsection