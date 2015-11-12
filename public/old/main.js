function refresh() {
    window.location.href = window.location.href.replace(/#.*$/, '');
}
$(document).ready(function(){

	$('.addNewBtn').click(function(){
		$('#addNewForm').toggle('slow');
	});

	$('#addNewGuestForm').submit(function(e){
        if($('#addNewGuestForm select').val() == 0){
            alert('נא לבחור ענף');
            $('#addNewGuestForm select').css('border', '2px solid red');
            return false;
        }
        $.ajax({
			method: "POST",
			url: 'api.php',
			data: $('#addNewGuestForm').serialize(),
			success: function(response){
				console.log(response);
                $('#addNewForm').toggle('slow');
                window.location.reload(false);
			}
		});
		e.preventDefault;
		return false;
	});

    $(document).on('click', '.switchGuestPosition', function(){
		var id = $(this).attr('data-id');
		$.ajax({
			method: "POST",
			url: 'api.php',
			data: {id: id, switch: 1},
			success: function(response){
				console.log(response);
                window.location.href = window.location.href.replace(/#.*$/, '');
			}
		});
	});
    $(document).on('click', '.registerGuest', function(){
        var id = $(this).attr('data-id');

        if($('.selectBranch'+id).val() == "$branch"){
            $('.selectBranch'+id).css('border', '2px solid red');
            alert('נא לבחור ענף');
            return false;
        }else{

            $.ajax({
                method: "POST",
                url: 'api.php',
                data: {id: id, register: 1},
                success: function(response){
                    console.log(response);
                    window.location.href = window.location.href.replace(/#.*$/, '');
                }
            });


        }


    });
    $(document).on('click', '.waitGuestPosition', function(){
        var id = $(this).attr('data-id');
        $.ajax({
            method: "POST",
            url: 'api.php',
            data: {id: id, wait: 1},
            success: function(response){
                console.log(response);
                window.location.href = window.location.href.replace(/#.*$/, '');
            }
        });
    });
    $(document).on('click', '.finishGuest', function(){
        var id = $(this).attr('data-id');
        $.ajax({
            method: "POST",
            url: 'api.php',
            data: {id: id, finish: 1},
            success: function(response){
                console.log(response);
                window.location.href = window.location.href.replace(/#.*$/, '');
            }
        });
    });

    $(document).on('click', '.takeGuest', function(){
        var id = $(this).attr('data-id');
        var table = $("#table").attr('data-id');
        $.ajax({
            method: "POST",
            url: 'api.php',
            data: {id: id, take: 1, table: table},
            success: function(response){
                console.log(response);
                //window.location.href = window.location.href.replace(/#.*$/, '');
            }
        });
    });
    $(document).on('click', '.callGuest', function(){
        var id = $(this).attr('data-id');
        var table = $("#table").attr('data-id');
        $.ajax({
            method: "POST",
            url: 'api.php',
            data: {id: id, callGuest: 1, table: table},
            success: function(response){
                console.log(response);
                //window.location.href = window.location.href.replace(/#.*$/, '');
            }
        });
    });








    $(document).on('click', '.takeGuestTest', function(){
        var id = $(this).attr('data-id');
        var table = $("#table").attr('data-id');
        $.ajax({
            method: "POST",
            url: 'api.php',
            data: {id: id, take: 1, tableTest: 1},
            success: function(response){
                console.log(response);
                //window.location.href = window.location.href.replace(/#.*$/, '');
            }
        });
    });
    $(document).on('click', '.callGuestTest', function(){
        var id = $(this).attr('data-id');
        var table = $("#table").attr('data-id');
        $.ajax({
            method: "POST",
            url: 'api.php',
            data: {id: id, callGuest: 1, tabletableTest: 1},
            success: function(response){
                console.log(response);
                //window.location.href = window.location.href.replace(/#.*$/, '');
            }
        });
    });













    $('.setBranch').change(function(){
        var id = $(this).attr('data-id');
        $.ajax({
            method: "POST",
            url: 'api.php',
            data: {id: id, set: 1, branch: $('.selectBranch'+id).val()},
            success: function(response){
                console.log(response);
            }
        });
    });




});