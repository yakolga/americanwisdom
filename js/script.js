window.addEventListener("DOMContentLoaded", () => {
  const menu = document.querySelector(".header__menu"),
    menuItem = document.querySelectorAll(".header__item"),
    hamburger = document.querySelector(".hamburger");

  hamburger.addEventListener("click", (e) => {
    hamburger.classList.toggle("header__hamburger_active");
    menu.classList.toggle("header__menu_active");
  });


  menuItem.forEach((item) => {
    item.addEventListener("click", (e) => {
      hamburger.classList.toggle("header__hamburger_active");
      menu.classList.toggle("header__menu_active");
    });
  });
});

//image resizing 
const image = document.querySelector('.about__background'),
      container = document.querySelector('.container'), 
      aboutText = document.querySelector('.about__info');

if (document.documentElement.clientWidth > 1200) {
  marginOfContainer = (document.documentElement.clientWidth - container.offsetWidth) / 2;
  left = marginOfContainer + aboutText.offsetWidth + 'px';
  image.style.left = left;
  image.style.paddingLeft = '40px';
}

//modal close
(function($) {
$('.modal__close').on('click', function() {
  $('.overlay, #thanks').fadeOut('slow');
});
})(jQuery);

//form validation
function validateForms(form) {
  $(form).validate({
  rules: {
    name: {
      required: true, 
      minlength: 2
    }, 
    phone: {
      required: true, 
      minlength: 9
    },
    surname: {
      required: true, 
      minlength: 2
    },
    email: {
      required: true, 
      email: true,
    },
    privacypolicy: "required"
  },
  messages: {
    name: "This field is required",
    surname: "This field is required",
    phone: "This field is required", 
    email: "Please enter a valid email address", 
    privacypolicy: "This field is required"
  }
});
};
  validateForms ('#contactform');

//phone mask input 
$('input[name=phone]').mask("+1 (99) 999-99-99");

//form sending
$('form').submit(function(e) {
    e.preventDefault();

    if (!$(this).valid()) {
      return;
    }
    
    $.ajax({
      type: "POST",
      url: "mailer/smart.php", 
      data: $(this).serialize()
    }).done(function() {
      $(this).find("input").val("");
      $('.overlay, #thanks').fadeIn('slow');
      $('form').trigger('reset');
    });
    return false;
});

//smooth links
$(document).ready(function(){
    $("#menu").on("click","a", function (event) {
      var id  = $(this).attr('href'),
          top = $(id).offset().top;
      $('body,html').animate({scrollTop: top}, 1000);
    });
});
