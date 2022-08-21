$(document).ready(function () {
  $("#summernote").summernote({
    height: 200,
  });
});

$(document).ready(function (event) {
  $("#selectallboxes").click(function () {
    if (this.checked) {
      $("#checkboxes").each(function () {
        this.checked = true;
      });
    } else {
      $("#checkboxes").each(function () {
        this.checked = false;
      });
    }
  });
});

function loadUsersOnline() {
  $.get("functions.php?onlineusers=result", function (data) {
    $(".users-online").text(data);
  });
}

setInterval(() => {
  loadUsersOnline();
}, 500);

