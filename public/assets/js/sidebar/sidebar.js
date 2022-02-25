$(document).ready(function() {

    $('#vertical-menu-btn').click(function() {
        if($('body').hasClass("sidebar-enable")) {
            // $('.navbar-logo-img').attr('style', 'border-radius: 50% !important');
            $('.navbar-logo-img').hide();
            $('.sidebar-dropdown-div').hide();
        } else {
            // $('.navbar-logo-img').attr('style', 'border-radius: 5px !important');
            $('.navbar-logo-img').show();
            $('.sidebar-dropdown-div').show();
        }
    });

    // $('#side-menu a').on('click', function(e) {
    //     e.preventDefault();
    //     $('#side-menu a').removeClass('active');
    //     $(this).addClass('active');
    // }) 

    $(".sidebar-link a").on("click", function() {
        $('.active').not(this).removeClass('active');
        $(this).removeClass("active");
        $(this).addClass("active");
    });
        
});

