$(function () {
   $('.main-menu').on('click',function(){
      $('.toggle').toggleClass('open');
      $('.nav-list').toggleClass('open');
   });

   AOS.init({
      easing:'ease',
      duration:1000,
   });
   $(document).scroll(function(){
    $('#home').toggleClass('scrolled',$(this).
    	scrollTop() > $('#home').height()); 
});
});
