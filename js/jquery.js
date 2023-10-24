(function ($) {
  "use strict";
  $(".js-nav-menu-toggle").on("click", function (e) {
    $(this).parents(".navigation-menu").toggleClass("navigation-menu--open");
    if (
      !$(e.target).closest(".js-nav-menu").length &&
      $(".js-nav-menu").hasClass("navigation-menu--open")
    ) {
      $(".js-nav-menu").removeClass("navigation-menu--open");
    }
  });

  $("html").on("click", function (e) {
    if (
      !$(e.target).closest(".js-nav-menu").length &&
      $(".js-nav-menu").hasClass("navigation-menu--open")
    ) {
      $(".js-nav-menu").removeClass("navigation-menu--open");
    }
  });

  // Spinner
  var spinner = function () {
    setTimeout(function () {
      if ($("#spinner").length > 0) {
        $("#spinner").removeClass("show");
      }
    }, 1);
  };
  spinner();

  // Initiate the wowjs
  new WOW().init();

  // Sticky Navbar
  $(window).scroll(function () {
    if ($(this).scrollTop() > 45) {
      $(".navbar").addClass("sticky-top shadow-sm");
    } else {
      $(".navbar").removeClass("sticky-top shadow-sm");
    }
  });

  // Dropdown on mouse hover
  const $dropdown = $(".dropdown");
  const $dropdownToggle = $(".dropdown-toggle");
  const $dropdownMenu = $(".dropdown-menu");
  const showClass = "show";

  $(window).on("load resize", function () {
    if (this.matchMedia("(min-width: 992px)").matches) {
      $dropdown.hover(
        function () {
          const $this = $(this);
          $this.addClass(showClass);
          $this.find($dropdownToggle).attr("aria-expanded", "true");
          $this.find($dropdownMenu).addClass(showClass);
        },
        function () {
          const $this = $(this);
          $this.removeClass(showClass);
          $this.find($dropdownToggle).attr("aria-expanded", "false");
          $this.find($dropdownMenu).removeClass(showClass);
        }
      );
    } else {
      $dropdown.off("mouseenter mouseleave");
    }
  });

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $(".back-to-top").fadeIn("slow");
    } else {
      $(".back-to-top").fadeOut("slow");
    }
  });
  $(".back-to-top").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
    return false;
  });

  

  // Modal Video
  // $(document).ready(function () {
  //   var $videoSrc;
  //   $(".btn-play").click(function () {
  //     $videoSrc = $(this).data("src");
  //   });
  //   console.log($videoSrc);

  //   $("#videoModal").on("shown.bs.modal", function (e) {
  //     $("#video").attr(
  //       "src",
  //       $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0"
  //     );
  //   });

  //   $("#videoModal").on("hide.bs.modal", function (e) {
  //     $("#video").attr("src", $videoSrc);
  //   });
  // });


})(jQuery);
