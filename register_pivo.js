$(document).ready(function(){              // по окончанию загрузки страницы
    $('#fio').keyup(function(event){
      var str=$(this).val();
      var str2=str.split(" ");
      $('#lastname').val(str2[0]);
      $('#name').val(str2[1]);
      $('#sername').val(str2[2]);
    });
});   //document ready end

