<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--**********************************
Content body start
***********************************-->
<div class="content-body">
  <div class="container-fluid mt-3">
    <?php $uri = $this->uri->segment(3); ?>
    <div style="margin-top: 1%;" class="modal fade" id="exampleModalLong1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content"  style="background-color: rgb(238, 245, 249);" >
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLabel1"></h5> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="form-group row">
                  <div id="mas_navi_id" style="display: none;"></div>
                  <table class="table table-bordered responsive" style="width: 100%; border-color: #E3DBD9" id="roomsview1">
                    <thead style="color: #000000 ; background-color: #D5DADF">
                      <tr>
                        <th>Company Modules</th>
                        <th>Name</th>
                        <th>Controller Name</th>
                        <th>Description</th>
                        <th>Sub Enable</th>
                        <th>Active</th>
                      </tr>
                    </thead>
                    <tbody>
                      <td id="cmid1"></td>
                      <td id="name1"></td>
                      <td id="cname1"></td>
                      <td id="description1"></td>
                      <td id="subenable1"></td>
                      <td id="active1"></td>
                    </tbody>
                  </table>
                </div>
                <div class="form-group row">
                  <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-2" for="NaviName1">Name</label>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <input type="text" class="form-control" id="NaviName1" name="NaviName1">
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-2" for="CNaviName1">Controller Name</label>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <input type="text" class="form-control" id="CNaviName1" name="CNaviName1">
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-2" for="NaviDescription">Description</label>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <input type="text" class="form-control" id="NaviDescription" name="NaviDescription">
                    
                  </div>
                  <button type="button" class="btn btn-info btn-fill" name="btnUpdateNavi" id="btnUpdateNavi">Update</button>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!-- <button type="button" id="mdbtnEditPrint" class="btn btn-primary">Print</button> -->
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <div style="margin-top: 1%;" class="modal fade" id="exampleModalLong2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content"  style="background-color: rgb(238, 245, 249);" >
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLabel2"></h5> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="form-group row">
                  <div id="mas_subnavi_id" style="display: none;"></div>
                  <table class="table table-bordered responsive" style="width: 100%; border-color: #E3DBD9" id="roomsview2">
                    <thead style="color: #000000 ; background-color: #D5DADF">
                      <tr>
                        <th>Navigation</th>
                        <th>Sub Name</th>
                        <th>Controller Name</th>
                        <th>Description</th>
                        <th>Sub Enable</th>
                        <th>Active</th>
                      </tr>
                    </thead>
                    <tbody>
                      <td id="navi2"></td>
                      <td id="subname2"></td>
                      <td id="cname2"></td>
                      <td id="description2"></td>
                      <td id="subenable2"></td>
                      <td id="active2"></td>
                    </tbody>
                  </table>
                </div>
                <div class="form-group row">
                  <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-2" for="NaviSubName2">Sub Name</label>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <input type="text" class="form-control" id="NaviSubName2" name="NaviSubName2">
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-2" for="CNaviName2">Controller Name</label>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <input type="text" class="form-control" id="CNaviName2" name="CNaviName2">
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-2" for="NaviSubDescription">Description</label>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <input type="text" class="form-control" id="NaviSubDescription" name="NaviSubDescription">
                    
                  </div>
                  <button type="button" class="btn btn-info btn-fill" name="btnUpdateNaviSub" id="btnUpdateNaviSub">Update</button>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!-- <button type="button" id="mdbtnEditPrint" class="btn btn-primary">Print</button> -->
            </div>
          </div>
        </div>
        
      </div>
    </div>
    <div style="margin-top: 1%;" class="modal fade" id="exampleModalLong3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content"  style="background-color: rgb(238, 245, 249);" >
          <div class="modal-header">
            <!-- <h5 class="modal-title" id="exampleModalLabel3"></h5> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="modal-body">
              <div class="col-md-12">
                <div class="form-group row">
                  <div id="mas_subsubnavi_id" style="display: none;"></div>
                  <table class="table table-bordered responsive" style="width: 100%; border-color: #E3DBD9" id="roomsview3">
                    <thead style="color: #000000 ; background-color: #D5DADF">
                      <tr>
                        <th>Sub Navigation</th>
                        <th>Sub Sub Name</th>
                        <th>Controller Name</th>
                        <th>Description</th>
                        <th>Active</th>
                      </tr>
                    </thead>
                    <tbody>
                      <td id="subnavi3"></td>
                      <td id="subname3"></td>
                      <td id="cname3"></td>
                      <td id="description3"></td>
                      <td id="active3"></td>
                    </tbody>
                  </table>
                </div>
                <div class="form-group row">
                  <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-2" for="NaviSubSubName3">Sub Sub Name</label>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <input type="text" class="form-control" id="NaviSubSubName3" name="NaviSubSubName3">
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-2" for="CNaviName3">Controller Name</label>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <input type="text" class="form-control" id="CNaviName3" name="CNaviName3">
                    
                  </div>
                </div>
                <div class="form-group row">
                  <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-2" for="NaviSubSubDescription">Description</label>
                  <div class="col-md-8 col-sm-8 col-xs-8">
                    <input type="text" class="form-control" id="NaviSubSubDescription" name="NaviSubSubDescription">
                    
                  </div>
                  <button type="button" class="btn btn-info btn-fill" name="btnUpdateNaviSubSub" id="btnUpdateNaviSubSub">Update</button>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <!-- <button type="button" id="mdbtnEditPrint" class="btn btn-primary">Print</button> -->
            </div>
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
              <li class="nav-item"><a href="#navpills-1" class="nav-link <?php if(!isset($uri)){ ?> active <?php } ?>" data-toggle="tab" aria-expanded="false">Navigation</a>
            </li>
            <li class="nav-item"><a href="#navpills-2" class="nav-link <?php if(isset($uri)){ ?> active <?php } ?>" data-toggle="tab" aria-expanded="false">Sub Navigation</a>
          </li>
          <li class="nav-item"><a href="#navpills-3" class="nav-link <?php if(isset($uri)){ ?> active <?php } ?>" data-toggle="tab" aria-expanded="false">Sub Sub Navigation</a>
        </li>
      </ul>
      <div class="tab-content br-n pn">
        <div id="navpills-1" class="tab-pane <?php if(!isset($uri)){ ?> active <?php } ?>">
          <div class="row align-items-center">
            <div class="col-sm-12 col-md-12 col-xl-12">
              <div class="col-lg-12">
                <div class="card">
                  <!-- <div id="showid" style="display: none;"><?php if(isset($uri)){ echo $post->mas_vehiclecategory_id;}  ?></div> -->
                  <div class="card-close">
                    <div class="dropdown">
                      <?php if(!isset($uri)){ ?>
                      <button type="button" class="btn btn-success" name="btnNavigationSave" id="btnNavigationSave" style="float: right;margin-right: 10px">Save</button>
                      <?php } ?>
                      
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label style="color: rgb(23,24,20);"  class="control-label col-md-2 col-sm-2 col-xs-12" for="cmbCompanyModules">Company Modules</label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <select class="form-control" id="cmbCompanyModules" name="cmbCompanyModules">
                          <option value="-1">Choose...</option>
                          <?php foreach($cmodules as $cmodules){ ?>
                          <option value="<?php echo $cmodules->mas_compmdls_id; ?>"><?php echo $cmodules->mas_compmdls_description; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-12" for="txtName">Name<span></span></label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" id="txtName" name="txtName" value="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-12" for="txtController">Controller Name<span></span></label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" id="txtController" name="txtController" value="">
                      </div>
                      <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-12" for="txtDescription">Description<span></span></label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" id="txtDescription" name="txtDescription" value="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label style="color: rgb(23,24,20);"  class="control-label col-md-2 col-sm-2 col-xs-12" for="txtSubEnable">Sub Enable</label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="i-checks">
                          <input id="txtSubEnable1" type="radio"  value="1" name="txtSubEnable" class="radio-template" checked>
                          <label for="txtSubEnable1">Yes</label>&emsp;
                          
                          <input id="txtSubEnable2" type="radio"  value="0" name="txtSubEnable" class="radio-template">
                          <label for="txtSubEnable2">No</label>
                        </div>
                      </div>
                      <label style="color: rgb(23,24,20);"  class="control-label col-md-2 col-sm-2 col-xs-12" for="txtActive">Active</label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="i-checks">
                          <input id="txtActiveradioCustom1" type="radio"  value="1" name="txtActiveradioCustom" class="radio-template" checked>
                          <label for="txtActiveradioCustom1">Yes</label>&emsp;
                          
                          <input id="txtActiveradioCustom2" type="radio"  value="0" name="txtActiveradioCustom" class="radio-template">
                          <label for="txtActiveradioCustom2">No</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12 col-sm-12 col-xs-12"><hr width="100%">
                        <div class="responsive" style="overflow-x:auto;max-height: 500px; overflow-y: scroll;">
                          <table class="table table-bordered" style="width: 100%; border-color: #E3DBD9;" id="navigationtable">
                            <thead style="color: #ffffff; background-color: #474140">
                              <tr>
                                <th hidden>Id</th>
                                <th>Company Modules</th>
                                <th>Name</th>
                                <th>Controller Name</th>
                                <th>Description</th>
                                <th>Sub Enable</th>
                                <th>Active</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody class="context-menu-navigation">
                            </tbody>
                          </table>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="navpills-2" class="tab-pane <?php if(isset($uri)){ ?> active <?php } ?>">
          <div class="row align-items-center">
            <div class="col-sm-12 col-md-12 col-xl-12">
              <div class="col-lg-12">
                <div class="card">
                  <!--                     <div id="showid" style="display: none;"><?php if(isset($uri)){ echo $post->mas_vehiclecategory_id;}  ?></div> -->
                  <div class="card-close">
                    <div class="dropdown">
                      <?php if(!isset($uri)){ ?>
                      <button type="button" class="btn btn-success" name="btnSubNavigationSave" id="btnSubNavigationSave" style="float: right;margin-right: 10px">Save</button>
                      <?php } ?>
                      
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label style="color: rgb(23,24,20);"  class="control-label col-md-2 col-sm-2 col-xs-12" for="cmbNavigation">Navigation</label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <select class="form-control" id="cmbNavigation" name="cmbNavigation">
                          <option value="-1">Choose...</option>
                          <?php foreach($nav as $nav){ ?>
                          <option value="<?php echo $nav->mas_navi_id; ?>"><?php echo $nav->mas_compmdls_shtname.' || '.$nav->mas_navi_name.' - '.$nav->mas_navi_controller; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-12" for="txtSubName">Sub Name<span></span></label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" id="txtSubName" name="txtSubName" value="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-12" for="txtControllerSub">Controller Name<span></span></label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" id="txtControllerSub" name="txtControllerSub" value="">
                      </div>
                      <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-12" for="txtDescriptionSub">Description<span></span></label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" id="txtDescriptionSub" name="txtDescriptionSub" value="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label style="color: rgb(23,24,20);"  class="control-label col-md-2 col-sm-2 col-xs-12" for="txtSubEnableSub">Sub Enable</label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="i-checks">
                          <input id="txtSubEnableSub1" type="radio"  value="1" name="txtSubEnableSub" class="radio-template" checked>
                          <label for="txtSubEnableSub1">Yes</label>&emsp;
                          
                          <input id="txtSubEnableSub2" type="radio"  value="0" name="txtSubEnableSub" class="radio-template">
                          <label for="txtSubEnableSub2">No</label>
                        </div>
                      </div>
                      <label style="color: rgb(23,24,20);"  class="control-label col-md-2 col-sm-2 col-xs-12" for="txtActiveSub">Active</label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="i-checks">
                          <input id="txtActiveradioCustomSub1" type="radio"  value="1" name="txtActiveSub" class="radio-template" checked>
                          <label for="txtActiveradioCustomSub1">Yes</label>&emsp;
                          
                          <input id="txtActiveradioCustomSub2" type="radio"  value="0" name="txtActiveSub" class="radio-template">
                          <label for="txtActiveradioCustomSub2">No</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12 col-sm-12 col-xs-12"><hr width="100%">
                        <div class="responsive" style="overflow-x:auto;max-height: 500px; overflow-y: scroll;">
                          <table class="table table-bordered" style="width: 100%; border-color: #E3DBD9;" id="subnavigationtable">
                            <thead style="color: #ffffff; background-color: #474140">
                              <tr>
                                <th hidden>Id</th>
                                <th>Navigation</th>
                                <th>Sub Name</th>
                                <th>Controller Name</th>
                                <th>Description</th>
                                <th>Sub Enable</th>
                                <th>Active</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody class="context-menu-navigation">
                            </tbody>
                          </table>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="navpills-3" class="tab-pane <?php if(isset($uri)){ ?> active <?php } ?>">
          <div class="row align-items-center">
            <div class="col-sm-12 col-md-12 col-xl-12">
              <div class="col-lg-12">
                <div class="card">
                  <!-- <div id="showid" style="display: none;"><?php if(isset($uri)){ echo $post->mas_vehiclecategory_id;}  ?></div> -->
                  <div class="card-close">
                    <div class="dropdown">
                      <?php if(!isset($uri)){ ?>
                      <button type="button" class="btn btn-success" name="btnSubSubNavigationSave" id="btnSubSubNavigationSave" style="float: right;margin-right: 10px">Save</button>
                      <?php } ?>
                      
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group row">
                      <label style="color: rgb(23,24,20);"  class="control-label col-md-2 col-sm-2 col-xs-12" for="cmbSubNavigation">Sub Navigation</label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <select class="form-control" id="cmbSubNavigation" name="cmbSubNavigation">
                          <option value="-1">Choose...</option>
                          <?php foreach($subnav as $subnav){ ?>
                          <option value="<?php echo $subnav->mas_subnavi_id; ?>"><?php echo $subnav->mas_navi_name.' || '.$subnav->mas_subnavi_name.' - '.$subnav->mas_subnavi_controller; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-12" for="txtSubSubName">Sub Sub Name<span></span></label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" id="txtSubSubName" name="txtSubSubName" value="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-12" for="txtControllerSubSub">Controller Name<span></span></label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" id="txtControllerSubSub" name="txtControllerSubSub" value="">
                      </div>
                      <label style="color: rgb(23,24,20);" class="control-label col-md-2 col-sm-2 col-xs-12" for="txtDescriptionSubSub">Description<span></span></label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="text" class="form-control" id="txtDescriptionSubSub" name="txtDescriptionSubSub" value="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label style="color: rgb(23,24,20);"  class="control-label col-md-2 col-sm-2 col-xs-12" for="txtActiveSubSub">Active</label>
                      <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="i-checks">
                          <input id="txtActiveradioCustomSubSub1" type="radio"  value="1" name="txtActiveSubSub" class="radio-template" checked>
                          <label for="txtActiveradioCustomSubSub1">Yes</label>&emsp;
                          
                          <input id="txtActiveradioCustomSubSub2" type="radio"  value="0" name="txtActiveSubSub" class="radio-template">
                          <label for="txtActiveradioCustomSubSub2">No</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-md-12 col-sm-12 col-xs-12"><hr width="100%">
                        <div class="responsive" style="overflow-x:auto;max-height: 500px; overflow-y: scroll;">
                          <table class="table table-bordered" style="width: 100%; border-color: #E3DBD9;" id="subsubnavigationtable">
                            <thead style="color: #ffffff; background-color: #474140">
                              <tr>
                                <th hidden>Id</th>
                                <th>Sub Navigation</th>
                                <th>Sub Sub Name</th>
                                <th>Controller Name</th>
                                <th>Description</th>
                                <th>Active</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody class="context-menu-navigation">
                            </tbody>
                          </table>
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
  </div>
</div>
</div>
</div>
<!-- #/ container -->
</div>
<!--**********************************
Content body end
***********************************-->