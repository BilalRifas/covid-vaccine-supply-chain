<script type="text/javascript">
    
    $().ready(function() {
    $('#fresh-table').DataTable({"order": [[ 0, "desc" ]]});

    });


       $('#btnUPHeadSave').click(function() {

        if ($('#txtFName').val()=='' || $('#txtAddress').val()=='' || $('#txtNIC').val()=='' || $('#txtMobile').val()=='') {
             swal({
                              type: 'error',
                              title: 'Error',
                              text: 'Please Fill all Required Fields...',
                              timer: 5000
                            });


        }else {

            $.post('<?php echo base_url(); ?>Userprofile/AddHeader', {
                    mas_emp_fname: $('#txtFName').val(),
                    mas_emp_sname: $('#txtSName').val(),
                    mas_emp_lname: $('#txtLName').val(),
                    mas_emp_dob: $('#txtDOB').val(),
                    mas_emp_address: $('#txtAddress').val(),
                    mas_emp_nicno: $('#txtNIC').val(),
                    mas_emp_telno: $('#txtTelephone').val(),
                    mas_emp_mobile: $('#txtMobile').val(),
                    mas_emp_type : $('#cmbUserGroup').val()
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
                        window.location.replace('<?php echo base_url(); ?>Userprofile');
                    } 
                });
                       
            }

            
        });

        $('#btnUPHeadUpdate').click(function() {
            $.post('<?php echo base_url(); ?>Userprofile/updateHeader', {
                    mas_emp_id: $('#showid').html().trim(),
                    mas_emp_fname: $('#txtFName').val(),
                    mas_emp_sname: $('#txtSName').val(),
                    mas_emp_lname: $('#txtLName').val(),
                    mas_emp_dob: $('#txtDOB').val(),
                    mas_emp_address: $('#txtAddress').val(),
                    mas_emp_nicno: $('#txtNIC').val(),
                    mas_emp_telno: $('#txtTelephone').val(),
                    mas_emp_mobile: $('#txtMobile').val(),
                    mas_emp_type : $('#cmbUserGroup').val()
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
                        window.location.replace('<?php echo base_url(); ?>Userprofile');
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
       window.location.replace('<?php echo base_url(); ?>Userprofile');
    });

   	$('#mdbtnEdit').click(function() {
        window.location.replace('<?php echo base_url(); ?>Userprofile/edit/' + $('#mdlblId').html());
    });


    $(function() {
        $(".context-menu-wh").contextMenu({
            selector: 'td',
            callback: function(key, options) {
                var content = key;
                var row = options.$trigger.closest("tr").find('td:not(:empty):first').text();
                // alert("You clicked on: " + row);
                if (content == "edit") {
                    window.location.replace('<?php echo base_url(); ?>Userprofile/edit/' + $(this).closest('tr').find('td:eq(0)').text());
                } else if (content == "view") {
                    $('#exampleModalLong').modal('show');
                    $('#mdlblId').html($(this).closest('tr').find('td:eq(0)').text());
                    // $('#mdlblCode').html($(this).closest('tr').find('td:eq(1)').text());
                    $('#mdlblName').html($(this).closest('tr').find('td:eq(2)').text());
                    $('#mdlblBrand').html($(this).closest('tr').find('td:eq(1)').text());
                    $('#mdlblRemarks').html($(this).closest('tr').find('td:eq(3)').text());
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



</script>