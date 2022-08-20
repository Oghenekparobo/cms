$(document).ready(function () {
  $("#summernote").summernote({
    height: 200,
  });
});

$(document).ready(function (event) {
  $("#selectallboxes").click(function () {
    if (this.checked) {
      $("#checkboxes").each(function(){ 
          this.checked = true;
      })
    }else{
        $("#checkboxes").each(function(){ 
            this.checked = false;
        })
    }
  });
});








