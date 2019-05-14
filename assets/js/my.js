$(document).ready(function () {
	$('.menu-bar').click(function () {
		$('.menu-side-overlay').addClass('menu-active');
		$('.menu-links ul li').addClass('animated');
		$('.menu-links ul li').addClass('slideInLeft');
		$('.logo, .header-text, .header-btn, .menu-bar span, .scroll').fadeOut(200);
	})
});

$(document).ready(function () {
	$('.close-menu-icon').click(function () {
		$('.menu-side-overlay').removeClass('menu-active');
		$('.menu-links ul li').removeClass('animated');
		$('.menu-links ul li').removeClass('slideInLeft');
		$('.logo, .header-text, .header-btn, .menu-bar span, .scroll').fadeIn(200);
	})
});

	//Jquery Spinner / Quantity Spinner
	if ($('.quantity-spinner').length) {
		$('.quantity-spinner .plus').on('click', function () {
			var val = $(this).prev('.prod_qty').val();
			$(this).prev('.prod_qty').val((val * 1) + 1);
		});
		$('.quantity-spinner .minus').on('click', function () {
			var val = $(this).next('.prod_qty').val();
			if (val != 1) {
				$(this).next('.prod_qty').val((val * 1) - 1);
			}
		});
	}


// trigger-toast
$('.trigger-toast').click(function () {
	$('.container-toast').addClass('visi-visible');
	$('.rectangle').addClass('anim-toast');
	$('.notification-text').addClass('anim-text');
});

$('#close-trigger').click(function () {
	$('.container-toast').removeClass('visi-visible');
	$('.rectangle').removeClass('anim-toast');
	$('.notification-text').removeClass('anim-text');
});

// trigger-toast

// send email
function sendContact() {
	var b;
	b = validateContact();
	if (b) {
		jQuery.ajax({
			url: "includes/mail.php",
			data: "userName=" + $("#userName").val() + "&userEmail=" + $("#userEmail").val() + "&content=" + $("#content").val() + "&email_msg=" + $("#email_msg").val(),
			type: "POST",
			success: function(a) {
				$("#mail-status").html(a)
			},
			error: function() {}
		})
	}
}

function validateContact() {
	var b = true;
	$(".demoInputBox").css("background-color", "");
	$(".info").html("");
	if (!$("#userName").val()) {
		$("#userName-info").html("*Field is required");
		$("#userName").css("border-bottom", "2px solid #e53935");
		b = false
	}
	if (!$("#userEmail").val()) {
		$("#userEmail-info").html("*Field is required");
		$("#userEmail").css("border-bottom", "2px solid #e53935");
		b = false
	}
	if (!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		$("#userEmail-info").html("*Email is invalid");
		$("#userEmail").css("border-bottom", "2px solid #e53935");
		b = false
	}
	if (!$("#content").val()) {
		$("#content-info").html("*Field is required");
		$("#content").css("border-bottom", "2px solid #e53935");
		b = false
	}
	if (!$("#email_msg").val()) {
		$("#msg-info").html("*Field is required");
		$("#email_msg").css("border-bottom", "2px solid #e53935");
		b = false
	}
	return b
};


// login activation
$(document).ready(function () {
	$('.login-btn').click(function () {
		$('.login-target').addClass('login-active');
		$('.header-img, .login-link, #targrtLink, footer').fadeOut(200);
	})
});

$(document).ready(function () {
	$('#trigger-login').click(function () {
		$('.signup-target').removeClass('login-active');
		$('.login-target').addClass('login-active');
		$('.header-img, .login-link,  #targrtLink, footer').fadeOut(200);
	})
});

$(document).ready(function () {
	$('.close-login-icon').click(function () {
		$('.login-target').removeClass('login-active');
		$('.header-img, .login-link, #targrtLink, footer').fadeIn(200);
	})
});


// login activation
// signup activation
$(document).ready(function () {
	$('.signup-btn').click(function () {
		$('.signup-target').addClass('login-active');
		$('.header-img, .login-link, #targrtLink, footer').fadeOut(200);
	})
});
$(document).ready(function () {
	$('#trigger-signup').click(function () {
		$('.signup-target').addClass('login-active');
		$('.login-target').removeClass('login-active');
		$('.header-img, .login-link, #targrtLink, footer').fadeOut(200);
	})
});

$(document).ready(function () {
	$('.close-login-icon').click(function () {
		$('.signup-target').removeClass('login-active');
		$('.header-img, .login-link, #targrtLink, footer').fadeIn(200);
	})
});

// wishlist active
$(document).ready(function () {
	$('.wishlist').click(function () {
		$(this).toggleClass('added-to-wishlist');
	})
});
// wishlist active

$(window).scroll(function () {
	var scroll = $(window).scrollTop();
	if (scroll >= 500) {
		$(".scroll").addClass("scroll-remove");
	} else {
		$(".scroll").removeClass("scroll-remove");
	}
});

// target links
function targrtLink() {
	var elmnt = document.getElementById("targrtLink");
	elmnt.scrollIntoView();
}

// validation.js
$(function () {
	$.validator.setDefaults({
		highlight: function (element) {
			$(element).closest('.form-control').addClass('is-invalid');
		}
	});
});


$('#customer_signup').validate({ // initialize the plugin
	rules: {
		c_name: {
			required: true
		},
		c_email: {
			required: true,
			email: true
		},
		c_pass: {
			required: true,
			minlength: 6

		},
		c_country: {
			required: true
		},
		c_city: {
			required: true
		},
		c_contact: {
			required: true

		},
		c_address: {
			required: true

		}
	},
	messages: {}
});

$('#customer_login').validate({
	rules: {
		email: {
			required: true,
			email: true
		},
		pass: {
			required: true
		}
	}
});

$('#admin_login').validate({
	rules: {
		email: {
			required: true,
			email: true
		},
		password: {
			required: true
		}
	}
});


$('#change_password').validate({
	rules: {
		old_password: {
			required: true,
			minlength: 6
		},
		new_password: {
			required: true,
			minlength: 6
		},
		confirm_password: {
			required: true,
			minlength: 6
		}
	}
});

$('#change_profile').validate({
	rules: {
		customer_name: {
			required: true
		},
		customer_country: {
			required: true
		},
		customer_city: {
			required: true
		},
		customer_contact: {
			required: true
		},
		customer_address: {
			required: true

		}
	}
});


$(".toggle-password").click(function () {

	$(this).toggleClass("far-eye fa-eye-slash");
	var input = $($(this).attr("toggle"));
	$('#password').togglePassword();
});
// target links

// signup activation
// var typed = new Typed(".banner-text", {
//   strings: [
//     "the best selling 100% Natural Sex supplements",
//     "100% Natural, Herbal and Secure to Use"
//   ],
//   smartBackspace: true,
//   typeSpeed: 50,
//   backSpeed: 30,
//   backDelay: 500,
//   startDelay: 3000,
//   loop: false
// });

setTimeout(function () {
	$('.contact-wrapper').addClass('contact-box-shodow')
}, 3000);


// products animation
$('.product-bg').each(function (i) {
	setTimeout(function () {
		$('.product-bg').eq(i).addClass('product-visible');
	}, 200 * i)
});
// products animation

$(document).ready(function () {
	$('.red.label').click(function () {
		$(this).toggleClass('added');
	})
});


// google maps
var map;

function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {
			lat: 41.390205,
			lng: 2.154007
		},
		zoom: 12,
		styles: [
			{elementType: 'geometry', stylers: [{color: '#242f3e'}]},
			{elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
			{elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
			{
				featureType: 'administrative.locality',
				elementType: 'labels.text.fill',
				stylers: [{color: '#978a19'}]
			},
			{
				featureType: 'poi',
				elementType: 'labels.text.fill',
				stylers: [{color: '#978a19'}]
			},
			{
				featureType: 'poi.park',
				elementType: 'geometry',
				stylers: [{color: '#263c3f'}]
			},
			{
				featureType: 'poi.park',
				elementType: 'labels.text.fill',
				stylers: [{color: '#6b9a76'}]
			},
			{
				featureType: 'road',
				elementType: 'geometry',
				stylers: [{color: '#38414e'}]
			},
			{
				featureType: 'road',
				elementType: 'geometry.stroke',
				stylers: [{color: '#212a37'}]
			},
			{
				featureType: 'road',
				elementType: 'labels.text.fill',
				stylers: [{color: '#9ca5b3'}]
			},
			{
				featureType: 'road.highway',
				elementType: 'geometry',
				stylers: [{color: '#b52127'}]
			},
			{
				featureType: 'road.highway',
				elementType: 'geometry.stroke',
				stylers: [{color: '#1f2835'}]
			},
			{
				featureType: 'road.highway',
				elementType: 'labels.text.fill',
				stylers: [{color: '#f3d19c'}]
			},
			{
				featureType: 'transit',
				elementType: 'geometry',
				stylers: [{color: '#2f3948'}]
			},
			{
				featureType: 'transit.station',
				elementType: 'labels.text.fill',
				stylers: [{color: '#978a19'}]
			},
			{
				featureType: 'water',
				elementType: 'geometry',
				stylers: [{color: '#17263c'}]
			},
			{
				featureType: 'water',
				elementType: 'labels.text.fill',
				stylers: [{color: '#515c6d'}]
			},
			{
				featureType: 'water',
				elementType: 'labels.text.stroke',
				stylers: [{color: '#17263c'}]
			}
		]
	});

	var marker = new google.maps.Marker({
		position: {
			lat: 52.5200,
			lng: 13.4050
		},
		map: map,
		icon: 'assets/img/logo-map.png',
		title: 'Excalibur'
	});
	var InfoWindow = new google.maps.InfoWindow({
		content: '<h2></h2>'
	});

	marker.addListener('click', function () {
		InfoWindow.open(map, marker);
	})
}

// google maps


// stepper jquery

// stepper jquery
