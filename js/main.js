$(document).ready(function () {
    
    var payloadData = {};

    $('#city-dropdown').attr('disabled', 'disabled');
    $('#msg').hide();
    $('#err').hide();
    $('#err1').hide();

    $('#address_line1').on('keyup', function () {
        if ($("#address_line1").val().length == 0) {
            $("#error_add1").html('This field is required');
        } else {
            $("#error_add1").html('');
        }
    });
    $('#address_line2').on('keyup', function () {
        if ($("#address_line2").val().length == 0) {
            $("#error_add2").html('This field is required');
        } else {
            $("#error_add2").html('');
        }
    });
    $('#state-dropdown').on('click', function () {
        if ($("#state-dropdown").val().length == 0) {
            $("#error_state").html('This field is required');
        } else {
            $("#error_state").html('');
        }
        if ($("#state-dropdown").val().length) {
            $('#city-dropdown').attr('disabled', false);
        }
    })
    $('#city-dropdown').on('click', function () {
        if ($("#city-dropdown").val().length == 0) {
            $("#error_city").html('This field is required');
        } else {
            $("#error_city").html('');
        }
    })
    $('#zipcode').on('keyup', function () {
        if ($("#zipcode").val().length == 0) {
            $("#error_zip").html('This field is required');
        } else {
            $("#error_zip").html('');
        }
    })


    $("#state-dropdown").load("includes/load.php");

    $("#state-dropdown").on("change", function () {
        var state_id = this.value;
        $.ajax({
            url: "./includes/cities-by-state.php",
            type: "POST",
            data: {
                state_id: state_id,
            },
            cache: false,
            success: function (result) {
                $("#city-dropdown").html(result);
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

    // $("#btnPost").click(function (e) {
    //     e.preventDefault();
    //     $.ajax({
    //         type: "POST",
    //         url: "includes/post.php",
    //         data: $(this).serialize(),
    //     }).done(function (data) {
    //         $("#address_line1").val("");
    //         $("#address_line2").val("");
    //         $("#state_id").val("");
    //         $("#city_id").val("");
    //         $("#zipcode").val("");
    //         $("#msgReg").html(
    //             "<p class='text-center alert alert-success'>" + data + "</p>"
    //         );
    //         $("#msgReg").slideDown(1400);
    //         setTimeout(function () {
    //             $("#msgReg").slideUp(900);
    //         }, 900);
    //     });
    // });



    $("#validate").click(function (e) {
        e.preventDefault();

        $('#err').html('');

        if ($("#address_line1").val().length == 0 ||
            $("#address_line2").val().length == 0 ||
            $("#state-dropdown").val().length == 0 ||
            $("#city-dropdown").val().length == 0 ||
            $("#zipcode").val().length == 0) {
            $('#err').html('All fields is required');
        } else {

            $("#address_line1_tab").html($("#address_line1").val());
            $("#address_line2_tab").html($("#address_line2").val());
            $("#state_dropdown_tab").html($("#state-dropdown option:selected").data("state"));
            $("#city_dropdown_tab").html($("#city-dropdown option:selected").data("city"));
            $("#zipcode_tab").html($("#zipcode").val());

            $.ajax({
                type: "POST",
                url: "includes/validate-address.php",
                dataType: "json",
                data: {
                    address_line1: $("#address_line1").val(),
                    address_line2: $("#address_line2").val(),
                    state: $("#state-dropdown option:selected").data("state"),
                    city: $("#city-dropdown option:selected").data("city"),
                    zipcode: $("#zipcode").val(),
                },
                success: function (data) {
                    if (data.address_line1[0] || data.address_line2[0]) {
                        $("#myModal").modal('show');
                        setTimeout(() => {
                            payloadData = storeData(e.target.hash);
                        }, 1000);
                        $("#address_line1_tab2").html(data.address_line1[0]);
                        $("#address_line2_tab2").html(data.address_line2[0]);
                        $("#state_dropdown_tab2").html(data.state[0]);
                        $("#city_dropdown_tab2").html(data.city[0]);
                        $("#zipcode_tab2").html(data.zipcode[0]);
                    } else {
                        $('#err').html('Invalid Address');
                        $('#err').show();
                    }
                },
                error: function (data) {
                    console.log(data);
                },
            });
        }

    });


    $(".nav-link").click(function (e) {
        payloadData = storeData(e.target.hash);
    });

    $("#submit-btn").click(function (e) {
        $.ajax({
            type: "POST",
            url: "includes/post.php",
            dataType: "json",
            data: payloadData,
            success: function (data) {
                $('#msg').html('Address saved Successfully!');
                $('#msg').show();
            },
            error: function (data) {
                $('#msg').html('Address saved Successfully!');
                $('#msg').show();
            },
        });
    });


});

function storeData(tab) {
    let data = {};
    currenttab = tab;
    if (currenttab == '#original') {
        data = {
            address_line1: $("#address_line1_tab").html(),
            address_line2: $("#address_line2_tab").html(),
            state: $("#state-dropdown").val(),
            city: $("#city-dropdown").val(),
            zipcode: $("#zipcode_tab").html(),
        };
    } else {
        data = {
            address_line1: $("#address_line1_tab2").html(),
            address_line2: $("#address_line2_tab2").html(),
            state: $("#state-dropdown").val(),
            city: $("#city-dropdown").val(),
            zipcode: $("#zipcode_tab2").html(),
        };
    }
    return data;
}