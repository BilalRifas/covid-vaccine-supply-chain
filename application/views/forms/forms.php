<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--**********************************
Content body start
***********************************-->
<div class="content-body">
	<div class="container-fluid mt-3">
		<?php $uri = $this->uri->segment(3); ?>
		<div style="margin-top: 1%;" class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content"  style="background-color: rgb(238, 245, 249);" >
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Vehicle Category Details</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="col-md-12 col-xs-12">
									<label class="col-md-6">ID : </label><b><label id="mdlblId"></label></b><br>
									<label class="col-md-6">Vehicle Model : </label><b><label id="mdlblVehicleModel"></label></b><br>
									<label class="col-md-6">Name : </label><b><label id="mdlblName"></label></b><br>
									<label class="col-md-6">Remarks : </label><b><label id="mdlblRemarks"></label></b><br>
								</div>
								
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" id="mdbtnEdit" class="btn btn-primary">Edit</button>
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
							<li class="nav-item"><a href="#navpills-1" class="nav-link <?php if(!isset($uri)){ ?> active <?php } ?>" data-toggle="tab" aria-expanded="false">List</a>
						</li>
						<li class="nav-item"><a href="#navpills-2" class="nav-link <?php if(isset($uri)){ ?> active <?php } ?>" data-toggle="tab" aria-expanded="false">Forms</a>
					</li>
				</ul>
				<div class="tab-content br-n pn">
					<div id="navpills-1" class="tab-pane <?php if(!isset($uri)){ ?> active <?php } ?>">
						<div class="row align-items-center">
							<div class="col-sm-12 col-md-12 col-xl-12">
								<div class="table-responsive" style="margin-top: -1%">
									<table id="fresh-table" class="table table-striped table-bordered" width="100%" cellspacing="0">
										<thead>
											<th data-field="id" data-sortable="true">ID</th>
											<th data-field="Name" data-sortable="true">Name</th>
											<th data-field="Remarks" data-sortable="true">Remarks</th>
											<th data-field="Description" data-sortable="true">Company Module</th>
											<th data-field="NaviName" data-sortable="true">Navigation</th>
											<th data-field="SubNaviName" data-sortable="true">Sub Navigation</th>
											<th data-field="SubSubNaviName" data-sortable="true">Sub Sub Navigation</th>
											<th data-field="Status" data-sortable="true">Active</th>
										</thead>
										<tbody class="context-menu-wh">
											<?php foreach($forms as $post){ ?>
											<tr>
												<td><?php echo $post->mas_form_id; ?></td>
												<td><?php echo $post->mas_form_name; ?></td>
												<td><?php echo $post->mas_form_remark; ?></td>
												<td><?php echo $post->mas_compmdls_shtname; ?></td>
												<td><?php echo $post->mas_navi_name; ?></td>
												<td><?php echo $post->mas_subnavi_name; ?></td>
												<td><?php echo $post->mas_subsubnavi_name; ?></td>
												<td><?php if ($post->mas_form_status == '1') { echo "Yes";}else{echo "No";} ; ?></td>
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
										<div id="showid" style="display: none;"><?php if(isset($uri)){ echo $post->mas_form_id;}  ?></div>
										<div class="card-close">
											<div class="dropdown">
												<?php if(!isset($uri)){ ?>
												<button type="button" class="btn btn-success" name="btnFormsHeadSave" id="btnFormsHeadSave" style="float: right;margin-right: 10px">Save</button>
												<?php } ?>
												<?php if(isset($uri)){ ?>
												<button type="button" class="btn btn-danger btn-fill" name="btnBack" id="btnBack" style="float: right;margin-right: 10px">Back</button>
												<?php } ?>
												<?php if(isset($uri)){ ?>
												<button type="button" class="btn btn-success btn-fill" name="btnFormsHeadUpdate" id="btnFormsHeadUpdate" style="float: right;margin-right: 10px">Update</button>
												<?php } ?>
											</div>
										</div>
										<div class="card-body">
											<div class="form-group row">
												<label style="color: rgb(23,24,20);" class="col-form-label col-md-2 col-sm-2 col-xs-12" for="txtName">Form Name<span></span></label>
												<div class="col-md-4 col-sm-4 col-xs-12">
													<input type="text" class="form-control" id="txtName" name="txtName" value="<?php if(isset($uri)){ echo $post->mas_form_name;}  ?>">
												</div>
												<label style="color: rgb(23,24,20);" class="col-form-label col-md-2 col-sm-2 col-xs-12" for="txtRemarks">Remarks<span></span></label>
												<div class="col-md-4 col-sm-4 col-xs-12">
													<input type="text" class="form-control" id="txtRemarks" name="txtRemarks" value="<?php if(isset($uri)){ echo $post->mas_form_remark;}  ?>">
												</div>
											</div>
											<div class="form-group row">
												<label style="color: rgb(23,24,20);"  class="col-form-label col-md-2 col-sm-2 col-xs-12" for="cmbCompanyModules">Company Modules</label>
												<div class="col-md-4 col-sm-4 col-xs-12">
													<select class="form-control" id="cmbCompanyModules" name="cmbCompanyModules">
														<option value="0">Choose...</option>
														<?php foreach($cmodules as $cmodules){ ?>
														<option value="<?php echo $cmodules->mas_compmdls_id; ?>"<?php if(isset($uri)){if($post->mas_compmdls_id == $cmodules->mas_compmdls_id) {echo "selected = 'selected'";}} ?>><?php echo $cmodules->mas_compmdls_description; ?></option>
														<?php } ?>
													</select>
												</div>
												<label style="color: rgb(23,24,20);"  class="col-form-label col-md-2 col-sm-2 col-xs-12" for="cmbNavigation">Navigation</label>
												<div class="col-md-4 col-sm-4 col-xs-12">
													<select class="form-control" id="cmbNavigation" name="cmbNavigation">
														<option value="0">Choose...</option>
														<?php foreach($nav as $nav){ ?>
														<option value="<?php echo $nav->mas_navi_id; ?>"<?php if(isset($uri)){if($post->mas_navi_id == $nav->mas_navi_id) {echo "selected = 'selected'";}} ?>><?php echo $nav->mas_compmdls_shtname.' || '.$nav->mas_navi_name.' - '.$nav->mas_navi_controller; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label style="color: rgb(23,24,20);"  class="col-form-label col-md-2 col-sm-2 col-xs-12" for="cmbSubNavigation">Sub Navigation</label>
												<div class="col-md-4 col-sm-4 col-xs-12">
													<select class="form-control" id="cmbSubNavigation" name="cmbSubNavigation">
														<option value="0">Choose...</option>
														<?php foreach($subnav as $subnav){ ?>
														<option value="<?php echo $subnav->mas_subnavi_id; ?>"<?php if(isset($uri)){if($post->mas_subnavi_id == $subnav->mas_subnavi_id) {echo "selected = 'selected'";}} ?>><?php echo $subnav->mas_navi_name.' || '.$subnav->mas_subnavi_name.' - '.$subnav->mas_subnavi_controller; ?></option>
														<?php } ?>
													</select>
												</div>
												<label style="color: rgb(23,24,20);"  class="col-form-label col-md-2 col-sm-2 col-xs-12" for="cmbSubSubNavigation">Sub Sub Navigation</label>
												<div class="col-md-4 col-sm-4 col-xs-12">
													<select class="form-control" id="cmbSubSubNavigation" name="cmbSubSubNavigation">
														<option value="0">Choose...</option>
														<?php foreach($subsubnav as $subsubnav){ ?>
														<option value="<?php echo $subsubnav->mas_subsubnavi_id; ?>"<?php if(isset($uri)){if($post->mas_subsubnavi_id == $subsubnav->mas_subsubnavi_id) {echo "selected = 'selected'";}} ?>><?php echo $subsubnav->mas_subnavi_name.' || '.$subsubnav->mas_subsubnavi_name.' - '.$subsubnav->mas_subsubnavi_controller; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="form-group row">
												<label style="color: rgb(23,24,20);"  class="col-form-label col-md-2 col-sm-2 col-xs-12" for="txtActive">Active</label>
												<div class="col-md-4 col-sm-4 col-xs-12">
													<div class="i-checks">
														<input id="txtActiveradioCustomSub1" type="radio"  value="1" name="txtActive" class="radio-template" <?php if(isset($uri)){if($post->mas_form_status == "1") {echo 'checked';}}else{echo 'checked';} ?>>
														<label for="txtActiveradioCustomSub1">Yes</label>&emsp;
														
														<input id="txtActiveradioCustomSub2" type="radio"  value="0" name="txtActive" class="radio-template" <?php if(isset($uri)){if($post->mas_form_status == "0") {echo 'checked';}} ?>>
														<label for="txtActiveradioCustomSub2">No</label>
													</div>
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