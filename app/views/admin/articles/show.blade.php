<article class="col-md-12">
    <div class="row">
        <div class="content">
            <a href="/admin/post/{{$post->id}}/edit" class="btn btn-info" role="button">Edit Post</a>
            <h2>{{ ucwords($post->title) }}</h2>
            <ul class="tags meta clearfix">
                <li class="time">
                    <time>{{ ExpressiveDate::make($post->created_at)->getRelativeDate() }}</time>
                </li>
                @foreach($post->tags as $tag)
                    <li class="primary badge">
                        <i class="icon-tag"></i><a href="#">{{$tag->name}}</a>
                    </li>
                @endforeach
            </ul>
            {{ \Michelf\MarkdownExtra::defaultTransform($post->content) }}
        </div>
    </div>
</article>
