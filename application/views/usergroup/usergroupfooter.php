<script>
    $('#btnusergrop').click(function() {
        // alert($('#txtcustomer').val());
        if ($('#txtname').val() != "") {
            $.post('<?php echo base_url(); ?>Usergroup/usergroup', {

                    name: $('#txtname').val(),
                    remar: $('#txtremark').val(),
                    company: $('#cmbCompany').val()



                },
                function(result) {
                    //                    window.location.replace('<?php echo base_url(); ?>Usergroup');
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'Successfully Saved',
                        timer: 5000
                    });
                    $('#showID').html(result);
                    // $('#secondpanel').show();
                });
        } else {
            swal({
                type: 'error',
                title: 'Error',
                text: 'Please Add Name First...',
                timer: 5000
            });


        }
    });

    $('#btnusergropUpdate').click(function() {

            $.post('<?php echo base_url(); ?>Usergroup/updateHeader', {
                    hid: $('#showID').html().trim(),
                    name: $('#txtname').val(),
                    remar: $('#txtremark').val(),
                    company: $('#cmbCompany').val()



                },
                function(result) {
                    //                    window.location.replace('<?php echo base_url(); ?>Usergroup');
                    swal({
                        type: 'success',
                        title: 'Success',
                        text: 'Successfully Updated',
                        timer: 5000
                    });
                    // $('#showID').html(result);
                    // $('#secondpanel').show();
                });

    });


    $('#roomsview1').on('click', '#removeUGF', function() {
            swal({
            title: 'Delete ',
            text: "Do wish to continue?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
                if (result.value) {


                $.post('<?php echo base_url(); ?>Usergroup/removeUGF', {
                        trn_gfrom_id: $(this).closest('tr').find('td:eq(0)').text().trim()
                    },
                    function(result) {


                    });
                
                $(this).closest('tr').remove();
                }
                });
                        

            });

    $('#btnAddUSERItems').click(function() {

        $('#tblUserpermission').find("input[type='checkbox']:checked").each(function(index) {

            $.post('<?php echo base_url(); ?>Usergroup/addTrnGroupForm', {
                        gid: $('#showID').html().trim(),
                        fid: $(this).closest('tr').find('td:eq(0)').text().trim(),
                        userlevel :$('#cmbTaxcomp'+$(this).closest('tr').find('td:eq(0)').text().trim()).val()
                        
                    },
                    function(result) {
                            $.post('<?php echo base_url(); ?>Usergroup/getUserGroupDetails', {

                                mas_ugroup_id: $('#showID').html().trim()

                            },
                            function(result) {
                                var obj = $.parseJSON(result);
                                var length = obj.length;
                                $('#roomsview1 tbody').empty();
                                for (var i = 0; i < length; i++) {
                                    $('#roomsview1 tbody').append('<tr><td hidden>' + obj[i].trn_gfrom_id + '</td><td>' + obj[i].mas_compmdls_shtname + '</td><td>' + obj[i].mas_form_name + '</td><td>' + obj[i].mas_userlevel_name + ' - ' + obj[i].mas_userlevel_remark + '</td><td hidden>' + obj[i].mas_userlevel_id + '</td><td><button id="removeUGF" type="button" name="removeUGF" class="btn btn-danger btn-fill btn-xs" >X</button><button id="editdetails" type="button" name="editdetails" class="btn btn-warning btn-fill btn-sm" style="margin-left: 5px;">Edit</button></td></tr>');
                                }
                            });
                        $('#myModal7').modal('hide');

                    });

                    swal(
                          'Successfully Added',
                          'Saved',
                          'success'
                        );

        });

    });

    $('#roomsview1').on('click', '#editdetails', function() {

        $('#myModal').modal('show');
                    $('#trnid').html($(this).closest('tr').find('td:eq(0)').text().trim());
                    $('#Module').html($(this).closest('tr').find('td:eq(1)').text().trim());
                    $('#Form').html($(this).closest('tr').find('td:eq(2)').text().trim());
                    $('#cmbUserLevel').val($(this).closest('tr').find('td:eq(4)').text().trim());

    });

    $('#btnUpdateUL').click(function() {
            $.post('<?php echo base_url(); ?>Usergroup/UpdateUL', {
                
                            trn_gfrom_id: $('#trnid').html().trim(),
                            mas_userlevel_id : $('#cmbUserLevel').val()

                            },
                            function(result) {

                                $.post('<?php echo base_url(); ?>Usergroup/getUserGroupDetails', {

                                        mas_ugroup_id: $('#showID').html().trim()

                                    },
                                    function(result) {
                                        var obj = $.parseJSON(result);
                                        var length = obj.length;
                                        $('#roomsview1 tbody').empty();
                                        for (var i = 0; i < length; i++) {
                                            $('#roomsview1 tbody').append('<tr><td hidden>' + obj[i].trn_gfrom_id + '</td><td>' + obj[i].mas_compmdls_shtname + '</td><td>' + obj[i].mas_form_name + '</td><td>' + obj[i].mas_userlevel_name + ' - ' + obj[i].mas_userlevel_remark + '</td><td hidden>' + obj[i].mas_userlevel_id + '</td><td><button id="removeUGF" type="button" name="removeUGF" class="btn btn-danger btn-fill btn-xs" >X</button><button id="editdetails" type="button" name="editdetails" class="btn btn-warning btn-fill btn-sm" style="margin-left: 5px;">Edit</button></td></tr>');
                                        }
                                    });
                                

                            $('#myModal').modal('hide');
                               
                        });

    });



    $('#cmbModule').click(function() {
        $.post('<?php echo base_url(); ?>Usergroup/getForms', {

                name: $('#cmbModule').val(),
                mas_ugroup_id: $('#showID').html().trim()

            },
            function(result) {
                var obj = $.parseJSON(result);
                var length = obj.length;
                $('#tblUserpermission tbody').empty();
                for (var i = 0; i < length; i++) {

                    $('#tblUserpermission tbody').append('<tr><td>' + obj[i].mas_form_id + '</td><td>' + obj[i].mas_form_name + '</td><td><select class="form-control sltax" id="cmbTaxcomp'+ obj[i].mas_form_id +'" name="cmbTaxcomp"><option value="0">Choose...</option></select></td><td><input type="checkbox" id="chkPRItems" name="chkPR[]" class="checkbox-template" style="margin-left:30px" checked></td></tr>');

                    $.post('<?php echo base_url(); ?>Usergroup/getUserlevel', {

                    },
                    function(result) {

                        var obj2 = $.parseJSON(result);
                        $('.sltax').empty();
                        var length2 = obj2.length;
                        // alert(length2);
                            for (var k = 0; k < length2; k++) {
                                // alert(length2);
                            $('.sltax').append($('<option>', {
                                value: obj2[k].mas_userlevel_id,
                                text: obj2[k].mas_userlevel_name+' - '+obj2[k].mas_userlevel_remark
                            }));
                        };
                    });

                }

            });
    });

    $('#btnComplete').click(function() {
        if ($('#txtname').val() != "") {
            swal({
                title: 'Are you sure?',
                text: "Do you wish to complete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    window.location.replace('<?php echo base_url(); ?>Usergroup');
                }
            })
        } else {
            swal({
                type: 'error',
                title: 'Error',
                text: 'Please Add Name First...',
                timer: 5000
            });
        }
    });

    $('#btnBack').click(function() {
        window.location.replace('<?php echo base_url(); ?>Usergroup');
    });

    $('#btnModules').click(function() {
    	if($('#showID').html()!=''){
        $('#tblUserpermission tbody').empty();
       $('#myModal7').modal('show');
       $('#cmbModule').val('0');

   		}else{
                    // alert('Please Save Before select IR No');
                    swal({
                                  type: 'error',
                                  title: 'Please Save First...',
                                  // text: 'Please Save Before select IR No...',
                                  timer: 5000
                                });
                }
    });


    $(function() {
        $(".context-menu-four").contextMenu({
            selector: 'td',
            callback: function(key, options) {
                var content = key;
                var row = options.$trigger.closest("tr").find('td:not(:empty):first').text();
                // alert("You clicked on: " + row);
                if (content == "edit") {
                    window.location.replace('<?php echo base_url(); ?>Usergroup/edit/' + $(this).closest('tr').find('td:eq(0)').text().trim());
                } else if (content == "view") {

                }else{
                     swal({
                          type: 'error',
                          title: $(this).closest('tr').find('td:eq(1)').text().trim()+ ' Already Approved...',
                          // text: 'Please Save Before Complete PR...',
                          timer: 5000
                        });
                }
            },
            items: {
                "edit": {
                    name: "Edit"
                },
                // "view": {
                //     name: "View"
                // },

            }
        });
    });

    $('#fresh-table').on('click', '#btnView', function() {

        $('#exampleModalLong').modal('show');
        $('#mdlblId').html($(this).closest('tr').find('td:eq(0)').text());
        $('#mdlblName').html($(this).closest('tr').find('td:eq(1)').text());
        $('#mdlblStatus').html($(this).closest('tr').find('td:eq(2)').text());
        $('#mdlblRemarks').html($(this).closest('tr').find('td:eq(3)').text());
        $('#mdlblCompany').html($(this).closest('tr').find('td:eq(4)').text());

        // alert($(this).closest('tr').find('td:eq(0)').text().trim());

        $.post('<?php echo base_url(); ?>Usergroup/getItemDetails', {

                            mas_ugroup_id: $('#mdlblId').html().trim()

                        },
                        function(result) {
                            var obj = $.parseJSON(result);
                            var length = obj.length;
                            var ulname="";
                            var ulremarks="";
                            var formname="";
                            $('#mdItems tbody').empty();
                            for (var i = 0; i < length; i++) {

                                if (obj[i].mas_form_name == null || obj[i].mas_form_name == "") {
                                                    // noncreditss = "";
                                                    formname = "";
                                                } else {
                                                    formname = obj[i].mas_form_name;
                                                }
                                if (obj[i].mas_userlevel_name == null || obj[i].mas_userlevel_name == "") {
                                                    // noncreditss = "";
                                                    ulname = "";
                                                } else {
                                                    ulname = obj[i].mas_userlevel_name;
                                                }
                                if (obj[i].mas_userlevel_remark == null || obj[i].mas_userlevel_remark == "") {
                                                    // noncreditss = "";
                                                    ulremarks = "";
                                                } else {
                                                    ulremarks = obj[i].mas_userlevel_remark;
                                                }
                                $('#mdItems tbody').append('<tr><td hidden>' + obj[i].trn_gfrom_id + '</td><td>' + obj[i].mas_compmdls_shtname + '</td><td>' + formname + '</td><td>' + ulname + ' - ' + ulremarks + '</td></tr>');
                            }
                        });
        });

</script>
