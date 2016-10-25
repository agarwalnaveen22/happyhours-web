<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li> <a href="<?php echo Configure::read('App.baseUrl'); ?>users/dashboard">Dashboard</a> </li>
                <li class="active"> Supplier Details</li>
            </ol>
            <!-- page title block -->

            <div class="Section-title title_border gray-bg">
                <h2 class="trans-cap progress-head">Supplier Details</h2>
            </div>

            <!-- page title block -->




            <div class="white-bg border-all-side float-left pad_all_15">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="tag-line">
                            <h2><?php echo $supplierData['SupplierDetail']['company_name']; ?></h2>
                            <p>Registration Number: <?php echo $supplierData['SupplierDetail']['company_registration_number']; ?></p>
                            <p>Bar Licence Number: <?php echo $supplierData['SupplierDetail']['company_bar_licence_number']; ?></p>
                            <p>Email : <?php echo $supplierData['SupplierDetail']['company_email']; ?></p>
                        </div>
                        <div class="print-down">
                            <?php /*<button class="print"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/print.png" /></button>
                            <button class="download"> <img src="<?php echo Configure::read('App.baseUrl'); ?>/images/download.png" /></button>*/ ?>
                            <a href="<?php echo Configure::read('App.baseUrl')."/users/supplierEdit/".AppController::encryption($supplierData['SupplierDetail']['id']); ?>" class="firstbtn"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit.png"/></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 pad0 float-left ">
                <div class="panel bgnone">
                    <div class="panel-body">
                        <div class="example-box-wrapper">
                            <div class="panel-group" id="accordion">
                                <div class="panel sum-accord">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Company Detail </a>
                                            <!--button class="firstbtn"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit.png"/></button-->
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body mega b-r-0">
                                            <table class="tabaccor padding-none-td" width="100%" cellpadding="0" cellspacing="0" border="0">
                                                <thead>
                                                    <tr>
                                                        <th>Corresponding Address</th>
                                                        <th>Other Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>


                                                    <tr>
                                                        <td> <?php echo $supplierData['SupplierDetail']['address_1']; ?>
                                                            <br> <?php echo $supplierData['SupplierDetail']['address_2']; ?>
                                                            <br> <?php echo $this->App->getCountryName($supplierData['SupplierDetail']['country_id']); ?>, <?php echo $this->App->getStateName($supplierData['SupplierDetail']['state_id']); ?>
                                                            <br> <?php echo $supplierData['SupplierDetail']['city']; ?> </td>
                                                        <td>Establishment Year: <?php echo $supplierData['SupplierDetail']['establishment_year']; ?>
                                                            <br> Landline: <?php echo $supplierData['SupplierDetail']['landline_number']; ?>
                                                            <br> Mobile: <?php echo $supplierData['SupplierDetail']['mobile']; ?>, Fax: <?php echo $supplierData['SupplierDetail']['fax']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td>Company Status: <?php echo $this->App->getCompanyStatusName($supplierData['SupplierDetail']['company_status_id']); ?>
                                                            <br> Category: <?php echo $this->App->getCompanyCategoryName($supplierData['SupplierDetail']['company_category_id']); ?>
                                                            <br> Webiste: <?php echo $supplierData['SupplierDetail']['company_website']; ?>
                                                            <br>Account-Type: <?php echo $this->App->getAccountTypeName($supplierData['SupplierDetail']['account_type_id']); ?></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel sum-accord">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> Documents </a> <!--button class="firstbtn"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit.png"/></button--> </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" style="display:block">
                                        <form id="documentForms" onsubmit="return verifyDocuments()">
                                            <div class="panel-body pad_all_15  border-bottom">
                                                <?php foreach ($supplierData['SupplierDocument'] as $documents) { ?>
                                                    <?php //$documents['FileType'] = $this->App->getFileType($documents['file_type_id']); ?>
                                                    <div class="main-panal-box-main comm-info">
                                                        <div class="main-panal-box">
                                                            <p>
                                                                <a href="<?php echo Configure::read('App.baseUrl') . "/uploads/" . $documents['converted_name']; ?>" target="_blank"><?php echo $documents['original_name']; ?></a>
                                                                
                                                                  
                                                                <input type="checkbox" <?php echo $documents['is_verified']==1?"checked":""; ?> name="document[][<?php echo $documents['id']; ?>]" />
                                                                      
                                                            
                                                            
                                                            </p>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                                <input type="hidden" name="supplier_id" value="<?php echo $supplierData['SupplierDetail']['id']; ?>" />
                                                <button class="btn btn-info ph_btn_midium hvr-pop hvr-rectangle-out">Verify</button>
                                            </div>
                                        </form>
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
<!-- Bootstrap Tooltip -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/tooltip/tooltip.js"></script>


<!-- WIDGETS -->
<!-- Uniform -->
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/uniform/uniform.js"></script>
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/uniform/uniform-demo.js"></script>
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/bootstrap/js/bootstrap.js"></script>

<!-- Superclick -->

<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/superclick/superclick.js"></script>

<!-- Chosen -->

<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/chosen/chosen.js"></script>
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/chosen/chosen-demo.js"></script>



<!-- Perfact scroll -->
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/perfect-scrollbar/js/perfect-scrollbar.min.js"></script>

<!-- Content box -->
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/content-box/contentbox.js"></script>


<!-- Morris charts demo -->
<!--<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/charts/morris/morris-demo.js"></script>-->

<!-- EQul height js-->
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/match-height/jquery.matchHeight.js"></script>
<!-- Theme layout -->
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/themes/admin/layout.js"></script>

<!-- PieGage -->

<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/charts/piegage/piegage.js"></script>
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/charts/piegage/piegage-demo.js"></script>

<!-- Morris charts -->

<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/js-core/raphael.js"></script>
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/charts/morris/morris.js"></script>
<script>
    function verifyDocuments() {
        //alert($("#documentForms").serialize());
        var request = $.ajax({
            url: apiUrl + "/users/supplierVerifyDocuments",
            method: "POST",
            data: $("#documentForms").serialize(),
            dataType: "json"
        });

        request.done(function (data) {
            alert(data.message);
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
        return false;
    }
</script>