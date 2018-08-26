
function show(i,t,tm) {
   //text = $(this).closest('tr').find('[name="idnum"]').text();
  // alert(i+t+tm);
  $.ajax({
     url:"article.php",
     type:"POST",
     data:{  idnum:i,
             method:"show"
     },
     error:function(xhr) {
         alert('Ajax reques fails');
     },
     success:function (res) {

       $("#article").val(res);
       $("#id_num").attr("num",i);
       $("#id_num").text("標題："+t+"／最後更新時間："+tm+"。");
      // return i;
     }
   })
   //ajax
 }

function fix() {
    article=$("#article").val();
    idnum=$("#id_num").attr("num");

    //alert($("#id_num").attr("num"));
    $.ajax({
      url:"article.php",
      type:"POST",
      data:{
        article:article,
        idnum:idnum,
        method:"fix"
      },
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
}

function deletes(i) {

  $.ajax({
     url:"article.php",
     type:"POST",
     data:{  idnum:i,
            method:"deletes"

     },
     error:function(xhr) {
         alert('Ajax reques fails');
     },
     success:function (res) {
       alert("刪除成功");
     }
   })
   //ajax
 }
