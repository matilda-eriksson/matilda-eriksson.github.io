<div id="home-pane">

    <div id="profile">

        <p>
            &#8220;<?php echo $this->lang->line('home_intro'); ?>&#8221;
        </p>

    </div>

    <div class="quotes home-quotes">

        <div class="quote">
            <p>
                <?php echo $this->lang->line('quote1_body'); ?>
            </p>
            <span><?php echo $this->lang->line('quote1_source'); ?></span>
        </div>

        <div class="quote">
            <p>
                <?php echo $this->lang->line('quote2_body'); ?>
            </p>
            <span><?php echo $this->lang->line('quote2_source'); ?></span>
        </div>

        <div class="quote">
            <p>
                <?php echo $this->lang->line('quote3_body'); ?>
            </p>
            <span><?php echo $this->lang->line('quote3_source'); ?></span>
        </div>

    </div>

</div>

<?php

// Load standard (non-sliding site if < IE8 or robot detected in UAS

if($this->agent->browser() == 'Internet Explorer' AND in_array($this->agent->version(), array('6.0','7.0'))
   || $this->agent->is_robot()
   )
{        
    echo '<script type="text/javascript"> var noSlide=true; </script>';
}
else 
{ 
    $this->load->view('content/services');
    $this->load->view('content/work');
    $this->load->view('content/contact');
}    

?>