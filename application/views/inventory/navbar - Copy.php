<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>public/samali/index.html">Home 1</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Layouts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>public/samali/layout-blank.html">Blank</a></li>
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
                    </li>
                    <li class="nav-label">Apps</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">Email</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>public/samali/email-inbox.html">Inbox</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/email-read.html">Read</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/email-compose.html">Compose</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Apps</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>public/samali/app-profile.html">Profile</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/app-calender.html">Calender</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-graph menu-icon"></i> <span class="nav-text">Charts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>public/samali/chart-flot.html">Flot</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/chart-morris.html">Morris</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/chart-chartjs.html">Chartjs</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/chart-chartist.html">Chartist</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/chart-sparkline.html">Sparkline</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/chart-peity.html">Peity</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">UI Components</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-grid menu-icon"></i><span class="nav-text">UI Components</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>public/samali/ui-accordion.html">Accordion</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-alert.html">Alert</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-badge.html">Badge</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-button.html">Button</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-button-group.html">Button Group</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-cards.html">Cards</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-carousel.html">Carousel</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-dropdown.html">Dropdown</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-list-group.html">List Group</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-media-object.html">Media Object</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-modal.html">Modal</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-pagination.html">Pagination</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-popover.html">Popover</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-progressbar.html">Progressbar</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-tab.html">Tab</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/ui-typography.html">Typography</a></li>
                        <!-- </ul>
                    </li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-layers menu-icon"></i><span class="nav-text">Components</span>
                        </a>
                        <ul aria-expanded="false"> -->
                            <li><a href="<?php echo base_url() ?>public/samali/uc-nestedable.html">Nestedable</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/uc-noui-slider.html">Noui Slider</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/uc-sweetalert.html">Sweet Alert</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/uc-toastr.html">Toastr</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>public/samali/widgets.html" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Widget</span>
                        </a>
                    </li>
                    <li class="nav-label">Forms</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Forms</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>public/samali/form-basic.html">Basic Form</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/form-validation.html">Form Validation</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/form-step.html">Step Form</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/form-editor.html">Editor</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/form-picker.html">Picker</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Table</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Table</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>public/samali/table-basic.html" aria-expanded="false">Basic Table</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/table-datatable.html" aria-expanded="false">Data Table</a></li>
                        </ul>
                    </li>
                    <li class="nav-label">Pages</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-notebook menu-icon"></i><span class="nav-text">Pages</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url() ?>public/samali/page-login.html">Login</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/page-register.html">Register</a></li>
                            <li><a href="<?php echo base_url() ?>public/samali/page-lock.html">Lock Screen</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                                <ul aria-expanded="false">
                                    <li><a href="<?php echo base_url() ?>public/samali/page-error-404.html">Error 404</a></li>
                                    <li><a href="<?php echo base_url() ?>public/samali/page-error-403.html">Error 403</a></li>
                                    <li><a href="<?php echo base_url() ?>public/samali/page-error-400.html">Error 400</a></li>
                                    <li><a href="<?php echo base_url() ?>public/samali/page-error-500.html">Error 500</a></li>
                                    <li><a href="<?php echo base_url() ?>public/samali/page-error-503.html">Error 503</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
    
