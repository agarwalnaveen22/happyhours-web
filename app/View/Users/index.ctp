<div class="page animsition">
    <div class="page-content container-fluid">
        <div class="row">
            <!-- pageging  block -->

            <div class="col-md-12">

                <div class="panel" id="exampleWizardFormContainer">

                    <div class="panel-heading">
                        <h3 class="panel-title">Users</h3>
                    </div>








                    <div class="panel-body">


                        <table id="campaignList" class="table table-striped table-bordered border-right-left" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Role</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <td><?php echo $user['User']['id']; ?></td>
                                        <td><?php echo $user['Role']['name']; ?></td>
                                        <td><img style="width:50px;height:50px" src="<?php echo isset($user['UserDetail'][0]['profile_picture']) ? Configure::read('App.baseUrl') . "/uploads/" . $user['UserDetail'][0]['profile_picture'] : ""; ?>" /></td>
                                        <td><?php echo isset($user['UserDetail'][0]['first_name']) ? $user['UserDetail'][0]['first_name'] . " " . @$user['UserDetail'][0]['last_name'] : ""; ?></td>
                                        <td><?php echo $user['User']['email']; ?></td>
                                        <td><?php echo @$user['UserDetail'][0]['phone']; ?></td>
                                        <td><?php echo isset($user['UserDetail'][0]['country_id']) ? $this->App->getCountryName($user['UserDetail'][0]['country_id']) : ""; ?></td>
                                        <td><?php echo isset($user['UserDetail'][0]['state_id']) ? $this->App->getStateName($user['UserDetail'][0]['state_id']) : ""; ?></td>
                                        <td><?php echo isset($user['UserDetail'][0]['city_id']) ? $this->App->getCityName($user['UserDetail'][0]['city_id']) : ""; ?></td>
                                        <td>
                                            <?php
                                            $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'edit');
                                            if ($isPermit) {
                                                ?>
                                                <a href="<?php echo Configure::read('App.baseUrl') . "/users/edit/" . AppController::encryption($user['User']['id']); ?>"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/edit1.png" /></a>&nbsp;&nbsp;
                                            <?php } ?>
                                            <?php
                                            $isPermit = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'], 'users', 'delete');
                                            if ($isPermit) {
                                                ?>
                                                <a href="javascript:" onclick="goToDel('<?php echo Configure::read('App.baseUrl') . "/users/delete/" . AppController::encryption($user['User']['id']); ?>')"><img src="<?php echo Configure::read('App.baseUrl'); ?>/images/delete1.png" /></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>






                </div>

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


    function goToDel(url) {
        $("#confirmDelete").attr("onclick", "confirmDelete('"+url+"')");
        $("#examplePositionTop").modal('show');
    }

    function confirmDelete(url) {
        window.location.href = url;
    }

</script>
