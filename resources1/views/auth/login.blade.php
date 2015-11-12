@extends('app')

@section('content')

<div class="container">
	<div class="row">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                {!! Lang::get('auth.error') !!}
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('auth.login') }}</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<div class="col-md-8">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
							<label class="col-md-4 control-label">{{ Lang::get('auth.email') }}</label>
						</div>

						<div class="form-group">
							<div class="col-md-8">
								<input type="password" class="form-control" name="password">
							</div>
							<label class="col-md-4 control-label">{{ Lang::get('auth.password') }}</label>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember">    &nbsp;&nbsp;&nbsp;   {{ Lang::get('auth.remember') }}     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 ">
								<button type="submit" class="btn btn-primary">{{ Lang::get('auth.login') }}</button>
                                <br><br>
								<a class="btn " style="color: white;direction: rtl" href="{{ url('/password/email') }}">{{ Lang::get('auth.forgot') }}</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

<!-- 		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('auth.register') }}</div>
				<div class="panel-body">

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<div class="col-md-8">
								<input type="text" class="form-control" name="first_name" value="">
							</div>
							<label class="col-md-4 control-label">{{ Lang::get('auth.first_name') }}</label>
						</div>
 						<div class="form-group">
 							<div class="col-md-8">
 								<input type="text" class="form-control" name="first_name_en" value="">
 							</div>
 							<label class="col-md-4 control-label">{{ Lang::get('auth.first_name_en') }}</label>
 						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="text" class="form-control" name="last_name" value="">
							</div><label class="col-md-4 control-label">{{ Lang::get('auth.last_name') }}</label>
						</div>
 						<div class="form-group">

 							<div class="col-md-8">
 								<input type="text" class="form-control" name="last_name_en" value="">
 							</div><label class="col-md-4 control-label">{{ Lang::get('auth.last_name_en') }}</label>
 						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div><label class="col-md-4 control-label">{{ Lang::get('auth.email') }}</label>
						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="text" class="form-control" name="credit" value="">
							</div><label class="col-md-4 control-label"><span onclick="$('.sowinfo1').toggle()">{{ Lang::get('auth.credit') }}</span> <br/><small style="display: none" class="sowinfo1" >ארבע הספרות של כרטיס האשראי נועדו בכדי לוודא שהזיכוי יגיע לבעל הכרטיס הנכון</small></label>
						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="text" class="form-control" name="credit2" value="">
							</div><label class="col-md-4 control-label"><span  onclick="$('.sowinfo2').toggle()">{{ Lang::get('auth.credit2') }}</span>  <br/><small style="display: none" class="sowinfo2" >ארבע הספרות של כרטיס האשראי נועדו בכדי לוודא שהזיכוי יגיע לבעל הכרטיס הנכון</small></label>
						</div>
						<div class="form-group" style="display: none">

							<div class="col-md-8">
								<input type="date" class="form-control" name="birthday" value="">
							</div><label class="col-md-4 control-label">{{ Lang::get('auth.birthday') }}</label>
						</div>


						<div class="form-group">

							<div class="col-md-8">
								<input type="password" class="form-control" name="password">
							</div><label class="col-md-4 control-label">{{ Lang::get('auth.password') }}</label>
						</div>

						<div class="form-group">

							<div class="col-md-8">
								<input type="password" class="form-control" name="password_confirmation">
							</div><label class="col-md-4 control-label">{{ Lang::get('auth.password_confirmation') }}</label>
						</div>

						<div class="form-group">
							<div class="col-md-8 ">
								<button type="submit" class="btn btn-primary">
									{{ Lang::get('auth.register') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div> -->
        <div class="col-md-2"></div>
	</div>
</div>
@endsection
