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

  $("#modalBtn").click(function (e) {
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

      setTimeout(function () {
        $("#msgReg").slideUp(900);
      }, 900);
    });

    // var address_line1 = $("#address_line1").val();
    // var address_line2 = $("#address_line2").val();
    // var state_id = $("#state_id").val();
    // var city_id = $("#city_id").val();
    // var zipcode = $("#zipcode").val();
  });
});
