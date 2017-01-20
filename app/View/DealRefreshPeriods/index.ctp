<div class="page animsition">

    <div class="page-content container-fluid">
        <div class="row">

            <div class="col-md-12">
                <!-- Panel Wizard Form Container -->
                <div class="panel" id="exampleWizardFormContainer">
                    <div class="panel-heading">
                        <h3 class="panel-title">Deal Refresh Period</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'DealRefreshPeriods', 'index_1');
                        if ($isPermit) {
                            ?>
                            <h3 class="panel-title">Add</h3>
                            <!-- Wizard Content -->
                            <form class="wizard-content" method="post" id="supplier-product-category" onsubmit="return saveProductCategory()">
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Name :</label>
                                    <input type="text" id="name" name="data[DealRefreshPeriod][name]" required class="form-control" />
                                </div>

                                <div class="text-right">
                                    <input type="hidden" name="data[DealRefreshPeriod][id]" id="campaignId" value="" />
                                    <button type="submit" class="btn btn-primary" id="validateButton2">Save</button>
                                </div>

                            </form>


                        <?php } ?>

                    </div>
                    <?php
                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'DealRefreshPeriods', 'index');
                    if ($isPermit) {
                        ?>
                        <div class="panel-body">
                            <table id="campaignList" class="table table-striped table-bordered border-right-left" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($products as $product) { ?>
                                        <tr>
                                            <td><?php echo $product['DealRefreshPeriod']['name']; ?></td>
                                            <td>
                                                <?php
                                                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'DealRefreshPeriods', 'index_2');
                                                if ($isPermit) {
                                                    ?>
                                                    <a href="javascript:" onclick="editDealRefreshPeriod('<?php echo AppController::encryption($product['DealRefreshPeriod']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit1.png" /></a>&nbsp;&nbsp;
                                                <?php } ?>
                                                <?php
                                                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'DealRefreshPeriods', 'periodsDelete');
                                                if ($isPermit) {
                                                    ?>
                                                    <a href="javascript:" onclick="deleteDealRefreshPeriod('<?php echo AppController::encryption($product['DealRefreshPeriod']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/delete1.png" /></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
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
    function saveDealRefreshPeriod() {
        var request = $.ajax({
            url: apiUrl + "/DealRefreshPeriods/index",
            method: "POST",
            data: $("#supplier-product-category").serialize(),
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

    function editDealRefreshPeriod(id) {
        var request = $.ajax({
            url: apiUrl + "/DealRefreshPeriods/index/" + id,
            method: "GET",
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                $("#name").val(data.data.DealRefreshPeriod.name);
                $("#campaignId").val(data.data.DealRefreshPeriod.id);
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }

    function deleteDealRefreshPeriod(id) {
        $("#confirmDelete").attr("onclick", "confirmDelete('" + id + "')");
        $("#examplePositionTop").modal('show');
    }

    function confirmDelete(id) {
        var request = $.ajax({
            url: apiUrl + "/DealRefreshPeriods/periodsDelete/" + id,
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