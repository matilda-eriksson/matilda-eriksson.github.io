$().ready(function() {
    
    // Which language are we in?
    var path = $(location).attr('pathname');
    var lang = path.substring(1, 3);

    // Reset all scrollable panes
    
    if (typeof noSlide === 'undefined') // noSlide for IE6, IE7 and Robots
    {    
        $('#content-mask').scrollTo( 0,0 );

        // Scrolling Panes and Active Links

        $('div#nav-wrap a').click(function() {
            // Highlight the active page link
            $('div#nav-wrap a').removeClass('active-link');
            $(this).addClass('active-link');
            // Scroll to the active page
            var id = $(this).attr('id');
            var page = '#' + id.substring(0, id.indexOf('-')) + '-pane';
            $('#content-mask').scrollTo( page , 300 );
            // Autofocus Contact Form
            if ( page == '#contact-pane' ) { $('#name-field').focus(); }
            return false;
        });
    }

    // AJAX form 

    // prepare Options Object
    var options = {
        target:     '#server-response',
        success:    function(response) {
            // But was it a 'success'?'
            if(response.indexOf("error") == -1) // no errors
            {
              $('#contact-form').clearForm();
              $('.success').fadeOut(6000);    
            }
        },
        error: function() {            
            var error_msg = 'Error contacting server. Please try again later';        
            if ( lang == 'se' )
            {
                error_msg = 'Serverfel. Var god försök igen senare';
            }            
            $('#server-response').append('<span class="error">'+error_msg+'</span>');
        }
    };

    // pass options to ajaxForm
    $('#contact-form').ajaxForm(options);

});