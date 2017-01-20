<div class="page animsition">

    <div class="page-content container-fluid">
        <div class="row">

            <div class="col-md-12">
                <!-- Panel Wizard Form Container -->
                <div class="panel" id="exampleWizardFormContainer">
                    <div class="panel-heading">
                        <h3 class="panel-title">Users</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'add');
                        if ($isPermit) {
                            ?>
                            <h3 class="panel-title">Add User</h3>
                            <!-- Wizard Content -->
                            <form class="wizard-content" id="supplier-deal" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Role :</label>
                                    <select class="form-control" required name="data[User][role_id]">
                                        <option value="">Select Role</option>
                                        <?php foreach ($roles as $k => $c) { ?>
                                            <option value="<?php echo $k; ?>"><?php echo $c; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Email :</label>
                                    <input required name="data[User][email]" type="email" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Password :</label>
                                    <input type="password" required name="data[User][password]" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">First Name :</label>
                                    <input type="text" required name="data[UserDetail][first_name]" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Last Name :</label>
                                    <input type="text" required name="data[UserDetail][last_name]" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Phone :</label>
                                    <input type="number" required name="data[UserDetail][phone]" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Country :</label>
                                    <select class="form-control" onchange="getStates(this.value)" required name="data[UserDetail][country_id]">
                                        <option value="">Select Country</option>
                                        <?php foreach ($countries as $k => $c) { ?>
                                            <option value="<?php echo $k; ?>"><?php echo $c; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">State :</label>
                                    <select class="form-control state_id" onchange="getCities(this.value)" required name="data[UserDetail][state_id]">
                                        <option value="">Select State</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">City :</label>
                                    <select class="form-control city_id" required name="data[UserDetail][city_id]">
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Address :</label>
                                    <textarea required name="data[UserDetail][address]" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Postal Code :</label>
                                    <input type="number" required name="data[UserDetail][postal_code]" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">User Image :</label>
                                    <div class="input-group input-group-file">
                                        <input type="text" class="form-control" readonly="">
                                        <span class="input-group-btn">
                                            <span class="btn btn-success btn-file">
                                                <i class="icon wb-upload" aria-hidden="true"></i>
                                                <input type="file" id="image" required name="data[UserDetail][profile_picture]">
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary" id="validateButton2">Save</button>
                                </div>

                            </form>


                        <?php } ?>

                    </div>


                    <!-- Wizard Content -->

                </div>
                <!-- End Panel Wizard Form Container -->
            </div>
        </div>


    </div>
</div>

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
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }


    function getCities(id) {
        var request = $.ajax({
            url: apiUrl + "/Townships/getCities",
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
                $(".city_id").html(html);
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }

</script>