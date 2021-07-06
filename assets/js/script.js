$(document).ready(function () {
    $("#live_search").keyup(function () {
        var query = $(this).val();
        if (query != "") {
            $.ajax({
                url: 'process.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function (data) {
                    $('#search_result').html(data);
                    $('#search_result').css('display', 'block');

                    $("#live_search").focusout(function () {
                        $('#search_result').css('display', 'none');
                    });
                    $("#live_search").focusin(function () {
                        $('#search_result').css('display', 'block');
                    });
                }
            });
        } else {
            $('#search_result').css('display', 'none');
        }
    });   
});

