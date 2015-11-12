@extends('admin')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 ">
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
                {!! Form::model($company, array('method' => 'PATCH', 'route' => array('companies.update', $company->id), 'id' => 'company', 'files' => true)) !!}
                    @if($company->id)
                        <img src="/uploads/companies/{{$company->id}}/{{$company->image}}">
                    @endif
                    @include('companies._form')
                    <div class="form-group">
                        {!! Form::label('currency', 'Currency') !!}
                        {!!
                            Form::select('currency', array(
                                $company->currency => $company->currency ,
                                '$' => '$',
                                '₪' => '₪',
                                '%' => '%'
                            ), array('class' => 'form-control'), array('class' => 'form-control'))
                        !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('payment_date', 'Payment date') !!}
                        <small><i>For full date payments, use format <b>dd-mm</b> (ex 05-07). If its monthly, put day number in format <b>d</b> (ex 5 or 17). IF quarterly, use any date </i></small>
                        {!! Form::text('payment_date', null, array('class' => 'form-control')) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('payment_date_type', 'Payment date type') !!}
                        {!!
                            Form::select('payment_date_type', array(
                                $company->payment_date_type => $company->payment_date_type ,
                                'date' => 'full date',
                                'monthly' => 'monthly',
                                'quarterly' => 'quarterly',


                            ), array('class' => 'form-control'), array('class' => 'form-control'))
                        !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('tags', 'Tags') !!}
                        @foreach($tags as $tag)
                        <div class="form-group" style="padding-left:20px;">
                            <input @if($tag['checked']) checked="checked" @endif name="tags[]" type="checkbox" id="tag-{{$tag['obj']->id}}" value="{{$tag['obj']->id}}">
                            <label for="tag-{{$tag['obj']->id}}" >{{$tag['obj']->name}}</label>
                        </div>
                        @endforeach
                        <a href="/admin/tags/create">Add new tag</a>
                    </div>

                    <div class="form-group">
                    	<input type="button" id="referer" class="btn btn-default" value="Cancel" onclick="window.history.back()">
                    	{!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
                    </div>
                {!! Form::close() !!}

            </div>
		</div>
	</div>
</div>
@endsection
