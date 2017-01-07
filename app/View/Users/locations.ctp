<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container">
            <!-- pageging  block -->

            <ol class="breadcrumb">
                <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dashboard">Dashboard</a></li>
                <li class="active">Locations</li>
            </ol>
            <section class="create_list_sectoin">
                <?php
                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'locations_1');
                if ($isPermit) {
                    ?>
                <div class="Section-title title_border gray-bg mar-b20">
                    <h2 class="trans-cap supplier">Add Location</h2>

                </div>

                <?php } ?>




                <div class="tab-pane active">



                    <div class="tab-content">
                        <!-- <div class="heading-tab-pr">PR Detail</div>-->

                        <div class="tab-pane active marg-bottom-15" id="step-1">
                            <?php 
                                if($isPermit){
                            ?>
                            <form method="post" id="supplier-location" onsubmit="return saveLocation()">
                                <div class="upload_download_wrapper clearfix mar-t20 event_info">
                                    <h4>Location Details</h4>
                                    <div class="row">
                                        <?php if($this->Session->read("Auth.User")['User']['role_id']==1){ ?>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="col-sm-4 col-md-3 col-xs-6">
                                                <label>Supplier</label>
                                            </div>
                                            <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                <select name="data[Location][supplier_detail_id]" required class="custom-select supplier_detail_id">
                                                    <option value="">Select Supplier</option>
                                                    <?php foreach ($suppliers as $key => $supplier) { ?>
                                                        <option value="<?php echo $key; ?>"><?php echo $supplier ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="col-sm-4 col-md-3 col-xs-6">
                                                <label>Country</label>
                                            </div>
                                            <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                <select name="data[Location][country_id]"  required class="custom-select country_id">
                                                    <option value="">Select Country</option>
                                                    <?php foreach ($countries as $key => $country) { ?>
                                                        <option value="<?php echo $key; ?>" <?php echo ($key == 132) ? "selected" : ""; ?>><?php echo $country ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="col-sm-4 col-md-3 col-xs-6">
                                                <label>State</label>
                                            </div>
                                            <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                <select name="data[Location][state_id]"  required class="custom-select state_id">
                                                    <option value="">Select State</option>
                                                    <?php foreach ($states as $key => $state) { ?>
                                                        <option value="<?php echo $key; ?>"><?php echo $state ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-tander1 pad_all_15">
                                            <div class="col-sm-4 col-md-3 col-xs-6">
                                                <label>City</label>
                                            </div>
                                            <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                <input type="text" id="city" name="data[Location][city]" required class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-tander1 pad_all_15">
                                            <div class="col-sm-4 col-md-3 col-xs-6">
                                                <label>Address</label>
                                            </div>
                                            <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                <textarea type="text" required id="address" name="data[Location][address]" class="form-control"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-tander1 pad_all_15">
                                            <div class="col-sm-4 col-md-3 col-xs-6">
                                                <label>Landmark</label>
                                            </div>
                                            <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                <input type="text" required id="landmark" onFocus="geolocate()" name="data[Location][landmark]" class="form-control" />
                                                <input type="hidden" id="lat" name="data[Location][lat]" class="form-control" />
                                                <input type="hidden" id="lng" name="data[Location][lng]" class="form-control" />
                                            </div>
                                        </div>


                                    </div>

                                </div>



                                <div class="btn-next">
                                    <input type="hidden" name="data[Location][id]" id="campaignId" value="" />
                                    <button class="btn btn-info ph_btn marg-top-20 hvr-pop hvr-rectangle-out">Save</button>
                                </div>

                            </form>
                            <?php } ?>
                            <?php 
                                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'locations'); 
                                if($isPermit){
                            ?>
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
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'locations_2'); 
                                                    if($isPermit){
                                                ?>
                                                <a href="javascript:" onclick="editLocation('<?php echo AppController::encryption($location['Location']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit1.png" /></a>&nbsp;&nbsp;
                                                <?php } ?>
                                                <?php 
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'locationDelete'); 
                                                    if($isPermit){
                                                ?>
                                                <a href="javascript:" onclick="deleteLocation('<?php echo AppController::encryption($location['Location']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/delete1.png" /></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?php } ?>
                        </div>





                    </div>




                </div>


            </section>

        </div>
    </div>
</div>



</div>




<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnJfyD4Bljui621bUVXmmykNenAHxYiSw&libraries=places&callback=initAutocomplete" async defer></script>
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
</script>
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datatable/datatable-bootstrap.js"></script>


<!-- Google CDN jQuery with fallback to local -->

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
                                                $(document).ready(function () {


                                                    $('.column_button_bar').on('click', '#s1_tender_adddel_btn', function (event) {
                                                        event.preventDefault();
                                                        $('#add_delete_column').show();
                                                    });

                                                    $('.column_button_bar').on('click', '#s1_tender_additem_btn', function (event) {
                                                        event.preventDefault();
                                                        $('#creat_seaction_form').show();
                                                    });

                                                    $('.create_list_sectoin').on('click', '.bq_tender_addsub_item', function (event) {
                                                        event.preventDefault();
                                                        $('#creat_subitem_form').show();
                                                    });


                                                });
</script>
<script>
    $(document).ready(function () {
        $('#campaignList').DataTable();
        $("#campaignList_wrapper").attr("style", "margin-top:50px");
        $('.mega').on('scroll', function () {
            $('.header').css('top', $(this).scrollTop());
        });

        var availableTags = ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme"];
        $("#tags").autocomplete({
            source: availableTags
        });
        $("#tagres").autocomplete({
            source: availableTags
        });


        $.validate({
            lang: 'en'
        });



        $(".correction-ancher").click(function () {
            $(this).parent().parent().next(".correction-textarea").show('fast');
        });

        $(".correction-ancher").click(function () {
            $(this).parent().parent().hide('fast');
        });



    });

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
                $(".state_id").val(data.data.Location.state_id);
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
        if (showConfirm("Are you sure?")) {
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

    }
</script>






<style>

</style>



</body>

</html>