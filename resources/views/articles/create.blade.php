
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
                        <input class="input @error('excerpt') is-danger @enderror" 
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
                    <label class="label" for="body">Body</label>

                    <div class="control">
                        <textarea 
                            class="textarea @error('body') is-danger @enderror" 
                            name="body"
                            id="body">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="help is-danger"> {{ $errors->first('body') }} </p>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="tags">Tags</label>

                    <div class="select is-multiple control">
                        <select 
                            name="tags[]"
                            multiple
                        >
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>

                        @error('tags')
                            <p class="help is-danger"> {{ $message }} </p>
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