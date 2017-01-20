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



                        <!-- <div class="heading-tab-pr">PR Detail</div>-->
                        <form class="wizard-content" method="post" action="">


                            <table id="campaignList" class="table table-striped table-bordered border-right-left" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Modules</th>
                                        <?php foreach ($roles as $role) { ?>
                                            <th><?php echo ucfirst($role); ?></th>
                                        <?php } ?>


                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $i = -1;
                                    foreach ($modules as $module) {
                                        $i++;
                                        ?>
                                        <tr>
                                            <td><b><?php echo $module['Module']; ?></b></td>
                                            <?php foreach ($roles as $role) { ?>
                                                <td>&nbsp;</td>
                                        <?php } ?>
                                        </tr>
                                        <?php
                                        $j = -1;
                                        foreach ($module['Actions'] as $key => $action) {
                                            $j++;
                                            ?>
                                            <tr>
                                                <td><span class="paddingLeft">- <?php echo $action; ?></span></td>
        <?php foreach ($roles as $k => $role) { ?>
                                                    <td>
                                                        <!--div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" class="form-control" name="<?php echo $k; ?>-<?php echo $module['Module']; ?>-<?php echo $module['Controller']; ?>-<?php echo $key; ?>-<?php echo $action; ?>" value="1" <?php echo (in_array(($k . "-" . $module['Module'] . "-" . $module['Controller'] . "-" . $key . "-" . $action), $acl)) ? "checked" : ""; ?> />
                                                                <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                                            </label>
                                                        </div-->
                                                        <div class="checkbox-custom checkbox-primary">
                                                            <input type="checkbox" id="inlineCheckbox110" name="<?php echo $k; ?>-<?php echo $module['Module']; ?>-<?php echo $module['Controller']; ?>-<?php echo $key; ?>-<?php echo $action; ?>" value="1" <?php echo (in_array(($k . "-" . $module['Module'] . "-" . $module['Controller'] . "-" . $key . "-" . $action), $acl)) ? "checked" : ""; ?>>
                                                            <label for="inlineCheckbox110"></label>
                                                        </div>
                                                    <?php /* <input type="hidden" name="acl[<?php echo $k; ?>][<?php echo $i; ?>][Module]" value="<?php echo $module['Module']; ?>" />
                                                      <input type="hidden" name="acl[<?php echo $k; ?>][<?php echo $i; ?>][Controller]" value="<?php echo $module['Controller']; ?>" />
                                                      <input type="hidden" name="acl[<?php echo $k; ?>][<?php echo $i; ?>][Actions][<?php echo $j; ?>][action]" value="<?php echo $key; ?>" />
                                                      <input type="hidden" name="acl[<?php echo $k; ?>][<?php echo $i; ?>][Actions][<?php echo $j; ?>][task]" value="<?php echo $action; ?>" /> */ ?>
                                                    </td>
        <?php } ?>
                                            </tr>
    <?php } ?>
<?php } ?>

                                </tbody>
                            </table>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary" id="validateButton2">Save</button>
                            </div>

                        </form>





                    </div>



                </div>
            </div>
        </div>



    </div>


    <script>

        function goToDel(url) {
            if (confirm("Are you sure?")) {
                window.location.href = url;
            }
        }

    </script>

