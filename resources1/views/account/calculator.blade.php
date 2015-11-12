@extends('app')

@section('content')
<div style="height: 30px;"></div>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">{{ Lang::get('auth.calculator.calculator') }}</div>
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
                    <div class=" panel-warning success" style="border-bottom:1px solid red">חסר הסבר על המחשבון וגם תמונה</div>
                    <br/><br/>
                        <label>{{ Lang::get('auth.calculator.date') }}</label>
                        <input  type="date" name="date" class="dateInput form-field form-control"/>
                        <br/>
                        <label>שם האתר</label>
                        <input  type="text" name="company" placeholder="הזן את שם החברה" class="companyInput form-field form-control" />
                        <br/>
                        <label>סכום רכישה</label>
                        <input type="text" name="order" placeholder="סכום רכישה" class="priceInput form-field form-control"  /><span></span>
                        <br/>
                        <label>סכום ההחזר שיתקבל</label><div class="calculatorResult"></div>
                        <br/>
                        <label style="display: none">{{ Lang::get('auth.calculator.payment_date') }}</label><div style="display:none" class="calculatorPaymentDate"></div>
                        <br/>
                        <a class="btn" style="color: #ffffff;float:left" href="#" onclick="getResult();return false;">חישוב</a></td>

				</div>
			</div>
		</div>
	</div>
</div>


@endsection

@section('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script>
    var companies = [@foreach ($companies as $company) "{{$company->name}}",   @endforeach];
    var theCurrencty;
    function getCurrency(name, price) {
        $.ajax({
            url: "/getCurrency/"+name+"/"+price,
            success: function( data ) {
                console.log(data[0].currency);
                theCurrencty =  data[0].currency;
            }
        });
    }

    function validateForm() {
        var valid = true;
        $('.form-field').each(function () {
            if ($(this).val() === '') {
                valid = false;
                $(this).css('border', '1px solid red');
                return false;
            }else{
                $(this).css('border', '1px solid #ccc');
                valid = true;
            }
        });
        return valid;
    }


    function getResult(){
        if(validateForm()){
            $.ajax({
                url: "/showCompanies/"+$('.companyInput').val()+"/"+$('.priceInput').val()+"/"+$('.dateInput').val(),
                success: function( data ) {
                    result = JSON.parse(data);
                    $('.calculatorResult').empty().append(result.result);
                    $('.calculatorPaymentDate').empty().append(result.date);


                    console.log(data+', '+result.result);
                }
            });
        }
    }

    $(function() {
        $( ".companyInput" ).autocomplete({
            source: companies,
            select: function( event, ui ) {

            }
        });
    });
</script>
@endsection
