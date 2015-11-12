@extends('app')

@section('content')

<div class="home_title" style="margin-top:-10px;">
    <span></span>
    <h2>{!! Lang::get('companies.h2') !!}</h2>
</div>
    <div class="container companies_container">
        <div class="row">
            <div class="col-md-12">


            <div style="clear: both;margin-top: 30px;margin-bottom: 15px"></div>
            @foreach($companies as $company)
                <div class="companyItem col-md-4 @foreach($company->tags as $tag) {{$tag->name}} @endforeach" style="margin-bottom:20px;">
                    <div class="inner_company">
                        <div class="company_image">
                            <img src="/uploads/companies/{{$company->id}}/{{$company->image}}">
                        </div>
                        <div class="row" style="margin-top:30px;">
                            <div class="col-xs-7 inner_text">
                                <div class="col-md-12">
                                    <div class="company_info">{!!html_entity_decode($company->content)!!}</div>
                                    @if (Auth::guest())
                                    <a class="btn btn-block btn-primary btn-lg" href="{{ url('/auth/login') }}">
                                        {{ Lang::get('auth.login') }}
                                    </a>
                                    @else

                                    <button type="button" class="btn btn-block btn-primary btn-lg" data-url="{{$company->url}}" data-toggle="modal" data-target="#myModal{{$company->id}}" style="float:left;width:50%;background:green;border:0">
                                        {{ Lang::get('companies.buy') }}
                                    </button >
                                    
                                    <i data-id="{{$company->id}}" 
                                        @if ($company->liked)
                                        class="fa fa-heart"
                                        @else
                                        class="fa fa-heart-o"
                                        @endif 
                                        style="color:#C60202;font-size:42px;float:right;display:block;width:50%;cursor:pointer">
                                    </i>
                                    <style>
                                        .modal-backdrop{
                                            z-index:0;
                                        }
                                    </style>
                                    <div class="modal fade" id="myModal{{$company->id}}" tabindex="1041" data-url="{{$company->url}}" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel"> {{ Lang::get('companies.modal.title') }} </h4>
                                                </div>
                                                <div class="modal-body">
                                                    {!!html_entity_decode(Lang::get('companies.modal.text'))!!}
                                                    <div class="col-md-12 choosing">
                                                        <div class="col-md-6">
                                                            <h4>{{ Lang::get('companies.creditChoose') }}</h4>
                                                            @if(Auth::user()->credit || Auth::user()->credit2)
                                                            <ul style="list-style: none">
                                                                @if(Auth::user()->credit)
                                                                <li> {{Auth::user()->credit}}</li>
                                                                @else
                                                                <li>
                                                                    <a href="#" onclick="showAddCardInput({{$company->id}})"> + Add a new credit card</a>
                                                                    <div class="form-group addCard-{{$company->id}}" style="display: none">
                                                                        <div class="col-md-12">
                                                                            

                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endif
                                                                @if(Auth::user()->credit2)
                                                                <li> {{Auth::user()->credit2}}</li>
                                                                @else
                                                                <li>
                                                                    <a href="#" onclick="showAddCardInput({{$company->id}})"> + Add a new credit card</a>
                                                                        <div class="form-group addCard-{{$company->id}}" style="display: none">
                                                                            <div class="col-md-12">
                                                                                <input type="text" class="col-md-8" name="credit">

                                                                            </div>

                                                                        </div>
                                                                </li>
                                                                @endif
                                                            </ul>
                                                            @else
                                                                <div class="form-group addCard-{{$company->id}}">
                                                                    <div class="col-md-12">
                                                                        <input type="text" class="col-md-8" name="credit">
                                                                    </div>

                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">
                                                            <!--<h4>{{ Lang::get('companies.emailChoose') }}</h4>
                                                             <ul  style="list-style: none">
                                                                 <li> {{Auth::user()->email}}</li>
                                                                 @if(Auth::user()->email2)
                                                                 <li>{{Auth::user()->email2}}</li>
                                                                 @endif
                                                             </ul>
                                                             -->
                                                        </div>
                                                    </div>
                                                    <div style="clear: both"></div>

                                                </div>
                                                <div class="modal-footer">
                                                   
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-xs-4  percent">
                                    <div class="col-md-12">
                                        <span>{{$company->currency}} {{$company->percent}}</span>
                                        <br>
                                        {{ Lang::get('companies.cashback') }}
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
 <div class="home_bottom">

 </div>
@endsection
@section('scripts')
<style>
    .list-group-item.active, .active:hover{
        background: #c60202!important;
        border-color:silver!important
    }
</style>
<script>
    $(document).ready(function(){
        $('#browse li ul li.zztop a').click(function(){
            $(this).toggleClass('active');
            var theLenth = $('.list-group a').length;
            var theActiveLenth = $('.list-group a.active').length;

            $('.companyItem').hide();
            $('#browse a').each(function(){
                if($(this).hasClass('active')){
                    var theTarget = $(this).html();
                    $('.'+theTarget).show('slow');
                }
            });

        });

		$('.btn.btn-block.btn-primary.btn-lg').click(function(){
			var theUrl = $(this).attr('data-url');
			setTimeout(function(){
				window.location.href = theUrl;
			}, 10000);
			
		});
		$('#modal-content').on('shown.bs.modal', function() {
			console.log(123);
			window.location.href = $(this).parent().parent().attr('data-url');
		});

        $('.inner_text i').on('click', function(){
            console.log($(this).attr('data-id'));
            var theId = $(this).attr('data-id');
            if($(this).hasClass('fa-heart')){
                $(this).removeClass('fa-heart');
                $(this).addClass('fa-heart-o');
                $.ajax({
                    type: 'get',
                    url: '/like/'+theId+'/remove',
                    success: function(){}
                });
            }else{
                $.ajax({
                    type: 'get',
                    url: '/like/'+theId+'/add',
                    success: function(){}
                });
                $(this).addClass('fa-heart');
                $(this).removeClass('fa-heart-o');
            }
        });
		
    });
	
</script>
@endsection


