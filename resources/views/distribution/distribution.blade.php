@extends('app')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Table number {{$table}}</h3>
        </div><!-- /.box-header -->
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-primary addNewBtn"><i class="fa fa-plus"></i> Create New</a>
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

            </div>
            <div class="form-group  col-md-2">

            </div>

             <div class="col-md-2">
                 <button type="button" class="btn btn-dropbox"  onclick="location.href = '/distribution/{{$branche}}/{{$table}}/'">Return to  My table</button>
             </div>
             <div class="col-md-2">

             </div>
        </div>

        <div style="clear:both"></div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->status}}</td>
                            <td class="buttons">
                                <a href="#" onclick="takeGuest({{$item->id}}, {{$branche}} ,{{$table}});" class="btn btn-success"><i class="fa"></i>Take</a>
                                <a href="#" onclick="nextStepGuest({{$item->id}}, {{$branche}} ,{{$table}});" class="btn btn-primary"><i class="fa"></i>Next Step</a>
                                <a href="#" onclick="finishGuest({{$item->id}}, {{$branche}} ,{{$table}});" class="btn btn-danger"><i class="fa"></i>Finish</a>
                                <a href="#" onclick="releaseGuest({{$item->id}}, {{$branche}} ,{{$table}});" class="btn btn-warning"><i class="fa"></i>Release</a>
                            </td>
                       </tr>

                    @endforeach
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#example1').dataTable({
                "bPaginate": true,
                "bAutoWidth": true
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
                    $(obj).parent().parent().hide('slow');
                });
            }
        }
        function addNewGuest(){
            $.post("/guests/store", $( "#addNewGuestForm" ).serialize(), function(json) {
                $(obj).parent().parent().hide('slow');
            });
        }

    </script>


@endsection