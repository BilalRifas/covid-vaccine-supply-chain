<script type="text/javascript">
    
    $().ready(function() {
    $('#fresh-table').DataTable({"order": [[ 0, "desc" ]]});

    });

    $('#cmbCompanyModules').change(function(){

        $.post('<?php echo base_url(); ?>Forms/getNav', {
                mas_compmdls_id: $('#cmbCompanyModules').val()

            },
            function(result) {
                $('#cmbNavigation').empty();
                $('#cmbSubNavigation').val('0');
                $('#cmbSubSubNavigation').val('0');
                var obj = $.parseJSON(result);
                var length = obj.length;
                $('#cmbNavigation').append($('<option>', {
                        value: '0',
                        text: 'Choose'
                    }));
                for (var i = 0; i < length; i++) {
                    //                    alert(obj[i].trn_war_id + ' ' + obj[i].mas_item_code + ' ' + obj[i].mas_item_name + ' ');
                    
                    $('#cmbNavigation').append($('<option>', {
                        value: obj[i].mas_navi_id,
                        text:  obj[i].mas_navi_name+' - '+obj[i].mas_navi_controller
                    }));

                };
            });

    });

    $('#cmbNavigation').change(function(){

        $.post('<?php echo base_url(); ?>Forms/getSubNav', {
                mas_navi_id: $('#cmbNavigation').val()

            },
            function(result) {
                $('#cmbSubNavigation').empty();
                $('#cmbSubSubNavigation').val('0');
                var obj = $.parseJSON(result);
                var length = obj.length;
                $('#cmbSubNavigation').append($('<option>', {
                        value: '0',
                        text: 'Choose'
                    }));
                for (var i = 0; i < length; i++) {
                    //                    alert(obj[i].trn_war_id + ' ' + obj[i].mas_item_code + ' ' + obj[i].mas_item_name + ' ');
                    
                    $('#cmbSubNavigation').append($('<option>', {
                        value: obj[i].mas_subnavi_id,
                        text:  obj[i].mas_subnavi_name+' - '+obj[i].mas_subnavi_controller
                    }));

                };
            });

    });

    $('#cmbSubNavigation').change(function(){

        $.post('<?php echo base_url(); ?>Forms/getSubSubNav', {
                mas_subnavi_id: $('#cmbSubNavigation').val()

            },
            function(result) {
                $('#cmbSubSubNavigation').empty();
                var obj = $.parseJSON(result);
                var length = obj.length;
                $('#cmbSubSubNavigation').append($('<option>', {
                        value: '0',
                        text: 'Choose'
                    }));
                for (var i = 0; i < length; i++) {
                    //                    alert(obj[i].trn_war_id + ' ' + obj[i].mas_item_code + ' ' + obj[i].mas_item_name + ' ');
                    
                    $('#cmbSubSubNavigation').append($('<option>', {
                        value: obj[i].mas_subsubnavi_id,
                        text:  obj[i].mas_subsubnavi_name+' - '+obj[i].mas_subsubnavi_controller
                    }));

                };
            });

    });

	$('#btnFormsHeadSave').click(function() {
        if ($('#cmbCompanyModules').val() == "0" || $('#cmbNavigation').val() == "0" || $('#txtName').val() == "" ) {
            swal({
                type: 'error',
                title: 'Error',
                text: 'Please fill all the required fields...',
                timer: 5000
            });
        } else {
            $.post('<?php echo base_url(); ?>Forms/addHeader', {

                    mas_compmdls_id: $('#cmbCompanyModules').val(),
                    mas_navi_id: $('#cmbNavigation').val(),
                    mas_subnavi_id: $('#cmbSubNavigation').val(),
                    mas_subsubnavi_id: $('#cmbSubSubNavigation').val(),
                    mas_form_name: $('#txtName').val(),
                    mas_form_remark: $('#txtRemarks').val(),
                    mas_form_status: $('input[name="txtActive"]:checked').val(),
                },
                function(result) {
                    if (result != '') {
                        swal(
                          'Successfully',
                          'Saved',
                          'success'
                        );
                        // $('#familygroupdetailpage').show();
                        $('#showid').html(result);
                        window.location.replace('<?php echo base_url(); ?>Forms');
                    } else {
                        swal({
                              type: 'error',
                              title: 'Error',
                              text: 'Please add items first...',
                              timer: 5000
                            });

                    }
                });
        }
            
        });

        $('#btnFormsHeadUpdate').click(function() {
            $.post('<?php echo base_url(); ?>Forms/updateHeader', {
                    mas_form_id: $('#showid').html().trim(),
                    mas_compmdls_id: $('#cmbCompanyModules').val(),
                    mas_navi_id: $('#cmbNavigation').val(),
                    mas_subnavi_id: $('#cmbSubNavigation').val(),
                    mas_subsubnavi_id: $('#cmbSubSubNavigation').val(),
                    mas_form_name: $('#txtName').val(),
                    mas_form_remark: $('#txtRemarks').val(),
                    mas_form_status: $('input[name="txtActive"]:checked').val(),
                },
                function(result) {
                    if (result != '') {
                        swal(
                          'Update Successfully',
                          'Saved',
                          'success'
                        );
                        // $('#inventorymasternewdetailpage').show();
                        $('#showid').html(result);
                        window.location.replace('<?php echo base_url(); ?>Forms');
                    } else {
                        swal({
                              type: 'error',
                              title: 'Error',
                              text: 'Please add items first...',
                              timer: 5000
                            });
                    }
                });
        });


    $('#btnBack').click(function() {
       window.location.replace('<?php echo base_url(); ?>Forms');
    });

   	$('#mdbtnEdit').click(function() {
        window.location.replace('<?php echo base_url(); ?>Forms/edit/' + $('#mdlblId').html());
    });


    $(function() {
        $(".context-menu-wh").contextMenu({
            selector: 'td',
            callback: function(key, options) {
                var content = key;
                var row = options.$trigger.closest("tr").find('td:not(:empty):first').text();
                // alert("You clicked on: " + row);
                if (content == "edit") {
                    window.location.replace('<?php echo base_url(); ?>Forms/edit/' + $(this).closest('tr').find('td:eq(0)').text().trim());
                } else if (content == "view") {
                    $('#exampleModalLong').modal('show');
                    $('#mdlblId').html($(this).closest('tr').find('td:eq(0)').text());
                    // $('#mdlblCode').html($(this).closest('tr').find('td:eq(1)').text());
                    $('#mdlblName').html($(this).closest('tr').find('td:eq(2)').text());
                    $('#mdlblVehicleModel').html($(this).closest('tr').find('td:eq(1)').text());
                    $('#mdlblRemarks').html($(this).closest('tr').find('td:eq(3)').text());
                }
            },
            items: {
                "edit": {
                    name: "Edit"
                },
                "view": {
                    name: "View"
                },

            }
        });
    });


</script>