<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--**********************************
Content body start
***********************************-->
<div class="content-body">
  <div class="container-fluid mt-3">
    <?php $uri = $this->uri->segment(3); ?>
    <div class="modal fade" id="basicModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">User Profile</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-xs-12">
                  <label class="col-md-6">ID : </label><b><label id="mdlblId"></label></b><br>
                  <label class="col-md-6">Name : </label><b><label id="mdlblName"></label></b><br>
                  <label class="col-md-6">Remarks : </label><b><label id="mdlblRemarks"></label></b><br>
                </div>
                
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
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
            <li class="nav-item"><a href="#navpills-2" class="nav-link <?php if(isset($uri)){ ?> active <?php } ?>" data-toggle="tab" aria-expanded="false">User Profile</a>
          </li>
        </ul>
        <div class="tab-content br-n pn" >
          <div id="navpills-1" class="tab-pane <?php if(!isset($uri)){ ?> active <?php } ?>">
            <div class="row align-items-center">
              <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="table-responsive" style="margin-top: -1%">
                  <table id="fresh-table" class="table table-striped table-bordered" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th data-field="id" data-sortable="true">ID</th>
                        <th data-field="Brand" data-sortable="true">F Name</th>
                        <th data-field="Name" data-sortable="true">S Name</th>
                        <th data-field="Remarks" data-sortable="true">L Name</th>
                        <th data-field="id" data-sortable="true">DOB</th>
                        <th data-field="Brand" data-sortable="true">Address</th>
                        <th data-field="Name" data-sortable="true">NIC #</th>
                        <th data-field="Remarks" data-sortable="true">Tel #</th>
                        <th data-field="id" data-sortable="true">Mobile #</th>
                        <th data-field="Brand" data-sortable="true">By</th>
                        <th data-field="Name" data-sortable="true">On</th>
                      </tr>
                    </thead>
                    <tbody class="context-menu-wh">
                      <?php foreach($userprofile as $post){ ?>
                      <tr>
                        <td><?php echo $post->mas_emp_id; ?></td>
                        <td><?php echo $post->mas_emp_fname; ?></td>
                        <td><?php echo $post->mas_emp_sname; ?></td>
                        <td><?php echo $post->mas_emp_lname; ?></td>
                        <td><?php echo $post->mas_emp_dob; ?></td>
                        <td><?php echo $post->mas_emp_address; ?></td>
                        <td><?php echo $post->mas_emp_nicno; ?></td>
                        <td><?php echo $post->mas_emp_telno; ?></td>
                        <td><?php echo $post->mas_emp_mobile; ?></td>
                        <td><?php echo $post->mas_user_username; ?></td>
                        <td><?php echo $post->mas_emp_cdatetime; ?></td>
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
                    <div id="showid" style="display: none;"><?php if(isset($uri)){ echo $post->mas_emp_id;}  ?></div>
                    <div class="card-close">
                      <div class="dropdown">
                        <?php if(!isset($uri)){ ?>
                        <button type="button" class="btn btn-success" name="btnUPHeadSave" id="btnUPHeadSave" style="float: right;margin-right: 10px">Save</button>
                        <?php } ?>
                        <?php if(isset($uri)){ ?>
                        <button type="button" class="btn btn-danger btn-fill" name="btnBack" id="btnBack" style="float: right;margin-right: 10px">Back</button>
                        <?php } ?>
                        <?php if(isset($uri)){ ?>
                        <button type="button" class="btn btn-success btn-fill" name="btnUPHeadUpdate" id="btnUPHeadUpdate" style="float: right;margin-right: 10px">Update</button>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                        <label style="color: rgb(23,24,20);" class="col-form-label col-md-2 col-sm-2 col-xs-12" for="txtFName">First Name<span>*</span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" id="txtFName" name="txtFName" value="<?php if(isset($uri)){ echo $post->mas_emp_fname;}  ?>">
                        </div>
                        <label style="color: rgb(23,24,20);" class="col-form-label col-md-2 col-sm-2 col-xs-12" for="txtSName">Second Name<span></span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" id="txtSName" name="txtSName" value="<?php if(isset($uri)){ echo $post->mas_emp_sname;}  ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label style="color: rgb(23,24,20);" class="col-form-label col-md-2 col-sm-2 col-xs-12" for="txtLName">Last Name<span></span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" id="txtLName" name="txtLName" value="<?php if(isset($uri)){ echo $post->mas_emp_lname;}  ?>">
                        </div>
                        <label style="color: rgb(23,24,20);" class="col-form-label col-md-2 col-sm-2 col-xs-12" for="txtDOB">DOB<span>*</span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="date" class="form-control" value="<?php if(isset($uri)){ echo $post->mas_emp_dob;} if(!isset($uri))echo date("Y-m-d");?>" id="txtDOB" name="txtDOB">
                        </div>

                      </div>
                      <div class="form-group row">
                        <label style="color: rgb(23,24,20);" class="col-form-label col-md-2 col-sm-2 col-xs-12" for="txtAddress">Address<span>*</span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" id="txtAddress" name="txtAddress" value="<?php if(isset($uri)){ echo $post->mas_emp_address;}  ?>">
                        </div>
                        <label style="color: rgb(23,24,20);" class="col-form-label col-md-2 col-sm-2 col-xs-12" for="txtNIC">NIC #<span>*</span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" id="txtNIC" name="txtNIC" value="<?php if(isset($uri)){ echo $post->mas_emp_nicno;}  ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label style="color: rgb(23,24,20);" class="col-form-label col-md-2 col-sm-2 col-xs-12" for="txtTelephone">Telephone<span></span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" id="txtTelephone" name="txtTelephone" value="<?php if(isset($uri)){ echo $post->mas_emp_telno;}  ?>">
                        </div>
                        <label style="color: rgb(23,24,20);" class="col-form-label col-md-2 col-sm-2 col-xs-12" for="txtMobile">Mobile #<span>*</span></label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <input type="text" class="form-control" id="txtMobile" name="txtMobile" value="<?php if(isset($uri)){ echo $post->mas_emp_mobile;}  ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label style="color: rgb(23,24,20);"  class="col-form-label col-md-2 col-sm-2 col-xs-12" for="cmbUserGroup">User Type</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <select class="form-control" id="cmbUserGroup" name="cmbUserGroup">
                            <option value="-1">Choose...</option>
                            <?php foreach($utype as $utype){ ?>
                            <option value="<?php echo $utype->mas_ugroup_id; ?>"<?php if(isset($uri)){if($post->mas_emp_type == $utype->mas_ugroup_id) {echo "selected = 'selected'";}} ?>><?php echo $utype->mas_ugroup_name; ?></option>
                            <?php } ?>
                          </select>
                        </div> 
                      </div>
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