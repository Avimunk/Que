@extends('app')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Guests list</h3>
        </div><!-- /.box-header -->
        <br>

        <!-- / END NEW -->
        <div class="col-md-12">
            <div class="form-group  col-md-2">

            </div>
            <div class="form-group  col-md-2">

            </div>

             <div class="col-md-2">
                 <button type="button" class="btn btn-dropbox"  onclick="location.href = '/branche/{{$branche}}/{{$table}}/'">Show All guests from this branche</button>
             </div>
             <div class="col-md-2">
                <button type="button" class="btn btn-dropbox"  onclick="location.href = '/branche/all/{{$table}}/'">Show All registered guests</button>
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
                        <tr>
                            <td>No guests</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="buttons"></td>
                       </tr>
                </tbody>
            </table>
        </div><!-- /.box-body -->
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#createInputName').val(localStorage.getItem('cuttedName'));
            $('#createInputPhone').val(localStorage.getItem('cuttedPhone'));
            $.getJSON("/app/{{$file}}", function(json) {
                var obj = json;
                var status;
                console.log(status);
                if(obj.id){
                    if(obj.status == 'הגיע'){
                        status = '<span class="label label-success">הגיע</span>';
                    }else if(obj.status == 'לא הגיע'){
                        status = '<span class="label label-danger">לא הגיע</span>';
                    }else if(obj.status == 'pending'){
                        status = '<span class="label label-warning">pending</span>';
                    }else if(obj.status == 'בפגישה'){
                        status = '<span class="label label-info">בפגישה</span>';
                    }else if(obj.status == 'called'){
                        status = '<span class="label label-info blink_me">called</span>';
                    }else if(obj.status == 'token'){
                        status = '<span class="label label-info blink_me">token</span>';
                    }
                    else{
                        status = '<span class="label label-success" style="background: #dedede!important">'+obj.status+'</span>';
                    }
                    $('#example1 tbody').html(' ');
                    $('#example1 tbody').append(''+
                        '<tr>'+
                            '<td>'+obj.id+'</td>'+
                            '<td>'+obj.name+'</td>'+
                            '<td>'+obj.phone+' </td>'+
                            '<td>'+status+'</td>'+
                            '<td class="buttons">'+
                                '<a href="#" onclick="takeGuestTestDrive('+obj.id+', {{$branche}} ,{{$table}});" class="btn btn-success"><i class="fa"></i>Take</a> '+
                                '<a href="/putGuestBackToDistribution/'+obj.id+'"   class="btn btn-primary"><i class="fa"></i>Next Step</a> '+
                                '<a href="#" onclick="finishGuest('+obj.id+', {{$branche}} ,{{$table}});" class="btn btn-danger"><i class="fa"></i>Finish</a> '+
                                '<a href="#" onclick="releaseGuest('+obj.id+', {{$branche}} ,{{$table}});" class="btn btn-warning"><i class="fa"></i>Release</a> '+
                            '</td>'+
                        '</tr>'
                    );
                    $('#example1').dataTable({
                        "bPaginate": true,
                        "bAutoWidth": true
                    });
                }else{

                }
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
        function addNewGuest(){
            $.post("/guests/store", $( "#addNewGuestForm" ).serialize(), function(json) {
                $(obj).parent().parent().hide('slow');
            });
        }

    </script>


@endsection