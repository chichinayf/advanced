$(document).ready(function(){
	
	//tab switch
	$(".tab li").hover(function(){
	    if($(this).hasClass("current"))
	    return;
			 
	    var index = $(".tab li").index($(this));
	    $(".tab li").removeClass("current");
	    $(".tab li").eq(index).addClass("current");
			  
	    $(".tab-content").addClass("hide");
	    $(".tab-content").eq(index).removeClass("hide");
	})
	
	//tab-news switch
	$(".tab-news li").on("click",function(){
	    if($(this).hasClass("current"))
	    return;
			 
	    var index = $(".tab-news li").index($(this));
	    $(".tab-news li").removeClass("current");
	    $(".tab-news li").eq(index).addClass("current");
			  
	    $(".news-tab-content").addClass("hide");
	    $(".news-tab-content").eq(index).removeClass("hide");
	})
	
	//show white header
	$(window).scroll(function(){
		if($(window).scrollTop()>100)
		{
			$(".IndexHeader").addClass("white");
		}
		else
		{
			$(".IndexHeader").removeClass("white");
		}
	});
	
	var _hmt = _hmt || [];
	(function($) {
	    'use strict';
		window.scrollReveal = new scrollReveal({ reset: true, move: '50px' });
		
		  var hm = document.createElement("script");
		  hm.src = "https://hm.baidu.com/hm.js?f1e4ed8b816abcdacc992c1f4d870887";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
	})();
	
	
	 (function(m, ei, q, i, a, j, s) {
        m[i] = m[i] || function() {
            (m[i].a = m[i].a || []).push(arguments)
        };
        j = ei.createElement(q),
            s = ei.getElementsByTagName(q)[0];
        j.async = true;
        j.charset = 'UTF-8';
        j.src = 'https://static.meiqia.com/dist/meiqia.js?_=t ';
        s.parentNode.insertBefore(j, s);
    })(window, document, 'script', '_MEIQIA');
    _MEIQIA('entId', 86628);
	
});
