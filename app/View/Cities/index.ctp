<div class="page animsition">

    <div class="page-content container-fluid">
        <div class="row">

            <div class="col-md-12">
                <!-- Panel Wizard Form Container -->
                <div class="panel" id="exampleWizardFormContainer">
                    <div class="panel-heading">
                        <h3 class="panel-title">City</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'Cities', 'index_1');
                        if ($isPermit) {
                            ?>
                            <h3 class="panel-title">Add</h3>
                            <!-- Wizard Content -->
                            <form class="wizard-content" method="post" id="supplier-product-category" onsubmit="return saveCity()">
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Country :</label>
                                    <select name="data[City][country_id]" onchange="getStates(this.value)"  required class="form-control country_id">
                                        <option value="">Select Country</option>
                                        <?php foreach ($countries as $key => $product) { ?>
                                            <option value="<?php echo $key; ?>"><?php echo $product ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">State :</label>
                                    <select name="data[City][state_id]"  required class="form-control state_id">
                                        <option value="">Select State</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Name (you can add multiple cities with comma seprated ex. jaipur,alwar) :</label>
                                    <textarea id="name" name="data[City][name]" required class="form-control"></textarea>
                                </div>

                                <div class="text-right">
                                    <input type="hidden" name="data[City][id]" id="campaignId" value="" />
                                    <button type="submit" class="btn btn-primary" id="validateButton2">Save</button>
                                </div>

                            </form>


                        <?php } ?>

                    </div>
                    <?php
                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'Cities', 'index');
                    if ($isPermit) {
                        ?>
                        <div class="panel-body">
                            <table id="campaignList" class="table table-striped table-bordered border-right-left" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($products as $product) { ?>
                                        <tr>
                                            <td><?php echo $product['State']['Country']['name']; ?></td>
                                            <td><?php echo $product['State']['name']; ?></td>
                                            <td><?php echo $product['City']['name']; ?></td>
                                            <td>
                                                <?php
                                                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'Cities', 'index_2');
                                                if ($isPermit) {
                                                    ?>
                                                    <a href="javascript:" onclick="editCity('<?php echo AppController::encryption($product['City']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit1.png" /></a>&nbsp;&nbsp;
                                                <?php } ?>
                                                <?php
                                                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'Cities', 'cityDelete');
                                                if ($isPermit) {
                                                    ?>
                                                    <a href="javascript:" onclick="deleteCity('<?php echo AppController::encryption($product['City']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/delete1.png" /></a>
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
    function saveCity() {
        var request = $.ajax({
            url: apiUrl + "/Cities/index",
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

    function editCity(id) {
        var request = $.ajax({
            url: apiUrl + "/Cities/index/" + id,
            method: "GET",
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                var request = $.ajax({
                    url: apiUrl + "/Cities/getStates",
                    method: "POST",
                    data: $.param({id: data.data.State.country_id}),
                    dataType: "json"
                });

                request.done(function (data1) {
                    if (data1.status) {
                        var html = "";
                        $.each(data1.data, function (k, v) {
                            html += '<option value="' + k + '">' + v + '</option>';
                        });
                        $(".state_id").html(html);
                        $(".country_id").val(data.data.State.country_id);
                        $(".state_id").val(data.data.City.state_id);
                        $("#name").val(data.data.City.name);
                        $("#campaignId").val(data.data.City.id);
                    } else {
                        alert(data1.message);
                    }
                });

                request.fail(function (jqXHR, textStatus) {
                    alert("Request failed: " + textStatus);

                });

            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }

    function deleteCity(id) {
        $("#confirmDelete").attr("onclick", "confirmDelete('" + id + "')");
        $("#examplePositionTop").modal('show');
    }

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
            url: apiUrl + "/Cities/cityDelete/" + id,
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