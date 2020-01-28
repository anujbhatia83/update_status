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

	