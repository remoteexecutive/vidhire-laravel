<div class="login-container row">
    <div class="col-md-6">
        <label class="login-form-header">Login</label>

        <!--Login Form-->
        @include('auth/login')
    </div>
    <div class="col-md-6">
        <label class="login-form-header">Register</label>
        
        <!--Registration Form-->
        @include('auth/register')
    </div>
</div><!-- end section_header -->