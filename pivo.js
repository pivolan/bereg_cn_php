function hide1(text1){
    $('#'+text1).stop().slideUp('fast',function(){$(this).removeAttr('open')});
}
function collapsElement(id){
    $('#'+id).stop().attr('height','auto').slideToggle('fast');
}

$(document).ready(function(){              // по окончанию загрузки страницы
    $('#find').focus(function(){
        $(this).css("color", "black").css('font-style','normal');
    });
    $('div.service').slideUp(0);
    $('#find').blur(function(){
        if($(this).val()==''){
          $(this).css("color", "#908e8e").css('font-style','italic');
        }
    });
    $('#login').focus(function(){
        $(this).css("color", "black").css('font-style','normal');
    });
    $('#login').blur(function(){
        if($(this).val()==''){
          $(this).css("color", "#908e8e").css('font-style','italic');
        }
    });
    $('#pass').focus(function(){
        $(this).css("color", "black").css('font-style','normal');
    });
    $('#pass').blur(function(){
        if($(this).val()==''){
          $(this).css("color", "#908e8e").css('font-style','italic');
        }
    });
    $('li.link').hover(function() {
          out2=false;
          var text = $(this).find('a.link').text();
          var offset = $(this).find('a.link').offset();
          var x=offset.left-10;
          var y=offset.top+40;
          $('#'+text).css({height:'auto'}).stop();
          $('#'+text).css({top:y+"px",left:x+"px"}).slideDown('fast',
            function(){$(this).attr('open','open')});
       },
       function() {
         text = $(this).find('a.link').text();
         setTimeout('hide1(text)',0);
       }
   );

});   //document ready end
function coll(){
  $('#feedback').slideToggle('fast');
}

