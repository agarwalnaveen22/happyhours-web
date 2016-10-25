<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container">
            <!-- pageging  block -->

            <ol class="breadcrumb">
                <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dashboard">Dashboard</a></li>
                <li class="active">Township</li>
            </ol>
            <section class="create_list_sectoin">
                <?php
                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'Townships', 'index_1');
                if ($isPermit) {
                    ?>
                    <div class="Section-title title_border gray-bg mar-b20">
                        <h2 class="trans-cap supplier">Add</h2>

                    </div>
                <?php } ?>





                <div class="tab-pane active">



                    <div class="tab-content">
                        <!-- <div class="heading-tab-pr">PR Detail</div>-->

                        <div class="tab-pane active marg-bottom-15" id="step-1">
                            <?php if ($isPermit) { ?>
                                <form method="post" id="supplier-product-category" onsubmit="return saveTownship()">
                                    <div class="upload_download_wrapper clearfix mar-t20 event_info">
                                        <h4>Township Details</h4>
                                        <div class="row">
                                            <div class="form-tander1 pad_all_15">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Country</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select name="data[Township][country_id]" onchange="getStates(this.value)"  required class="custom-select country_id">
                                                        <option value="">Select Country</option>
                                                        <?php foreach ($countries as $key => $product) { ?>
                                                            <option value="<?php echo $key; ?>"><?php echo $product ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-tander1 pad_all_15">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>State</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select name="data[Township][state_id]" onchange="getTownships(this.value)"  required class="custom-select state_id">
                                                        <option value="">Select State</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-tander1 pad_all_15">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>City</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select name="data[Township][city_id]"  required class="custom-select city_id">
                                                        <option value="">Select City</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-tander1 pad_all_15">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label style="line-height:20px;">Name (you can add multiple cities with comma seprated ex. jaipur,alwar)</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <textarea id="name" name="data[Township][name]" required class="form-control"></textarea>
                                                </div>
                                            </div>



                                        </div>

                                    </div>



                                    <div class="btn-next">
                                        <input type="hidden" name="data[Township][id]" id="campaignId" value="" />
                                        <button class="btn btn-info ph_btn marg-top-20 hvr-pop hvr-rectangle-out">Save</button>
                                    </div>

                                </form>
                            <?php } ?>
                            <?php
                            $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'Townships', 'index');
                            if ($isPermit) {
                                ?>
                                <table id="campaignList" class="table table-striped table-bordered border-right-left" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($products as $product) { ?>
                                            <tr>
                                                <td><?php echo $product['City']['State']['Country']['name']; ?></td>
                                                <td><?php echo $product['City']['State']['name']; ?></td>
                                                <td><?php echo $product['City']['name']; ?></td>
                                                <td><?php echo $product['Township']['name']; ?></td>
                                                <td>
                                                    <?php
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'Townships', 'index_2');
                                                    if ($isPermit) {
                                                        ?>
                                                        <a href="javascript:" onclick="editTownship('<?php echo AppController::encryption($product['Township']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit1.png" /></a>&nbsp;&nbsp;
                                                    <?php } ?>
                                                    <?php
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'Townships', 'townshipDelete');
                                                    if ($isPermit) {
                                                        ?>
                                                        <a href="javascript:" onclick="deleteTownship('<?php echo AppController::encryption($product['Township']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/delete1.png" /></a>
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




<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDAwyhHiHzIiINDQVi3o_79P34dTjA5NG0&libraries=places&callback=initAutocomplete" async defer></script>
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

    function saveTownship() {
        var request = $.ajax({
            url: apiUrl + "/Townships/index",
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

    function editTownship(id) {
        var request = $.ajax({
            url: apiUrl + "/Townships/index/" + id,
            method: "GET",
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                var request = $.ajax({
                    url: apiUrl + "/Cities/getStates",
                    method: "POST",
                    data: $.param({id: data.data.City.State.country_id}),
                    dataType: "json"
                });

                request.done(function (data1) {
                    if (data1.status) {
                        var html = "";
                        $.each(data1.data, function (k, v) {
                            html += '<option value="' + k + '">' + v + '</option>';
                        });
                        $(".state_id").html(html);
                        var request = $.ajax({
                            url: apiUrl + "/Townships/getCities",
                            method: "POST",
                            data: $.param({id: data.data.City.state_id}),
                            dataType: "json"
                        });

                        request.done(function (data2) {
                            if (data2.status) {
                                var html = "";
                                $.each(data2.data, function (k, v) {
                                    html += '<option value="' + k + '">' + v + '</option>';
                                });
                                $(".city_id").html(html);
                                $(".country_id").val(data.data.City.State.country_id);
                                $(".state_id").val(data.data.City.state_id);
                                $(".city_id").val(data.data.Township.city_id);
                                $("#name").val(data.data.Township.name);
                                $("#campaignId").val(data.data.Township.id);
                            } else {
                                alert(data.message);
                            }
                        });

                        request.fail(function (jqXHR, textStatus) {
                            alert("Request failed: " + textStatus);

                        });

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

    function deleteTownship(id) {
        if (showConfirm("Are you sure?")) {
            var request = $.ajax({
                url: apiUrl + "/Townships/townshipDelete/" + id,
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

    function getTownships(id) {
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






<style>

</style>



</body>

</html>