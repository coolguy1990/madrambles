<div class="container">
    @if(Session::get('auth_error'))
        {{ Session::get('auth_error') }}
    @endif
    <h1>Log In</h1>
    {{ Form::open() }}
        <ul>
            <li>
                {{ Form::label('email', 'Email:') }}
                {{ FOrm::email('email') }}
            </li>
            <li>
                {{ Form::label('password', 'Password:') }}
                {{ Form::password('password') }}
            </li>
            <li>
                {{ Form::submit('Log In') }}
            </li>
        </ul>
    {{ Form::close() }}
</div>
