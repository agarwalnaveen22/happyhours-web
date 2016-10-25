<div id="page-content-wrapper">
    <div id="page-content">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="Index.html">Dashboard</a> </li>
                <li class="active">Supplier Registration Information</li>
            </ol>
            <!-- page title block -->
            <div class="page_title_wrapper marg-bottom-20">
                <h3 class="sub_title"><i class="glyph-icon icon-list-alt" aria-hidden="true"></i>&nbsp; Supplier Registration Information</h3>
            </div>
            <div class="Invited-Supplier-List import-supplier white-bg supplier_reg">
                <div class="import-supplier-inner-first pad_all_15" style="display: none;">
                    <div class="row marg-bottom-10">
                        <div class="col-md-3">
                            <label class="marg-top-10">Search in:</label>
                        </div>
                        <div class="col-md-3">
                            <div>
                                <select class="custom-select" name="">
                                    <option>Newest</option>
                                    <option>Oldest</option>
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="row marg-bottom-10">
                        <div class="col-md-3">
                            <label class="marg-top-10">Company Name:</label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" placeholder="Company Name">
                        </div>
                    </div>
                    <div class="row marg-bottom-10">
                        <div class="col-md-3">
                            <label class="marg-top-10">Company Registration Number :</label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" placeholder="Company Registration Number">
                        </div>
                    </div>
                    <div class="row marg-bottom-10">
                        <div class="col-md-3">
                            <label class="marg-top-10">Category Code:</label>
                        </div>


                        <div class="col-md-3">
                            <input class="form-control" type="text" placeholder="Category Code">
                        </div>
                        <div class="col-md-1 pad10">
                            <a href="#">
                                <img src="<?php echo Configure::read('App.baseUrl'); ?>/images/dot.png" /></a>
                        </div>

                    </div>
                    <div class="row marg-bottom-10">
                        <div class="col-md-3">
                            <label class="marg-top-10">Project Name :</label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" placeholder="Project Name">
                        </div>
                    </div>
                    <div class="row marg-bottom-10">
                        <div class="col-md-3">
                            <label class="marg-top-10">Project Name :</label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" placeholder="Project Name">
                        </div>
                    </div>
                    <div class="row marg-bottom-10">
                        <div class="col-md-3">
                            <label class="marg-top-10">CIDB Code :</label>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" placeholder="CIDB Code">
                        </div>
                        <div class="col-md-1 pad10">
                            <a href="#">
                                <img src="<?php echo Configure::read('App.baseUrl'); ?>/images/dot.png" /></a>
                        </div>
                    </div>
                    <div class="row marg-bottom-10">
                        <div class="col-md-3">
                            <label class="marg-top-10"></label>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary ph_btn">Search Supplier</button>



                            <button class="btn btn-black for-form-back ph_btn marg-left-10" href="#">Previous</button>
                        </div>
                    </div>

                </div>

                <div class="lower-bar-search-contant a_search">
                    <div class="lower-bar-search-contant-heading gray-up-bg">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="short-by">
                                    <input type="text" placeholder="Search..." class="form-control">
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-md-offset-3">
                                <div class="short-by">
                                    <label>Sort By</label>
                                    <div>
                                        <select class="custom-select">
                                            <option>Newest</option>
                                            <option>Older</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="short-by">
                                    <label>Account Status</label>
                                    <div>
                                        <select class="custom-select" name="">
                                            <option>Approved</option>
                                            <option>Pending</option>
                                            <option>Rejected</option>

                                        </select>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="lower-bar-search-contant-main white-bg pad_all_20 scroll_box_inner_search-box-main pad-t35">
                    <div>
                        <div class="row">
                            <?php foreach ($supplierList as $supplier) { ?>
                                <div class="col-md-4 marg-bottom-20 block-max-height">
                                    <div class="lower-bar-search-contant-main-block block-min-height">
                                        <div class="lower-bar-search-contant-main-block-heading light-gray-bg pad_all_10">
                                            <h4><?php echo $supplier['SupplierDetail']['company_name']; ?></h4>
                                            <span><?php echo $supplier['State']['name']; ?>, <?php echo $supplier['Country']['name']; ?></span>
                                        </div>

                                        <div class="lower-bar-search-contant-main-contant pad-top-side-10">
                                            <label>Year of Established : </label>
                                            <span><?php echo $supplier['SupplierDetail']['establishment_year']; ?></span>
                                        </div>
                                        <div class="lower-bar-search-contant-main-contant pad-top-side-5">
                                            <label>Company Email :</label>
                                            <span><?php echo $supplier['SupplierDetail']['company_email']; ?></span>
                                        </div>
                                        <div class="lower-bar-search-contant-main-contant pad-top-side-5">
                                            <label>Account Status :</label>
                                            <span class="green"><?php echo ($supplier['User']['status']==1)?'Active':'Deactive'; ?></span>
                                        </div>
                                        <div class="lower-bar-search-contant-main-contant pad-top-side-5">
                                            <label>Category :</label>
                                            <span><?php echo $this->App->getCompanyCategoryName($supplier['SupplierDetail']['company_category_id']); ?></span>
                                        </div>
                                        <div class="lower-bar-search-contant-main-contant  pad_all_10 buttons">
                                            <button class="btn btn-info btn-block approve <?php echo ($supplier['User']['is_verified']==1)?'disabled':''; ?> " id="approve<?php echo $supplier['SupplierDetail']['id']; ?>" onclick="approveSupplier('<?php echo $supplier['User']['id']; ?>', '<?php echo $supplier['SupplierDetail']['id']; ?>', 1)"><?php echo ($supplier['User']['is_verified']==1)?'Approved':'Approve'; ?></button>
                                            <button class="btn btn-black <?php echo ($supplier['User']['is_verified']==0)?'disabled':''; ?>  hvr-pop hvr-rectangle-out1" id="reject<?php echo $supplier['SupplierDetail']['id']; ?>" onclick="approveSupplier('<?php echo $supplier['User']['id']; ?>', '<?php echo $supplier['SupplierDetail']['id']; ?>', 0)"><?php echo ($supplier['User']['is_verified']==0)?'Rejected':'Reject'; ?></button>
                                        </div>
                                        <div class="dwonloadico">
                                            <a class=" btn-tooltip" title="" data-placement="top" data-toggle="tooltip" href="#" data-original-title="Download Profile">
                                                <!--img width="20" src="<?php echo Configure::read('App.baseUrl'); ?>/images/dwonload.png" alt="Profile image"--></a>
                                        </div>
                                        <div class="hover_black">
                                            <a href="<?php echo Configure::read('App.baseUrl')."/users/supplierView/".AppController::encryption($supplier['SupplierDetail']['id']); ?>" class="">KNOW MORE</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="approov1" role="dialog">
    <div class="modal-dialog for-delete-all reminder">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h3>Approve</h3>
                <button class="close for-absulate" type="button" data-dismiss="modal">×</button>
            </div>
            <div class="model_pop_mid">
                <form id="demo-form" class="bordered-row has-validation-callback">
                    <div class="sup_pop_row">
                        <div class="remark_text">Remarks</div>
                        <div class="remark_field"><textarea class="form-control"> </textarea><span class="sky-blue">Max 500 characters only</span></div>
                    </div>
                    <div class="sup_pop_row">
                        <div class="remark_save">
                            <button href="#" class="btn btn-info ph_btn_midium hvr-pop hvr-rectangle-out float-left tab-link">Save</button>
                        </div>
                    </div>
                </form>
            </div>                
        </div>

    </div>
</div>


<!-- WIDGETS -->
<!-- Uniform -->

<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/uniform/uniform.js "></script>
<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/uniform/uniform-demo.js "></script>
<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/bootstrap/js/bootstrap.js "></script>

<!-- Superclick -->

<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/superclick/superclick.js "></script>

<!-- Chosen -->

<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/chosen/chosen.js "></script>
<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/chosen/chosen-demo.js "></script>

<!-- Bootstrap Tooltip -->
<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/tooltip/tooltip.js "></script>

<!-- Perfact scroll -->
<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/perfect-scrollbar/js/perfect-scrollbar.jquery.js "></script>
<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/perfect-scrollbar/js/perfect-scrollbar.min.js "></script>

<!-- Content box -->
<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/content-box/contentbox.js "></script>
<script type="text/javascript ">
    $("#test-select ").treeMultiselect({
    enableSelectAll: true,
    sortable: true
    });
</script>
<script src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/js-core/validation.js"></script>
<script>
                                                $.validate({
                                                    lang: 'en',
                                                    modules: 'date',
                                                    inlineErrorMessageCallback: function ($input, errorMessage, config) {
                                                        $input.next('.custom_add').remove();
                                                        if (errorMessage) {
                                                            var htm = "<span class='help-block form-error custom_add'>" + errorMessage + "</span>";
                                                            $($input).after(htm);
                                                        }
                                                    }
                                                });
</script>
<!-- EQul height js-->
<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/match-height/jquery.matchHeight.js "></script>
<!-- Theme layout -->
<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/themes/admin/layout.js "></script>
<script type="text/javascript " src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/widgets/datepicker/datepicker.js "></script>
<script>
                                                $(document).ready(function () {

                                                    $(".toggle").click(function () {
                                                        $(this).parent().toggleClass("highlight");
                                                    });
                                                });
</script>



<script>
    $(function () {
        var availableTags = [
            "ActionScript",
            "AppleScript",
            "Asp",
            "BASIC",
            "C",
            "C++",
            "Clojure",
            "COBOL",
            "ColdFusion",
            "Erlang",
            "Fortran",
            "Groovy",
            "Haskell",
            "Java",
            "JavaScript",
            "Lisp",
            "Perl",
            "PHP",
            "Python",
            "Ruby",
            "Scala",
            "Scheme"
        ];
        $("#tags").autocomplete({
            source: availableTags
        });
        $("#tagres").autocomplete({
            source: availableTags
        });
    });

    function approveSupplier(userId, id, type) {
        if (confirm("Are you sure?")) {
            var request = $.ajax({
                url: apiUrl + "/users/supplierApproval",
                method: "POST",
                data: {userId: userId, id: id, is_verified: type},
                dataType: "json"
            });

            request.done(function (data) {
                if (data.status) {
                    if (type == 1) {
                        $("#approve" + id).text("Approved");
                        $("#approve" + id).addClass("disabled");
                        $("#reject" + id).removeClass("disabled");
                        $("#reject" + id).text("Reject");
                    } else {
                        $("#reject" + id).text("Rejected");
                        $("#reject" + id).addClass("disabled");
                        $("#approve" + id).text("Approv");
                        $("#approve" + id).removeClass("disabled");
                    }
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
</body>

</html>
