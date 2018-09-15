$(function(){

  function openNewAjaxTab(url) {
    var tabOpen = window.open("about:blank", 'newtab'),
        xhr = new XMLHttpRequest();

    xhr.open("GET", '/get_url?url=' + encodeURIComponent(url), true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            tabOpen.location = xhr.responseText;
        }
    }
    xhr.send(null);
  }


  var popupBlockerChecker = {check:function(b) {
    var a = this;
    b ? /chrome/.test(navigator.userAgent.toLowerCase()) ? setTimeout(function()      {
    a._is_popup_blocked(a, b);
    }, 200) : b.onload = function() {
    a._is_popup_blocked(a, b);
    } : a._displayError();
    }, _is_popup_blocked:function(b, a) {
    0 == 0 < a.innerHeight && b._displayError();
    }, _displayError:function() {
    alert("Popup Blocker is enabled! Please add this site to your exception list.");
  }};
	var url_sample = window.location.href;
  var element = document.querySelector('meta[property="og:title"]');
  var meta_desc = element && element.getAttribute("content");

	function update_counter(value) {
		$('#button_share_counter').text(value);
		$('#button_share_counter_mobile').text(value);
	}
	$("#button_share_facebook").click(function(){ 
		$.ajax({
      url: 'index.php/news/share_button',
      type: 'POST',
      data: {'type': 'facebook', 'id': $('#i_article_id').val()},
      async: false,
      success: function (result) {
      	result = JSON.parse(result);
      	update_counter(result.counter);

        // var popup = window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=facebook&wid=pd2j&url="+url_sample, '_blank');
        // popupBlockerChecker.check(popup);
        window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=facebook&wid=pd2j&url="+url_sample);
      }
    });

	});

	$("#button_share_twitter").click(function(){ 
		$.ajax({
      url: 'index.php/news/share_button',
      type: 'POST',
      data: {'type': 'twitter', 'id': $('#i_article_id').val()},
      async: false,
      success: function (result) {
      	result = JSON.parse(result);
      	update_counter(result.counter);
        window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=twitter&wid=pd2j&url="+url_sample+"&title="+meta_desc);
        //popupBlockerChecker.check(popup);

      }
    });
	});

	$("#button_share_google_plus").click(function(){ 
		$.ajax({
      url: 'index.php/news/share_button',
      type: 'POST',
      data: {'type': 'google_plus', 'id': $('#i_article_id').val()},
      async: false,
      success: function (result) {
      	result = JSON.parse(result);
      	update_counter(result.counter);
        window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=google_plusone_share&wid=pd2j&url="+url_sample);
        //popupBlockerChecker.check(popup);
      }
    });
	});

	$("#button_share_linkedin").click(function(){ 
		$.ajax({
      url: 'index.php/news/share_button',
      type: 'POST',
      data: {'type': 'linkedin', 'id': $('#i_article_id').val()},
      async: false,
      success: function (result) {
      	result = JSON.parse(result);
      	update_counter(result.counter);
        window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=linkedin&wid=pd2j&url="+url_sample+"&title="+meta_desc);
        // popupBlockerChecker.check(popup);
      }
    });
	});

	$("#button_share_whatsapp").click(function(){ 
		var isMobile = window.orientation > -1;

		if (isMobile) {
			$.ajax({
      url: 'index.php/news/share_button',
      type: 'POST',
      data: {'type': 'linkedin', 'id': $('#i_article_id').val()},
      async: false,
      success: function (result) {
      	result = JSON.parse(result);
      	update_counter(result.counter);
        window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=whatsapp&wid=pd2j&url="+url_sample);
        //popupBlockerChecker.check(popup);
      }
    });
		} else {
			alert("Share Whatsapp hanya bisa dilakukan di perangkat mobile");
		}
	});

	$("#button_share_line").click(function(){ 
		var isMobile = window.orientation > -1;

		if (isMobile) {
			$.ajax({
      url: 'index.php/news/share_button',
      type: 'POST',
      data: {'type': 'line', 'id': $('#i_article_id').val()},
      async: false,
      success: function (result) {
      	result = JSON.parse(result);
      	update_counter(result.counter);
        window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=lineme&wid=pd2j&url="+url_sample);
        //popupBlockerChecker.check(popup);
      }
    });
		} else {
			alert("Share Line hanya bisa dilakukan di perangkat mobile");
		}
	});

	$("#button_share_facebook_mobile").click(function(){ 
		$.ajax({
      url: 'index.php/news/share_button',
      type: 'POST',
      data: {'type': 'facebook', 'id': $('#i_article_id').val()},
      async: false,
      success: function (result) {
      	result = JSON.parse(result);
      	update_counter(result.counter);
				window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=facebook&wid=pd2j&url="+url_sample);
        //popupBlockerChecker.check(popup);
      }
    });
	});

	$("#button_share_twitter_mobile").click(function(){ 
		$.ajax({
      url: 'index.php/news/share_button',
      type: 'POST',
      data: {'type': 'twitter', 'id': $('#i_article_id').val()},
      async: false,
      success: function (result) {
      	result = JSON.parse(result);
      	update_counter(result.counter);
				window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=twitter&wid=pd2j&url="+url_sample+"&title="+meta_desc);
        //popupBlockerChecker.check(popup);
      }
    });
	});

  https://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=at_com&source=men-300&lng=en&s=twitter&url=https%3A%2F%2Fwww.addthis.com%2F&title=AddThis%20-%20Get%20more%20likes%2C%20shares%20and%20follows%20with%20smart%20website%20tools&ate=AT-at_com/-/-/5a15268806ab5093/3&frommenu=1&ips=1&uid=59285b33981207e0&description=AddThis%20share%20buttons%2C%20targeting%20tools%20and%20content%20recommendations%20help%20you%20get%20more%20likes%2C%20shares%20and%20followers%20and%20keep%20them%20coming%20back.&uud=1&ct=1&tt=0&captcha_provider=recaptcha2&pro=0

	$("#button_share_google_plus_mobile").click(function(){ 
		$.ajax({
      url: 'index.php/news/share_button',
      type: 'POST',
      data: {'type': 'google_plus', 'id': $('#i_article_id').val()},
      async: false,
      success: function (result) {
      	result = JSON.parse(result);
      	update_counter(result.counter);
				window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=google_plusone_share&wid=pd2j&url="+url_sample);
        //popupBlockerChecker.check(popup);
      }
    });
	});

	$("#button_share_linkedin_mobile").click(function(){ 
		$.ajax({
      url: 'index.php/news/share_button',
      type: 'POST',
      data: {'type': 'linkedin', 'id': $('#i_article_id').val()},
      async: false,
      success: function (result) {
      	result = JSON.parse(result);
      	update_counter(result.counter);
				window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=linkedin&wid=pd2j&url="+url_sample+"&title="+meta_desc);
        //popupBlockerChecker.check(popup);
      }
    });
	});

	$("#button_share_whatsapp_mobile").click(function(){ 
		var isMobile = window.orientation > -1;

		if (isMobile) {
			$.ajax({
      url: 'index.php/news/share_button',
      type: 'POST',
      data: {'type': 'linkedin', 'id': $('#i_article_id').val()},
      async: false,
      success: function (result) {
      	result = JSON.parse(result);
      	update_counter(result.counter);
        
				window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=whatsapp&wid=pd2j&url="+url_sample+"&title="+meta_desc+"&uud=1&ct=1&tt=0&captcha_provider=recaptcha2&pro=0");
        //popupBlockerChecker.check(popup);
      }
    });
		} else {
			alert("Share Whatsapp hanya bisa dilakukan di perangkat mobile");
		}
	});

	$("#button_share_line_mobile").click(function(){ 
		var isMobile = window.orientation > -1;

		if (isMobile) {
			$.ajax({
        url: 'index.php/news/share_button',
        type: 'POST',
        data: {'type': 'line', 'id': $('#i_article_id').val()},
        async: false,
        success: function (result) {
        	result = JSON.parse(result);
        	update_counter(result.counter);
  				window.open("http://www.addthis.com/bookmark.php?v=300&winname=addthis&pub=ra-57ba68745ad742dd&source=tbx-300&lng=en&s=lineme&wid=pd2j&url="+url_sample+"&title="+meta_desc);
          //popupBlockerChecker.check(popup);
        }
      });
		} else {
			alert("Share Line hanya bisa dilakukan di perangkat mobile");
		}
	});
});