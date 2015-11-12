@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
	    <div class="col-md-2"></div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('auth.login') }}</div>
				<div class="panel-body">


					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">

							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
							<label class="col-md-4 control-label">{{ Lang::get('auth.email') }}</label>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">{{ Lang::get('auth.password') }}</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> {{ Lang::get('auth.remember') }}
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">{{ Lang::get('auth.login') }}</button>

								<a class="btn btn-link" href="{{ url('/password/email') }}">{{ Lang::get('auth.forgot') }}</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-md-6">
        			<div class="panel panel-default">
        				<div class="panel-heading">{{ Lang::get('auth.register') }}</div>
        				<div class="panel-body">

        					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
        						<input type="hidden" name="_token" value="{{ csrf_token() }}">

        						<div class="form-group">
        							<label class="col-md-4 control-label">{{ Lang::get('auth.first_name') }}</label>
        							<div class="col-md-6">
        								<input type="text" class="form-control" name="first_name" value="">
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-md-4 control-label">{{ Lang::get('auth.last_name') }}</label>
        							<div class="col-md-6">
        								<input type="text" class="form-control" name="last_name" value="">
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-md-4 control-label">{{ Lang::get('auth.email') }}</label>
        							<div class="col-md-6">
        								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-md-4 control-label">{{ Lang::get('auth.credit') }}</label>
        							<div class="col-md-6">
        								<input type="text" class="form-control" name="credit" value="">
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-md-4 control-label">{{ Lang::get('auth.birthday') }}</label>
        							<div class="col-md-6">
        								<input type="date" class="form-control" name="birthday" value="">
        							</div>
        						</div>
        						<div class="form-group">
        							<label class="col-md-4 control-label">{{ Lang::get('auth.password') }}</label>
        							<div class="col-md-6">
        								<input type="password" class="form-control" name="password">
        							</div>
        						</div>

        						<div class="form-group">
        							<label class="col-md-4 control-label">{{ Lang::get('auth.password_confirmation') }}</label>
        							<div class="col-md-6">
        								<input type="password" class="form-control" name="password_confirmation">
        							</div>
        						</div>

        						<div class="form-group">
        							<div class="col-md-6 col-md-offset-4">
        								<button type="submit" class="btn btn-primary">
        									{{ Lang::get('auth.register') }}
        								</button>
        							</div>
        						</div>
        					</form>
        				</div>
        			</div>
        		</div>
        <div class="col-md-2"></div>
	</div>
</div>
@endsection
