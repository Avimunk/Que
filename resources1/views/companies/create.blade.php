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
                <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="{{ url('/companies/store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @include('companies._form')

                    <div class="form-group">
                        {!! Form::label('currency', 'Currency') !!}
                        {!!
                            Form::select('currency', array(

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
                            <input name="tags[]" type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}">
                            <label for="tag-{{$tag->id}}" >{{$tag->name}}</label>
                        </div>
                        @endforeach
                    </div>

                    <div class="form-group">
                    	<input type="button" id="referer" class="btn btn-default" value="Cancel" onclick="window.history.back()">
                    	{!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
                    </div>
                </form>
            </div>
		</div>
	</div>
</div>
		<script type="text/javascript">
			jQuery(function(){
			    $('.companies_menu').addClass('active open');
			    $('.companies_create').addClass('active');
			});
	    </script>
@endsection
