(function($){
  "use strict";
  /*$('.wpuf_post_title_8,.wpuf_category_8').on('input', function(){
    var OutputValue = $('.wpuf_post_title_8').attr('value') + ' カテゴリ：' + $('.wpuf_category_8 option:selected').text();
    $('input#wpcf-keywords_8').val(OutputValue);
  });*/
  
  $('.press form input, .press form select').on('input', function(){
    var output = FormFusion();
    $('.press form .wpcf-keywords').find('textarea').val(output);
  });
  
  $('.press form textarea').keyup(function(){
    var output = FormFusion();
    $('.press form .wpcf-keywords').find('textarea').val(output);
  });
  
  function FormFusion(){
    var OutputValue = '';
    OutputValue = $('.press form .post_title').find('input').attr('value') ;
    OutputValue = OutputValue + $('.press form .wpcf-lead').find('input').attr('value') ;
    OutputValue = OutputValue + $('.press form .wpcf-content').find('textarea').attr('value') ;
    OutputValue = OutputValue + $('.press form .wpcf-owner').find('input').attr('value') ;
    OutputValue = OutputValue + $('.press form .wpcf-date').find('input').attr('value') ;
    OutputValue = OutputValue + $('.press form .wpcf-datetime').find('textarea').attr('value') ;
    OutputValue = OutputValue + $('.press form .wpcf-access').find('textarea').attr('value') ;
    OutputValue = OutputValue + $('.press form .wpcf-price').find('textarea').attr('value') ;
    OutputValue = OutputValue + $('.press form .wpcf-capacity').find('input').attr('value') ;
    OutputValue = OutputValue + $('.press form .wpcf-target').find('input').attr('value') ;
    OutputValue = OutputValue + $('.press form .wpcf-url').find('input').attr('value') ;
    OutputValue = OutputValue + $('.press form .wpcf-inquiry').find('textarea').attr('value') ;
    OutputValue = OutputValue  + ' カテゴリ：' + $('.wpuf_category_8 option:selected').text();
    return OutputValue;
  }
})(jQuery);
