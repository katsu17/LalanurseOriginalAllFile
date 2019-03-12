$(function() {


	function qa() {
		$(this).toggleClass("active").next().slideToggle(300);
	}

	$(".switch .toggle").click(qa);

});
$(function() {
    $('.lightbox').colorbox();
});
