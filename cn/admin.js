$(document).ready(function(){              // по окончанию загрузки страницы
   $("option").hide(0);
   classic=$("select[name2=parent] option:selected").attr('merom');
   $('option[merom='+classic+']').show(0);

   value=$("select[name2=parent] option:selected").parent().val();
   if($('option[merom='+value+']:selected').show(0)){
     $('option[merom='+value+']').show(0);
   }else{
     $('option[merom='+value+']').show(0).attr('selected','selected');
   }

   value=$('option[merom='+value+']:selected').val();
   if($('option[merom='+value+']:selected').show(0)){
     $('option[merom='+value+']').show(0);
   }else{
     $('option[merom='+value+']').show(0).attr('selected','selected');
   }

   $("select[name2='parent']").change(function(){
     value=$(this).val();
     $("select[name2=category] option").hide(0);
     $("select[name2=subcat] option").hide(0);
     $('option[merom='+value+']').show(0).attr('selected','selected');
     value=$('option[merom='+value+']').val();
     $('option[merom='+value+']').show(0).attr('selected','selected');
   });
   $("select[name2='category']").change(function(){
     value=$(this).val();
     $("select[name2=subcat] option").hide(0);
     $('select[name2=subcat] option[merom='+value+']').show(0).attr('selected','selected');
   });
   $('#form_editpage').submit(function(){
     tinyMCE.get('ta').hide();
     tinyMCE.get('icon').hide();
   });
   $('#form_editpage').ajaxForm(function() {
     alert("Изменения сохранены");
     tinyMCE.get('icon').show();
     tinyMCE.get('ta').show();
   });
   $('#newsformadd').ajaxForm(function() {
     $.ajax({
        url: "newsajax.php",
        cache: false,
        success: function(html){
          $("#tbnews").append(html);
        }
     });
   });

});   //document ready end

