<div class="container">
    <h1>Posts</h1>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>id</th>
                <th>Title</th>
                <th>Slug</th>
                <th>Author</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Last Updated</th>
                <th>Publish Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td><a href="/admin/post/{{ $article->id }}">{{ $article->title }}</a></td>
                    <td><a href="/admin/post/{{ $article->id }}">{{ $article->slug }}</a></td>
                    <td><a href="/admin/user/{{ $article->user->id}}">{{ $article->user->screen_name }}</a></td>
                    <td>{{ $article->active ? 'yes':'no' }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->updated_at }}</td>
                    <td>{{ $article->publish_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
