<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--**********************************
Content body start
***********************************-->
<div class="content-body">
  <div class="container-fluid mt-3">
    <?php $uri = $this->uri->segment(3); ?>
    <div style="margin-top: 5%;" class="modal fade" id="exampleModalLong10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content"  style="background-color: rgb(238, 245, 249);" >
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">User Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-xs-12">
                  <label class="col-md-4">ID : </label><b><label id="mdlblId"></label></b><br>
                  <label class="col-md-4">User Name : </label><b><label id="mdlblUsername"></label></b><br>
                  <label class="col-md-4">Expire Date : </label><b><label id="mdlblExpireDate"></label></b><br>
                  <label class="col-md-4">Status  : </label><b><label id="mdlblStatus"></label></b><br>
                  <label class="col-md-4">Created Date   : </label><b><label id="mdlblCreatedDate"></label></b>
                </div>
                
              </div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="card">
                
                <table class="table" id="mdItems">
                  <thead style="background-color: black; color: white;">
                    <th hidden>ID</th>
                    <th>User Group</th>
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
    <div id="myModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" class="modal fade bd-example-modal-lg text-left">
      <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content">
          <form id="form3" name="form3" method="POST" action="">
            <div class="modal-header">
              <h4 id="exampleModalLabel2" class="modal-title">Change Expire Date</h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <!--                            <p>Make secure to save changes</p>-->
              <div class="form-group row">
                <label style="color: rgb(23,24,20);" class="control-label col-md-3 col-sm-3 col-xs-12">
                User ID</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <label id="usernameshow2" name="usernameshow2"></label>
                  <label id="usernameshow3" name="usernameshow3"></label>
                </div>
              </div>
              <div class="form-group row">
                <label style="color: rgb(23,24,20);" class="control-label col-md-3 col-sm-3 col-xs-12">
                Current Expire Date</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <label id="cexpiredate" name="cexpiredate"></label>
                </div>
              </div>
              <div class="form-group row">
                <label style="color: rgb(23,24,20);" class="control-label col-md-3 col-sm-3 col-xs-12" for="txteedate">New Expire Date</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="date" class="form-control input-datepicker-autoclose" id="txteedate2" name="txteedate2" value="<?php echo date("Y-m-d");?>">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="button" id="btnUpdateExpireDate" name="btnUpdateExpireDate">Save changes</button>
              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
      <div role="document" class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="exampleModalLabel" class="modal-title">Signin Info</h4>
            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
            <form class="form-validate" id="form4" name="form4" method="POST" action="">
              <p>Make secure password for the login</p>
              <div class="form-group row">
                <label style="color: rgb(23,24,20);" class="control-label col-md-3 col-sm-3 col-xs-12" for="form2-password">Password</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="form2-password" name="form2-password" type="password" required data-msg="<label class='text text-danger'>Please enter your password</label>" data-rule-minlength="5" data-msg-minlength="<label class='text text-danger'>Your password should have at least 5 characters.</label>" class="form-control" oninput="ch(this)">
                </div>
              </div>
              <div class="form-group row">
                <label style="color: rgb(23,24,20);" class="control-label col-md-3 col-sm-3 col-xs-12" for="form2-password2">Confirm Password</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="form2-password2" name="form2-password2" type="password" required data-msg="<label class='text text-danger'>Please confirm your password</label>" data-rule-equalto="#form2-password" data-msg-equalto="<label class='text text-danger'>Passwords do not match</label>" class="form-control" disabled>
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="passwordpass" name="passwordpass" class="btn btn-primary">Save</button>
            <!--                                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>-->
          </div>
        </div>
      </div>
    </div>
    <div id="myModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left ">
      <div role="document" class="modal-dialog modal-lg">
        <div class="modal-content ">
          <form id="form2" name="form2" method="POST" action="">
            <div class="modal-header">
              <h4 id="exampleModalLabel" class="modal-title">User Permission</h4>
              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
              <div class="form-group row">
                <label style="color: rgb(23,24,20);" class="control-label col-md-3 col-sm-3 col-xs-12" for="cmbCmpanyModules">Module</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select class="form-control" id="cmbCmpanyModules" name="cmbCmpanyModules">
                    <option value="0"> - - - - - - - - - - </option>
                    <?php foreach($cmodules as $cmodules){ ?>
                    <option value="<?php echo $cmodules->mas_compmdls_id; ?>">
                      <?php echo $cmodules->mas_compmdls_shtname; ?>
                    </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <table class="table" id="tblPermission">
                <thead style="background-color: black; color: white;">
                  <th hidden>ID</th>
                  <th>Action</th>
                  <th>Page</th>
                  <th>User Level</th>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" type="button" id="btnSavemd">Save</button>
              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12" >
        
        <div class="card" style="margin-top: -2%">
          <div class="card-body" style="margin-top: -2%">
            <!--                                 <h4 class="card-title">Nav Pills Tabs</h4> -->
            <ul class="nav nav-pills mb-3" >
              <li class="nav-item"><a href="#navpills-1" class="nav-link <?php if(!isset($uri)){ ?> active <?php } ?>" data-toggle="tab" aria-expanded="false">List</a>
            </li>
            <li class="nav-item"><a href="#navpills-2" class="nav-link <?php if(isset($uri)){ ?> active <?php } ?>" data-toggle="tab" aria-expanded="false">Users</a>
          </li>
        </ul>
        <div class="tab-content br-n pn">
          <div id="navpills-1" class="tab-pane <?php if(!isset($uri)){ ?> active <?php } ?>">
            <div class="row align-items-center">
              <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="table-responsive" style="margin-top: -1%">
                  <table id="fresh-table" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th data-field="Uid" data-sortable="true" id="uid">User ID</th>
                        <th data-field="name" data-sortable="true">Username</th>
                        <th data-field="expDate" data-sortable="true">Expire Date</th>
                        <th data-field="dptment" data-sortable="true">Status</th>
                        <th data-field="logindate" data-sortable="true">Created Date</th>
                        <th data-field="actions">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="context-menu-users">
                      <?php foreach($users as $post){ ?>
                      <tr>
                        <td><?php echo $post->mas_user_id ; ?></td>
                        <td><?php echo $post->mas_user_username; ?></td>
                        <td><?php echo $post->mas_user_expire_date; ?></td>
                        <td><?php if($post->mas_user_status == '1'){echo 'Active';}else{echo 'Inactive';}; ?></td>
                        <td><?php echo $post->mas_user_create_date; ?></td>
                        <td><button type="button" class="btn btn-primary btn-fill btn-md" id="btnView" name="btnView">View</button></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div id="navpills-2" class="tab-pane <?php if(isset($uri)){ ?> active <?php } ?>">
            <div class="row align-items-center">
              <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="col-lg-12">
                  <div class="card">
                    <?php foreach($edit as $post){ ?>
                    <div id="showID" style="display: none;"><?php if(isset($uri)){ echo $post->mas_user_id;}  ?></div>
                    <div class="card-close">
                      <div class="dropdown">
                        <?php if(!isset($uri)){ ?>
                        <button type="submit" class="btn btn-success" name="upload" id="upload" style="float: right;margin-right: 10px">Save</button>
                        <?php } ?>
                        <?php if(!isset($uri)){ ?>
                        <button type="button" class="btn btn-success" name="complete" id="complete" style="float: right;margin-right: 10px;display: none;">Complete</button>
                        <?php } ?>
                        <?php if(isset($uri)){ ?>
                        <button type="button" class="btn btn-success" name="btnUpdate" id="btnUpdate" style="float: right;margin-right: 10px">Update</button>
                        <?php } ?>
                        <button type="button" class="btn btn-primary" name="btnprm" id="btnprm" style="float: right;margin-right: 10px">Permission</button>
                        <?php if(isset($uri)){ ?>
                        <button type="button" class="btn btn-danger" name="btnBack" id="btnBack" style="float: right;margin-right: 10px">Back</button>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="card-body" style="margin-top:10px">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label style="color: rgb(23,24,20);" class="col-form-label col-md-3 col-sm-3 col-xs-12" for="txtUsername">Username<span>*</span></label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" placeholder="Username" class="form-control" id="txtUsername" name="txtUsername" required data-msg="<label class='text text-danger'>Please enter a User ID</label>" value="<?php if(isset($uri)){ echo $post->mas_user_username;}  ?>" <?php if(isset($uri)){ ?>readonly <?php } ?> >
                              </div>
                              <div id="feedback"></div>
                            </div>
                            <div class="form-group row">
                              <label style="color: rgb(23,24,20);" class="col-form-label col-md-3 col-sm-3 col-xs-12" for="form2-password">Password<span>*</span></label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <button type="button" style="width: 100%" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Press to enter password </button>
                                <div id="passwordinfo"></div>
                                <input type="text" id="txtPasswordConfim" name="txtPasswordConfim" style="display: none">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label style="color: rgb(23,24,20);" class="col-form-label col-md-3 col-sm-3 col-xs-12" for="txtExpdate">Expire Date</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="date" class="form-control input-datepicker-autoclose" id="txtExpdate" name="txtExpdate" value="<?php echo date("Y-m-d", strtotime('+1 years', strtotime(date('m/d/Y')))) ?>">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label style="color: rgb(23,24,20);" class="col-form-label col-md-3 col-sm-3 col-xs-12" for="cmbRevenueCenter">Revenue Center</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" id="cmbRevenueCenter" name="cmbRevenueCenter">
                                  <option value="0"> - - - - - - - - - - </option>
                                  <?php foreach($revcent as $revcent){ ?>
                                  <option value="<?php echo $revcent->mas_revcent_id; ?>"<?php if(isset($uri)){if($post->mas_revcent_id == $revcent->mas_revcent_id) {echo "selected = 'selected'";}} ?>><?php echo $revcent->mas_revcent_name; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group row">
                              <label style="color: rgb(23,24,20);" class="col-form-label col-md-3 col-sm-3 col-xs-12" for="cmbEmp">Employee<span>*</span></label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <select class="form-control" id="cmbEmp" name="cmbEmp">
                                  <option value="0"> - - - - - - - - - - </option>
                                  <?php foreach($emp as $emp){ ?>
                                  <option value="<?php echo $emp->mas_emp_id; ?>"<?php if(isset($uri)){if($post->mas_emp_id == $emp->mas_emp_id) {echo "selected = 'selected'";}} ?>><?php echo $emp->mas_emp_fname.' '.$emp->mas_emp_sname.' '.$emp->mas_emp_lname.' ('.$emp->mas_emp_nicno.')'; ?></option>
                                  <?php } ?>
                                </select>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label style="color: rgb(23,24,20);" class="col-form-label col-md-3 col-sm-3 col-xs-12" for="txtRemarks">Remarks</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="txtRemarks" id="txtRemarks" style="width:100%; height: 130%;"><?php if(isset($uri)){ echo $post->mas_user_remark;}  ?></textarea>
                              </div>
                            </div>
                            <div class="form-group row">
                              <label style="color: rgb(23,24,20);" class="col-form-label col-md-3 col-sm-3 col-xs-12" for="txtProfilepic">Profile Picture</label>
                              <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="file" id="file" name="file">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label style="color: rgb(23,24,20);" class="col-form-label col-md-3 col-sm-3 col-xs-12" for="chkStatus">Status</label>
                              <div class="i-checks">
                                <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 10px">
                                  <input id="chkStatus" type="checkbox" name="chkStatus" value="Y" class="checkbox-template" checked>
                                </div>
                              </div>
                            </div>
                            <div id="upload_image"></div>
                          </div>
                        </div>
                      </div>
                      <div class="card-body" style="margin-top:-35px;" id="userpermissionpage">
                        <!-- <div class="form-group row"  style="margin-left: 5px;margin-right:5px;"> -->
                          <!-- <div class="col-md-12"> -->
                            <hr width="100%">
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
                                    <td hidden><?php echo $post2->trn_usergroup_id; ?></td>
                                    <td><?php echo $post2->mas_ugroup_name; ?></td>
                                    <td><?php echo $post2->mas_form_name; ?></td>
                                    <td><?php echo $post2->mas_userlevel_name.' - '.$post2->mas_userlevel_remark; ?></td>
                                    <td hidden><?php echo $post2->mas_userlevel_id; ?></td>
                                    <td><button id="removeUPermission" type="button" name="removeUPermission" class="btn btn-danger btn-fill btn-xs" >X</button><button id="editdetailsUP" type="button" name="editdetailsUP" class="btn btn-warning btn-fill btn-sm" style="margin-left: 5px;">Edit</button></td>
                                  </tr>
                                  <?php }} ?>
                                </tbody>
                              </table>
                            </div>
                          <!-- </div> -->
                          
                        <!-- </div> -->
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- #/ container -->
</div>
<!--**********************************
Content body end
***********************************-->