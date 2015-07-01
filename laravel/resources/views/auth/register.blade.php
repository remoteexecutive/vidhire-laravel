<!-- resources/views/auth/register.blade.php -->
<form action="auth/register" method="post" class="account_form" name="registerform" id="register-form">
    
    {!! csrf_field() !!}
    
    <div class="account_form_fields">

        <p>
            <label for="user_login">Username</label><br/>
            <input type="text" class="text" tabindex="8" name="username" id="user_login" value="{{ old('username') }}" />
        </p>

        <p>
            <label for="first_name">First Name</label><br/>
            <input type="text" class="text" tabindex="9" name="first_name" id="first_name" value="{{ old('first_name') }}" />
        </p>
        
        <p>
            <label for="last_name">Last Name</label><br/>
            <input type="text" class="text" tabindex="10" name="last_name" id="last_name" value="{{ old('last_name') }}" />
        </p>

        <p>
            <label for="user_email">Email</label><br/>
            <input type="text" class="text" tabindex="11" name="email" id="user_email" value="{{ old('email') }}" />
        </p>

        <p>
            <label for="your_password">Enter a password</label><br/>
            <input type="password" class="text" tabindex="12" name="password" id="pass1" value="" />
        </p>

        <p>
            <label for="your_password_2">Enter password again</label><br/>
            <input type="password" class="text" tabindex="13" name="password_confirmation" id="pass2" value="" />
        </p>
        
        <p>
            <input type="submit" class="submit" tabindex="14" name="submit" value="Register &rarr;" />
            <input type="hidden" name="user_type" value="Jobseeker">
        </p>
    </div>
</form>
