<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
	@if(isset($title))
	    {{$title}}
	@else
	@endif
	</title>

	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <!--
    <link href="//cdn.rawgit.com/morteza/bootstrap-rtl/master/dist/cdnjs/3.3.1/css/bootstrap-rtl.min.css" rel="stylesheet">
    -->
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <style>
        .container{
            direction: rtl;
        }
    </style>
</head>
<body>
	<nav class="navbar navbar-default ">
		<div class="container">
		    <div class="col-md-5">
		        <style type="text/css">
                    #browse{

                    }
                    #browse li ul li{
                    position: relative;
                    }
                    #browse li ul li a{
                        color:white
                    }
                    #browse li ul li ul{
                        display:none;
                        position: absolute;
                        left:145px;
                        top:-12px;
                        padding:0px;
                        list-style: none;
                        padding:10px;
                        width:190px;
                    }
                    #browse li ul li ul li{
                        padding:5px;
                    }
                    #browse li ul li:hover > ul{
                        display:block;
                    }
		        </style>
		        <ul id="browse" class="nav navbar-nav navbar-left">
		            <li class="dropdown">
		                <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">קטגוריות</a>
		                <ul class="dropdown-menu" role="menu">
		                    <li><a onclick="$('.companyItem').show('slow');return false;" href="#">כל</a></li>
                            @foreach(\App\Tag::getAll() as $item)
                                @if($item->children->count() > 0)
                                    <li class="zztop">
                                         <a href="#" >{{ $item->name }}</a>
                                         <ul>
                                             @foreach($item->children as $submenu)
                                                 <li><a href="#">{{ $submenu->name }}</a></li>
                                              @endforeach
                                         </ul>
                                   </li>
                                @else
                                    <li class="zztop"><a href="#">{{ $item->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
		            </li>
		        </ul>
                <input type="text" placeholder="...search" style="margin-top:15px;" class="searchInput col-lg-4">
                <br>
                <div id="suggesstion-box"></div>
		    </div>
			<div class="navbar-header">
				<div class="col-md-1">

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				</div>
				<div class="col-md-7">
				<a class="navbar-brand" href="{{ url('/') }}">CashBack</a>
				</div>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
					    {!!\App\Http\Controllers\MenusController::show('top')!!}
						<li><a href="{{ url('/auth/login') }}">כניסה</a></li>
                        <li><a href="{{ url('/auth/register') }}">{{ Lang::get('auth.register') }}</a></li>

					@else
						<li><a href="{{ url('/account') }}">{{ Lang::get('auth.account') }}</a></li>
						<li><a href="{{ url('/account/calculator') }}">{{ Lang::get('auth.calculator.calculator') }}</a></li>
						{!!\App\Http\Controllers\MenusController::show('top')!!}
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="direction:rtl">שלום, {{ Auth::user()->first_name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">

								<li><a href="{{ url('/account/payments') }}">{{ Lang::get('auth.payments.payments') }}</a></li>
                                <li><a href="{{ url('/account/favorites') }}">מועדפים</a></li>



								<li><a href="{{ url('/auth/logout') }}">{{ Lang::get('auth.logout') }}</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
    <div style="height: 35px;"></div>
    @yield('homeheader')
	@yield('home')


	@yield('content')




	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script>

        function checkCard(obj, url, partner){
            var theParent = $(obj).parent().parent().parent().parent();
            var theCardsRadio = $("#"+theParent.attr('id')+" input[name='creditForDigits']");
            var theCardsRadioChecked = $("#"+theParent.attr('id')+" input[name='creditForDigits']:checked");
            var theEmailsRadio = $("#"+theParent.attr('id')+" input[name='emailChoose']");
            var theEmailsRadioChecked = $("#"+theParent.attr('id')+" input[name='emailChoose']:checked");
            var newCreditInput = $("#"+theParent.attr('id')+" input[name='credit']");

            if(newCreditInput){
                if(newCreditInput.val() > 1000){
                    $.ajax({
                        type: "get",
                        url: '/addCredit/'+newCreditInput.val(),
                        cache: false,
                        success: function(response){
                            newCreditInput.after('<i class="fa fa-check"></i>');
                            newCreditInput.after('<input type="radio" name="creditForDigits" class="creditForDigits" />');
                        }
                    });
                }
            }
            if(theCardsRadio){
                if(theCardsRadioChecked.length){
                    theCardsRadio.parent().parent().parent().removeClass('danger');
                    if(theEmailsRadio){
                        if(theEmailsRadioChecked.length){
                            theEmailsRadio.parent().parent().parent().removeClass('danger');
                            console.log(url+'/?partner='+partner);
                            window.location.href = url+'/?partner='+partner;
                        }else{
                            console.log('noteEmail');
                            theEmailsRadio.parent().parent().parent().addClass('danger');
                            return false;
                        }
                    }
                }else{
                    console.log('noteCard');
                    theCardsRadio.parent().parent().parent().addClass('danger');
                    return false;
                }
            }else{
                return false;
            }

        }

        function showAddCardInput(id){
            $('.fa-check').hide();
            $('.addCard-'+id).toggle().css('margin-top', '10px');
        }
    </script>


    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script>
        $(document).ready(function(){
            $(".searchInput").keyup(function(){
                $.ajax({
                type: "get",
                url: "/search/"+$(this).val(),
                
                beforeSend: function(){
                    $("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data){
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);
                    $("#search-box").css("background","#FFF");
                }
                });
            });
        });
        //To select country name
        function selectCountry(val) {
            $(".searchInput").val(val);
            $("#suggesstion-box").hide();
        }        
        // $(function() {
        //     $( ".searchInput" ).autocomplete({
        //         source:  function (request, response) {
        //             $.ajax({
        //                 dataType: "json",
        //                 url: '/all/list',
        //                 type: 'get',
        //                 success: function(result){
        //                     response(result);
        //                 }
        //             });
        //         },
        //         select: function( event, ui ) {

        //         }
        //     });
        // });
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <style>
        #country-list{list-style:none;margin:0;padding:0;width:150px;}
        #country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
        #country-list li:hover{background:#F0F0F0;}
        #search-box{padding: 10px;border: #F0F0F0 1px solid;}
        .searchInput{
            margin-top:10px;
        }
        #suggesstion-box{  
            position: absolute;
            margin-top: 28px;
        }
</style>
    @yield('scripts')

</body>
</html>
