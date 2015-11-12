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
                <form class="form-horizontal" role="form" method="post" action="{{ url('/admin/tags/store') }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    @include('tags._form')
                </form>
            </div>
		</div>
	</div>
</div>
		<script type="text/javascript">
			jQuery(function(){
			    $('.tags_menu').addClass('active open');
			    $('.tags_menu_create').addClass('active');
			});
	    </script>
@endsection
