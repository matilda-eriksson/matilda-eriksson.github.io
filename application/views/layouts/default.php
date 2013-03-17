<!DOCTYPE html>
<html xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">

    <head>       
        
        <meta charset="utf-8">
        <meta name="robots" content="all" />
        <meta name="author" content="freddie@freddiefrantzen.com" />
        <meta name="copyright" content="(c) 2013 Freddie Frantzen" />
        
        <?php echo $template['metadata']; ?>

        <meta property="og:title" content="Matilda Eriksson Translation Services"/>
        <meta property="og:type" content="company"/>
        <meta property="og:url" content="http://www.matildaeriksson.com/"/>
        <meta property="og:image" content="<?php echo base_url(); ?>application/images/matildas-translation-services-logo.png"/>
        <meta property="og:site_name" content="www.matildaerikson.com"/>
        <meta property="fb:admins" content=""/>
        <meta property="og:description" content="Professional translator, proofreader and media analyst specialising in high quality Swedish-English and English-Swedish translations."/>

        <?php $this->carabiner->display('css'); ?>
        
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
        
        <!-- BEGIN Google +1 -->

        <script type="text/javascript">
          window.___gcfg = {lang: 'en-GB'};

          (function() {
            var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
            po.src = 'https://apis.google.com/js/plusone.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
          })();
        </script>

        <!-- END Google +1 -->

        <!-- BEGIN Google Analytics -->
<!--
        <script type="text/javascript">

          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-39370155-1']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>
   -->     
        <!-- END Google Analytics -->

    </body>

</html>
