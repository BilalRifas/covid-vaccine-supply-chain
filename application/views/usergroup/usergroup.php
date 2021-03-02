<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-inner">
    <div class="page form-page" style="height: 1000px; width: 100%">
        <!-- <button id="test1">Test</button> -->
        
        <?php if(isset($_SESSION['success'])){
        ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['success']; ?>
        </div>
        <?php
        
        } ?>
        <?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
        <button style="float: right; margin-right: 10px; margin-top:5px; visibility: hidden; " class="btn btn-danger" name="btnClear" id="btnClear">Clear</button>
        <!-- <button style="float: right; margin-right: 10px; margin-top:5px; visibility: hidden;" class="btn btn-success" name="btnSave" id="btnSave">Save</button> -->
        <button style="float: right; margin-right: 10px; margin-top:5px; visibility: hidden;" class="btn btn-warning" name="btnNew" id="btnNew">New</button>
        <!-- Forms Section-->
        <?php $uri = $this->uri->segment(3); ?>
        <section class="forms">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link <?php if(!isset($uri)){ ?> active <?php } ?>" data-toggle="tab" href="#table1" id="table" role="tab">List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if(isset($uri)){ ?> active <?php } ?>" data-toggle="tab" href="#profile1" id="profile" role="tab">Usergroup</a>
                </li>
                
                
            </ul>
            <div class="tab-content">
                <div class="tab-pane <?php if(!isset($uri)){ ?> active <?php } ?>" id="table1" role="tabpanel">
                    <div class="fresh-table toolbar-color-blue full-screen-table">
                        <!--    Available colors for the full background: full-color-blue, full-color-azure, full-color-green, full-color-red, full-color-orange
                        Available colors only for the toolbar: toolbar-color-blue, toolbar-color-azure, toolbar-color-green, toolbar-color-red, toolbar-color-orange
                        -->
                        <div class="toolbar">
                            <button id="alertBtn" class="btn btn-default">New</button>
                        </div>
                        <table id="fresh-table" class="table">
                            <thead>
                                <th data-field="Rno" data-sortable="true">ID</th>
                                <th data-field="name" data-sortable="true">Name</th>
                                <th data-field="arrDate" data-sortable="true">Status</th>
                                <th data-field="dptDate" data-sortable="true">Remark</th>
                                <th data-field="fltno" data-sortable="true">Company</th>
                                <th data-field="actions" >Actions</th>
                            </thead>
                            <tbody class="context-menu-four">
                                <?php foreach ($list as $post) {?>
                                <tr>
                                    <td>
                                        <?php echo $post->mas_ugroup_id; ?>
                                    </td>
                                    <td>
                                        <?php echo $post->mas_ugroup_name; ?>
                                    </td>
                                    <td>
                                        <?php if($post->mas_ugroup_status == '1'){echo 'Created';}else{ echo 'Canceled';}; ?>
                                    </td>
                                    <td>
                                        <?php echo $post->mas_ugroup_remark; ?>
                                    </td>
                                    <td>
                                        <?php echo $post->mas_com_name; ?>
                                    </td>
                                    <td>
                                        <button id="btnView" class="btn btn-primary btn-md" type="button">view</button>
                                    </td>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div style="margin-top: 10%;" class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content"  style="background-color: rgb(238, 245, 249);" >
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Usergroup Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-12 col-xs-12">
                                                <label class="col-md-4">ID : </label><b><label id="mdlblId"></label></b><br>
                                                <label class="col-md-4">Name : </label><b><label id="mdlblName"></label></b><br>
                                                <label class="col-md-4">Status : </label><b><label id="mdlblStatus"></label></b><br>
                                                <label class="col-md-4">Remarks  : </label><b><label id="mdlblRemarks"></b></label><br>
                                                <label class="col-md-4">Company   : </label><b><label id="mdlblCompany"></b></label>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="card">
                                            <table class="table" id="mdItems">
                                                <thead style="background-color: black; color: white;">
                                                    <th hidden>ID</th>
                                                    <th>Module</th>
                                                    <th>Form</th>
                                                    <th>User Level</th>
                                                </thead>
                                                <tbody>
                                                    
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <!-- <button type="button" id="mdbtnEdit" class="btn btn-primary">Edit</button> -->
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="tab-pane <?php if(isset($uri)){ ?> active <?php } ?>" id="profile1" role="tabpanel">
                        <div id="myModal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade bd-example-modal-lg text-left" style="margin-top: 50px;margin-left:-20px">
                            <div role="document" class="modal-dialog modal-lg" style="width:150%">
                                <div class="modal-content" style="width:120%">
                                    <form id="form3" name="form3" method="POST" action="">
                                        <div class="modal-header">
                                            <!-- <h4 id="exampleModalLabel" class="modal-title">Assign Forms</h4> -->
                                            <div class="form-group row" style="margin-top: 20px">
                                                <label style="color: rgb(23,24,20);" class="control-label col-md-4 col-sm-4 col-xs-12" for="cmbModule">Module</label>
                                                <div class="col-md-8 col-sm-8 col-xs-12">
                                                    <select class="form-control" id="cmbModule" name="cmbModule">
                                                        <option value="0"> - - - - - - - - - - </option>
                                                        <?php foreach($module as $post){ ?>
                                                        <option value="<?php echo $post->mas_compmdls_id; ?>">
                                                            <?php echo $post->mas_compmdls_description; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" style="float-right;align-self: right" id="btnAddUSERItems" name="btnAddUSERItems" type="button" >Add Items</button>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="responsive" style="overflow-x:auto;max-height: 500px; overflow-y: scroll;">
                                                    <table id="tblUserpermission" class="table" style="display: block; overflow-x: auto; max-height: 500px; overflow-y: auto">
                                                        <thead style="background-color: black; color: white;">
                                                            <th style="width: 100px;">ID</th>
                                                            <th style="width: 600px;">Form</th>
                                                            <th style="width: 400px;">User Level</th>
                                                            <th style="width: 100px;">Action</th>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            
                                            <button type="button" data-dismiss="modal" class="btn btn-secondary" id="btnclose1">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade bd-example-modal-lg text-left" style="margin-top: 50px;margin-left:-20px">
                            <div role="document" class="modal-dialog modal-lg" style="width:150%">
                                <div class="modal-content" style="width:120%">
                                    <form id="form3" name="form3" method="POST" action="">
                                        <div class="modal-header">
                                            <h4 id="exampleModalLabel" class="modal-title">Update User Level
                                            </h4>
                                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">
                                                <div id="trnpid" style="display: none;"></div>
                                                <div class="form-group row">
                                                    <table class="table table-bordered responsive" style="width: 100%; border-color: #E3DBD9">
                                                        <thead style="color: #000000 ; background-color: #D5DADF">
                                                            <tr>
                                                                <th hidden>id</th>
                                                                <th>Module</th>
                                                                <th>Form</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <td hidden id="trnid"></td>
                                                            <td id="Module"></td>
                                                            <td id="Form"></td>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="form-group row">
                                                    <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-2" for="cmbUserLevel">User Level</label>
                                                    <div class="col-md-8 col-sm-8 col-xs-8">
                                                        <select class="form-control" id="cmbUserLevel" name="cmbUserLevel">
                                                            <option value="0">- - - - SELECT - - - -</option>
                                                            <?php foreach($ulevel as $ulevel){ ?>
                                                            <option value="<?php echo $ulevel->mas_userlevel_id; ?>">
                                                                <?php echo $ulevel->mas_userlevel_name.' - '.$ulevel->mas_userlevel_remark; ?>
                                                            </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                    <button type="button" class="btn btn-info btn-fill" name="btnUpdateUL" id="btnUpdateUL">Update</button>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12" >
                                                
                                            </div> -->
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button class="btn btn-primary" id="btnConfirm" name="btnConfirm" type="button">Confirm</button> -->
                                            <button type="button" data-dismiss="modal" class="btn btn-secondary" id="btnclose1">Close</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <?php foreach($edit as $post){ ?>
                                        <div id="showID" style="display: none;"><?php if(isset($uri)){ echo $post->mas_ugroup_id;}  ?></div>
                                        <div class="card-close">
                                            <div class="dropdown">
                                                <?php if(!isset($uri)){ ?>
                                                <button type="button" class="btn btn-success btn-fill btn-sm" id="btnusergrop" name="btnusergrop">Save</button>
                                                <?php } ?>
                                                <?php if(!isset($uri)){ ?>
                                                <button type="button" class="btn btn-warning btn-fill btn-sm" id="btnComplete" name="btnComplete">Complete</button>
                                                <?php } ?>
                                                <?php if(isset($uri)){ ?>
                                                <button type="button" class="btn btn-success btn-fill" name="btnusergropUpdate" id="btnusergropUpdate">Update</button>
                                                <?php } ?>
                                                <?php if(isset($uri)){ ?>
                                                <button type="button" class="btn btn-danger btn-fill" name="btnBack" id="btnBack">Back</button>
                                                <?php } ?>
                                                
                                                
                                                <!-- <button type="button" class="btn btn-primary btn-fill btn-sm" id="btnuser" name="btnuser">User Registration</button> -->
                                                <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
                                                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Close</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Edit</a></div>
                                            </div>
                                        </div>
                                        
                                        <div class="card-body">
                                            <div class="row" style="margin-top: 30px;">
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label style="color: rgb(23,24,20);" class="control-label col-md-4 col-sm-4 col-xs-12" for="txtname">Name</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <input type="text" class="form-control" id="txtname" name="txtname" value="<?php if(isset($uri)){ echo $post->mas_ugroup_name;}  ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label style="color: rgb(23,24,20);" class="control-label col-md-4 col-sm-4 col-xs-12" for="txtremark">Remark</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <textarea id="txtremark" name="txtremark" style="width: 100%; height: 240%"><?php if(isset($uri)){ echo $post->mas_ugroup_remark;}  ?></textarea>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row">
                                                        <label style="color: rgb(23,24,20);" class="control-label col-md-4 col-sm-4 col-xs-12" for="cmbCompany">Company</label>
                                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                                            <select class="form-control" id="cmbCompany" name="cmbCompany">
                                                                <?php foreach($company as $company){ ?>
                                                                <option value="<?php echo $company->mas_com_id; ?>"<?php if(isset($uri)){if($post->mas_com_id == $company->mas_com_id) {echo "selected = 'selected'";}} ?>>
                                                                    <?php echo $company->mas_com_code.' - '.$company->mas_com_name; ?>
                                                                </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <button class="btn btn-primary" style="float-right" id="btnModules" name="btnModules" type="button">Modules</button>
                                        </div>
                                        <div class="card-body" style="margin-top:-35px;" id="Itemsdetailpage">
                                            <div class="form-group row"  style="margin-left: 5px;margin-right:5px;">
                                                <div class="col-md-12"><hr width="100%">
                                                    <div class="responsive" style="overflow-x:auto;max-height: 400px; overflow-y: scroll;">
                                                        <table class="table table-bordered" style="width: 100%; border-color: #E3DBD9;" id="roomsview1">
                                                            <thead style="color: #ffffff; background-color: #474140">
                                                                <tr>
                                                                    <th hidden>ID</th>
                                                                    <th>Module</th>
                                                                    <th>Form</th>
                                                                    <th>User Level</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php if(isset($uri)){foreach($edit2 as $post2){ ?>
                                                                <tr>
                                                                    <td hidden><?php echo $post2->trn_gfrom_id; ?></td>
                                                                    <td><?php echo $post2->mas_compmdls_shtname; ?></td>
                                                                    <td><?php echo $post2->mas_form_name; ?></td>
                                                                    <td><?php echo $post2->mas_userlevel_name.' - '.$post2->mas_userlevel_remark; ?></td>
                                                                    <td hidden><?php echo $post2->mas_userlevel_id; ?></td>
                                                                    <td><button id="removeUGF" type="button" name="removeUGF" class="btn btn-danger btn-fill btn-xs" >X</button><button id="editdetails" type="button" name="editdetails" class="btn btn-warning btn-fill btn-sm" style="margin-left: 5px;">Edit</button></td>
                                                                </tr>
                                                                <?php }} ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>