@extends('app')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Guests list</h3>
        </div><!-- /.box-header -->
        <br>

        <div class="col-xs-1"></div>
        <div class="col-md-10">
            <div class="box box-solid box-primary" id="addNewForm" style="display:none">

                <div class="box-header">
                    <h3 class="box-title">Register a new guest</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="register-box-body">
                        <p class="login-box-msg">Register a new membership</p>
                        <form action="#" id="addNewGuestForm" method="post" onsubmit="addNewGuest();">
                            <input type="hidden" class="form-control" name="_token"  value="{{ csrf_token() }}">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="name" id="createInputName" placeholder="Name">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="phone" id="createInputPhone"  placeholder="Phone">
                                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" name="city" id="createInputCity" placeholder="City">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <select  class="form-control" name="branch">
                                    <option value="0"><span style="color: red">Select</span></option>
                                    @foreach($branches as $branch){
                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input type="hidden" class="form-control" name="add_new" value="1">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                                </div><!-- /.col -->
                                <div class="col-xs-6">
                                    <button type="reset" id="back_btn" class="btn btn-primary btn-block btn-danger">Reset</button>
                                </div><!-- /.col -->
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-xs-1"></div>
        <!-- / END NEW -->
        <div class="col-md-12">
            <div class="form-group  col-md-2">
                <input type="text" class="form-control searchPhone" name="searchPhone" id="searchPhone" placeholder="Search by phone">
                <button type="button" class="btn btn-dropbox" id="searchCutPhone" onclick="cutSearch('phone', $(this).parent().children('input').val());$(this).parent().children('input').val('')">Cut</button>
            </div>
            <div class="form-group  col-md-2">
                <input type="text" class="form-control searchName" name="searchName" id="searchName" placeholder="Search by name">
                <button type="button" class="btn btn-dropbox" id="searchCutName" onclick="cutSearch('name', $(this).parent().children('input').val());$(this).parent().children('input').val('')">Cut</button>
            </div>
<!--
             <div class="col-md-2">
                 <button type="button" class="btn btn-dropbox" id="searchCutName" onclick="location.href = '/registration/all/'">Show All guests</button>
             </div>
             -->
             <div class="col-md-2">
                 <button type="button" class="btn btn-warning" id="" onclick="location.href = '/registration/'">Refresh</button>
             </div>

             <div class="col-md-2">
                <a href="#" class="btn btn-primary addNewBtn"><i class="fa fa-plus"></i> Create New</a>
             </div>
        </div>

        <div style="clear:both"></div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Phone</th>
                    <th>Branch</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div>
    <div id="loader">
        <div class='hourglass' style="">
            <span style="font-size:50px;color:white">Loading...<br/>Please Wait!</span>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#createInputName').val(localStorage.getItem('cuttedName'));
            $('#createInputPhone').val(localStorage.getItem('cuttedPhone'));
            $('.hourglass').show();
            $.getJSON("/app/{{$file}}", function(json) {
                var city;
                for(var i=0;i<json.length;i++){
                    var obj = json[i];
                    var routes = obj.routes;
                    var route = obj.routes[routes.length - 1];
                    var theRoute, branch_name,branch_id;
                    if(route == null){
                        theRoute = '';
                        branch_name = '';
                        branch_id = '';
                    }
                    else{
                        theRoute = route.branche_id;
                        branch_name = route.branch.name;
                        branch_id = route.branch.id;
                    }

                    if(obj.city === undefined || obj.city === null)
                        city = '';
                    else
                        city = obj.city;
                    $('#example1 tbody').append(''+
                        '<tr>'+
                            '<td>'+obj.id+'</td>'+
                            '<td>'+obj.name+'</td>'+
                            '<td>'+city+'</td>'+
                            '<td>'+obj.phone+' </td>'+
                            '<td class="">'+
                                '<form class="setBranch" data-id="'+obj.id+'">'+
                                    '<select class=" form-control selectBranch'+obj.id+'" data-id="'+obj.id+'" name="branch">'+
                                        '<option value="'+branch_id+'">'+branch_name+'</option>'+
                                        '@foreach($branches as $branch)<option value="{{$branch->id}}">{{$branch->name}}</option>@endforeach'+
                                    '</select>'+
                                '</form>'+
                            '</td>'+
                            '<td>'+obj.status+'</td>'+
                            '<td class="buttons">'+
                                '<a href="#" data-id="'+obj.id+'" onclick="registerGuest(this);" class="btn btn-success"><i class="fa"></i>הירשם</a>'+
                            '</td>'+
                        '</tr>'
                    );
                }
                $('#example1').dataTable({
                    "bPaginate": true,
                    "bAutoWidth": true
                });
                $('.hourglass').hide();
            });
        });
        function registerGuest(obj){
            var select = $('.selectBranch'+$(obj).attr('data-id'));
            console.log(select.val());
            if(select.val().length < 1){
                select.css('border', '1px solid red');
            }else{
                select.css('border', '0');
                $.get("/guests/"+$(obj).attr('data-id')+'/register/branch/'+$('.selectBranch'+$(obj).attr('data-id')).val(), function(json) {
                    $(obj).parent().parent().remove();
                });
            }
        }
        function searchName () {
            $('#example1').DataTable().search(
                $('#searchName').val()
            ).draw();
        }
        function searchPhone () {
            $('#example1').DataTable().search(
                $('#searchPhone').val()
            ).draw();
        }
        $('#searchName').on('input', function () {
            searchName();
        });
        $('#searchPhone').on('input', function () {
            searchPhone();
        });
        function cutSearch(string, value){
            if(string == 'name'){
                localStorage.setItem("cuttedName", value);
                $('#createInputName').val(value);
            }else if(string == 'phone'){
                localStorage.setItem("cuttedPhone", value);
                $('#createInputPhone').val(value);
            }
            else{}
        }
        function checkRegistered() {
            $.getJSON("/registration/check/all", function(json) {
                for (var i in json){
                    var index = parseInt(i);
                    var obj = json[index];
                    var objToHide = $('.selectBranch'+obj.id).parent().parent().parent();
                    if(obj.is_inside != '0')
                        objToHide.hide();
                }
            });
            setTimeout(checkRegistered, 3000);
        }
        $(document).ready(function(){
            setTimeout(checkRegistered, 3000);
        });
    </script>
    <style>
        #example1_filter{display: block}
        #loader{
            background: #046380;
        }
        .hourglass {
            margin: 20px auto;
            padding-top:50px;
            height: 230px;
            width: 100%;
            text-align: center;
        }
        #searchCutName, #searchCutPhone{
            margin-top:-57px;
            margin-left:199px;
        }
    </style>
    <!--<script src="//cdn.datatables.net/plug-ins/1.10.9/i18n/Hebrew.json"></script>-->
@endsection