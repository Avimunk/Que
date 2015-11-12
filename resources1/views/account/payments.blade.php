@extends('app')

@section('content')
<div style="height: 30px;"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('auth.payments.calculator') }}</div>
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
                    <br/>
                    <div class=" panel-warning success" style="border-bottom:1px solid red">{{ Lang::get('auth.payments_text') }}</div>
                    <br/><br/>
                    <style>
                        th{
                            text-align: right;
                        }
                    </style>
					<table class="table table-striped">
                        <thead>
                            <tr style="text-align: right">
                                <th>{{ Lang::get('auth.payments.date') }}</th>
                                <th>{{ Lang::get('auth.payments.company') }}</th>
                                <th>{{ Lang::get('auth.payments.order') }} </th>
                                <th>{{ Lang::get('auth.payments.cashback') }} </th>
                                <th>שולם/לא שולם</th>

                                <th>{{ Lang::get('auth.payments.payment_date') }}</th>
                                <th>{{ Lang::get('auth.payments.reference') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                    @if(count($payments) > 0)
                        @foreach ($payments as $payment)
                            <tr>
                                <td>{{$payment->buy_date}}</td>
                                <td>"{{$payment->company_id}}"</td>
                                <td>{{$payment->order}} </td>
                                <td>{{$payment->cashback}} </td>
                                <td>@if($payment->payed == 1) <h2>+</h2> @else <h2>-</h2> @endif</td>
                                <td>{{$payment->payment_date}}</td>
                                <td>{{$payment->reference}}</td>
                            </tr>
                        @endforeach
                    @else
                        </tbody>
                    </table>
                    <h3>{{ Lang::get('auth.no_payments_text') }}</h3>
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
