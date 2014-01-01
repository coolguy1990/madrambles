<div class="container">
    <form method="post" action="/admin/post">
        <div class="row">
            <div class="span12">
                <h1>New Article</h1>
            </div>
        </div><!-- end .row -->

        <div class="row">
            <div class="span9 article-editable">
                <!-- title -->
                <div class="control-group">
                    <label class="control-label" for="title">Title:</label>
                    <div class="controls">
                        <input type="text" id="title" name="title" placeholder="Title">
                        <span class="help-inline"></span>
                    </div>
                </div>

                <!-- url -->
                <div class="control-group">
                    <label class="control-label" for="slug">Slug:</label>
                    <div class="controls">
                        <input type="text" id="slug" name="slug" placeholder="Slug">
                        <span class="help-inline"></span>
                    </div>
                </div>

                <!-- excerpt -->
                <div class="control-group">
                    <label class="control-label" for="excerpt">Excerpt:</label>
                    <div class="controls">
                        <textarea id="excerpt" name="excerpt" placeholder="Excerpt"></textarea>
                        <span class="help-inline"></span>
                    </div>
                </div>

                <!-- content -->
                <div class="control-group">
                    <label class="control-label" for="content">Content:</label>
                    <div class="controls">
                        <textarea id="content" name="content" placeholder="Content"></textarea>

                        <span class="help-inline"></span>

                    </div>
                </div>
            </div><!-- end .span9 -->

            <div class="span3">
                <!-- tags -->
                <div class="control-group">
                    <label class="control-label" for="tags">Tags:</label>
                    <div class="controls">
                        <input type="text" name="tags" id="tags" />
                        <span class="help-inline"></span>

                    </div>
                </div>

                <!-- author -->
                <div class="control-group">
                    <label class="control-label" for="user_id">Author:</label>
                    <div class="controls">
                        <select name="user_id" id="user_id">
                            @foreach ( $author as $user )
                            <option value="{{ $user->id }}">{{ $user->first_name }}</option>
                            @endforeach
                        </select>
                        <span class="help-inline"></span>
                    </div>
                </div>

                <!-- status -->
                <div class="control-group">
                    <label class="control-label" for="active">Status:</label>
                    <div class="controls">
                        <select name="active" id="active">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                        </select>

                        <span class="help-inline"></span>

                    </div>
                </div>

                <!-- created date -->
                <div class="control-group">

                    <label class="control-label" for="publish_date">Publish Date:</label>
                    <div class="controls">
                        <input type="text" id="publish_date" name="publish_date" placeholder="{{ date('m/d/Y H:i:s') }}">

                        <span class="help-inline"></span>

                    </div>
                </div>
            </div><!-- end .span3 -->
        </div><!-- end .row -->



        <button class="btn btn-large btn-primary" type="submit">Create</button>
      </form>
</div>
