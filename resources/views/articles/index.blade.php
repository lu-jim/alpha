@extends ('layout')


@section ('content')

<div id="wrapper">
	<div id="page" class="container">
        @forelse ($article as $article)
            <div id="content">
                <div class="title"> 
                    <h2>
                        <a href="{{ $article->path() }}">
                            {{ $article->title }}
                        </a>
                    </h2>
                </div>
                <p>  
                    <img src="../images/banner.jpg" alt="" class="image image-full" />
                    {{$article->excerpt}}
                </p>
            </div>
        @empty
            <h2>No relevant articles yet.</h2>
        @endforelse
	</div>
</div>

@endsection