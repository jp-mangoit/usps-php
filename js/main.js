$(document).ready(function () {
//   $("#table").load("includes/load.php");
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
});
