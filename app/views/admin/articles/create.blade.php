<div class="container">
    <form role="form" method="post" action="/admin/post">
        <div class="row">
            <div class="col-md-12">
                <h1>New Article</h1>
            </div>
        </div><!-- end .row -->

        <div class="row">
            <div class="col-md-9 article-editable">
                <!-- title -->
                <div class="form-group">
                    <label class="control-label" for="title">Title:</label>
                    <div class="controls">
                        <input class="form-control" type="text" id="title" name="title" placeholder="Title">
                        <span class="help-inline"></span>
                    </div>
                </div>

                <!-- url -->
                <div class="form-group">
                    <label class="control-label" for="slug">Slug:</label>
                    <div class="controls">
                        <input class="form-control" type="text" id="slug" name="slug" placeholder="Slug">
                        <span class="help-inline"></span>
                    </div>
                </div>

                <!-- excerpt -->
                <div class="form-group">
                    <label class="control-label" for="excerpt">Excerpt:</label>
                    <div class="controls">
                        <textarea class="form-control" id="excerpt" name="excerpt" placeholder="Excerpt"></textarea>
                        <span class="help-inline"></span>
                    </div>
                </div>

                <!-- content -->
                <div class="form-group">
                    <label class="control-label" for="content">Content:</label>
                    <div class="controls">
                        <textarea class="form-control" id="content" name="content" placeholder="Content" rows="15"></textarea>

                        <span class="help-inline"></span>

                    </div>
                </div>
            </div><!-- end .span9 -->

            <div class="col-md-3">
                <!-- tags -->
                <div class="form-group">
                    <label class="control-label" for="tags">Tags:</label>
                    <div class="controls">
                        <input class="form-control" type="text" name="tags" id="tags" />
                        <span class="help-inline"></span>

                    </div>
                </div>

                <!-- author -->
                <div class="form-group">
                    <label class="control-label" for="user_id">Author:</label>
                    <div class="controls">
                        <select class="form-control" name="user_id" id="user_id">
                            @foreach ( $author as $user )
                            <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                            @endforeach
                        </select>
                        <span class="help-inline"></span>
                    </div>
                </div>

                <!-- status -->
                <div class="form-group">
                    <label class="control-label" for="active">Status:</label>
                    <div class="controls">
                        <select class="form-control" name="active" id="active">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        </select>

                        <span class="help-inline"></span>

                    </div>
                </div>

                <!-- created date -->
                <div class="form-group">

                    <label class="control-label" for="publish_date">Publish Date:</label>
                    <div class="controls">
                        <input class="form-control" type="datetime-local" id="publish_date" name="publish_date" />

                        <span class="help-inline"></span>

                    </div>
                </div>
            </div><!-- end .span3 -->
        </div><!-- end .row -->



        <button class="btn btn-large btn-primary" type="submit">Create</button>
      </form>
</div>
