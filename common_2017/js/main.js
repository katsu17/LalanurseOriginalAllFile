(function($){
	if ((display === 'sp' && device === 'sp') || (display === 'sp' && device === 'tab') || (display === 'pc' && window_width < 768)) { // スマホ表示時
		// スマートフォンメニュー横開き

		// $('#headermenublock .menu').css('cursor','pointer').click(function(){
		// 	if($('#allwrapperblock').css('marginLeft')==='0px') {
		// 		$('#allwrapperblock').animate({marginLeft: '-75%'},250);
		// 	} else {
		// 		$('#allwrapperblock').animate({marginLeft: 0},250);
		// 	}
		// });

		// $('#headermenublock .menu').css('cursor','pointer').click(function(){
		// 	if($('#allwrapperblock').css('marginLeft')==='0px') {
		// 		$('#allwrapperblock').animate({marginLeft: '-75%'},250);
		// 	} else {
		// 		$('#allwrapperblock').animate({marginLeft: 0},250);
		// 	}
		// });
		$('#headermenublock .menu').click(function(){
			$("#allwrapperblock").toggleClass("opened-menu");
		});

		// $('#headermenublock').click(function(e){
		// 	// console.log(e)
		// 	if(e.target.id == "headermenublock") {
		// 		$("#headermenublock").removeClass("opened-menu");
		// 	}
		// });


		// table スクロール用
		//$('table.scrollable').wrap('<div class="tablescrollwrapper">')
		
		//load後実行
		$(window).load(function() {
			// slick 実行
			$('.slides').slick({
				dots: true,
				centerMode: true,
				centerPadding: '0px',
				slidesToShow: 1,
				infinite:true,
				arrows:false,
				autoplay:true,
				fade: false
			});
			$('#showroomcalendarslides').slick({
				dots: true,
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows:false,
				infinite:false,
				initialSlide: slick_month - 1
			});
		});
		//スマートフォンメニュースクロール高さ
		$('.headermenuwrapper').height(window_height);
		// アンカーリンク スマホヘッダ固定の場合は #pagetopblock のみで適応すること ページ内リンクでは位置がずれる
		$('#allwrapperblock').after('<div id="pagetopblock"><a href="#contentsblock">ページの先頭へ戻る</a></div>');
		$('#pagetopblock > a').click(function() { // from http://memo.ravenalala.org/scroll-to-anchor/
			var target = $(this.hash);
			if (target) {
				var targetOffset = target.offset().top;
				$('#scrollblock').animate({scrollTop: targetOffset-60},400);
				return false;
			}
		});
	} else { // PC表示時
		//load後実行
		$(window).load(function() {
			// slick 実行
			$('.slides').slick({
				dots: true,
				centerMode: true,
				centerPadding: '0px',
				slidesToShow: 1,
				infinite:true,
				arrows:true,
				autoplay:true,
				fade: true
			});
			$('#showroomcalendarslides').slick({
				dots: true,
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows:true,
				infinite:false,
				initialSlide:slick_month - 1
			});
		});

		// アンカーリンク スマホヘッダ固定の場合は #pagetopblock のみで適応すること ページ内リンクでは位置がずれる
		$('#allwrapperblock').after('<div id="pagetopblock"><a href="#allwrapperblock">ページの先頭へ戻る</a></div>');
		$('a[href*=#]:not(.noanchor)').click(function() { // from http://memo.ravenalala.org/scroll-to-anchor/
			var target = $(this.hash);
			if (target) {
				var targetOffset = target.offset().top;
				$('html,body').animate({scrollTop: targetOffset},400);
				return false;
			}
		});
	}

	if (device === 'sp' || device === 'tab') { //スマホのみ
		// スマホ用電話番号リンク
		$('.telto').each(function(){
			var telno = $(this).text();
			$(this).wrapInner('<a href="tel:'+telno+'">');
		});
		// Googleマップスクロール抑制（テスト）
		$('.gmapwrapper').each(function(){
			$(this).append('<div class="gmapwrapper-cover"> </div>');
			var iframeheight = $(this).find('iframe').height();
			$(this).find('.gmapwrapper-cover').height(iframeheight);
			$(this).append('<span class="gmapwrapper-button">地図を操作する</span>');
			$(this).find('.gmapwrapper-button').click(function() {
				var cover = $(this).closest('.gmapwrapper').find('.gmapwrapper-cover').css('display')
				if(cover == 'block'){
					$(this).closest('.gmapwrapper').find('.gmapwrapper-cover').hide();
					$(this).text('地図の操作をやめる');
				} else {
					$(this).closest('.gmapwrapper').find('.gmapwrapper-cover').show();
					$(this).text('地図を操作する');
				}
			});
		});
	}
	if (device === 'tab' && device_width < 768) { //768px以下のタブレットのみ
		$('#footerblock').after('<div class="displaymode" id="displaymode"></div>');
		if(display === 'pc') {
			$('#displaymode').text('スマートフォン表示');
		} else if(display === 'sp') {
			$('#displaymode').text('PC表示');
		}
	}
	
	$('#displaymode').click(function() {
		if (display === 'pc') {
			display = 'sp';
			$('#displaymode').text('PC');
		} else if(display === 'sp') {
			display = 'pc';
		}
		sessionStorage.setItem("display",display);
		location.reload();
	});
// ソーシャルボタン
	var pagetitle = $('title').text();
	$('.twbtn').attr('href','http://twitter.com/share?url=' + current_url + '&text=' + pagetitle);
	$('.fbbtn').attr('href','http://www.facebook.com/share.php?u=' + current_url);
	$('.gpbtn').attr('href','https://plus.google.com/share?url=' + current_url);
	var url_str = 'http://line.me/R/msg/text/?'+current_url;
	$('.linebtn').attr('href',url_str.replace('/text/?','/text/?'+encodeURI(pagetitle)));

// メニューカラー
	var headermainmenu = $('body').data('headermainmenu');
	$('#headermainmenublock').find('li.'+headermainmenu).children('a').addClass('is-current');
	var headershowroommenu = $('body').data('headershowroommenu');
	$('#headermainmenublock').find('li.'+headershowroommenu).children('a').addClass('is-current');
	var showroommenu = $('body').data('showroommenu');
	$('#showroommenu').find('li.'+showroommenu).children('a').addClass('is-current');

// ロールオーバー
	var preLoadImg = new Object();
	$('a.rollover img').each(function(){
		var imgSrc = this.src;
		var sep = imgSrc.lastIndexOf('.');
		var onSrc = imgSrc.substr(0, sep) + '_f2' + imgSrc.substr(sep, 4);
		preLoadImg[imgSrc] = new Image();
		preLoadImg[imgSrc].src = onSrc;
		$(this).parent('a.rollover').hover(function() {
			$(this).children('img').attr('src',onSrc);
		},function() {
			$(this).children('img').attr('src',imgSrc);
		});
	});
	$('a.brightover').hover(function() {
			$(this).css({opacity: "0.75"});
		},function() {
			$(this).css({opacity: "1"});
	});
	
	
// アクセスマップのホイール拡縮スクロールを切る

$('.access-mapbody').click(function(e) {
  $(this).find('iframe').addClass('clicked');
}).mouseleave(function(e) {
  $(this).find('iframe').removeClass('clicked');
});

})(jQuery);
