<div id="page-sidebar">
    <div class="scroll-sidebar">

        <div class="user_box">
            <div class="user-pic">
                <img src="<?php echo Configure::read('App.baseUrl'); ?>/css/assets/image-resources/image-procurehere/avatar-1.jpg" />
            </div>
            <div class="user_detail_box">
                <span class="user_Name">Mozes Fenandez</span>
                <h4 class="user_mail">sample@gmail.com</h4>
                <span class="user_designation">Event Owner</span>
                <?php if($this->Session->read("Auth.User")['User']['role_id']>1){ ?>
                <a href="<?php echo Configure::read('App.baseUrl'); ?>/users/supplierEdit/<?php echo AppController::encryption($this->Session->read("Auth.User")['SupplierDetail'][0]['id']); ?>" class="user_edit_icon"><i aria-hidden="true" class="glyph-icon icon-edit"></i></a>
                <?php } ?>
            </div>
            <div class="ip_detail_box">
                <span>IP : 192.169.0.12</span>
                <span>Last Login : 12-03-2016 08:30 PM</span>
                <span>Last Login Failed : 12-03-2016 08:30 PM</span>
            </div>
        </div>
        <ul id="sidebar-menu">
            <li>
                <a href="index.html" title="Admin Dashboard">
                    <i class="glyphicon glyphicon-blackboard"></i>
                    <span>Dashboard</span>
                </a>


            </li>
            <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'Roles', 'index');
            if ($option1) {
                ?>
            <li class="divider"></li>
            <li>
                <a href="<?php echo Configure::read('App.baseUrl'); ?>/Roles/index" title="Roles">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Roles</span>
                </a>


            </li>
            <?php } ?>
            <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'index');
            $option2 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'add');
            if ($option1 || $option2) {
                ?>
                <li class="divider"></li>
                <li class="no-menu">
                    <a href="" title="Users">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Users</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <?php if ($option1) { ?>
                                <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/index"><span>Listing</span></a></li>
                            <?php } ?>
                            <?php if ($option2) { ?>
                                <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/add"><span>Add</span></a></li>
                            <?php } ?>
                        </ul>

                    </div>
                    <!-- .sidebar-submenu -->
                </li>
            <?php } ?>
            <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'supplierRegister');
            $option2 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'supplierList');
            if ($option1 || $option2) {
                ?>
                <li class="divider"></li>
                <li class="no-menu">
                    <a href="" title="Users">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>Supplier</span>
                    </a>
                    <div class="sidebar-submenu">
                        <ul>
                            <?php if ($option1) { ?>
                                <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/supplierRegister"><span>Registration</span></a></li>
                            <?php } ?>
                            <?php if ($option2) { ?>
                                <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/supplierList"><span>Listing</span></a></li>
                            <?php } ?>
                        </ul>

                    </div>
                    <!-- .sidebar-submenu -->
                </li>
            <?php } ?>
                <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'campaignList');
            if ($option1) {
                ?>
            <li class="divider"></li>
            <li>
                <a href="<?php echo Configure::read('App.baseUrl'); ?>/users/campaignList" title="Campaign">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Campaigns</span>
                </a>


            </li>
            <?php } ?>
                <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'locations');
            if ($option1) {
                ?>
            <li class="divider"></li>
            <li>
                <a href="<?php echo Configure::read('App.baseUrl'); ?>/users/locations" title="Location">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Locations</span>
                </a>


            </li>
            <?php } ?>
                <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'ProductCategories', 'products');
            if ($option1) {
                ?>
            <li class="divider"></li>
            <li>
                <a href="<?php echo Configure::read('App.baseUrl'); ?>/ProductCategories/products" title="Products">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Product Categories</span>
                </a>


            </li>
            <?php } ?>
                <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'DealRefreshPeriods', 'index');
            if ($option1) {
                ?>
            <li class="divider"></li>
            <li>
                <a href="<?php echo Configure::read('App.baseUrl'); ?>/DealRefreshPeriods" title="Deal Refresh Periods">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Deal Refresh Periods</span>
                </a>


            </li>
            <?php } ?>
                <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'Cities', 'index');
            if ($option1) {
                ?>
            <li class="divider"></li>
            <li>
                <a href="<?php echo Configure::read('App.baseUrl'); ?>/Cities" title="Cities">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Cities</span>
                </a>


            </li>
            <?php } ?>
                <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'Townships', 'index');
            if ($option1) {
                ?>
            <li class="divider"></li>
            <li>
                <a href="<?php echo Configure::read('App.baseUrl'); ?>/Townships" title="Townships">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Townships</span>
                </a>


            </li>
            <?php } ?>
                <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'dealList');
            $option2 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'dealAdd');
            if ($option1 || $option2) {
                ?>
            <li class="divider"></li>
            <li class="no-menu">
                <a href="" title="Users">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Deals</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <?php if ($option1) { ?>
                        <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dealList"><span>Listing</span></a></li>
                        <?php } ?>
                        <?php if ($option2) { ?>
                        <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/dealAdd"><span>Add</span></a></li>
                        <?php } ?>
                    </ul>

                </div>
                <!-- .sidebar-submenu -->
            </li>
            <?php } ?>
            <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'UserOrders', 'index');
            if ($option1) {
                ?>
            <li class="divider"></li>
            <li>
                <a href="<?php echo Configure::read('App.baseUrl'); ?>/UserOrders/index" title="Orders">
                    <i class="glyphicon glyphicon-user"></i>
                    <span>Orders</span>
                </a>


            </li>
            <?php } ?>
                <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'acl');
            if ($option1) {
                ?>
            <li class="divider"></li>

            <li class="no-menu">
                <a href="" title="Users">
                    <i class="glyphicon glyphicon-modal-window"></i>
                    <span>System Setting</span>
                </a>
                <div class="sidebar-submenu">

                    <ul>
                        <li><a href="<?php echo Configure::read('App.baseUrl'); ?>/users/acl"><span>Access Rights</span></a></li>

                    </ul>

                </div>
                <!-- .sidebar-submenu -->
            </li>
            <?php } ?>

        </ul>
        <!-- #sidebar-menu -->


    </div>
</div>