
$(document).ready(function() {

  $('#po').on("click",function() {
    $.ajax({
      url:"po.php",
      type:"POST",
      data:$('#poinf').serialize(),
      error:function(xhr) {
          alert('Ajax request fails');
      },
      success:function (res) {
        if(res=="ok"){
        alert("發布成功");

        }else {
        alert("失敗");
        }
      }
    })
  })

})


//id="<?php echo $id; ?>" name="<?php echo $id; ?>"
