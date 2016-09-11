
$(document).ready(function () {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});

$("div.alert").delay(3000).slideUp();

function xacnhan(msg){
    if(window.confirm(msg)){
        return true;
    }else{
        return false;
    }
}

$(document).ready(function(){

   $("#addImages").click(function(){
       $("#insert").append('<div class="form-group"><label>Images</label><input type="file" name="fEditDetail[]"></div>');



   });
});