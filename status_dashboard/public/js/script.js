$(document).ready(function () {
    $(".leave-type-div").hide();
    $(".out-type-div").hide();

    $(".status-checkbox").on('change', function() {
        var empID=$(this).attr('empID');
        $("#empID").val(empID);
        $(".leave-type-div").hide();
        $(".out-type-div").hide();
        $("#updateModal").modal();
    });

    $(".status-type-radio").on('click', function() {
        var status_type = $('input[name=status-type]:checked').val();
        if(status_type == 'leave') {
            $(".leave-type-div").show();
            $(".out-type-div").hide();
        } 

        if(status_type == 'out_of_office') {
            $(".leave-type-div").hide();
            $(".out-type-div").show();
        } 
        
    });

    $("#saveBtn").click(function() {
        $("#updateStatusForm").submit();
    });

});

	