<!-- resources/views/auth/login.blade.php -->

<form action="auth/login" method="post" class="account_form" id="login-form">
    
    {!! csrf_field() !!}
    
    <p>
        <label for="login_username">Username</label><br/>
        <input type="text" class="text required" name="username" tabindex="1" id="login_username" value="{{ old('username') }}" />
    </p>

    <p>
        <label for="login_password">Password</label><br/>
        <input type="password" class="text required" name="password" tabindex="2" id="login_password" value="" />
    </p>

    <p>
        <label for="rememberme">Remember me</label>
        <input type="checkbox" name="remember" class="checkbox" tabindex="3" id="rememberme" value="forever" checked="checked"/>
    </p>

    <p>
        
        <input type="submit" class="submit" name="login" tabindex="4" value="Login &rarr;" />
        <a class="lostpass" href="" title="Password Lost and Found">Lost your password?</a>
    </p>
</form>