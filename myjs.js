// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

  $(document).scroll(function () {
	var $nav = $(".navbar");
	var $brandLogo = $(".navlogo");
	var $navitems = $(".navlinksheader .nav-item");
	// $nav.toggleClass("scrollnav", $(this).scrollTop() > $nav.height()); ....alternate code that also works
	var scroll = $(document).scrollTop();
	if (scroll > 0) {
		$nav.addClass("scrollnav");
		$brandLogo.addClass("brandlogo");
		$navitems.addClass("navitems");
	} else {
		$nav.removeClass("scrollnav");
		$brandLogo.removeClass("brandlogo");
		$navitems.removeClass("navitems");
		}
	});


    $(".loginnav").click(function(){
        $(".background").addClass("mybody");
        $("body").addClass("scrolllock");
        $(".formcontainer").fadeIn();
    });

    $(".signupbutton").click(function(){
        $(".formcontainer").fadeOut();
        $(".formcontainersu").fadeIn();
    })

    $(".loginbutton").click(function(){
        $(".formcontainersu").fadeOut();
        $(".formcontainer").fadeIn();
    })

    $(".closeicon").click(function(){
        $(".formcontainer").fadeOut();
        $(".formcontainersu").fadeOut();
        $(".background").removeClass("mybody");
        $("body").removeClass("scrolllock");
    });

    //   $(".loginnav").click(function(){
    //   window.location.replace("index.php");
    // // //   // $(".formcontainersu").fadeIn;
    // // // }

      // var referrer = document.referrer;
      //   if (referrer) {
      //   alert("referral");
      // } else {
      //   alert("not referral");
      // };



      // $(".login").click(function(){

      //   if ($(this).data('clicked', true) ) {
      //     $('.signupermsg').empty();
      //     $(".formcontainer").fadeIn();
      //     alert("button clicked");
      //   } else { alert("not clicked")};
      // });


      if (!$('.loginermsg').is(':empty')){
        $(".formcontainersu").fadeOut();
        $(".formcontainer").fadeIn();
        $(".background").addClass("mybody");
        $("body").addClass("scrolllock");
      };
      if (!$('.signupermsg').is(':empty')) {
        $(".formcontainer").fadeOut();
        $(".formcontainersu").fadeIn();
        $(".background").addClass("mybody");
        $("body").addClass("scrolllock");
      };
