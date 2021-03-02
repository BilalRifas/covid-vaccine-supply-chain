<script>

    $().ready(function() {
    $('#fresh-table').DataTable({"order": [[ 0, "desc" ]]});

    });
    
    $('#txtUsername').keyup(function() {
        //        alert('Done');
        $.post('<?php echo base_url(); ?>Users/check', {
                uid: $('#txtUsername').val()
            },
            function(result) {
                $('#feedback').html(result).show();
            });
    });

    function ch() {
        //        alert($('#form2-password').val().length);
        if ($('#form2-password').val().length >= '5') {
            //                alert('Done');
            $('#form2-password2').prop('disabled', false);
        } else {
            $('#form2-password2').val('');
            $('#form2-password2').prop('disabled', true);
        }
    }

    $(document).ready(function() {
        //        alert('Done');
        $('#userForm').on('submit', function(e) {
            if ($('#txtUsername').val() != "" && $('#txtemail').val() != "" && $('#feedback').html() != "Too short..." && $('#feedback').html() != "Not Available") {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo base_url(); ?>Users/insertuser",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function(result) {
                        $('#upload_image').html('<img src="<?php echo base_url(); ?>upload/' + result + '" alt="Profile Picture" style="width: 100px; height: 100px;"/>');
                        $('#showID').html(result);
                        $('#upload').hide();
                        $('#complete').show();
                        //                  window.location.replace('<?php echo base_url(); ?>Users');
                    }
                });
            }
        });
    });

       $('#btnUpdate').click(function() {
           $.post('<?php echo base_url(); ?>Users/updateUser', {
                   hid: $('#showID').html().trim(),
                   fname: $('#txtUsername').val(),
                   exp: $('#txtExpdate').val(),
                   emp: $('#cmbEmp').val(),
                   revcenter : $('#cmbRevenueCenter').val(),
                   remark: $('#txtRemarks').val(),
                   status: $('input[name=chkStatus]').val(),
                   allow: $('input[name=chkAllow]').val(),
                   extra: $('input[name=chkExtra]').val(),
                   pwconfirm: $('#txtPasswordConfim').val()
    
               },
               function(result) {

                swal(
                          'Update Successfully',
                          'Saved',
                          'success'
                        );
    
               });

           $.post('<?php echo base_url(); ?>Users/updateUserPic', {
    
                   hid: $('#showID').html().trim(),
                   file: document.getElementById('txtProfilepic').files[0].name
    
               },
               function(result) {

                alert('Done');
    
               });
       });

    $('#btnprm').click(function() {

        if ($('#showID').html().trim() != "") {
            $('#tblPermission tbody').empty();
            $('#cmbCmpanyModules').val('0');
            $('#myModal2').modal('show');
        } else {
            swal({
                type: 'error',
                title: 'Error',
                text: 'Please Save first.....',
                timer: 5000
            });
        }
    });

    $('#passwordpass').click(function() {
        if($('#form2-password').val() == $('#form2-password2').val()){
            $('#txtPasswordConfim').val($('#form2-password2').val());
            $('#myModal').modal('toggle');
        }else{
            swal({
                type: 'error',
                title: 'Error',
                text: 'Password unmatched.....',
                timer: 5000
            });
        }
    });

    $('#cmbCmpanyModules').change(function() {

        $.post('<?php echo base_url(); ?>Users/getgroupforms', {

                mas_user_id: $('#showID').html().trim(),
                mas_compmdls_id: $('#cmbCmpanyModules').val()
            },
            function(result) {
                $('#tblPermission tbody').empty();
                var obj = $.parseJSON(result);
                var length = obj.length;
                for (var i = 0; i < length; i++) {

                    $('#tblPermission tbody').append('<tr><td hidden>' + obj[i].mas_form_id + '</td><td><input type="checkbox" id="chkSave" name="chkSave[]" class="checkbox-template" style="margin-left:30px" checked></td><td>' + obj[i].mas_form_name + '</td><td><select class="form-control sltax" id="cmbLevel'+ obj[i].mas_form_id +'" name="cmbLevel"></select></td></tr>');

                    $.post('<?php echo base_url(); ?>Users/getgrouplevels', {

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

    $('#btnSavemd').click(function() {

        $('#tblPermission').find("input[type='checkbox']:checked").each(function(index) {
            var firstval = $(this).closest('tr').find('td:eq(1)').text();
            $.post('<?php echo base_url(); ?>Users/savePermission', {
                    uid: $('#showID').html().trim(),
                    fid: $(this).closest('tr').find('td:eq(0)').text().trim(),
                    levelid: $('#cmbLevel' + $(this).closest('tr').find('td:eq(0)').text().trim()).val()

                },
                function(result) {
                    $.post('<?php echo base_url(); ?>Users/getUserPermission', {

                            mas_user_id: $('#showID').html().trim()
                        },
                        function(result) {
                            var obj = $.parseJSON(result);
                            var length = obj.length;
                            $('#roomsview1 tbody').empty();
                            for (var i = 0; i < length; i++) {
                                $('#roomsview1 tbody').append('<tr><td hidden>' + obj[i].trn_usergroup_id + '</td><td>' + obj[i].mas_ugroup_name + '</td><td>' + obj[i].mas_form_name + '</td><td>' + obj[i].mas_userlevel_name + ' - ' + obj[i].mas_userlevel_remark + '</td><td hidden>' + obj[i].mas_userlevel_id + '</td><td><button id="removeUPermission" type="button" name="removeUPermission" class="btn btn-danger btn-fill btn-xs" >X</button><button id="editdetailsUP" type="button" name="editdetailsUP" class="btn btn-warning btn-fill btn-sm" style="margin-left: 5px;">Edit</button></td></tr>');
                            }
                        });
                    $('#myModal2').modal('hide');
                });
        });

                    swal(
                          'Successfully',
                          'Saved',
                          'success'
                        );

    });

    $('#complete').click(function() {
        window.location.replace('<?php echo base_url(); ?>Users');
    });

    $('#btnBack').click(function() {
        window.location.replace('<?php echo base_url(); ?>Users');
    });

    $('#fresh-table').on('click', '#btnView', function() {
        $('#mdlblId').html($(this).closest('tr').find('td:eq(0)').text());
        $('#mdlblUsername').html($(this).closest('tr').find('td:eq(1)').text());
        $('#mdlblExpireDate').html($(this).closest('tr').find('td:eq(2)').text());
        $('#mdlblStatus').html($(this).closest('tr').find('td:eq(3)').text());
        $('#mdlblCreatedDate').html($(this).closest('tr').find('td:eq(4)').text());
        $('#exampleModalLong10').modal('show');

        $.post('<?php echo base_url(); ?>Users/getItemDetails', {
                            rno: $(this).closest('tr').find('td:eq(0)').text().trim()

                        },
                        function(result) {
                            var obj = $.parseJSON(result);
                            var length = obj.length;
                            $('#mdItems tbody').empty();
                            for (var i = 0; i < length; i++) {
                                $('#mdItems tbody').append('<tr><td hidden>' + obj[i].trn_usergroup_id + '</td><td>' + obj[i].mas_ugroup_name + '</td><td>' + obj[i].mas_form_name + '</td><td>' + obj[i].mas_userlevel_name + ' - ' + obj[i].mas_userlevel_remark + '</td></tr>');
                            }
                        });


    });

    $('#roomsview1').on('click', '#editdetailsUP', function() {
        // alert('Done');
         $('#cmbUserLevel').val($(this).closest('tr').find('td:eq(4)').text().trim());
         $('#myModal1').modal('show');          

    });

    $(function() {
        $(".context-menu-users").contextMenu({
            selector: 'td',
            callback: function(key, options) {
                var content = key;
                var row = options.$trigger.closest("tr").find('td:not(:empty):first').text();
                // alert("You clicked on: " + row);
                if (content == "deactive") {
                    document.cookie = "value = " + row;
                    // document.getElementById("menu").innerHTML='';
                    swal({
                        title: 'Deactivate ' + $(this).closest('tr').find('td:eq(1)').text().trim(),
                        text: "Do wish to continue?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.value) {
                            $.post('<?php echo base_url(); ?>Users/userStatus', {
                                    uid: $(this).closest('tr').find('td:eq(0)').text().trim(),
                                    status: '0'
                                },
                                function(result) {
                                    window.location.replace('<?php echo base_url(); ?>Users');
                                });
                            //                            alert($(this).closest('tr').find('td:eq(0)').text().trim());
                        } else {
                            window.location.replace('<?php echo base_url(); ?>Users');
                        }
                    });
                } else if (content == "expdate") {
                    document.cookie = "value = " + row;
                    // document.getElementById("menu").innerHTML='';
                    $('#usernameshow2').html($(this).closest('tr').find('td:eq(0)').text().trim());
                    $('#usernameshow3').html(' | ' + $(this).closest('tr').find('td:eq(1)').text().trim());
                    $('#cexpiredate').html($(this).closest('tr').find('td:eq(2)').text().trim());
                    $('#myModal3').modal('show');
                } else if (content == "active") {
                    document.cookie = "value = " + row;
                    // document.getElementById("menu").innerHTML='';
                    swal({
                        title: 'Activate ' + $(this).closest('tr').find('td:eq(1)').text().trim(),
                        text: "Do wish to continue?",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No'
                    }).then((result) => {
                        if (result.value) {
                            $.post('<?php echo base_url(); ?>Users/userStatus', {
                                    uid: $(this).closest('tr').find('td:eq(0)').text().trim(),
                                    status: '1'
                                },
                                function(result) {
                                    window.location.replace('<?php echo base_url(); ?>Users');
                                });
                            //                            alert($(this).closest('tr').find('td:eq(0)').text().trim());
                        } else {
                            window.location.replace('<?php echo base_url(); ?>Users');
                        }
                    });
                }else if (content == "edit" ) {
                    
                    window.location.replace('<?php echo base_url(); ?>Users/edit/' + $(this).closest('tr').find('td:eq(0)').text().trim());
                }
            },
            items: {
                "edit": {
                    name: "Edit"
                },
                "sep2": "--------",

                "active": {
                    name: "Active"
                },
                "deactive": {
                    name: "Deactive"
                },

                "sep1": "--------",
                "view": {
                    name: "View"
                },
                "expdate": {
                    name: "Change Expire Date"
                },
            }
        });
    });

    $('#btnUpdateExpireDate').click(function() {
//        alert($('#txteedate2').val());
        $.post('<?php echo base_url(); ?>Users/expireDate', {
                uid: $('#usernameshow2').html().trim(),
                expiredate: $('#txteedate2').val()
            },
            function(result) {
                window.location.replace('<?php echo base_url(); ?>Users');
            });
    });


    $('#roomsview1').on('click', '#removeUPermission', function() {
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


                $.post('<?php echo base_url(); ?>Users/removeUPermission', {
                        trn_usergroup_id: $(this).closest('tr').find('td:eq(0)').text().trim()
                    },
                    function(result) {


                    });
                
                $(this).closest('tr').remove();
                }
                });
                        

            });

</script>
