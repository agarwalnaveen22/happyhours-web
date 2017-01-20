<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container">
            <!-- pageging  block -->

            <ol class="breadcrumb">
                <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/ProductCategories/dashboard">Dashboard</a></li>
                <li class="active">Product Categories</li>
            </ol>
            <section class="create_list_sectoin">
                <?php
                $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'ProductCategories', 'products_1');
                if ($isPermit) {
                    ?>
                    <div class="Section-title title_border gray-bg mar-b20">
                        <h2 class="trans-cap supplier">Add Category</h2>

                    </div>
                <?php } ?>




                <div class="tab-pane active">



                    <div class="tab-content">
                        <!-- <div class="heading-tab-pr">PR Detail</div>-->

                        <div class="tab-pane active marg-bottom-15" id="step-1">
                            <?php if ($isPermit) { ?>
                                <form method="post" id="supplier-product-category" onsubmit="return saveProductCategory()">
                                    <div class="upload_download_wrapper clearfix mar-t20 event_info">
                                        <h4>Product Category Details</h4>
                                        <div class="row">
                                            <div class="form-tander1 pad_all_15">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Parent Category</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <select name="data[ProductCategory][parent_id]"  required class="custom-select parent_id">
                                                        <option value="0">Root Category</option>
                                                        <?php foreach ($productList as $key => $product) { ?>
                                                            <option value="<?php echo $key; ?>"><?php echo $product ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-tander1 pad_all_15">
                                                <div class="col-sm-4 col-md-3 col-xs-6">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-sm-5 col-md-5 col-xs-6 col-xs-6">
                                                    <input type="text" id="name" name="data[ProductCategory][name]" required class="form-control" />
                                                </div>
                                            </div>



                                        </div>

                                    </div>



                                    <div class="btn-next">
                                        <input type="hidden" name="data[ProductCategory][id]" id="campaignId" value="" />
                                        <button class="btn btn-info ph_btn marg-top-20 hvr-pop hvr-rectangle-out">Save</button>
                                    </div>

                                </form>
                            <?php } ?>
                            <?php
                            $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'ProductCategories', 'products');
                            if ($isPermit) {
                                ?>
                                <table id="campaignList" class="table table-striped table-bordered border-right-left" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Parent Id</th>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($products as $product) { ?>
                                            <tr>
                                                <td><?php echo $product['ParentProductCategory']['name']; ?></td>
                                                <td><?php echo $product['ProductCategory']['name']; ?></td>
                                                <td>
                                                    <?php
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'ProductCategories', 'products_2');
                                                    if ($isPermit) {
                                                        ?>
                                                        <a href="javascript:" onclick="editProductCategory('<?php echo AppController::encryption($product['ProductCategory']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit1.png" /></a>&nbsp;&nbsp;
                                                    <?php } ?>
                                                    <?php
                                                    $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'ProductCategories', 'productsDelete');
                                                    if ($isPermit) {
                                                        ?>
                                                        <a href="javascript:" onclick="deleteProductCategory('<?php echo AppController::encryption($product['ProductCategory']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/delete1.png" /></a>
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

    function saveProductCategory() {
        var request = $.ajax({
            url: apiUrl + "/ProductCategories/products",
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

    function editProductCategory(id) {
        var request = $.ajax({
            url: apiUrl + "/ProductCategories/products/" + id,
            method: "GET",
            dataType: "json"
        });

        request.done(function (data) {
            if (data.status) {
                $(".parent_id").val(data.data.ProductCategory.parent_id);
                $("#name").val(data.data.ProductCategory.name);
                $("#campaignId").val(data.data.ProductCategory.id);
            } else {
                alert(data.message);
            }
        });

        request.fail(function (jqXHR, textStatus) {
            alert("Request failed: " + textStatus);

        });
    }

    function deleteProductCategory(id) {
        if (showConfirm("Are you sure?")) {
            var request = $.ajax({
                url: apiUrl + "/ProductCategories/productsDelete/" + id,
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