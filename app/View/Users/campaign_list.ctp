<div class="page animsition">

    <div class="page-content container-fluid">
        <div class="row">

            <div class="col-md-12">
                <!-- Panel Wizard Form Container -->
                <div class="panel" id="exampleWizardFormContainer">
                    <div class="panel-heading">
                        <h3 class="panel-title">Campaigns</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'campaignList_1');
                        if ($isPermit) {
                            ?>
                            <h3 class="panel-title">Add Campaign</h3>
                            <!-- Wizard Content -->
                            <form class="wizard-content" method="post" id="supplier-campaign" onsubmit="return saveCampaign()">
                                <?php if ($this->Session->read("Auth.User")['User']['role_id'] == 1) { ?>
                                    <div class="form-group">
                                        <label class="control-label" for="inputUserNameOne">Supplier :</label>
                                        <select class="form-control" required name="data[Campaign][supplier_detail_id]">
                                            <option value="">Select Supplier</option>
                                            <?php foreach ($suppliers as $key => $supplier) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $supplier ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Campaign Name :</label>
                                    <input type="text" name="data[Campaign][name]" id="name" required class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Campaign Start Date & Time :</label>
                                    <div class="input-daterange-wrap">
                                        <div class="input-daterange">
                                            <div class="input-group col-md-5 float-left">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="data[Campaign][start_date]" id="start_date" class="form-control datepair-date datepair-start" data-plugin="datepicker"/>
                                            </div>
                                            <div class="input-group col-md-5">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-time" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="data[Campaign][start_time]" id="start_time" class="form-control datepair-time datepair-start" data-plugin="timepicker"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Campaign End Date & Time :</label>
                                    <div class="input-daterange-wrap">
                                        <div class="input-daterange">
                                            <div class="input-group col-md-5 float-left">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-calendar" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="data[Campaign][end_date]" id="end_date" class="form-control datepair-date datepair-start" data-plugin="datepicker"/>
                                            </div>
                                            <div class="input-group col-md-5">
                                                <span class="input-group-addon">
                                                    <i class="icon wb-time" aria-hidden="true"></i>
                                                </span>
                                                <input type="text" name="data[Campaign][end_time]" id="end_time" class="form-control datepair-time datepair-start" data-plugin="timepicker"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Comment :</label>
                                    <textarea rows="5" name="data[Campaign][comment]" id="comment" class="form-control"></textarea>
                                </div>

                                <div class="text-right">
                                    <input type="hidden" name="data[Campaign][id]" id="campaignId" value="" />
                                    <button type="submit" class="btn btn-primary" id="validateButton2">Save</button>
                                </div>

                            </form>


                        <?php } ?>

                    </div>
                    <?php
                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'campaignList');
                    if ($isPermit) {
                        ?>
                        <div class="panel-body">
                            <table id="campaignList" class="table table-striped table-bordered border-right-left" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Supplier Name</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (!empty($campaignList)) {
                                        foreach ($campaignList as $campaign) {
                                            ?>
                                            <tr>
                                                <td><?php echo $campaign['Campaign']['name']; ?></td>
                                                <td><?php echo $campaign['SupplierDetail']['company_name']; ?></td>
                                                <td><?php echo $this->App->getDateTimeFormat($campaign['Campaign']['start_datetime']); ?></td>
                                                <td><?php echo $this->App->getDateTimeFormat($campaign['Campaign']['end_datetime']); ?></td>
                                                <td><?php echo $campaign['Campaign']['comment']; ?></td>
                                                <td>
                                                    <?php
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'campaignDetail');
                                                    if ($isPermit) {
                                                        ?>
                                                        <a href="javascript:" onclick="editCampaign('<?php echo AppController::encryption($campaign['Campaign']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit1.png" /></a>&nbsp;&nbsp;
                                                    <?php } ?>
                                                    <?php
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'campaignDelete');
                                                    if ($isPermit) {
                                                        ?>
                                                        <a href="javascript:" onclick="deleteCampaign('<?php echo AppController::encryption($campaign['Campaign']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/delete1.png" /></a>
            <?php } ?>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
<?php } ?>

                    <!-- Wizard Content -->

                </div>
                <!-- End Panel Wizard Form Container -->
            </div>
        </div>


    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="examplePositionTop" aria-hidden="true" aria-labelledby="examplePositionTop"
     role="dialog" tabindex="-1">
    <div class="modal-dialog modal-top">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="exampleModalTitle">Delete</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="confirmDelete" >Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->
<script>
    function saveCampaign() {
        var request = $.ajax({
            url: apiUrl + "/users/campaignList",
            method: "POST",
            data: $("#supplier-campaign").serialize(),
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                window.location.reload();
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
        return false;
    }

    function editCampaign(id) {
        var request = $.ajax({
            url: apiUrl + "/users/campaignDetail/" + id,
            method: "GET",
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                $(".supplier_detail_id").val(data.data.Campaign.supplier_detail_id);
                $("#name").val(data.data.Campaign.name);
                var sdate = data.data.Campaign.start_datetime.split(" ");
                var edate = data.data.Campaign.end_datetime.split(" ");
                $("#start_date").val(sdate[0]);
                $("#start_time").val(sdate[1]);
                $("#end_date").val(edate[0]);
                $("#end_time").val(edate[1]);
                $("#comment").val(data.data.Campaign.comment);
                $("#campaignId").val(data.data.Campaign.id);
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }

    function deleteCampaign(id) {
        $("#confirmDelete").attr("onclick","confirmDelete('"+id+"')");
        $("#examplePositionTop").modal('show');
        /*if (showConfirm("Are you sure?")) {
         var request = $.ajax({
         url: apiUrl + "/users/campaignDelete/" + id,
         method: "GET",
         dataType: "json"
         });
         
         request.done(function (data) {
         if (data.status) {
         window.location.reload();
         } else {
         alert(data.message);
         }
         });
         
         request.fail(function (jqXHR, textStatus) {
         alert("Request failed: " + textStatus);
         
         });
         }*/

    }

    function confirmDelete(id) {
        var request = $.ajax({
            url: apiUrl + "/users/campaignDelete/" + id,
            method: "GET",
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                window.location.reload();
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }
</script>