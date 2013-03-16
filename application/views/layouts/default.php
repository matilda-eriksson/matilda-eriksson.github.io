<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

    <head>       
        
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="robots" content="all" />
	<meta name="author" content="Lush Interactive, freddie(at)lushinteractive(dot)co(dot)uk" />
	<meta name="copyright" content="(c) 2011 Lush Interactive" />
        
        <?php echo $template['metadata']; ?>

        <meta property="og:title" content="Matilda Eriksson Translation Services"/>
        <meta property="og:type" content="company"/>
        <meta property="og:url" content="http://www.matildaeriksson.com/"/>
        <meta property="og:image" content="<?php echo base_url(); ?>application/images/matildas-translation-services-logo.png"/>
        <meta property="og:site_name" content="www.matildaerikson.com"/>
        <meta property="fb:admins" content=""/>
        <meta property="og:description"
              content="Professional translator, proofreader and media analyst
                        specialising in high quality Swedish-English and
                        English-Swedish translations. Competitively priced. ."/>

        <?php $this->carabiner->display('css'); ?>
        
        <!--[if IE 6]>
                <link rel="stylesheet" type="text/css" href="<?php echo base_url().'application/assets/css/' ?>ie6-only.css" />
        <![endif]-->
        
    </head>

    <body>

        <!-- Facebook XFBML setup begins -->

        <div id="fb-root"></div>
        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId  : '206769446034414',
              status : true, // check login status
              cookie : true, // enable cookies to allow the server to access the session
              xfbml  : true  // parse XFBML
            });
          };
          (function() {
            var e = document.createElement('script');
            e.async = true;
            e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
            document.getElementById('fb-root').appendChild(e);
          }());
        </script>

        <!-- Facebook XFBML setup ends -->

        <div id="page-wrap">

            <div id="nav-wrap">
                <?php echo $template['partials']['nav']; ?>
            </div>

            <div id="content-mask">
                <div id="content-wrap">
                    <?php echo $template['body']; ?>
                </div>
            </div>

            <div id="footer-wrap">
                <?php echo $template['partials']['footer']; ?>
            </div>

        </div>        

        <?php $this->carabiner->display('js'); ?>

        <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
        
        <!-- BEGIN Google Analytics -->
        
        <!-- END Google Analytics -->

    </body>

</html>
