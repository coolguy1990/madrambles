<div class="container">
    <form role="form" method="post" action="/admin/post/{{$post->id}}">
        <input type="hidden" name="_method" value="PUT" />

        <div class="row">
            <div class="col-md-12">
                <h1>Edit Article</h1>
            </div><!--  end of col-md-12  -->
        </div><!--  end of row  -->

        <div class="row">
            <div class="col-md-9">
                <div class="alert">
                    <span>errors</span>
                </div> <!--  end of error msg  -->

                <!--  title  -->
                <div class="form-group">
                    @if(isset($errors) && $errors->has('title'))
                        <span class="alert-errors">
                            {{ $errors->first('title') }}
                        </span>
                    @endif

                    <label for="title" class="control-label">Title:</label>
                    <input class="form-control" type="text" id="title" name="title" value="@if (isset($input['title'])) {{$input['title']}} @elseif (isset($post->title)) {{$post->title }}@endif">
                </div> <!--  end of title  -->

                <!--  Slug  -->
                <div class="form-group">
                    @if(isset($errors) && $errors->has('slug'))
                        <span class="alert-errors">
                            {{ $errors->first('slug') }}
                        </span>
                    @endif

                    <label for="slug" class="control-label">Slug:</label>
                    <input class="form-control" type="text" id="slug" name="slug" value="@if (isset($input['slug'])) {{$input['slug']}} @elseif (isset($post->slug)) {{$post->slug }}@endif">
                </div> <!--  end of slug  -->

                <!--  Excerpt  -->
                <div class="form-group">
                    @if(isset($errors) && $errors->has('excerpt'))
                        <span class="alert-errors">
                            {{ $errors->first('excerpt') }}
                        </span>
                    @endif

                    <label for="excerpt" class="control-label">Excerpt:</label>
                    <textarea name="excerpt" id="excerpt" class="form-control" rows="3" value="@if(isset($input['excerpt'])){{$input['excerpt']}}
@elseif(isset($post->excerpt)){{$post->excerpt}}
@endif"></textarea>
                </div> <!--  end of Excerpt  -->

                <!--  Content  -->
                <div class="form-group">
                    @if(isset($errors) && $errors->has('content'))
                        <span class="alert-errors">
                            {{ $errors->first('content') }}
                        </span>
                    @endif

                    <label for="content" class="control-label">Content:</label>
                    <textarea name="content" id="content" class="form-control" rows="10" value="@if(isset($input['content'])){{$input['content']}}
@elseif(isset($post->content)){{$post->content}}
@endif"></textarea>
                </div> <!--  end of Content  -->

                <!--  tags  -->
                <div class="form-group">
                    @if(isset($errors) && $errors->has('tags'))
                        <span class="alert-errors">
                            {{ $errors->first('tags') }}
                        </span>
                    @endif

                    <label for="tags" class="control-label">Tags:</label>
                    <input class="form-control" type="text" name="tags" id="tags" value="{{$post_tags_formatted}}">
                </div> <!--  end of tags  -->

                <!--  Authors  -->
                <div class="form-group">
                    @if(isset($errors) && $errors->has('user_id'))
                        <span class="alert-errors">
                            {{$errors->first('user_id') }}
                        </span>
                    @endif

                    <label for="user_id">Author:</label>
                    <select class="form-control" name="user_id" id="user_id">
                        @foreach( $authors as $author )
                            <option value="{{ $author->id }}" @if ( $author->id == $post->user->id ) selected @endif>{{ $author->first_name }}</option>
                        @endforeach
                    </select>
                </div> <!--  end of authors  -->

                <!-- Active  -->
                <div class="form-group">
                    @if(isset($errors) && $errors->has('active_id'))
                        <span class="alert-errors">
                            {{$errors->first('active_id') }}
                        </span>
                    @endif

                    <label for="active_id" class="control-label">Active:</label>
                    <select class="form-control" name="active_id" id="active_id">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div> <!--  end of active  -->

                <button class="btn btn-large btn-primary" type="submit">Update Post</button>

                <a href="/admin/post/{{$post->id}}" class="btn btn-large" onclick="return confirm('Did you save first?');">Preview</a>
            </div>
        </div>
    </form>
</div>
