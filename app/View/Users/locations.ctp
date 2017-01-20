<div class="page animsition">

    <div class="page-content container-fluid">
        <div class="row">

            <div class="col-md-12">
                <!-- Panel Wizard Form Container -->
                <div class="panel" id="exampleWizardFormContainer">
                    <div class="panel-heading">
                        <h3 class="panel-title">Locations</h3>
                    </div>
                    <div class="panel-body">
                        <?php
                        $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'locations_1');
                        if ($isPermit) {
                            ?>
                            <!-- Wizard Content -->
                            <form class="wizard-content" method="post" id="supplier-location" onsubmit="return saveLocation()">
                                <?php if ($this->Session->read("Auth.User")['User']['role_id'] == 1) { ?>
                                    <div class="form-group">
                                        <label class="control-label" for="inputUserNameOne">Supplier :</label>
                                        <select class="form-control supplier_detail_id" required name="data[Location][supplier_detail_id]">
                                            <option value="">Select Supplier</option>
                                            <?php foreach ($suppliers as $key => $supplier) { ?>
                                                <option value="<?php echo $key; ?>"><?php echo $supplier ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <?php } ?>
                                <div class="form-group">
                                    <label class="control-label" for="inputUserNameOne">Country :</label>
                                    <select name="data[Location][country_id]" onchange="getStates(this.value)" required class="form-control country_id">
                                        <option value="">Select Country</option>
                                        <?php foreach ($countries as $key => $country) { ?>
                                            <option value="<?php echo $key; ?>" <?php echo ($key == 132) ? "selected" : ""; ?>><?php echo $country ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="inputUserNameOne">State :</label>
                                    <select name="data[Location][state_id]"  required class="form-control state_id">
                                        <option value="">Select State</option>
                                        <?php foreach ($states as $key => $state) { ?>
                                            <option value="<?php echo $key; ?>"><?php echo $state ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">City :</label>
                                    <input type="text" id="city" name="data[Location][city]" required class="form-control" />
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Address :</label>
                                    <textarea type="text" required id="address" name="data[Location][address]" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="control-label" for="inputPasswordOne">Landmark :</label>
                                    <input type="text" required id="landmark" onFocus="geolocate()" name="data[Location][landmark]" class="form-control" />
                                    <input type="hidden" id="lat" name="data[Location][lat]" class="form-control" />
                                    <input type="hidden" id="lng" name="data[Location][lng]" class="form-control" />
                                </div>

                                <div class="text-right">
                                    <input type="hidden" name="data[Location][id]" id="campaignId" value="" />
                                    <button type="submit" class="btn btn-primary" id="validateButton2">Save</button>
                                </div>

                            </form>


                        <?php } ?>

                    </div>
                    <?php
                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'locations');
                    if ($isPermit) {
                        ?>
                        <div class="panel-body">
                            <table id="campaignList" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Supplier</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>Landmark</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($locations as $location) { ?>
                                        <tr>
                                            <td><?php echo $location['SupplierDetail']['company_name']; ?></td>
                                            <td><?php echo $this->App->getCountryName($location['Location']['country_id']); ?></td>
                                            <td><?php echo $this->App->getStateName($location['Location']['state_id']); ?></td>
                                            <td><?php echo $location['Location']['city']; ?></td>
                                            <td><?php echo $location['Location']['address']; ?></td>
                                            <td><?php echo $location['Location']['landmark']; ?></td>
                                            <td>
                                                <?php
                                                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'locations_2');
                                                if ($isPermit) {
                                                    ?>
                                                    <a href="javascript:" onclick="editLocation('<?php echo AppController::encryption($location['Location']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit1.png" /></a>&nbsp;&nbsp;
                                                <?php } ?>
                                                <?php
                                                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'locationDelete');
                                                if ($isPermit) {
                                                    ?>
                                                    <a href="javascript:" onclick="deleteLocation('<?php echo AppController::encryption($location['Location']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/delete1.png" /></a>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdt5_vaOGl9w8dXD0aEpjxhBPe9mBB0Qo&libraries=places&callback=initAutocomplete" async defer></script>
<!-- Bootstrap Datepicker -->
<script>
                                            function initAutocomplete() {
                                                // Create the autocomplete object, restricting the search to geographical
                                                // location types.
                                                autocomplete = new google.maps.places.Autocomplete(
                                                        /** @type {!HTMLInputElement} */(document.getElementById('landmark')),
                                                        {types: ['geocode']});

                                                autocomplete.addListener('place_changed', fillInAddress);
                                            }

                                            function fillInAddress() {
                                                // Get the place details from the autocomplete object.
                                                var place = autocomplete.getPlace();

                                                console.log(place);
                                                console.log(JSON.stringify(place));
                                                console.log("lat: " + place.geometry.location.lat() + " lng: " + place.geometry.location.lng())
                                                $("#lat").val(place.geometry.location.lat());
                                                $("#lng").val(place.geometry.location.lng());
                                            }

                                            function geolocate() {
                                                if (navigator.geolocation) {
                                                    navigator.geolocation.getCurrentPosition(function (position) {
                                                        var geolocation = {
                                                            lat: position.coords.latitude,
                                                            lng: position.coords.longitude
                                                        };
                                                        var circle = new google.maps.Circle({
                                                            center: geolocation,
                                                            radius: position.coords.accuracy
                                                        });
                                                        autocomplete.setBounds(circle.getBounds());
                                                    });
                                                }
                                            }

                                            function getStates(id, sid) {
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
                                                        if(sid!=undefined){
                                                            $(".state_id").val(sid);
                                                        }
                                                    } else {
                                                        alert(data.message);
                                                    }
                                                });

                                                request.fail(function (jqXHR, textStatus) {
                                                    alert("Request failed: " + textStatus);

                                                });
                                            }

                                            function saveLocation() {
                                                var request = $.ajax({
                                                    url: apiUrl + "/users/locations",
                                                    method: "POST",
                                                    data: $("#supplier-location").serialize(),
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

                                            function editLocation(id) {
                                                var request = $.ajax({
                                                    url: apiUrl + "/users/locations/" + id,
                                                    method: "GET",
                                                    dataType: "json"
                                                });

                                                request.done(function (data) {
                                                    if (data.status) {
                                                        $(".supplier_detail_id").val(data.data.Location.supplier_detail_id);
                                                        $(".country_id").val(data.data.Location.country_id);
                                                        getStates(data.data.Location.country_id,data.data.Location.state_id)
                                                        
                                                        $("#city").val(data.data.Location.city);
                                                        $("#address").val(data.data.Location.address);
                                                        $("#address").val(data.data.Location.address);
                                                        $("#landmark").val(data.data.Location.landmark);
                                                        $("#lat").val(data.data.Location.lat);
                                                        $("#lng").val(data.data.Location.lng);
                                                        $("#campaignId").val(data.data.Location.id);
                                                    } else {
                                                        alert(data.message);
                                                    }
                                                });

                                                request.fail(function (jqXHR, textStatus) {
                                                    alert("Request failed: " + textStatus);

                                                });
                                            }

                                            function deleteLocation(id) {
                                                $("#confirmDelete").attr("onclick", "confirmDelete('" + id + "')");
                                                $("#examplePositionTop").modal('show');

                                            }

                                            function confirmDelete(id) {
                                                var request = $.ajax({
                                                    url: apiUrl + "/users/locationDelete/" + id,
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