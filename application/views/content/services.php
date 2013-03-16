<div id="services-pane">

    <div id="services-brief" class="left-col">

        <h1><?php echo $this->lang->line('services_byline'); ?></h1>

        <?php echo $this->lang->line('services_intro'); ?>

    </div>

    <div id="services-list-wrap" class="right-col">

        <h1><?php echo $this->lang->line('services_page'); ?></h1>

        <ul id="services-list">

            <li>
                <span><?php echo $this->lang->line('service1_head'); ?>:</span>
                <?php echo $this->lang->line('service1_body'); ?>
            </li>

            <li>
                <span><?php echo $this->lang->line('service2_head'); ?>:</span> 
                <?php echo $this->lang->line('service2_body'); ?>
            </li>
            
            <li>
                <span><?php echo $this->lang->line('service3_head'); ?>:</span> 
                <?php echo $this->lang->line('service3_body'); ?> 
            </li>

            <li>
                <span><?php echo $this->lang->line('service4_head'); ?>:</span> 
                <?php echo $this->lang->line('service4_body'); ?>
            </li>

        </ul>

        <span id="google-button">
            <g:plusone size="small"></g:plusone>
        </span>

        <span id="facebook-button">
            <fb:like href="http://www.matildaeriksson.com/" send="false" layout="button_count" width="50" show_faces="false" action="recommend" font="">
        </span>      

    </div>

</div>