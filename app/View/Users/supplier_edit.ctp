<div class="page animsition">

    <div class="page-content container-fluid">
        <div class="row">

            <div class="col-md-12">
                <!-- Panel Wizard Form Container -->
                <div class="panel" id="exampleWizardFormContainer">
                    <div class="panel-heading">
                        <h3 class="panel-title">Registration</h3>
                    </div>
                    <div class="panel-body">
                        <!-- Steps -->
                        <div class="pearls row">
                            <div id="generalTab" class="pearl current col-xs-4">
                                <div class="pearl-icon"><i class="icon wb-user" aria-hidden="true"></i></div>
                                <span class="pearl-title">General Company Info</span>
                            </div>
                            <div id="declarationTab" class="pearl col-xs-4">
                                <div class="pearl-icon"><i class="icon wb-check" aria-hidden="true"></i></div>
                                <span class="pearl-title">Company Profile</span>
                            </div>

                        </div>
                        <!-- End Steps -->
                        <!-- Wizard Content -->
                        <form class="wizard-content" id="supplier-form"  onsubmit="return saveSupplierDetails()">
                            <div class="wizard-pane active" role="tabpanel">
                                <div class="form-group">
                                    <label class="control-label" for="inputUserNameOne">Company Name :</label>
                                    <input type="text" class="form-control" <?php echo ($this->Session->read("Auth.User")['User']['role_id'] == 2) ? "disabled" : ""; ?> required value="<?php echo $supplierData['SupplierDetail']['company_name'] ?>" name="data[SupplierDetail][company_name]" placeholder="ABC Company">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Company Registration Number :</label>
                                    <input type="text" class="form-control" required <?php echo ($this->Session->read("Auth.User")['User']['role_id'] == 2) ? "disabled" : ""; ?> name="data[SupplierDetail][company_registration_number]" value="<?php echo $supplierData['SupplierDetail']['company_registration_number'] ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Company Bar Licence Number :</label>
                                    <input type="text" class="form-control" <?php echo ($this->Session->read("Auth.User")['User']['role_id'] == 2) ? "disabled" : ""; ?> value="<?php echo $supplierData['SupplierDetail']['company_bar_licence_number'] ?>" name="data[SupplierDetail][company_bar_licence_number]" required placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Company Category :</label>
                                    <select class="form-control" required name="data[SupplierDetail][company_category_id]" >
                                        <?php foreach ($supplierCompany as $categories) { ?>
                                            <option value="<?php echo $categories['CompanyCategory']['id']; ?>" <?php echo ($categories['CompanyCategory']['id'] == $supplierData['SupplierDetail']['company_category_id']) ? "selected" : ""; ?>><?php echo $categories['CompanyCategory']['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="inputPasswordOne">Timings :</label>
                                    <select class="form-control" required name="data[SupplierDetail][day_to]">
                                        <?php foreach ($this->App->getDays() as $k => $day) { ?>
                                            <option value="<?php echo $k; ?>" <?php echo ($k == $supplierData['SupplierDetail']['day_to']) ? "selected" : ""; ?>><?php echo $day; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="inputPasswordOne">To :</label>
                                    <select class="form-control" required name="data[SupplierDetail][day_from]">
                                        <?php foreach ($this->App->getDays() as $k => $day) { ?>
                                            <option value="<?php echo $k; ?>" <?php echo ($k == $supplierData['SupplierDetail']['day_from']) ? "selected" : ""; ?>><?php echo $day; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="inputPasswordOne">From :</label>
                                    <select class="form-control" required name="data[SupplierDetail][time_to]">
                                        <?php foreach ($this->App->getTime() as $k => $day) { ?>
                                            <option value="<?php echo $k; ?>" <?php echo ($k == $supplierData['SupplierDetail']['time_to']) ? "selected" : ""; ?>><?php echo $day; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="control-label" for="inputPasswordOne">To :</label>
                                    <select class="form-control" required name="data[SupplierDetail][time_from]">
                                        <?php foreach ($this->App->getTime() as $k => $day) { ?>
                                            <option value="<?php echo $k; ?>" <?php echo ($k == $supplierData['SupplierDetail']['time_from']) ? "selected" : ""; ?>><?php echo $day; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Year Established :</label>
                                    <select class="form-control" required name="data[SupplierDetail][establishment_year]">
                                        <option value="">Year</option>
                                        <?php for ($i = 2016; $i >= 1980; $i--) { ?>
                                            <option value="<?php echo $i; ?>" <?php echo ($i == $supplierData['SupplierDetail']['establishment_year']) ? "selected" : ""; ?>><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Telephone Number :</label>
                                    <input type="number" class="form-control" value="<?php echo $supplierData['SupplierDetail']['landline_number']; ?>" name="data[SupplierDetail][landline_number]" required id="" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Mobile Number :</label>
                                    <input type="number" class="form-control" name="data[SupplierDetail][mobile]" value="<?php echo $supplierData['SupplierDetail']['mobile']; ?>" required id="" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Fax Number :</label>
                                    <input type="text" class="form-control" name="data[SupplierDetail][fax]" value="<?php echo $supplierData['SupplierDetail']['fax']; ?>" id="" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Company Website :</label>
                                    <input type="url" class="form-control" name="data[SupplierDetail][company_website]" value="<?php echo $supplierData['SupplierDetail']['company_website']; ?>" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Company Email :</label>
                                    <input type="email" class="form-control" required name="data[SupplierDetail][company_email]" value="<?php echo $supplierData['SupplierDetail']['company_email']; ?>" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Company Status :</label>
                                    <select class="form-control" name="data[SupplierDetail][company_status_id]">
                                        <?php foreach ($supplierCompanyStatus as $status) { ?>
                                            <option value="<?php echo $status['CompanyStatus']['id']; ?>" <?php echo ($status['CompanyStatus']['id'] == $supplierData['SupplierDetail']['company_status_id']) ? "selected" : ""; ?>><?php echo $status['CompanyStatus']['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <h3 class="panel-title">Company Registered Address</h3>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Address Line 1 :</label>
                                    <input type="text" class="form-control" required name="data[SupplierDetail][address_1]" value="<?php echo $supplierData['SupplierDetail']['address_1']; ?>" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Address Line 2 :</label>
                                    <input type="text" class="form-control" required name="data[SupplierDetail][address_2]" value="<?php echo $supplierData['SupplierDetail']['address_2']; ?>" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">City/Town :</label>
                                    <input type="text" class="form-control" required name="data[SupplierDetail][city]" value="<?php echo $supplierData['SupplierDetail']['city']; ?>" placeholder="">
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Country :</label>
                                    <select class="form-control" onchange="getStates(this.value)" required name="data[SupplierDetail][country_id]">
                                        <option value="">Select Country</option>
                                        <?php foreach ($countries as $country) { ?>
                                            <option value="<?php echo $country['Country']['id']; ?>" <?php echo ($country['Country']['id'] == $supplierData['SupplierDetail']['country_id']) ? "selected" : ""; ?>><?php echo $country['Country']['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">State :</label>
                                    <select class="form-control state_id" required name="data[SupplierDetail][state_id]">
                                        <option value="">Select State</option>
                                        <?php foreach ($states as $state) { ?>
                                            <option value="<?php echo $state['State']['id']; ?>" <?php echo ($state['State']['id'] == $supplierData['SupplierDetail']['state_id']) ? "selected" : ""; ?>><?php echo $state['State']['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>


                                <div class="text-right">
                                    <input type="hidden" id='supplierId' name="data[SupplierDetail][id]" value="<?php echo $supplierData['SupplierDetail']['id']; ?>" />
                                    <button type="submit" class="btn btn-primary" id="validateButton2">Next</button>
                                </div>
                            </div>


                        </form>

                        <form style="display:none" method="post" class="wizard-content" id="supplier-declare-form" enctype="multipart/form-data" onsubmit="return saveSupplierEditDocumentDetails()">
                            <p class="tip_wizard">It is advise to upload your documents in PDF Format</p>
                            <h3 class="panel-title">Attach Company Profile</h3>
                            <div class="form-group col-md-6">
                                <div class="input-group input-group-file">
                                    <input type="text" class="form-control" readonly="">
                                    <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" id="load_file" required name="data[SupplierDocument][profile]">
                                        </span>
                                    </span>
                                </div>
                                <div class="setages">
                                    <?php foreach ($supplierData['SupplierDocument'] as $documents) { ?>
                                        <?php if ($documents['file_type_id'] == 1) { ?>
                                            <img style="width:100px;height:100px" src="<?php echo Configure::read('App.baseUrl') . "/uploads/" . $documents['converted_name']; ?>" />
                                        <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <div style="clear:both"></div>
                            <div class="other_attachemts form-group col-md-6">
                                <h3 class="panel-title">Attach Other Credentials</h3>
                                <div class="input-group input-group-file">

                                    <input type="text" class="form-control" readonly="">
                                    <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" id="load_file1" name="data[SupplierDocument][other]">
                                        </span>
                                        <!--button type="button" class="btn btn-danger btn-outline">Remove</button-->

                                    </span>
                                </div>
                                <ul class="add_more_feture_ul">
                                    <?php foreach ($supplierData['SupplierDocument'] as $documents) { ?>
                                        <?php if ($documents['file_type_id'] == 2) { ?>
                                            <li id='<?php echo $documents['id']; ?>'>
                                            <lable><?php echo $documents['original_name']; ?></lable>
                                            <a onclick='removeImage("<?php echo $documents['id']; ?>")' href='javascript:void(0);'>
                                                <img src='<?php echo Configure::read('App.baseUrl'); ?>/img/black-xross.png' alt='feature image'>
                                            </a>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>

                            </div>
                            <div style="clear:both"></div>
                            <div class="form-group">
                                <button class="btn btn-success" onclick="fileUpload()" type="button">Upload</button>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control" rows="3" name="data[SupplierDetail][document_description]" placeholder="Description"><?php echo $supplierData['SupplierDetail']['document_description']; ?></textarea>
                            </div>

                            <div class="three_btn_group">
                                <input type="hidden" id='supplierPictureId' name="data[SupplierDetail][id]" value="<?php echo $supplierData['SupplierDetail']['id']; ?>" />
                                <button type="button" class="btn hvr-pop marg-none hvr-rectangle-out1 btn-black">Back</button>
                                <button type="submit" class="btn btn-primary hvr-pop hvr-rectangle-out">Finish</button>
                            </div>
                    </div>
                    </form>
                    <!-- Wizard Content -->
                </div>
            </div>
            <!-- End Panel Wizard Form Container -->
        </div>
    </div>


</div>
</div>
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/themes/admin/admin-registration-page.js"></script>
<script>
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