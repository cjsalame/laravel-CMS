@extends('layouts.blog')

@section('title')
{{ $post->title }}
@endsection

@section('header')
<header class="header text-center text-white" style="background-image: url({{ $post->imageUrl }});">
    <div class="container">

        <div class="row">
            <div class="col-md-8 mx-auto">

                <h1>{{ $post->title }}</h1>
                <p class="lead-2 opacity-90 mt-6"> by: {{ $post->user->name }}</p>
                <p>
                    <img class="avatar avatar-sm" src="{{Gravatar::src($post->user->email)}}" alt="">
                </p>
            </div>
        </div>

    </div>
</header>
@endsection

@section('content')
<!-- Main Content -->
<main class="main-content">


    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Blog content
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <div class="section" id="section-content">
        <div class="container">
            {!! $post->content !!}
            <div class="row">
                <div class="gap-xy-2 mt-6">
                    @foreach($post->tags as $tag)
                        <a class="badge badge-pill badge-secondary" href="#">{{$tag->title}}</a>
                        @endforeach
                </div>

            </div>
        </div>
    </div>



    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Comments
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <div class="section bg-gray">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div id="disqus_thread"></div>
                    <script>
                        /**
                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/

                        var disqus_config = function() {
                            this.page.url = "{{ config('app.url') }}/blog/posts/{{ $post->id }}"; // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = "{{ $post->id }}"; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                        };

                        (function() { // DON'T EDIT BELOW THIS LINE
                            var d = document,
                                s = d.createElement('script');
                            s.src = 'https://saas-blog-irgh6dmeit.disqus.com/embed.js';
                            s.setAttribute('data-timestamp', +new Date());
                            (d.head || d.body).appendChild(s);
                        })();

                    </script>
                    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

                </div>
            </div>
        </div>



</main>
@endsection
