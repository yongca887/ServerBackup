$(document).ready(function(){
	$nav = $('#nav');
	var $nav_ul = $nav.find('ul');
	// alert();
	// $nav_li = $nav_ul.find('li');

	// var $nav_ul = $(".menu");

	var $li= document.createElement("li");
	var $a = document.createElement("a");

	$a.href = "/wordpress/";

	var is_home = document.getElementById("is_home").value;
	// alert(is_home);
	if (is_home) {
		$a.id = "active";
	};

	$a.innerHTML = "首页";

	$li.appendChild($a);

	var ul = document.getElementById("menu-menu");
	if (ul.firstChild) {
		ul.insertBefore($li, ul.firstChild);
	} else {
		ul.appendChild($li);
	};

	// alert($nav_ul.html());

	// // alert(document.location.href)

	// $nav_a.click(function() {
	// 	var $this = $(this);

	// 	$nav_a.removeClass('active');
	// 	// $this.addClass('active');
	// });
});