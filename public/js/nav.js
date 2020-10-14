$('.navBtn').click(function(){
    $(this).toggleClass("click");
    $('.sidebar').toggleClass("show");
  });
    $('.feat-btn').click(function(){
      $('nav ul .feat-show').toggleClass("show");
      $('nav ul .first').toggleClass("rotate");
    });
    $('.serv-btn').click(function(){
      $('nav ul .serv-show').toggleClass("show1");
      $('nav ul .second').toggleClass("rotate");
    });
    $('.carg-btn').click(function(){
      $('nav ul .carg-show').toggleClass("show2");
      $('nav ul .thirth').toggleClass("rotate");
    });
    $('.lib-btn').click(function(){
      $('nav ul .lib-show').toggleClass("show3");
      $('nav ul .fourth').toggleClass("rotate");
    });
    $('.comp-btn').click(function(){
      $('nav ul .comp-show').toggleClass("show4");
      $('nav ul .fith').toggleClass("rotate");
    });
    $('nav ul li').click(function(){
      $(this).addClass("active").siblings().removeClass("active");
    });