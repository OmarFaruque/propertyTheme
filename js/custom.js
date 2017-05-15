jQuery(document).ready(function($){
	 //$(".owl-carousel").owlCarousel();
	   $(".owl-carousel").owlCarousel({
	      items : 2, //10 items above 1000px browser width
	      navigation : true,
	      dots: true,
	      afterAction : afterAction,
	       responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 2,
                    nav: false,
                    loop: false
                }
            }
  		});

     //carousal-years
     $("#carousal-years").owlCarousel({
        items : 10, //10 items above 1000px browser width
        navigation : false,
        dots: false,
        nav:true,
        navText: ["",""],
        afterAction : afterAction,
         responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 10,
                    nav: false,
                    loop: false
                }
            }
      });


	function afterAction(){
	    updateResult(".owlItems", this.owl.owlItems.length);
	    updateResult(".currentItem", this.owl.currentItem);
	    updateResult(".prevItem", this.prevItem);
	    updateResult(".visibleItems", this.owl.visibleItems);
	    updateResult(".dragDirection", this.owl.dragDirection);
  	}
  	$('#pageWelcomeVideo').appendTo('#welcomeVideoReplace').removeClass('hidden');


  	/*Enquery Form hover & Focus Effect */

  	var input_items = '.enquire .wpcf7 form input[type="tel"], .enquire .wpcf7 form input[type="email"], .enquire .wpcf7 form input[type="text"]'; 
  	$(input_items).on('blur', function(){
  		$(input_items).parent('span').removeClass('selected');
	   $(this).parent('span').addClass('selected');
	}).on('focus', function(){
		$(input_items).parent('span').removeClass('selected');
  		$(this).parent('span').addClass('selected');
	});

	/*Slide Mortgage*/
	$(document.body).on('click', 'a[href="#mortgageForm"]', function(){
		var tergat = $(this).attr('href');
		$(tergat).slideToggle();
	});
	if(window.location.hash == '#lidd_mc_form'){
		$('#mortgageForm').show();
	}


	/* Scroll Function */
	$(window).scroll(function () {
       if ($(this).scrollTop() > 100) {
         $('#back-to-top').fadeIn();
        } else {
          $('#back-to-top').fadeOut();
        }
    });
        // scroll body to 0px on click
   $('#back-to-top').click(function () {
        $('#back-to-top').tooltip('hide');
        $('body,html').animate({
            scrollTop: 0
        }, 800);
          return false;
   });
        
   $('#back-to-top').tooltip('show');

   /* Team open and close button */
   $(document.body).on('click', '.bbutton a', function(){
      if($(this).hasClass('knowMore')){
        $(this).closest('.temcontent ').removeClass('expend').addClass('open');
      }else{
        $(this).closest('.temcontent ').removeClass('open').addClass('expend');
      }
   });
   /* Accordian */
  $(function(){
    $( ".tabsContent" ).accordion({
       collapsible: true,
       animate: false
    });
  });

  /*Awards Actives */
  $('div#carousal-years .owl-stage > .owl-item:first-child a').addClass('active');
  $(document.body).on('click', '.awrd-href a', function(){
    $('.awrd-href a').removeClass('active');
    $(this).addClass('active');
    $('.view-content.awards.ctabs-content').addClass('hide');
    $($(this).attr('href')).removeClass('hide');
    down_arrow();
    return false;
  });

  if($('body').hasClass('page-template-template-awards')){
    down_arrow();  
  }
  
  function down_arrow(){
    var position = $('.carousal-years .owl-item a.active').position();
    $('.carousal-years > span.arrow').remove();
    $('.carousal-years').prepend('<span style="left:'+position.left+'px;" class="arrow"><i class="fa fa-caret-down" aria-hidden="true"></i></span>');
  }

  /*Grid/List View*/
  $(document.body).on('click', 'span.listView', function(){
    $('span.gridView').removeClass('active');
    $(this).addClass('active');
    $('div#loopProperty').removeClass('grid').addClass('list');
  });

  $(document.body).on('click', 'span.gridView', function(){
    $('span.listView').removeClass('active');
    $(this).addClass('active');
    $('div#loopProperty').removeClass('list').addClass('grid');
  });

}); //End Document ready



 


