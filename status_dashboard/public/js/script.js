$(document).ready(function () {
    $(".leave-type-div").hide();
    $(".out-type-div").hide();

    $(".status-checkbox").on('change', function() {
        var status=$(this).attr('status');
        var empID=$(this).attr('empID');
        $("#empID").val(empID);
        if(status == 1) {
            $(".leave-type-div").hide();
            $(".out-type-div").hide();
            $("#updateModal").modal();
        } else {

            var data ={"id":empID,"status":1,"location":'Mac Arthur Avenue'};

            $.ajax({
                url: "index.php?c=Employee&a=updateEmpStatus",
                type:"post",
                dataType: "json",
                data: data,
                success: function(response) {
                    location.href("index.php?c=Employee&a=home");
                }
            })

        }
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

    function toggleResetPswd(e){
        e.preventDefault();
        $('#logreg-forms .form-signin').toggle() // display:block or none
        $('#logreg-forms .form-reset').toggle() // display:block or none
    }

    function toggleSignUp(e){
        e.preventDefault();
        $('#logreg-forms .form-signin').toggle(); // display:block or none
        $('#logreg-forms .form-signup').toggle(); // display:block or none
    }

    $(()=>{
        // Login Register Form
        $('#logreg-forms #forgot_pswd').click(toggleResetPswd);
        $('#logreg-forms #cancel_reset').click(toggleResetPswd);
        $('#logreg-forms #btn-signup').click(toggleSignUp);
        $('#logreg-forms #cancel_signup').click(toggleSignUp);
    })

});

$(function(){
    $('.button-checkbox').each(function(){
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                    on: {
                        icon: 'glyphicon glyphicon-check'
                    },
                    off: {
                        icon: 'glyphicon glyphicon-unchecked'
                    }
            };

        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });

        $checkbox.on('change', function () {
            updateDisplay();
        });

        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');
            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else
            {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }
        function init() {
            updateDisplay();
            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});

	