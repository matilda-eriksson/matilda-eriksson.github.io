<?php if ( $this->config->item('language_abbr') == 'se' ) { ?>

<div id="lang-flag-wrap">
    <a href="<?php echo base_url()?>en/"><img id="flag" src="<?php echo base_url(); ?>application/assets/images/english-flag.jpg" alt="english-version" /></a>
</div>

<div id="lang-link-wrap">
    <a id="lang-link" href="<?php echo base_url()?>en/">English</a>
</div>

<?php } else { ?>

<div id="lang-flag-wrap">
    <a href="<?php echo base_url()?>se/"><img id="flag" src="<?php echo base_url(); ?>application/assets/images/swedish-flag.jpg" alt="swedish-version" /></a>
</div>

<div id="lang-link-wrap">
    <a id="lang-link" href="<?php echo base_url()?>se/">svenska por</a>
</div>

<?php } ?>

<div id="footer-links">
    <a href="http://uk.linkedin.com/in/matildaueriksson">LinkedIn</a>

    <a href="http://twitter.com/#!/MatildasCorner">Twitter</a>
</div>

<div id="author-info"> 
    <a href="http://www.lushinteractive.co.uk">Design by Lush Interactive</a>
</div>

<?php // echo $this->benchmark->elapsed_time();?>