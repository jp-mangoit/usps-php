$(document).ready(function () {
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

    $("#btnPost").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "includes/post.php",
            data: $(this).serialize(),
        }).done(function (data) {
            $("#address_line1").val("");
            $("#address_line2").val("");
            $("#state_id").val("");
            $("#city_id").val("");
            $("#zipcode").val("");
            $("#msgReg").html(
                "<p class='text-center alert alert-success'>" + data + "</p>"
            );
            $("#msgReg").slideDown(1400);
            setTimeout(function () {
                $("#msgReg").slideUp(900);
            }, 900);
        });
    });


    $("#validate").click(async function (e) {
        e.preventDefault();

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
                $("#address_line1_tab2").html(data.address_line1[0]);
                $("#address_line2_tab2").html(data.address_line2[0]);
                $("#state_dropdown_tab2").html(data.state[0]);
                $("#city_dropdown_tab2").html(data.city[0]);
                $("#zipcode_tab2").html(data.zipcode[0]);
            },
            error: function (data) {
                console.log(data);
            },
        });

    });
});
