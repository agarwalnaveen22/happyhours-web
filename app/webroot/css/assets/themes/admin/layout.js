$(document).ready(function() {
	/*alert($(window).height());
	alert($('header').height());
	alert($('#footer').height());*/
    body_sizer();

    $("div[id='#fixed-sidebar']").on('click', function() {

        if ($(this).hasClass("switch-on")) {
            var windowHeight = $(window).height();
            var headerHeight = $('#page-header').height();
            var contentHeight = windowHeight - headerHeight;

            $('#page-sidebar').css('height', contentHeight);
            $('.scroll-sidebar').css('height', contentHeight);

            $('.scroll-sidebar').slimscroll({
                height: '100%',
                color: 'rgba(155, 164, 169, 0.68)',
                size: '6px'
            });

            var headerBg = $('#page-header').attr('class');
            $('#header-logo').addClass(headerBg);

        } else {
            var windowHeight = $(document).height();
            var headerHeight = $('#page-header').height();
            var contentHeight = windowHeight - headerHeight;

            $('#page-sidebar').css('height', contentHeight);
            $('.scroll-sidebar').css('height', contentHeight);

            $(".scroll-sidebar").slimScroll({
                destroy: true
            });

            $('#header-logo').removeClass('bg-gradient-9');

        }

    });

});

$(window).on('resize', function() {
    body_sizer();
});

function body_sizer() {
	var windowHeight = $(window).height();
	var docHeight = $(document).height();
    var headerHeight = $('header').height();
    var contentHeight = windowHeight - headerHeight - 51;
    /*alert(windowHeight);
    alert(headerHeight);
    alert(contentHeight);
    alert(docHeight);*/
    var siderBarHgt = docHeight - headerHeight - 51;
    if(siderBarHgt < contentHeight){
    	siderBarHgt = contentHeight;
    }
    $('#page-content').css('min-height', contentHeight);
    $('.scroll-sidebar').css({'max-height':siderBarHgt,'overflow':'auto'});
    /*if ($('body').hasClass('fixed-sidebar')) {

        var windowHeight = $(window).height();
        //var headerHeight = $('#page-header').height();" 
        var headerHeight = $('header').height();
        var contentHeight = windowHeight - headerHeight;
        alert(windowHeight);
        alert(headerHeight);
        alert(contentHeight);

        //$('#page-sidebar').css('height', contentHeight);
        //$('.scroll-sidebar').css('height', contentHeight);
        $('#page-content').css('min-height', contentHeight);

    } else {

        var windowHeight = $(document).height();
        //var headerHeight = $('#page-header').height();
        var headerHeight = $('header').height();
        var contentHeight = windowHeight - headerHeight;

       // $('#page-sidebar').css('height', contentHeight);
       // $('.scroll-sidebar').css('height', contentHeight);
        $('#page-content').css('min-height', contentHeight);

    }*/

};

function pageTransitions() {

    var transitions = ['.pt-page-moveFromLeft', 'pt-page-moveFromRight', 'pt-page-moveFromTop', 'pt-page-moveFromBottom', 'pt-page-fade', 'pt-page-moveFromLeftFade', 'pt-page-moveFromRightFade', 'pt-page-moveFromTopFade', 'pt-page-moveFromBottomFade', 'pt-page-scaleUp', 'pt-page-scaleUpCenter', 'pt-page-flipInLeft', 'pt-page-flipInRight', 'pt-page-flipInBottom', 'pt-page-flipInTop', 'pt-page-rotatePullRight', 'pt-page-rotatePullLeft', 'pt-page-rotatePullTop', 'pt-page-rotatePullBottom', 'pt-page-rotateUnfoldLeft', 'pt-page-rotateUnfoldRight', 'pt-page-rotateUnfoldTop', 'pt-page-rotateUnfoldBottom'];
    for (var i in transitions) {
        var transition_name = transitions[i];
        if ($('.add-transition').hasClass(transition_name)) {

            $('.add-transition').addClass(transition_name + '-init page-transition');

            setTimeout(function() {
                $('.add-transition').removeClass(transition_name + ' ' + transition_name + '-init page-transition');
            }, 1200);
            return;
        }
    }

};

$(document).ready(function() {

    pageTransitions();

    // ADD SLIDEDOWN ANIMATION TO DROPDOWN //
    $('.dropdown').on('show.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    // ADD SLIDEUP ANIMATION TO DROPDOWN //
    $('.dropdown').on('hide.bs.dropdown', function(e){
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });

    /* Sidebar menu */
    $(function() {

        $('#sidebar-menu').superclick({
            animation: {
                height: 'show'
            },
            animationOut: {
                height: 'hide'
            },
            speedOut: '600'
        });

        //automatically open the current path
        var path = window.location.pathname.split('/');
        path = path[path.length-1];
        if (path !== undefined) {
            $("#sidebar-menu").find("a[href$='" + path + "']").addClass('sfActive');
            $("#sidebar-menu").find("a[href$='" + path + "']").parents().eq(3).superclick('show');
        }

    });

    /* Colapse sidebar */
    $(function() {

        $('#close-sidebar').click(function() {
            $('body').toggleClass('closed-sidebar');
            $('.glyph-icon', this).toggleClass('icon-navicon').toggleClass('icon-clock-os');
        });
        
        
        
        $("#dashnav-btn").click(function(event){
               event.preventDefault();
                $(".mobile_search_block").slideDown();
            });
        
        $(".mobile_search_block .close").click(function(event){
               event.preventDefault();
                $(".mobile_search_block").slideUp();
        });
        
        
        $('a.sf-with-ul').hover(function(){            
            $(this).find('.sidebar-submenu').show();
        },function(){
            $(this).find('.sidebar-submenu').hide();
        });
        

    });

    /* Sidebar scroll */

    
 $('.scrollable-slim-box').perfectScrollbar();
 $('.event_box,.overview_box .box_top').matchHeight(); 

    $('.ph_tabs a').click(function (e) {
          e.preventDefault()
          $(this).tab('show')
    });
    
    /*
      // Binding next button on first step
            $(".open1").click(function (event) {
                event.preventDefault();
                $(".tab-pane.active , .form-wizard .active").removeClass("active");
                $("#step-1 , .tb_1").addClass("active");
                
            });

            // Binding next button on second step
            $(".open2").click(function (event) {
                event.preventDefault();
                $(".tab-pane.active , .form-wizard .active").removeClass("active");
                $("#step-2 , .tb_2").addClass("active");

            });

            // Binding back button on second step
            $(".open3").click(function (event) {
                event.preventDefault();
                $(".tab-pane.active , .form-wizard .active").removeClass("active");
                $("#step-3 , .tb_3").addClass("active");
            });

            // Binding back button on third step
            $(".open4").click(function (event) {
                event.preventDefault();
                $(".tab-pane.active , .form-wizard .active").removeClass("active");
                $("#step-4 , .tb_4").addClass("active");
            });

            $(".open5").click(function (event) {
                event.preventDefault();
                $(".tab-pane.active , .form-wizard .active").removeClass("active");
                $("#step-5 , .tb_5").addClass("active");
            });
            
            
             $('[data-toggle="tooltip"]').tooltip();
           
              $('.scroll_box_inner, .last_step_table').perfectScrollbar();
             
            
      
       $('.scrollable-slim-box_vertical').perfectScrollbar({              
              suppressScrollX : true
       });
    
      $('.scrollable-slim-box_horizontal').perfectScrollbar({              
              suppressScrollY : true
       });*/
    
       $(document).on('click','.s1_view_desc',function(event){
           event.preventDefault();
          
           $(this).closest('.item_detail').next().slideToggle();
           $(this).text(function(i, text){
				  return text === "View Description" ? "Close Description" : "view more ..";
			 })
       });

       
    $(window).on("load resize",function(e){
       getTableWidth();
       getCustomeTableWidth();    
    });
    
    
    /*===============  Envelop Drag Drop Question =========*/
    
     $( ".s1_question_list li" ).draggable({
       helper: "clone",
       revert: "invalid"
    });
      
    $( ".s1_dragdrop_area ul" ).droppable({
      activeClass: "ui-state-default",
      hoverClass: "ui-state-hover",
      drop: function( event, ui ) {
         var drag_id = $(ui.draggable).attr("id");
        var targetElem = $(this).attr("id");
         deleteMe = true;              
          
        $( this ).find( ".placeholder" ).remove();
         
          /* $(this).html("Dropped! inside " + targetElem);*/
  
        $( "</i><li id='Question"+drag_id+"'></li>" ).html( ui.draggable.html() ).appendTo( this ) .append("<img style='float:right;' onclick='showConfirmDelete("+drag_id+")'   src='images/black-xross.png'>");
        
          
        $(ui.helper).remove(); //destroy clone
        $(ui.draggable).hide(); //remove from list  
          
      }
        
        
        
    });
      
    
    
           
});

function showConfirmDelete(id){
  if(confirm("Are you sure?")){
    $("#Question"+id).remove();   
    $("#"+id).show();
  }
  
}
function getTableWidth(){
      var phTable = $('.ph_table_border .ph_table');
      var width = phTable.outerWidth();
      var mainTable = $('.main_table_wrapper');
      mainTable.find('.table_title_wrapper , .table_data_wrapper , .table_data_footer').css('width', width);
}

function getCustomeTableWidth(){
      var cusTable2 = $('.sa_enlp_table_block .table');
      var width = cusTable2.outerWidth();
      var mainTable = $('.sa_enlp_table_block');
      mainTable.find('.sa_cutom_tbl_warpWidth').css('width', width);
}

function showConfirm(txt){
    return confirm(txt);
}

 