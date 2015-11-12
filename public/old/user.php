
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div style="padding-top:10px;">
    <table class="table table-bordered" style="margin-bottom:0px!important;">
        <tbody>
            <tr>
                <td class="yellow">1</td>
                <td class="yellow">2</td>
                <td class="yellow">3</td>
                <td class="yellow">4</td>
                <td class="yellow">5</td>
            </tr>
            <tr class="content">
                <td data-id="1"></td>
                <td data-id="2"></td>
                <td data-id="3"></td>
                <td data-id="4"></td>
                <td data-id="5"></td>
            </tr>
            <tr>
                <td class="red">6</td>
                <td class="red">7</td>
                <td class="green">8</td>
                <td class="green">9</td>
                <td class="lightblue">10</td>
            </tr>
            <tr class="content">
                <td data-id="6"></td>
                <td data-id="7"></td>
                <td data-id="8"></td>
                <td data-id="9"></td>
                <td data-id="10"></td>
            </tr>
            <tr>
                <td class="purple">11</td>
                <td class="orange">12</td>
                <td class="darkblue">13</td>
                <td class="warning">14</td>
                <td class="brown">15</td>
            </tr>
            <tr class="content">
                <td data-id="11"></td>
                <td data-id="12"></td>
                <td data-id="13"></td>
                <td data-id="14"></td>
                <td data-id="15"></td>
            </tr>
            <tr>
                <td class="gray">16</td>
                <td class="gray">17</td>
                <td class="gray">18</td>
                <td class="gray">19</td>
                <td class="gray">20</td>
            </tr>
            <tr class="content">
                <td data-id="16"></td>
                <td data-id="17"></td>
                <td data-id="18"></td>
                <td data-id="19"></td>
                <td data-id="20"></td>
            </tr>
        </tbody>

    </table>
<style>
    td{
        text-align: center;
        font-weight:bold;
        width:19%!important;
        font-size:48px;
    }
    tr{
        height:50px;
    }
    .content{
        font-weight: :normal;
        font-size:18px!important;
        height:179px;
    }
    tr.content td{
        font-size:18px!important;
    }
    .table-bordered>tbody>tr>td{
        border:1px solid black;
    }
    .purple{
        background:purple;
        color:white;
    }
    .yellow{
        background:yellow;
        color:black;
    }
    .red{
        background:red;
        color:white;
    }
    .green{
        background:green;
        color:white;
    }
    .lightblue{
        background:rgb(249,167,253);;
        color:black;
    }
    .orange{
        background:orange;
        color:white;
    }
    .darkblue{
        background:darkblue;
        color:white;
    }
    .gray{
        background:gray;
        color:white;
    }
    .brown{
        background:rgb(101,35,37)!important;
        color:white;
    }
    .warning{
        background:rgb(1,176,241)!important;
    }
</style>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>
    function pollServerForNewMail() {
        $.ajax({
            url:'api.php?info2=1',
            type: 'get',
            success:function(response){
                //$('.row').empty();
                var object = JSON.parse(response);

                $.each( object, function( key, value ) {
                    $('td[data-id='+key+']').empty();

                    var i = 0;
                    $.each( value, function(  ) {
                        i++;
                        var status = null;
                        if(this.is_inside == 7){
                            status = 'blink_me';
                        }
                        var lname = this.last_name;
                        if(lname == null || lname == 'null' || lname == ''){
                            lname = '';
                        }
                        $('td[data-id='+key+']').append('<li class="list-group-item '+status+'">'+this.first_name+' '+lname+'<br><br>№ '+this.id+'</li>');
                    });
                });
            }

        });
        setTimeout(pollServerForNewMail, 1000);
    };
    $(document).ready(function(){
        setTimeout(pollServerForNewMail, 1000);
    });

</script>


<style>
    .list-group-item:first-child{
        font-size:160%;
    }
    .list-group-item:nth-child(2){
        font-size:120%;
    }

    .blink_me {
        -webkit-animation-name: blinker;
        -webkit-animation-duration: 1s;
        -webkit-animation-timing-function: linear;
        -webkit-animation-iteration-count: infinite;

        -moz-animation-name: blinker;
        -moz-animation-duration: 1s;
        -moz-animation-timing-function: linear;
        -moz-animation-iteration-count: infinite;

        animation-name: blinker;
        animation-duration: 1s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
    }

    @-moz-keyframes blinker {
        0% { opacity: 1.0; }
        50% { opacity: 0.0; }
        100% { opacity: 1.0; }
    }

    @-webkit-keyframes blinker {
        0% { opacity: 1.0; }
        50% { opacity: 0.0; }
        100% { opacity: 1.0; }
    }

    @keyframes blinker {
        0% { opacity: 1.0; }
        50% { opacity: 0.0; }
        100% { opacity: 1.0; }
    }
</style>

</body>
</html>