var	window_width,
	window_height,
	current_width,
	slick_month,
	viewport_width = 1280,
	sp_viewport='<meta name="viewport" content="width=device-width,target-densitydpi= medium-dpi,initial-scale=1,minimum-scale=1">',
	tab_viewport='<meta name="viewport" content="width='+viewport_width+'">',
	current_url=location.href,
	current_pass_arr=location.href.split("/"),
	display = sessionStorage.getItem("display"),
	device = sessionStorage.getItem("device");

var today = new Date(); 
var	year = today.getFullYear(),
	month = today.getMonth()+1,
	weeknum = today.getDay(),
	day = today.getDate(),
	weekarr = new Array("日","月","火","水","木","金","土"),
	week = weekarr[weeknum];

if(month == 12) {
	slick_month = 11;
} else {
	slick_month = month;
}

var	device_width = $(window).width(); // viewport設定前の画面幅取得
var	device_height = $(window).height();

if (display === null && $s.device.tablet) { // 初期アクセス タブレット
	device='tab';
	display='pc';
	$('head').append(tab_viewport);
} else if (display === null && $s.device.version != '') { // 初期アクセス モバイルOS
	device='sp';
	display='sp';
	$('head').append(sp_viewport);
} else if(display === null)  { // 初期アクセス PC
	device='pc';
	display='pc';
}

sessionStorage.setItem("device", device);

if (display === 'sp') { // viewport スマホ
	$('head').append(sp_viewport);
} else if (display === 'pc' && device === 'tab') { // viewport PC
	$('head').append(tab_viewport);
}
windowSize();

function windowSize() {
	window_width=$(window).width();
	window_height=$(window).height();
}