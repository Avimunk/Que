@extends('app')

@section('content')
<div style="height: 30px;"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('auth.account') }}</div>
				<div class="panel-body">
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
                    @if(Session::has('message'))
                        <div class="alert-box success">
                            <h2>{{ Session::get('message') }}</h2>
                        </div>
                    @endif
					<form class="form-horizontal" role="form" method="post" action="{{ url('/account/update') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="id" value="{{Auth::id()}}">
						<div class="form-group">

							<div class="col-md-8">
								<input type="text" class="form-control" name="first_name" value="{{$user->first_name}}">
							</div><label class="col-md-4 control-label">{{ Lang::get('auth.first_name') }}</label>
						</div>
						<div class="form-group">
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="first_name_en" value="{{$user->first_name_en}}">
                            </div><label class="col-md-4 control-label">{{ Lang::get('auth.first_name_en') }}</label>
                        </div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="text" class="form-control" name="last_name" value="{{$user->last_name}}">
							</div><label class="col-md-4 control-label">{{ Lang::get('auth.last_name') }}</label>
						</div>
                        <div class="form-group">

                            <div class="col-md-8">
                                <input type="text" class="form-control" name="last_name_en" value="{{$user->last_name_en}}">
                            </div><label class="col-md-4 control-label">{{ Lang::get('auth.last_name_en') }}</label>
                        </div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="email" disabled class="form-control" name="email" value="{{$user->email}}">
							</div><label class="col-md-4 control-label">{{ Lang::get('auth.email') }}</label>
						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="email" class="form-control" name="email2" value="{{$user->email2}}">
							</div><label class="col-md-4 control-label">+ {{ Lang::get('auth.email') }}</label>
						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="text" class="form-control" name="credit" value="{{$user->credit}}">
							</div><label class="col-md-4 control-label">{{ Lang::get('auth.credit') }}</label>
						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="text" class="form-control" name="credit2" value="{{$user->credit2}}">
							</div><label class="col-md-4 control-label">{{ Lang::get('auth.credit') }} 2</label>
						</div>
						<div class="form-group">

							<div class="col-md-8">
								<input type="date" class="form-control" name="birthday" value="{{$user->birthday}}">
							</div><label class="col-md-4 control-label">{{ Lang::get('auth.birthday') }}</label>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<button type="submit" class="btn btn-primary" style="float:left">
									שמור
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
