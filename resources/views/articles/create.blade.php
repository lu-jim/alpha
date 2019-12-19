
@extends('layout')

@section('head')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-5">New Article</h1>

            <form method="POST" action="/articles">
            @csrf
                <div class="field">
                    <label for="title" class="label">Title</label>

                    <div class="control">
                        <input class="input @error('title') is-danger @enderror" 
                        type="text" 
                        name="title" 
                        id="title"
                        value="{{ old('title') }}"> 
                        @error('title')
                            <p class="help is-danger"> {{ $errors->first('title') }} </p>
                        @enderror
                    </div>
                </div>
                
                <div class="field">
                    <label for="excerpt" class="label">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea @error('excerpt') is-danger @enderror" 
                        type="text" 
                        name="excerpt" 
                        id="excerpt"   
                        value="{{ old('excerpt') }}">
                        @error('excerpt')
                            <p class="help is-danger"> {{ $errors->first('excerpt') }} </p>
                        @enderror
                        </textarea>
                    </div>
                </div>
                
                <div class="field">
                    <label for="body" class="label">Body</label>

                    <div class="control">
                        <textarea class="textarea @error('body') is-danger @enderror" 
                        type="text" 
                        name="body"
                        id="body"
                        value= "{{ old('body') }}">
                        @error('body')
                            <p class="help is-danger"> {{ $errors->first('body') }} </p>
                        @enderror
                        </textarea>
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