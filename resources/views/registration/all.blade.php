@extends('app')

@section('content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Guests list</h3>
        </div><!-- /.box-header -->

        <div style="clear:both"></div>

    </div>
        <div class="box-body">
            @foreach($branches as $branche)
            <div class="bbox">
                <h3 style="position: fixed;margin-top:-30px">{{$branche->name}}</h3>

                    <h4 class="hFourCount{{$branche->id}}" style="font-size:12px">Count of guests</h4>
                <ul id="sortable{{$branche->id}}" class="connectedSortable" data-id="{{$branche->id}}">

                </ul>
            </div>
            @endforeach
        </div>

@endsection

@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript">
        function checkRegistered() {
            var lastRoute;
            var branche_id;
            $.getJSON("/get/all/Json", function(json) {
                for (var i in json){
                    lastRoute = null;
                    branche_id = null;
                    var theClass;
                    var index = parseInt(i);
                    var obj = json[index];
                    if(obj.routes.length > 0){
                        lastRoute = obj.routes[obj.routes.length - 1];
                        branche_id = lastRoute.branche_id;
                    }
                    console.log(obj.status);
                    if(obj.status == 'token'){
                        theClass = 'class="ui-state-default ui-state-disabled"';
                    }else{
                        theClass = 'class="ui-state-default"';
                    }


                    $('#sortable'+branche_id).append(
                        '<li data-id="'+obj.id+'" '+theClass+'>'+obj.id+' - '+obj.name+'</li>'
                    );
                }
            });
            //setTimeout(checkRegistered, 3000);
        }
        $(document).ready(function(){
            checkRegistered();
        });




       $(function() {
            $( "#sortable1, #sortable2, #sortable3, #sortable4, #sortable5, #sortable6, #sortable7, #sortable8, #sortable9, #sortable10, #sortable11, #sortable12, #sortable13, #sortable14, #sortable15, #sortable16, #sortable17, #sortable18, #sortable101" )
            .on('click', 'li', function (e) {
                if (e.ctrlKey || e.metaKey) {
                    $(this).toggleClass("selected");
                } else {
                    $(this).addClass("selected").siblings().removeClass('selected');
                }
            })
            .sortable({
                connectWith: ".connectedSortable",
                items: "li:not(.ui-state-disabled)",
                delay: 150, //Needed to prevent accidental drag when trying to select
                revert: 0,
                appendTo: 'body',
                helper: function (e, item) {
                    //Basically, if you grab an unhighlighted item to drag, it will deselect (unhighlight) everything else
                    if (!item.hasClass('selected')) {
                        item.addClass('selected').siblings().removeClass('selected');
                    }

                    //////////////////////////////////////////////////////////////////////
                    //HERE'S HOW TO PASS THE SELECTED ITEMS TO THE `stop()` FUNCTION:

                    //Clone the selected items into an array
                    var elements = item.parent().children('.selected').clone();

                    //Add a property to `item` called 'multidrag` that contains the
                    //  selected items, then remove the selected items from the source list
                    item.data('multidrag', elements).siblings('.selected').remove();

                    //Now the selected items exist in memory, attached to the `item`,
                    //  so we can access them later when we get to the `stop()` callback

                    //Create the helper
                    var helper = $('<li/>');
                    return helper.append(elements);
                },
                stop: function (e, ui) {
                    //Now we access those items that we stored in `item`s data!
                    var elements = ui.item.data('multidrag');

                    //`elements` now contains the originally selected items from the source list (the dragged items)!!

                    //Finally I insert the selected items after the `item`, then remove the `item`, since
                    //  item is a duplicate of one of the selected items.
                    ui.item.after(elements).remove();
                },
                update: function(event, uii) {
                    // grabs the new positions now that we've finished sorting
                    var new_position = uii.item.index();
                    console.log(uii.item.parent().attr('data-id'));
                    var id = uii.item.attr('data-id');
                    var branch = uii.item.parent().attr('data-id');
                    $.ajax({
                        method: "get",
                        url: '/changePosition/'+id+'/'+branch,
                        data: {id: id, branch: uii.item.parent().attr('data-id')},
                        success: function(response){
                            console.log(id+' '+uii.item.parent().attr('data-id'));
                            console.log(response);
                            //window.location.href = window.location.href.replace(/#.*$/, '');
                        }
                    });
                }
            }).disableSelection();
        });

    </script>
    <style>
        .connectedSortable {
            border: 1px solid #eee;
            width: 152px;
            min-height: 20px;
            list-style-type: none;
            margin: 0;
            padding: 5px 0 0 0;
            float: left;
            margin-right: 10px;
            min-height: 50px;
        }
        .connectedSortable li{
            margin: 0 5px 5px 5px;
            padding: 5px;
            font-size: 0.8em;
            width: 90px;
            border:1px solid darkslategray;
        }
        .connectedSortable li div{
            float: left;
        }
        .box-body h3{
            clear: both;
        }
        .bbox{
            float:left;
            width:7.5%;
            border:1px solid black;
            height:3000px;
        }
        .ui-sortable{
            height:3000px;
        }
        li.selected {
            background:yellow!important
        }
        .container{ margin:0 20px; position:absolute;top:0!important;height:100%;width:280px;overflow:hidden;}
    </style>
    <!--<script src="//cdn.datatables.net/plug-ins/1.10.9/i18n/Hebrew.json"></script>-->
@endsection