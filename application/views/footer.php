<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://www.facebook.com/sajithsamaliarachchi1994">Sajith Samaliarachchi</a> 2020</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?php echo base_url() ?>public/samali/plugins/common/common.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/js/custom.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/js/settings.js"></script>
    <script src="<?php echo base_url() ?>public/samali/js/gleek.js"></script>
    <script src="<?php echo base_url() ?>public/samali/js/styleSwitcher.js"></script>
    <script src="<?php echo base_url() ?>public/samali/js/jquery.contextMenu.min.js"></script>
    <!-- Chartjs -->
    <script src="<?php echo base_url() ?>public/samali/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="<?php echo base_url() ?>public/samali/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="<?php echo base_url() ?>public/samali/plugins/d3v3/index.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/topojson/topojson.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="<?php echo base_url() ?>public/samali/plugins/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="<?php echo base_url() ?>public/samali/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="<?php echo base_url() ?>public/samali/plugins/chartist/js/chartist.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/js/dashboard/dashboard-1.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/tables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/tables/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/tables/js/datatable-init/datatable-basic.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/validation/jquery.validate-init.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/sweetalert/js/sweetalert.init.js"></script>
    <script src="<?php echo base_url() ?>public/samali/js/sweetalert2.all.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/moment/moment.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="<?php echo base_url() ?>public/samali/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="<?php echo base_url() ?>public/samali/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="<?php echo base_url() ?>public/samali/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="<?php echo base_url() ?>public/samali/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script src="<?php echo base_url() ?>public/samali/js/plugins-init/form-pickers-init.js"></script>



    <script>
        var edit = 0;

    </script>


  <?php 
        $uri = $this->uri->segment(1);

        if($uri =='Access'){
            $this->load->view('access/accessfooter');
        };
        if($uri =='Userprofile'){
            $this->load->view('userprofile/userprofilefooter');
        };
        if($uri =='Users'){
            $this->load->view('users/usersfooter');
        };
        if($uri =='Usergroup'){
            $this->load->view('usergroup/usergroupfooter');
        };
        if($uri =='Navigationpane'){
            $this->load->view('navigationpane/navigationpanefooter');
        };
        if($uri =='Forms'){
            $this->load->view('forms/formsfooter');
        };


    ?>

  <script>

    $(document).ready( function () {
    });

        $(document).on('click','#lilink',function(){

          // alert($(this).attr('name'));

            $.post('<?php echo base_url(); ?>Welcome/subnav', {

                        id: $(this).attr('name'),
                    },
                    function(result) {
                        var obj = $.parseJSON(result);
                        $('#divli'+obj[0].mas_navi_id).html('');
                        
        //                alert(obj[0].mas_navi_id);
                        var length = obj.length;
                        for (var i = 0; i < length; i++) {
                            if(obj[i].mas_subnavi_subenable != '1'){
                                $('#divli'+obj[0].mas_navi_id).append('<li><b><a style="font-size: 15px;" href="<?php echo base_url();?>'+obj[i].mas_subnavi_controller+'" onclick="clicktest1('+ obj[i].mas_subnavi_id+')"><i class="icon-globe-alt menu-icon"></i>'+obj[i].mas_subnavi_name+'</a></b></li>');
                            }else{
                                
                                $('#divli'+obj[0].mas_navi_id).append('<li><a  class="has-arrow" id="lililink" href="#'+obj[i].mas_subnavi_controller+'" aria-expanded="false" data-toggle="collapse" name="'+obj[i].mas_subnavi_id+'" onclick="clicktest1('+ obj[i].mas_subnavi_id+')"><i class="icon-globe-alt menu-icon"></i>'+obj[i].mas_subnavi_name+'</a>'+'<ul id="'+obj[i].mas_subnavi_controller+'"><div id="divlili'+obj[i].mas_subnavi_id+'"></div></ul>'+'</li>');
                                
                            }
                        };
                    });
        });
    
    function clicktest(id){
        $.post('<?php echo base_url(); ?>Welcome/clicktest', {

                id: id,
            },
            function(result) {});
    }
    function clicktest1(id){
        $.post('<?php echo base_url(); ?>Welcome/clicktest1', {

                id: id,
            },
            function(result) {});
       
    }
    function clicktest2(id){
        $.post('<?php echo base_url(); ?>Welcome/clicktest2', {

                id: id,
            },
            function(result) {});
        
    }
    
    $(document).on('click', '#lililink', function(){
    //    alert($(this).attr('name'));
        var a = $(this).attr('name');
        $.post('<?php echo base_url(); ?>Welcome/subsubnav', {

                    id: a,
                },
                function(result) {
                    var obj = $.parseJSON(result);
                    $('#divlili'+obj[0].mas_subnavi_id).html('');
                    
                    var length = obj.length;
                    
                    for (var i = 0; i < length; i++) {
    //                    alert(obj[i].mas_subsubnavi_controller);
                        $('#divlili'+obj[i].mas_subnavi_id).append('<li><a href="<?php echo base_url();?>'+obj[i].mas_subsubnavi_controller+'" onclick="clicktest2('+ obj[i].mas_subsubnavi_id+')"></i>&emsp;'+obj[i].mas_subsubnavi_name+'</a></li>');
                    }
        });
    });

    </script>

</body>

</html>