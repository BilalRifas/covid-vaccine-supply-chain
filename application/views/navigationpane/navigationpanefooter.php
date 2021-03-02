<script type="text/javascript">
    
    $(document).ready( function () {
    // $('#fresh-table').DataTable({"order": [[ 0, "desc" ]]});

    $.post('<?php echo base_url(); ?>Navigationpane/getNavigationpane', {

                                            },
                                            function(result){
                                                var obj1 = $.parseJSON(result);
                                                var count1 = obj1.length;
                                                var status = "";
                                                var subenable = "";
                                                $("#navigationtable tbody").empty();
                                                for(var i = 0; i < count1; i++) {

                                                if (obj1[i].mas_navi_status == '1') {
                                                    status = "Yes";
                                                }else{
                                                    status = "No";
                                                }

                                                if (obj1[i].mas_navi_subenable == '1') {
                                                    subenable = "Yes";
                                                }else{
                                                    subenable = "No";
                                                }
                                                 

                                        $("#navigationtable tbody").append('<tr><td hidden>' + obj1[i].mas_navi_id + '</td><td hidden>' + obj1[i].mas_compmdls_id + '</td><td>' + obj1[i].mas_compmdls_description + '</td><td>' + obj1[i].mas_navi_name + '</td><td>' + obj1[i].mas_navi_controller + '</td><td>' + obj1[i].mas_navi_description + '</td><td>' + subenable + '</td><td>' + status + '</td><td><fieldset id="checkarray"><button id="removeNav" type="button" name="removeNav" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button></fieldset></td></tr>');
                                                }

                                    });
    $.post('<?php echo base_url(); ?>Navigationpane/getSubNavigationpane', {

                                            },
                                            function(result){
                                                var obj1 = $.parseJSON(result);
                                                var count1 = obj1.length;
                                                var status = "";
                                                var subenable = "";
                                                $("#subnavigationtable tbody").empty();
                                                for(var i = 0; i < count1; i++) {

                                                if (obj1[i].mas_subnavi_status == '1') {
                                                    status = "Yes";
                                                }else{
                                                    status = "No";
                                                }

                                                if (obj1[i].mas_subnavi_subenable == '1') {
                                                    subenable = "Yes";
                                                }else{
                                                    subenable = "No";
                                                }
                                                 

                                        $("#subnavigationtable tbody").append('<tr><td hidden>' + obj1[i].mas_subnavi_id + '</td><td hidden>' + obj1[i].mas_navi_id + '</td><td>' + obj1[i].mas_navi_name + '</td><td>' + obj1[i].mas_subnavi_name + '</td><td>' + obj1[i].mas_subnavi_controller + '</td><td>' + obj1[i].mas_subnavi_description + '</td><td>' + subenable + '</td><td>' + status + '</td><td><fieldset id="checkarray"><button id="removeNavSub" type="button" name="removeNavSub" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button></fieldset></td></tr>');
                                                }

                                    });
    $.post('<?php echo base_url(); ?>Navigationpane/getSubSubNavigationpane', {

                                            },
                                            function(result){
                                                var obj1 = $.parseJSON(result);
                                                var count1 = obj1.length;
                                                var status = "";
                                                $("#subsubnavigationtable tbody").empty();
                                                for(var i = 0; i < count1; i++) {

                                                if (obj1[i].mas_subsubnavi_status == '1') {
                                                    status = "Yes";
                                                }else{
                                                    status = "No";
                                                }
                                                 

                                        $("#subsubnavigationtable tbody").append('<tr><td hidden>' + obj1[i].mas_subsubnavi_id + '</td><td hidden>' + obj1[i].mas_subnavi_id + '</td><td>' + obj1[i].mas_subnavi_name + '</td><td>' + obj1[i].mas_subsubnavi_name + '</td><td>' + obj1[i].mas_subsubnavi_controller + '</td><td>' + obj1[i].mas_subsubnavi_description + '</td><td>' + status + '</td><td><fieldset id="checkarray"><button id="removeNavSubSub" type="button" name="removeNavSubSub" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button></fieldset></td></tr>');
                                                }

                                    });
});

	$('#btnNavigationSave').click(function() {
        if ($('#cmbCompanyModules').val() == "-1" || $('#txtName').val() == "" ) {
            swal({
                type: 'error',
                title: 'Error',
                text: 'Please fill all the required fields...',
                timer: 5000
            });
        } else {
            $.post('<?php echo base_url(); ?>Navigationpane/addNavigation', {

                    mas_compmdls_id: $('#cmbCompanyModules').val(),
                    mas_navi_name: $('#txtName').val(),
                    mas_navi_controller: $('#txtController').val(),
                    mas_navi_description: $('#txtDescription').val(),
                    mas_navi_status: $('input[name="txtActiveradioCustom"]:checked').val(),
                    mas_navi_subenable: $('input[name="txtSubEnable"]:checked').val()
                },
                function(result) {

                        swal(
                          'Successfully',
                          'Saved',
                          'success'
                        );

                        $('#cmbCompanyModules').val("-1");
                        $('#txtName').val("");
                        $('#txtController').val("");
                        $('#txtDescription').val("");
                        $.post('<?php echo base_url(); ?>Navigationpane/getNavigationpane', {

                                            },
                                            function(result){
                                                var obj1 = $.parseJSON(result);
                                                var count1 = obj1.length;
                                                var status = "";
                                                var subenable = "";
                                                $("#navigationtable tbody").empty();
                                                for(var i = 0; i < count1; i++) {

                                                if (obj1[i].mas_navi_status == '1') {
                                                    status = "Yes";
                                                }else{
                                                    status = "No";
                                                }

                                                if (obj1[i].mas_navi_subenable == '1') {
                                                    subenable = "Yes";
                                                }else{
                                                    subenable = "No";
                                                }
                                                 

                                        $("#navigationtable tbody").append('<tr><td hidden>' + obj1[i].mas_navi_id + '</td><td hidden>' + obj1[i].mas_compmdls_id + '</td><td>' + obj1[i].mas_compmdls_description + '</td><td>' + obj1[i].mas_navi_name + '</td><td>' + obj1[i].mas_navi_controller + '</td><td>' + obj1[i].mas_navi_description + '</td><td>' + subenable + '</td><td>' + status + '</td><td><fieldset id="checkarray"><button id="removeNav" type="button" name="removeNav" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button></fieldset></td></tr>');
                                                }

                                    });

                });
        }
            
        });


    $('#navigationtable').on('click', '#removeNav', function() {

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

                        $.post('<?php echo base_url(); ?>Navigationpane/removeNavigation', {
                                mas_navi_id: $(this).closest('tr').find('td:eq(0)').text().trim()
                            },
                            function(result) {

                            });
                        $('#exampleModalLong1').modal('hide');
                            $(this).closest('tr').remove();
                        }
                });
                                

    });


    $('#btnSubNavigationSave').click(function() {
        if ($('#cmbNavigation').val() == "-1" || $('#txtSubName').val() == "" ) {
            swal({
                type: 'error',
                title: 'Error',
                text: 'Please fill all the required fields...',
                timer: 5000
            });
        } else {
            $.post('<?php echo base_url(); ?>Navigationpane/addSubNavigation', {

                    mas_navi_id: $('#cmbNavigation').val(),
                    mas_subnavi_name: $('#txtSubName').val(),
                    mas_subnavi_controller: $('#txtControllerSub').val(),
                    mas_subnavi_description: $('#txtDescriptionSub').val(),
                    mas_subnavi_status: $('input[name="txtActiveSub"]:checked').val(),
                    mas_subnavi_subenable: $('input[name="txtSubEnableSub"]:checked').val()
                },
                function(result) {

                        swal(
                          'Successfully',
                          'Saved',
                          'success'
                        );

                        $('#cmbNavigation').val("-1");
                        $('#txtSubName').val("");
                        $('#txtControllerSub').val("");
                        $('#txtDescriptionSub').val("");

                        $.post('<?php echo base_url(); ?>Navigationpane/getSubNavigationpane', {

                                            },
                                            function(result){
                                                var obj1 = $.parseJSON(result);
                                                var count1 = obj1.length;
                                                var status = "";
                                                var subenable = "";
                                                $("#subnavigationtable tbody").empty();
                                                for(var i = 0; i < count1; i++) {

                                                if (obj1[i].mas_subnavi_status == '1') {
                                                    status = "Yes";
                                                }else{
                                                    status = "No";
                                                }

                                                if (obj1[i].mas_subnavi_subenable == '1') {
                                                    subenable = "Yes";
                                                }else{
                                                    subenable = "No";
                                                }
                                                 

                                        $("#subnavigationtable tbody").append('<tr><td hidden>' + obj1[i].mas_subnavi_id + '</td><td hidden>' + obj1[i].mas_navi_id + '</td><td>' + obj1[i].mas_navi_name + '</td><td>' + obj1[i].mas_subnavi_name + '</td><td>' + obj1[i].mas_subnavi_controller + '</td><td>' + obj1[i].mas_subnavi_description + '</td><td>' + subenable + '</td><td>' + status + '</td><td><fieldset id="checkarray"><button id="removeNavSub" type="button" name="removeNavSub" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button></fieldset></td></tr>');
                                                }

                                    });

                });
        }
            
        });

        $('#subnavigationtable').on('click', '#removeNavSub', function() {
            
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

                        $.post('<?php echo base_url(); ?>Navigationpane/removeSubNavigation', {
                                mas_subnavi_id: $(this).closest('tr').find('td:eq(0)').text().trim()
                            },
                            function(result) {

                            });
                        $('#exampleModalLong2').modal('hide');
                            $(this).closest('tr').remove();
                        }
                });
                                

    });


    $('#btnSubSubNavigationSave').click(function() {
        if ($('#cmbSubNavigation').val() == "-1" || $('#txtSubSubName').val() == "" ) {
            swal({
                type: 'error',
                title: 'Error',
                text: 'Please fill all the required fields...',
                timer: 5000
            });
        } else {
            $.post('<?php echo base_url(); ?>Navigationpane/addSubSubNavigation', {

                    mas_subnavi_id: $('#cmbSubNavigation').val(),
                    mas_subsubnavi_name: $('#txtSubSubName').val(),
                    mas_subsubnavi_controller: $('#txtControllerSubSub').val(),
                    mas_subsubnavi_description: $('#txtDescriptionSubSub').val(),
                    mas_subsubnavi_status: $('input[name="txtActiveSubSub"]:checked').val()
                },
                function(result) {

                        swal(
                          'Successfully',
                          'Saved',
                          'success'
                        );

                        $('#cmbSubNavigation').val("-1");
                        $('#txtSubSubName').val("");
                        $('#txtControllerSubSub').val("");
                        $('#txtDescriptionSubSub').val("");

                        $.post('<?php echo base_url(); ?>Navigationpane/getSubSubNavigationpane', {

                                            },
                                            function(result){
                                                var obj1 = $.parseJSON(result);
                                                var count1 = obj1.length;
                                                var status = "";
                                                $("#subsubnavigationtable tbody").empty();
                                                for(var i = 0; i < count1; i++) {

                                                if (obj1[i].mas_subsubnavi_status == '1') {
                                                    status = "Yes";
                                                }else{
                                                    status = "No";
                                                }
                                                 

                                        $("#subsubnavigationtable tbody").append('<tr><td hidden>' + obj1[i].mas_subsubnavi_id + '</td><td hidden>' + obj1[i].mas_subnavi_id + '</td><td>' + obj1[i].mas_subnavi_name + '</td><td>' + obj1[i].mas_subsubnavi_name + '</td><td>' + obj1[i].mas_subsubnavi_controller + '</td><td>' + obj1[i].mas_subsubnavi_description + '</td><td>' + status + '</td><td><fieldset id="checkarray"><button id="removeNavSubSub" type="button" name="removeNavSubSub" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button></fieldset></td></tr>');
                                                }

                                    });

                });
        }
            
        });

        $('#subsubnavigationtable').on('click', '#removeNavSubSub', function() {
            
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

                        $.post('<?php echo base_url(); ?>Navigationpane/removeSubSubNavigation', {
                                mas_subsubnavi_id: $(this).closest('tr').find('td:eq(0)').text().trim()
                            },
                            function(result) {

                            });
                        $('#exampleModalLong3').modal('hide');
                            $(this).closest('tr').remove();
                        }
                });
                                

    });


    $(document).on("click","#navigationtable tr",function() {
        $('#exampleModalLong1').modal('show');
                    $('#mas_navi_id').html($(this).closest('tr').find('td:eq(0)').text());
                    $('#cmid1').html($(this).closest('tr').find('td:eq(2)').text());
                    $('#name1').html($(this).closest('tr').find('td:eq(3)').text());
                    $('#cname1').html($(this).closest('tr').find('td:eq(4)').text());
                    $('#description1').html($(this).closest('tr').find('td:eq(5)').text());
                    $('#subenable1').html($(this).closest('tr').find('td:eq(6)').text());
                    $('#active1').html($(this).closest('tr').find('td:eq(7)').text());
                    $('#NaviName1').val($(this).closest('tr').find('td:eq(3)').text());
                    $('#CNaviName1').val($(this).closest('tr').find('td:eq(4)').text());
                    $('#NaviDescription').val($(this).closest('tr').find('td:eq(5)').text());
                    

    });

    $(document).on("click","#subnavigationtable tr",function() {
        $('#exampleModalLong2').modal('show');
                    $('#mas_subnavi_id').html($(this).closest('tr').find('td:eq(0)').text());
                    $('#navi2').html($(this).closest('tr').find('td:eq(2)').text());
                    $('#subname2').html($(this).closest('tr').find('td:eq(3)').text());
                    $('#cname2').html($(this).closest('tr').find('td:eq(4)').text());
                    $('#description2').html($(this).closest('tr').find('td:eq(5)').text());
                    $('#subenable2').html($(this).closest('tr').find('td:eq(6)').text());
                    $('#active2').html($(this).closest('tr').find('td:eq(7)').text());
                    $('#NaviSubName2').val($(this).closest('tr').find('td:eq(3)').text());
                    $('#CNaviName2').val($(this).closest('tr').find('td:eq(4)').text());
                    $('#NaviSubDescription').val($(this).closest('tr').find('td:eq(5)').text());
                    

    });

    $(document).on("click","#subsubnavigationtable tr",function() {
        $('#exampleModalLong3').modal('show');
                    $('#mas_subsubnavi_id').html($(this).closest('tr').find('td:eq(0)').text());
                    $('#subnavi3').html($(this).closest('tr').find('td:eq(2)').text());
                    $('#subname3').html($(this).closest('tr').find('td:eq(3)').text());
                    $('#cname3').html($(this).closest('tr').find('td:eq(4)').text());
                    $('#description3').html($(this).closest('tr').find('td:eq(5)').text());
                    $('#active3').html($(this).closest('tr').find('td:eq(6)').text());
                    $('#NaviSubSubName3').val($(this).closest('tr').find('td:eq(3)').text());
                    $('#CNaviName3').val($(this).closest('tr').find('td:eq(4)').text());
                    $('#NaviSubSubDescription').val($(this).closest('tr').find('td:eq(5)').text());
                    

    });


    $('#btnUpdateNavi').click(function() {

        $.post('<?php echo base_url(); ?>Navigationpane/UpdateNavi', {
                    mas_navi_id: $('#mas_navi_id').html().trim(),
                    mas_navi_name: $('#NaviName1').val(),
                    mas_navi_controller: $('#CNaviName1').val(),
                    mas_navi_description: $('#NaviDescription').val()
                },
                function(result) {
                        swal(
                          'Update Successfully',
                          'Saved',
                          'success'
                        );
                        $.post('<?php echo base_url(); ?>Navigationpane/getNavigationpane', {

                                            },
                                            function(result){
                                                var obj1 = $.parseJSON(result);
                                                var count1 = obj1.length;
                                                var status = "";
                                                var subenable = "";
                                                $("#navigationtable tbody").empty();
                                                for(var i = 0; i < count1; i++) {

                                                if (obj1[i].mas_navi_status == '1') {
                                                    status = "Yes";
                                                }else{
                                                    status = "No";
                                                }

                                                if (obj1[i].mas_navi_subenable == '1') {
                                                    subenable = "Yes";
                                                }else{
                                                    subenable = "No";
                                                }
                                                 

                                        $("#navigationtable tbody").append('<tr><td hidden>' + obj1[i].mas_navi_id + '</td><td hidden>' + obj1[i].mas_compmdls_id + '</td><td>' + obj1[i].mas_compmdls_description + '</td><td>' + obj1[i].mas_navi_name + '</td><td>' + obj1[i].mas_navi_controller + '</td><td>' + obj1[i].mas_navi_description + '</td><td>' + subenable + '</td><td>' + status + '</td><td><fieldset id="checkarray"><button id="removeNav" type="button" name="removeNav" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button></fieldset></td></tr>');
                                                }

                                    });
                        $('#exampleModalLong1').modal('hide');
                });

    });

    $('#btnUpdateNaviSub').click(function() {
        $.post('<?php echo base_url(); ?>Navigationpane/UpdateNaviSub', {
                    mas_subnavi_id: $('#mas_subnavi_id').html().trim(),
                    mas_subnavi_name: $('#NaviSubName2').val(),
                    mas_subnavi_controller: $('#CNaviName2').val(),
                    mas_subnavi_description: $('#NaviSubDescription').val()
                },
                function(result) {
                        swal(
                          'Update Successfully',
                          'Saved',
                          'success'
                        );
                        $.post('<?php echo base_url(); ?>Navigationpane/getSubNavigationpane', {

                                            },
                                            function(result){
                                                var obj1 = $.parseJSON(result);
                                                var count1 = obj1.length;
                                                var status = "";
                                                var subenable = "";
                                                $("#subnavigationtable tbody").empty();
                                                for(var i = 0; i < count1; i++) {

                                                if (obj1[i].mas_subnavi_status == '1') {
                                                    status = "Yes";
                                                }else{
                                                    status = "No";
                                                }

                                                if (obj1[i].mas_subnavi_subenable == '1') {
                                                    subenable = "Yes";
                                                }else{
                                                    subenable = "No";
                                                }
                                                 

                                        $("#subnavigationtable tbody").append('<tr><td hidden>' + obj1[i].mas_subnavi_id + '</td><td hidden>' + obj1[i].mas_navi_id + '</td><td>' + obj1[i].mas_navi_name + '</td><td>' + obj1[i].mas_subnavi_name + '</td><td>' + obj1[i].mas_subnavi_controller + '</td><td>' + obj1[i].mas_subnavi_description + '</td><td>' + subenable + '</td><td>' + status + '</td><td><fieldset id="checkarray"><button id="removeNavSub" type="button" name="removeNavSub" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button></fieldset></td></tr>');
                                                }

                                    });
                        $('#exampleModalLong2').modal('hide');
                });
        
    });

    $('#btnUpdateNaviSubSub').click(function() {
        $.post('<?php echo base_url(); ?>Navigationpane/UpdateNaviSubSub', {
                    mas_subsubnavi_id: $('#mas_subsubnavi_id').html().trim(),
                    mas_subsubnavi_name: $('#NaviSubSubName3').val(),
                    mas_subsubnavi_controller: $('#CNaviName3').val(),
                    mas_subsubnavi_description: $('#NaviSubSubDescription').val()
                },
                function(result) {
                        swal(
                          'Update Successfully',
                          'Saved',
                          'success'
                        );
                        $.post('<?php echo base_url(); ?>Navigationpane/getSubSubNavigationpane', {

                                            },
                                            function(result){
                                                var obj1 = $.parseJSON(result);
                                                var count1 = obj1.length;
                                                var status = "";
                                                $("#subsubnavigationtable tbody").empty();
                                                for(var i = 0; i < count1; i++) {

                                                if (obj1[i].mas_subsubnavi_status == '1') {
                                                    status = "Yes";
                                                }else{
                                                    status = "No";
                                                }
                                                 

                                        $("#subsubnavigationtable tbody").append('<tr><td hidden>' + obj1[i].mas_subsubnavi_id + '</td><td hidden>' + obj1[i].mas_subnavi_id + '</td><td>' + obj1[i].mas_subnavi_name + '</td><td>' + obj1[i].mas_subsubnavi_name + '</td><td>' + obj1[i].mas_subsubnavi_controller + '</td><td>' + obj1[i].mas_subsubnavi_description + '</td><td>' + status + '</td><td><fieldset id="checkarray"><button id="removeNavSubSub" type="button" name="removeNavSubSub" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button></fieldset></td></tr>');
                                                }

                                    });
                        $('#exampleModalLong3').modal('hide');
                });
        
    });



</script>