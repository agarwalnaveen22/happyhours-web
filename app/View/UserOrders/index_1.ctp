<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container">
            <!-- pageging  block -->

            <ol class="breadcrumb">
                <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dashboard">Dashboard</a></li>
                <li class="active">Order</li>
            </ol>
            <section class="create_list_sectoin">
                
                <div class="tab-pane active">



                    <div class="tab-content">
                        <!-- <div class="heading-tab-pr">PR Detail</div>-->

                        <div class="tab-pane active marg-bottom-15" id="step-1">
                            
                            <?php
                            $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'UserOrders', 'index');
                            if ($isPermit) {
                                ?>

                                <table id="campaignList" class="table table-striped table-bordered border-right-left" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>User Email</th>
                                            <th>Deal</th>
                                            <th>Transaction Amount</th>
                                            <th>Transaction Status</th>
                                            <th>Transaction ID</th>
                                            <th>Created</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($orders as $order) { ?>
                                            <tr>
                                                <td><?php echo $order['UserOrder']['id']; ?></td>
                                                <td><?php echo $order['User']['email']; ?></td>
                                                <td><?php echo $order['Deal']['name']; ?></td>
                                                <td><?php echo $order['UserOrder']['transaction_amount']; ?></td>
                                                <td><?php echo $this->App->getTransactionStatus($order['UserOrder']['transaction_status']); ?></td>
                                                <td><?php echo $order['UserOrder']['transaction_id']; ?></td>
                                                <td><?php echo $order['UserOrder']['created']; ?></td>
                                                <td>
                                                    <?php
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'UserOrders', 'ordersDelete');
                                                    if ($isPermit) {
                                                        ?>
                                                        <a href="javascript:" onclick="deleteUserOrder('<?php echo AppController::encryption($order['UserOrder']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/delete1.png" /></a>
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

    function saveUserOrder() {
        var request = $.ajax({
            url: apiUrl + "/UserOrders/index",
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

    function editUserOrder(id) {
        var request = $.ajax({
            url: apiUrl + "/UserOrders/index/" + id,
            method: "GET",
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                $("#name").val(data.data.UserOrder.name);
                $("#campaignId").val(data.data.UserOrder.id);
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }

    function deleteUserOrder(id) {
        if (showConfirm("Are you sure?")) {
            var request = $.ajax({
                url: apiUrl + "/UserOrders/ordersDelete/" + id,
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