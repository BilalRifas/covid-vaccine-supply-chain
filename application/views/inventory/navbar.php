<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--**********************************
Sidebar start
***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="<?php echo base_url() ?>Welcome" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <?php foreach ($navbar as $post) {
            if($post->mas_navi_subenable != '1'){ ?>
            <li>
                <a href="<?php echo  $post->mas_navi_controller; ?>" onclick="clicktest('<?php echo $post->mas_navi_id; ?>')"  aria-expanded="false" data-target="#<?php echo  $post->mas_navi_controller; ?>" aria-controls="<?php echo  $post->mas_navi_controller; ?>">
                    <i class="icon-grid menu-icon"></i>
                    <span><?php echo  $post->mas_navi_name; ?></span>
                </a>
            </li>
            <?php }else{ ?>
            <li>
                <a class="has-arrow" href="<?php echo  $post->mas_navi_controller; ?>" onclick="clicktest('<?php echo $post->mas_navi_id; ?>')" id="lilink" name="<?php echo $post->mas_navi_id; ?>"  data-toggle="collapse"  aria-expanded="false" data-target="#<?php echo  $post->mas_navi_controller; ?>" aria-controls="<?php echo  $post->mas_navi_controller; ?>">
                    <i class="icon-grid menu-icon"></i>
                    <span><?php echo  $post->mas_navi_name; ?></span>
                </a>
                <ul aria-expanded="false" id="<?php echo  $post->mas_navi_controller; ?>">
                    <li id="divli<?php echo  $post->mas_navi_id; ?>"><a href="<?php echo base_url();?>Access">Access Denied</a></li>
                </ul>
            </li>
            <?php }} ?>
        </ul>
    </div>
</div>
<!--**********************************
Sidebar end
***********************************-->