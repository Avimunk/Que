
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
                <td class="ashdod">אשדוד</td>
                <td class="red">תל אביב</td>
                <td class="red">תל אביב</td>
                <td class="red">תל אביב</td>
                <td class="red">תל אביב</td>
            </tr>
            <tr class="content">
                <td data-id="1"></td>
                <td data-id="2"></td>
                <td data-id="3"></td>
                <td data-id="4"></td>
                <td data-id="5"></td>
            </tr>
            <tr>
                <td class="red">תל אביב</td>
                <td class="green">חיפה</td>
                <td class="orange">ראשון לציון</td>
                <td class="lightbrown">עכו</td>
                <td class="purple">מעלות</td>
            </tr>
            <tr class="content">
                <td data-id="6"></td>
                <td data-id="7"></td>
                <td data-id="8"></td>
                <td data-id="9"></td>
                <td data-id="10"></td>
            </tr>
            <tr>
                <td class="lightblue">יפו</td>
                <td class="black">נתניה</td>
                <td class="white">נצרת</td>
                <td class="darkblue">ירושלים</td>
                <td class="gray">מטה</td>
            </tr>
            <tr class="content">
                <td data-id="11"></td>
                <td data-id="12"></td>
                <td data-id="13"></td>
                <td data-id="14"></td>
                <td data-id="15"></td>
            </tr>
            <tr>
                <td class="gray">מטה</td>
                <td class="gray">מטה</td>
                <td class="gray">טרייד מובייל</td>

            </tr>
            <tr class="content">
                <td data-id="16"></td>
                <td data-id="17"></td>
                <td data-id="18"></td>

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
    .black{
        background:black;
        color:white;
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
    .ashdod{
        background:#E5B8B8;
    }
    .purple{
        background:#6F359E;
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
        background:#19AF54;
        color:white;
    }
    .lightblue{
        background:#96B4D6;
        color:black;
    }
    .orange{
        background:#E06B21;
        color:white;
    }
    .darkblue{
        background:darkblue;
        color:white;
    }
    .gray{
        background:#D9D9D9;
        color:black;
    }
    .brown{
        background:rgb(101,35,37)!important;
        color:white;
    }
    .warning{
        background:rgb(1,176,241)!important;
    }
    .lightbrown{
        background:#948957;
    }
    .white{
        background:white;
    }
</style>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script>


    function pollServerForNewMail() {
        $.getJSON("/que/current", function(json) {
            for (var i in json){
                var index = parseInt(i);
                var obj = json[index];
                var status;
                if(obj.status == 'token')
                    status = '';
                else
                    status = 'blink_me';
                $('td[data-id='+i+']').empty();
                if(typeof obj.name != 'undefined'){
                    $('td[data-id='+i+']').empty();
                    $('td[data-id='+i+']').append('<li class="list-group-item '+status+'">'+obj.name+'<br><br>№ '+obj.id+'</li>');
                }
            }



        });
        setTimeout(pollServerForNewMail, 3000);
    }
    $(document).ready(function(){
        setTimeout(pollServerForNewMail, 3000);
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