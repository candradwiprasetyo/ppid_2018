$(function(){
  // Check the initial Position of the fixed_nav_container


  $("#search-mobile").click(function () {
  	if ($( window ).width() < 769){
  		if ($(".c-search-mobile").height() > 1) {
  			$(".c-search-mobile").css({height: '0', 'box-shadow': 'none'});
  		} else {
  			$(".c-search-mobile").css({height: 'auto', 'box-shadow': '0px 5px 10px 3px #eee'});
  			$('.navbar-collapse').removeClass('in');
  		}
  	}
  });

  var offset = 300,
	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
	offset_opacity = 1200,
	//duration of the top scrolling animation (in ms)
	scroll_top_duration = 700,
	//grab the "back to top" link
	$back_to_top = $('.cd-top');

  var stickyHeaderTop = $('.c-menu').offset().top;
  if ($('.c-left-side-banner').length > 0) {
	  var stickyLeftBanner = $('.c-left-side-banner').offset().top;
	}

  $(window).scroll(function(){
  	

  	if ($( window ).width() < 769){
  		// // mobile
  		// var containerWidth = $(window).width();
  		// $('.c-menu-mobile').css({'max-width': containerWidth});

  		// //console.log($(document).scrollTop()+'-'+$('.c-menu-mobile').offset().top);
  		// if( $(document).scrollTop() > 55 ) {
	   //    $('.c-menu-mobile').css({position: 'fixed', 'top': '0', background: '#08294C', 'border-bottom': '2px solid #F77B04'});  
	   //    $('.js-container').css({'margin-top': '50px'});
	   //    $('.new-icon').css({'display': 'block'});
	   //    $('.home-button-mobile').css({color: '#fff'});
	   //    $('.navbar-toggle').css({'border-color': '#fff'});
	   //    $('.navbar-toggle .icon-bar').css({background: '#fff'});

	   //  } else {
	   //    $('.c-menu-mobile').css({position: 'relative', top: '0px', background: '#eee', 'border-bottom': 'none'});
	   //    $('.js-container').css({'margin-top': '0'});
	   //    $('.new-icon').css({'display': 'none'});
	   //    $('.home-button-mobile').css({color: '#999'});
	   //    $('.navbar-toggle').css({'border-color': '#666'});
	   //    $('.navbar-toggle .icon-bar').css({background: '#666'});

	   //  }
  	} else {
  		// desktop
  		var containerWidth = $('.container').width();
  		//$('.c-menu').css({'max-width': containerWidth});

	    if( $(document).scrollTop() > stickyHeaderTop ) {
	      $('.c-menu').css({position: 'fixed', 'top': '0'});  
	      $('.js-container').css({'margin-top': '50px'});
	    } else {
	      $('.c-menu').css({position: 'relative', top: '0px'});
	      $('.js-container').css({'margin-top': '0'});
	    }
	    if ($('.c-left-side-banner').length > 0) {
		    if( $(document).scrollTop() > stickyLeftBanner ) {
		      $('.c-left-side-banner').css({position: 'fixed', top: '50px'});
		      $('.c-right-side-banner').css({position: 'fixed', top: '50px'});
		    } else {
		      $('.c-left-side-banner').css({position: 'absolute', top: '210px'});
		      $('.c-right-side-banner').css({position: 'absolute', top: '210px'});
		    }
		  }
		}

	  // Back to topcons
	  // reach bot footer
	  // if ($(window).scrollTop() == $(document).height() - $(window).height()) { 
	  // reach top footer
	  var marginLeft = $('.js-container').width();
	  marginLeft = marginLeft - 40;
	  if ($(window).scrollTop() >= (($(document).height() - $(window).height()) - $('.c-footer').innerHeight())) {
	  	$back_to_top.css({'position': 'relative', 'margin-left': marginLeft});
	  } else if ( $(this).scrollTop() > offset )  {
	   	$back_to_top.addClass('cd-is-visible');
	   	$back_to_top.css({'position': 'fixed', 'margin-left': marginLeft});
	  } else {
	   	$back_to_top.removeClass('cd-is-visible cd-fade-out');
	   }

  });

  //smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

  $("#c-button-hide").click(function () {
  	// if ($('.c-main-banner').height() == 0) {
  	// 	var heightReal = $('.c-main-banner .carousel-top .carousel-inner .active img').height();
  	// 	$('.c-main-banner').css({'overflow': 'hidden'});
  	// 	$('.c-main-banner').animate({'height': heightReal});
  	// 	$('.c-main-banner img').fadeIn();
  	// 	$('.c-button-hide').text('HIDE');
  	// } else {
  	// 	$('.c-main-banner').css({'overflow': 'hidden'});
	  // 	$('.c-main-banner').animate({'height': '0px'});
	  // 	$('.c-main-banner img').fadeOut();
	  // 	$('.c-button-hide').text('SHOW');
	  // }
	  	// $('#row_section_1').css({'display': 'none'});
	  	$('#row_section_1').animate({'height': '0'});
	  	$('.c-main-banner').css({'overflow': 'hidden'});
	  	$('#c-button-hide').fadeOut();
	  	$('#c-button-show').fadeIn();
	  	$('.c-main-banner').animate({'height': '0px'});
	  	$('.c-main-banner img').fadeOut();
	  	$('#row_section_1').addClass('row-no-margin');
  });

  $("#c-button-show").click(function () {
  		var heightReal = $('.c-main-banner .carousel-top .carousel-inner .active img').height();
	  	$('#row_section_1').animate({'height': heightReal});
	  	$('.c-main-banner').css({'overflow': 'hidden'});
	  	$('#c-button-show').fadeOut();
	  	$('#c-button-hide').fadeIn();
	  	$('.c-main-banner').animate({'height': heightReal});
	  	$('.c-main-banner img').fadeIn();
	  	$('#row_section_1').removeClass('row-no-margin');
  });

  $(".c-menu .item").hover(function () {
  	$('.c-menu-overlay').css({'display': 'inline'});
  });
  $(".c-menu .item-exception").hover(function () {
  	$('.c-menu-overlay').css({'display': 'none'});
  });
  $(".c-menu .item-index").hover(function () {
  	$('.c-menu-overlay').css({'display': 'inline'});
  });
  $(".c-menu-overlay").hover(function () {
  	$('.c-menu-overlay').css({'display': 'none'});
  });

  	if ($('.carousel-top').length>0){
	  	$('.carousel-top').carousel({
		  interval: 5000,
		  pause: false
		});
	}

  // date realtime
	var today = new Date();
	var day = today.getDay();
	var dd = today.getDate();
	var mm = today.getMonth(); //January is 0!
	var yyyy = today.getFullYear();
	var dayarray=new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu")
	var montharray=new Array("Januari","Februari","Maret","April","Mei","Juni", "Juli","Agustus","September","Oktober","November","Desember")

	if(dd<10) {
	  dd='0'+dd
	} 

	if(mm<10) {
	  mm='0'+mm
	} 

	// today = mm+'/'+dd+'/'+yyyy;
	today = dayarray[day] + ', ' + dd + ' ' + montharray[parseInt(mm)] + ' ' + yyyy;
	document.getElementById("demonew").innerHTML = today;
	var myVar=setInterval(function(){myTimer()},1000);

	function myTimer() {
	    var currentDate = new Date();
	    var currentHour = currentDate.getHours();
	    var currentMinute = currentDate.getMinutes();
	    var currentSecond = currentDate.getSeconds();
	    currentHour = (currentHour > 9) ? currentHour : "0" + currentHour;
	    currentMinute = (currentMinute > 9) ? currentMinute : "0" + currentMinute;
	    currentSecond = (currentSecond > 9) ? currentSecond : "0" + currentSecond;
	    document.getElementById('demo').innerHTML = currentHour + ':' + currentMinute + ':' + currentSecond + ' WIB';
	}
	
});

function countBanner(id){
	$.ajax({
		data: 'id=' + id,
		url: 'home/count_banner',
		method: 'POST', // or GET    
	});
}

