@section('content')
<div class="container">

        <form class="form-signin" action="{{ route('home') }}">
                <p class="form-signin-heading lead">Please sign in</p>
                <input type="text" class="form-control" placeholder="Email address" autofocus>
                <input type="password" class="form-control" placeholder="Password">
                <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>

</div> <!-- /container -->
@stop

@section('scripts')

<script type="text/javascript">

	$("body").addClass("login-bg");

</script>

@stop