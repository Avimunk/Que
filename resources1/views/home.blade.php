@extends('app')

@section('homeheader')
	<div id="header">

	</div>
@endsection

@section('home')
<div class="container">
	<div class="row" id="home_circles">

		<div class="col-md-4 circle">
		    <span>3. קבלו כסף</span>
		    <div class="circle_text">
		    קבלו כסף חזרה על כל קנייה
            </div>
		</div>

		<div class="col-md-4 circle">
		    <span>2. קנו</span>
		    <div class="circle_text">
חפשו וקנו במאות החנויות מופיעות באתר
		    </div>

		</div>

		<div class="col-md-4 circle">
		    <span>1. הירשמו</span>

		    <div class="circle_text">
הירשמו בחינם וקבלו מתנה

		    </div>
		</div>

	</div>
</div>
<div class="home_logos">
    <div class="container ">
        <div class="row">
            <div class="col-md-12">
                @foreach($items as $item)
                    <div class="col-sm-2 col-xs-4 home_companies_logo">
                        <section class="container1">
                            <div class="thecard">
                                <figure class="front" style="background:url('/uploads/companies/{{$item->id}}/{{$item->image}}') no-repeat;background-size:contain"><a href="{{action('CompaniesController@index')}}"></a></figure>
                                <figure class="back">{{$item->currency}} {{$item->percent}}</figure>
                            </div>
                        </section>                       
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="home_title">
    <span></span>
    <h2>
        @if($page->title != '')
            {{$page->title}}
        @else
            {{$page->name}}
        @endif
    </h2>
</div>
<div class="home_text">
    <div class="container ">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" style="font-family: Arial!important">
            {!!$page->content!!}
            </div>
        </div>
    </div>
</div>
<div class="home_bottom">

</div>
@endsection

@section('scripts')



<script>

    $('#faq li a').click(function(){
        $(this).parent().children('div').toggle('slow');
        return false;
    });

    $(document).ready(function(){
        $('.thecard').hover(function () {
            $(this).toggleClass('flipped');
        });
        
    });    
</script>
<style>
    #faq, #faq a{
        font-size:17px;
    }
    #faq li{margin-bottom:15px;}
    #faq a{color:red;}
    .container1 { 
        width: 200px;
        height: 180px;
        position: relative;
        perspective: 800px;
    }
    .thecard {
      width: 95%;
      height: 99%;
      position: absolute;
      transform-style: preserve-3d;
      transition: transform 1s;
      border:1px solid gray;
      background:white;
    }
        .thecard  img{
            width:100%;
        }
    .thecard figure {
      margin: 0;
      display: block;
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
    }
    .thecard .front {
      cursor:pointer;
    }
    .thecard .back {
      background: #C60202;
      transform: rotateY( 180deg );
      text-align:center;
      font-size:35px;
      color:white;
      padding-top:35%;
    }
    .thecard.flipped {
      transform: rotateY( 180deg );
    }

</style>

@endsection