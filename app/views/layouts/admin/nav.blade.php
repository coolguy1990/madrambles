<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="/admin" class="navbar-brand">MadRambles</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="/admin/user">User</a></li>
            <li><a href="/admin/tag">Tags</a></li>
            <li class="dropdown">
                <a href="/admin/post" class="dropdown-toggle" data-toggle="dropdown">Posts <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="/admin/post">Posts</a></li>
                    <li class="divider"></li>
                    <li><a href="/admin/post/create">New Post</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="/">Main Site</a></li>
            <li><a href="">Link</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Account Settings <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="/admin/logout">Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
