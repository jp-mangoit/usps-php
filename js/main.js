$(document).ready(function () {
    $("#state-dropdown").load("includes/load.php");

    $("#state-dropdown").on("change", function () {
        var state_id = $("#state-dropdown").val();
        console.log(state_id);
        $.ajax({
            url: "includes/cities-by-state.php",
            type: "POST",
            data: {
                state_id: state_id,
            },
            cache: false,
            success: function (result) {
                $("#city-dropdown").html(result);
            },
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

    $("#validate").click(function (e) {
        e.preventDefault();

        let address_line1 = $("#address_line1").val();
        let address_line2 = $("#address_line2").val();
        let state = $("#state-dropdown option:selected").data("state");
        let city = $("#city-dropdown option:selected").data("city");
        let zipcode = $("#zipcode").val();

        $("#original").html(
            "<p>Address Line 1" +
            address_line1 +
            "</p><p>Address Line 2" +
            address_line2 +
            "<p>State" +
            state +
            "</p><p>City" +
            city +
            "</p><p>Zipcode" +
            zipcode +
            "</p>"
        );

        // $.ajax({
        //   type: "POST",
        //   url: "includes/post.php",
        //   data: $(this).serialize(),
        // }).done(function (data) {
        //   $("#address_line1").val("");
        //   $("#address_line2").val("");
        //   $("#state_id").val("");
        //   $("#city_id").val("");
        //   $("#zipcode").val("");

        //   setTimeout(function () {
        //     $("#msgReg").slideUp(900);
        //   }, 900);
        // });

        // var address_line1 = $("#address_line1").val();
        // var address_line2 = $("#address_line2").val();
        // var state_id = $("#state_id").val();
        // var city_id = $("#city_id").val();
        // var zipcode = $("#zipcode").val();
    });

    $("#standard_usps").click(function (e) {
        e.preventDefault();

        let address_line1 = $("#address_line1").val();
        let address_line2 = $("#address_line2").val();
        let state = $("#state-dropdown option:selected").data("state");
        let city = $("#city-dropdown option:selected").data("city");
        let zipcode = $("#zipcode").val();

        $.ajax({
            type: "POST",
            url: "includes/validate-address.php",
            dataType: "json",
            data: {
                address_line1: address_line1,
                address_line2: address_line2,
                state: state,
                city: city,
                zipcode: zipcode,
            },
            success: function (data) {
                console.log(data.address_line2);
                $("#standard").html(
                    "<p>Address Line 1" +
                    data.address_line1[0] +
                    "</p><p>Address Line 2" +
                    data.address_line2[0] +
                    "<p>State" +
                    data.state[0] +
                    "</p><p>City" +
                    data.city[0] +
                    "</p><p>Zipcode" +
                    data.zipcode[0] +
                    "</p>"
                );
            },
            error: function (data) {
                console.log(data);
            },
        });
    });
});
