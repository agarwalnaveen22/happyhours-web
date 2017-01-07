<div id="page-content-wrapper">
    <section id="page-content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <section class="admin_wizard_step">
                        <h2 class="adm_wzard_title text-center">Companies that fill up Complete profile information stand to generate 3X more business</h2>
                        <div class="example-box-wrapper">
                            <div id="form-wizard-2" class="form-wizard">
                                <ul>
                                    <li class="tb_1 active open1">
                                        <a href="#step-1" data-toggle="tab">
                                            <label class="wizard-step"> <span class="inner_circle"> <img src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/image-resources/image-procurehere/right-mark.png" /> </span> </label>
                                            <span class="wizard-description">General Company Info </span> </a>
                                    </li>

                                    <li class="tb_2 open2">
                                        <a href="#step-2" data-toggle="tab">
                                            <label class="wizard-step"><span class="inner_circle"><span class="step_num">2</span> <img src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/image-resources/image-procurehere/right-mark.png" class="step_checkmark" /> </span>
                                            </label>
                                            <span class="wizard-description">Declaration </span> </a>
                                    </li>
                                    <li class="tb_3 open3">
                                        <a href="#step-3" data-toggle="tab">
                                            <label class="wizard-step"><span class="inner_circle"><span class="step_num">3</span> <img src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/image-resources/image-procurehere/right-mark.png" class="step_checkmark" /> </span>
                                            </label>
                                            <span class="wizard-description">Company Profile
                                                (Optional) </span> </a>
                                    </li>


                                </ul>
                                <div class="tab-content">
                                    <form class="bordered-row" id="supplier-form"  onsubmit="return saveSupplierDetails()">
                                        <div class="tab-pane active" id="step-1">
                                            <div class="content-box float-left width-100">
                                                <h3 class="content-box-header">General Company Info <small class="sub_text">As an Administrator, you may view and edit information freely.</small> </h3>
                                                <div class="content-box-wrapper">
                                                    <div class="form-horizontal">
                                                        <h3 class="blue_form_sbtitle">Basic Information :</h3>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Company Name :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <input type="text" class="form-control" required name="data[SupplierDetail][company_name]" placeholder="ABC Company">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Company Registration Number :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <input type="text" class="form-control" name="data[SupplierDetail][company_registration_number]" required placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Company Bar Licence Number :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <input type="text" class="form-control" name="data[SupplierDetail][company_bar_licence_number]" required placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Company Category :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <select class="custom-select" required name="data[SupplierDetail][company_category_id]">
                                                                    <?php foreach ($supplierCompany as $categories) { ?>
                                                                        <option value="<?php echo $categories['CompanyCategory']['id']; ?>"><?php echo $categories['CompanyCategory']['name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Timings :</label>
                                                            <div class="col-sm-2 col-md-2">
                                                                <select class="custom-select" required name="data[SupplierDetail][day_to]">
                                                                    <?php foreach ($this->App->getDays() as $k=>$day) { ?>
                                                                        <option value="<?php echo $k; ?>"><?php echo $day; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div>To</div>
                                                            <div class="col-sm-2 col-md-2">
                                                                <select class="custom-select" required name="data[SupplierDetail][day_from]">
                                                                    <?php foreach ($this->App->getDays() as $k=>$day) { ?>
                                                                        <option value="<?php echo $k; ?>"><?php echo $day; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            
                                                            <div class="col-sm-2 col-md-2">
                                                                <select class="custom-select" required name="data[SupplierDetail][time_to]">
                                                                    <?php foreach ($this->App->getTime() as $k=>$day) { ?>
                                                                        <option value="<?php echo $k; ?>"><?php echo $day; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div>To</div>
                                                            <div class="col-sm-2 col-md-2">
                                                                <select class="custom-select" required name="data[SupplierDetail][time_from]">
                                                                    <?php foreach ($this->App->getTime() as $k=>$day) { ?>
                                                                        <option value="<?php echo $k; ?>"><?php echo $day; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Year Established :</label>
                                                            <div class="col-sm-6 col-md-2">
                                                                <select class="custom-select" required name="data[SupplierDetail][establishment_year]">
                                                                    <option value="">Year</option>
                                                                    <?php for ($i = 2016; $i >= 1980; $i--) { ?>
                                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Telephone Number :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <input type="number" class="form-control" name="data[SupplierDetail][landline_number]" required id="" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Mobile Number :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <input type="number" class="form-control" name="data[SupplierDetail][mobile]" required id="" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Fax Number :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <input type="text" class="form-control" name="data[SupplierDetail][fax]" id="" placeholder="">
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Company Website :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <input type="url" class="form-control" name="data[SupplierDetail][company_website]" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Company Email :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <input type="email" class="form-control" required name="data[SupplierDetail][company_email]" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Company Status :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <select class="custom-select" name="data[SupplierDetail][company_status_id]">
                                                                    <?php foreach ($supplierCompanyStatus as $status) { ?>
                                                                        <option value="<?php echo $status['CompanyStatus']['id']; ?>"><?php echo $status['CompanyStatus']['name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <h3 class="blue_form_sbtitle p_t20">Company Registered Address</h3>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Address Line 1 :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <input type="text" class="form-control" required name="data[SupplierDetail][address_1]" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Address Line 2 :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <input type="text" class="form-control" required name="data[SupplierDetail][address_2]" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">City/Town :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <input type="text" class="form-control" required name="data[SupplierDetail][city]" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">Country :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <select class="chosen-select" onchange="getStates(this.value)" required name="data[SupplierDetail][country_id]">
                                                                    <option value="">Select Country</option>
                                                                    <?php foreach ($countries as $country) { ?>
                                                                        <option value="<?php echo $country['Country']['id']; ?>" <?php echo ($country['Country']['id'] == 101) ? "selected" : ""; ?>><?php echo $country['Country']['name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-3 control-label">State :</label>
                                                            <div class="col-sm-6 col-md-5">
                                                                <select class="chosen-select state_id" required name="data[SupplierDetail][state_id]">
                                                                    <option value="">Select State</option>
                                                                    <?php foreach ($states as $state) { ?>
                                                                        <option value="<?php echo $state['State']['id']; ?>" <?php echo ($state['State']['id'] == 1) ? "selected" : ""; ?>><?php echo $state['State']['name']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-offset-3 col-sm-6 col-md-5">
                                                                <input type="hidden" id='supplierId' name="data[SupplierDetail][id]" value="" />
                                                                <button type="submit" class="btn btn-info ph_btn_midium hvr-pop hvr-rectangle-out submit" >Next</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="bordered-row" id="supplier-declare-form" onsubmit="return saveSupplierDeclarationDetails()">
                                        <div class="tab-pane" id="step-2">
                                            <div class="content-box">
                                                <h3 class="content-box-header">Declaration <small class="sub_text">As an Administrator, you may view and edit information freely.</small> </h3>
                                                <div class="content-box-wrapper">
                                                    <div class="step_3_content">
                                                        <p>Hereby confirm that the information provided in this form and attached herewith are true and accurate.</p>
                                                        <p>I / We hereby authorized Privasia Sdn Bhd and its representative to undertake further investigation or verify any information contained in this form or documents attached herewith with any related third party or us. In the event of changes details will be provided as soon as possible:</p>
                                                        <p>I / We authorized Privasia Sdn Bhd and its representatives to visit our premises/company and examine relevant documents and interview or refer to any related party. </p>
                                                        <div class="checkbox checkbox-info">
                                                            <label>
                                                                <div class="checker" id="uniform-inlineCheckbox110"> <span class="">
                                                                        <input type="checkbox" class="custom-checkbox" required id="inlineCheckbox110" name="data[SupplierDetail][declaration]">
                                                                        <i class="glyph-icon icon-check"></i></span> </div>
                                                                I have read and understood the terms in this Declaration
                                                            </label>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-6">
                                                                <div class="three_btn_group">
                                                                    <input type="hidden" id='supplierDeclareId' name="data[SupplierDetail][id]" value="" />
                                                                    <button type="submit" class="btn hvr-pop marg-none hvr-rectangle-out1 btn-black">Back</button>
                                                                    <button type="submit" class="btn btn-primary hvr-pop hvr-rectangle-out">Next</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form class="bordered-row" id="supplier-document-form" enctype="multipart/form-data" onsubmit="return saveSupplierDocumentDetails()">
                                        <div class="tab-pane" id="step-3">
                                            <div class="content-box">
                                                <h3 class="content-box-header">Company Profile (Optional) <small class="sub_text">As an Administrator, you may view and edit information freely.</small> </h3>
                                                <div class="content-box-wrapper">
                                                    <div class="row">
                                                        <p class="tip_wizard">It is advise to upload your documents in PDF Format</p>
                                                        <div class="col-xs-12 col-sm-6">
                                                            <section class="step4_form">
                                                                <h3 class="blue_form_sbtitle p_t20">Attach Company Profile</h3>
                                                                <div data-provides="fileinput" class="fileinput fileinput-new input-group">
                                                                    <div data-trigger="fileinput" class="form-control"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename show_name"></span> </div>
                                                                    <span class="input-group-addon btn btn-black btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                                        <input type="file" id="load_file" required name="data[SupplierDocument][profile]">
                                                                    </span> <a data-dismiss="fileinput" class="input-group-addon btn btn-default fileinput-exists" href="#">Remove</a> </div>
                                                                <div class="other_attachemts">
                                                                    <h3 class="blue_form_sbtitle p_t20">Attach Other Credentials</h3>
                                                                    <ul class="add_more_feture_ul"></ul>
                                                                    <div class="add_file_row">
                                                                        <div data-provides="fileinput" class="fileinput fileinput-new input-group">
                                                                            <div data-trigger="fileinput" class="form-control"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename show_name1"></span> </div>
                                                                            <span class="input-group-addon btn btn-black btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                                                <input type="file" id="load_file1" name="data[SupplierDocument][other]">
                                                                            </span> <a data-dismiss="fileinput" class="input-group-addon btn btn-default fileinput-exists" href="#">Remove</a> </div>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <button class="btn btn-lg btn-block up_btn btn-blue" onclick="fileUpload()" type="button">Upload</button>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <textarea class="form-control" rows="3" name="data[SupplierDetail][document_description]" placeholder="Description"></textarea>
                                                                    </div>

                                                                    <div class="three_btn_group">
                                                                        <input type="hidden" id='supplierPictureId' name="data[SupplierDetail][id]" value="" />
                                                                        <button type="submit" class="btn hvr-pop marg-none hvr-rectangle-out1 btn-black">Back</button>
                                                                        <button type="submit" class="btn btn-primary hvr-pop hvr-rectangle-out">Finish</button>
                                                                    </div>
                                                                </div>
                                                            </section>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
</div>

<!-- WIDGETS -->
<!-- Uniform -->
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


<!-- Theme layout -->
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/themes/admin/admin-registration-page.js"></script>


<script>
                                                                            $(document).ready(function () {


                                                                                /* this cod add plus minus icon to chekbox */
                                                                                /*$(".search_ul_1 [type=checkbox], .search_ul [type=checkbox]").each(function () {
                                                                                 if ($(this).parent('li').find('ul').length > 0) {
                                                                                 var htm = '<span class="nvigator"><i class="fa fa-minus" aria-hidden="true"></i></span>';
                                                                                 $(this).before(htm);
                                                                                 }
                                                                                 });
                                                                                 
                                                                                 
                                                                                 */


                                                                                $(document).on('click', '.nvigator', function () {

                                                                                    var obj1 = $(this);
                                                                                    var appenHtm = $(this).closest('li').find('ul');


                                                                                    if ($(obj1).find('i').hasClass('fa-plus')) {



                                                                                        $.ajax({
                                                                                            url: 'http://echo.jsontest.com/1/jaipur/2/rajasthan',
                                                                                            beforeSend: function () {

                                                                                                $(obj1).find('i').removeClass('fa-plus').addClass('fa-spinner');

                                                                                            },
                                                                                            success: function (obj) {
                                                                                                var htm = '';
                                                                                                $.each(obj, function (key, value) {
                                                                                                    htm += "<li ><input type='checkbox' name='industrycats[]' value=" + key + " ><span class='number tree_heading'>" + value + "</span></li>";

                                                                                                });


                                                                                                $(appenHtm).html('');
                                                                                                $(appenHtm).append(htm).hide();
                                                                                                $(obj1).parent('li').find('ul').slideToggle('slow');
                                                                                                $(obj1).find('i').removeClass('fa-plus fa-spinner').addClass('fa-minus');



                                                                                            },
                                                                                            error: function (e) {

                                                                                            }
                                                                                        });



                                                                                    } else {
                                                                                        $(obj1).parent('li').find('ul').slideToggle('slow');
                                                                                        $(obj1).find('i').removeClass('fa-minus').addClass('fa-plus');
                                                                                    }




                                                                                });



                                                                                $(document).on('click', 'input[type=checkbox]', function () {
                                                                                    //$(this).parent().find('li input[type=checkbox]').css("font-weight","bold");
                                                                                    $(this).parent().find('li input[type=checkbox]').prop('checked', $(this).is(':checked'));
                                                                                    var sibs = false;
                                                                                    $(this).closest('ul').children('li').each(function () {
                                                                                        if ($('input[type=checkbox]', this).is(':checked'))
                                                                                            sibs = true;
                                                                                    })
                                                                                    $(this).parents('ul').prev().prop('checked', sibs);
                                                                                });

                                                                                $(document).on('change', '.leftSideOfCheckbox input[type=checkbox]', function () {

                                                                                    $(this).closest('.chk_scroll_box').find('.rightSideOfCheckbox').html('');
                                                                                    $(this).closest('.leftSideOfCheckbox').find('input[type="checkbox"]:checked').each(function () {

                                                                                        var lbl = $(this).next('span').html();
                                                                                        var htmldata = '<div class="item" data-value="' + $(this).val() + '"><span class="remove-selected">×</span>' + lbl + '</div>';
                                                                                        $(this).closest('.chk_scroll_box').find('.rightSideOfCheckbox').append(htmldata);
                                                                                    });


                                                                                });



                                                                                $(document).delegate('.remove-selected', 'click', function () {
                                                                                    var deselVal = $(this).parent().attr('data-value');
                                                                                    $(this).parent().remove();
                                                                                    $('.leftSideOfCheckbox').find('input[type="checkbox"][value="' + deselVal + '"]').prop('checked', false);
                                                                                });





                                                                                $(document).on("change", "#load_file", function () {
                                                                                    $(".show_name").html($(this).val());
                                                                                    $(".up_btn").removeClass('btn-gray').addClass('btn-blue');
                                                                                });

                                                                                $(document).on("change", "#load_file1", function () {
                                                                                    $(".show_name1").html($(this).val());
                                                                                    $(".up_btn").removeClass('btn-gray').addClass('btn-blue');
                                                                                });




                                                                                /*END this code work for plus sign button to add text to next append*/



                                                                                /* call search fileter by this function */

                                                                                //searchFilter("search_textbox","search_ul");
                                                                                $(document).on('keyup change', '.search_textbox', function () {
                                                                                    var searchTerm = $(this).val();

                                                                                    $('.search_ul').removeHighlight();
                                                                                    if (searchTerm) {
                                                                                        $('.search_ul').highlight(searchTerm);
                                                                                    }
                                                                                });
                                                                                $(document).on('keyup change', '.search_textbox_1', function () {
                                                                                    var searchTerm = $(this).val();
                                                                                    $('.search_ul_1').removeHighlight();
                                                                                    if (searchTerm) {
                                                                                        $('.search_ul_1').highlight(searchTerm);
                                                                                    }
                                                                                });

                                                                            });
                                                                            $('#btnfinish').click(function () {
                                                                                var paths = location.pathname.split('/');
                                                                                paths[paths.length - 1] = 'index.html';
                                                                                location.pathname = paths.join('/');

                                                                           });

function getStates(id) {
        var request = $.ajax({
            url: apiUrl + "/Cities/getStates",
            method: "POST",
            data: $.param({id: id}),
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                var html = "";
                $.each(data.data, function (k, v) {
                    html += '<option value="' + k + '">' + v + '</option>';
                });
                $(".state_id").html(html);
                $(".state_id").trigger("chosen:updated");
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    } 
</script>


<style>
    .highlight {
        background-color: #fff34d;
        -moz-border-radius: 5px;
        /* FF1+ */
        -webkit-border-radius: 5px;
        /* Saf3-4 */
        border-radius: 5px;
        /* Opera 10.5, IE 9, Saf5, Chrome */
        -moz-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7);
        /* FF3.5+ */
        -webkit-box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7);
        /* Saf3.0+, Chrome */
        box-shadow: 0 1px 4px rgba(0, 0, 0, 0.7);
        /* Opera 10.5+, IE 9.0 */
    }

    .highlight {
        padding: 1px 1px;
        margin: 0 -4px;
    }

    .animated-search-filter > * {
        position: inherit !important;
    }

    .search_ul_1 li,
    .search_ul li {
        position: relative;
    }

    .nvigator {
        position: absolute;
        left: -14px;
        cursor: pointer;
    }
    /* this css work for plus added text */

    .add_more_feture_ul li {
        list-style: outside none none;
        padding: 5px 8px;
    }

    .add_more_feture_ul li a {
        float: right;
    }

    .add_more_feture_ul {
        padding-left: 8px;
    }
    /* this css work for plus added text */
</style>
</body>

</html>