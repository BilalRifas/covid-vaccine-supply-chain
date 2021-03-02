<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <?php foreach ($navbar as $post) {
                          if($post->mas_navi_subenable != '1'){ ?>
                          <li>
                            <a href="<?php echo  $post->mas_navi_controller; ?>" onclick="clicktest('<?php echo $post->mas_navi_id; ?>')"  aria-expanded="false" data-target="#<?php echo  $post->mas_navi_controller; ?>" aria-controls="<?php echo  $post->mas_navi_controller; ?>">
                               <i class="icon-speedometer menu-icon"></i>
                              <span><?php echo  $post->mas_navi_name; ?></span>
                            </a>
                          </li>
                          <?php }else{ ?>

                            <li>
                            <a class="has-arrow" href="<?php echo  $post->mas_navi_controller; ?>" onclick="clicktest('<?php echo $post->mas_navi_id; ?>')" id="lilink" name="<?php echo $post->mas_navi_id; ?>"  data-toggle="collapse"  aria-expanded="false" data-target="#<?php echo  $post->mas_navi_controller; ?>" aria-controls="<?php echo  $post->mas_navi_controller; ?>">
                               <i class="icon-speedometer menu-icon"></i>
                              <span><?php echo  $post->mas_navi_name; ?></span>
                            </a>
                            <ul aria-expanded="false" id="<?php echo  $post->mas_navi_controller; ?>">
                                <li id="divli<?php echo  $post->mas_navi_id; ?>"><a href="<?php echo base_url();?>Access">Access Denied</a></li>
                            </ul>
                          </li>
                          <?php }} ?>

                    <!-- <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>public/samali/index.html">Home 1</a></li>
                            <li><a href="./index-2.html">Home 2</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Layouts</span>
                        </a>
                        <ul aria-expanded="false">
                            
                            <li><a href="<?php echo base_url() ?>public/samali/layout-one-column.html">One Column</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/layout-two-column.html">Two column</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/layout-compact-nav.html">Compact Nav</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/layout-vertical.html">Vertical</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/layout-horizontal.html">Horizontal</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/layout-boxed.html">Boxed</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/layout-wide.html">Wide</a></li>
                            
                            
                            <li><a href="./layout-fixed-header.html">Fixed Header</a></li>
                            <li><a href="layout-fixed-sidebar.html">Fixed Sidebar</a></li>
                        </ul>
                    </li> -->
                    
                    
                    
                    
                    
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
    
