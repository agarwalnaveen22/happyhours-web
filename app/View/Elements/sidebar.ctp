<div class="site-menubar">
    <div class="site-menubar-body">
        <div>
            <div>
                <ul class="site-menu">
                    <li class="site-menu-category">General</li>
                    <li class="site-menu-item has-sub active open">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                            <div class="site-menu-badge">
                                <span class="badge badge-success">3</span>
                            </div>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo Configure::read('App.baseUrl'); ?>/users/dashboard">
                                    <span class="site-menu-title">Dashboard</span>
                                </a>
                            </li>

                        </ul>
                    </li>
            <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'index');
            $option2 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'add');
            if ($option1 || $option2) {
                ?>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-layout" aria-hidden="true"></i>
                            <span class="site-menu-title">Users</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                  <?php if ($option1) { ?>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo Configure::read('App.baseUrl'); ?>/users/index">
                                    <span class="site-menu-title">Listing</span>
                                </a>
                            </li>
                <?php } ?>
                <?php if ($option2) { ?>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo Configure::read('App.baseUrl'); ?>/users/add">
                                    <span class="site-menu-title">Add</span>
                                </a>
                            </li>
                <?php } ?>
                        </ul>
                    </li>
            <?php } ?>
                    <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'supplierRegister');
            $option2 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'supplierList');
            if ($option1 || $option2) {
                ?>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Supplier</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <?php if ($option1) { ?>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo Configure::read('App.baseUrl'); ?>/users/supplierRegister">
                                    <span class="site-menu-title">Registration</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($option2) { ?>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo Configure::read('App.baseUrl'); ?>/users/supplierList">
                                    <span class="site-menu-title">Listing</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    
                    <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'campaignList');
            if ($option1) {
                ?>
                    <li class="site-menu-item has-sub">
                        <a href="<?php echo Configure::read('App.baseUrl'); ?>/users/campaignList">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Campaigns</span>
                        </a>
                        
                    </li>
                    <?php } ?>
                    
                    <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'locations');
            if ($option1) {
                ?>
                    <li class="site-menu-item has-sub">
                        <a href="<?php echo Configure::read('App.baseUrl'); ?>/users/locations">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Locations</span>
                        </a>
                        
                    </li>
                    <?php } ?>
                    
                    <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'ProductCategories', 'products');
            if ($option1) {
                ?>
                    <li class="site-menu-item has-sub">
                        <a href="<?php echo Configure::read('App.baseUrl'); ?>/ProductCategories/products">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Product Categories</span>
                        </a>
                        
                    </li>
                    <?php } ?>
                    
                    
                    <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'DealRefreshPeriods', 'index');
            if ($option1) {
                ?>
                    <li class="site-menu-item has-sub">
                        <a href="<?php echo Configure::read('App.baseUrl'); ?>/DealRefreshPeriods">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Deal Refresh Periods</span>
                        </a>
                        
                    </li>
                    <?php } ?>
                    
                    
                    <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'Cities', 'index');
            if ($option1) {
                ?>
                    <li class="site-menu-item has-sub">
                        <a href="<?php echo Configure::read('App.baseUrl'); ?>/Cities">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Cities</span>
                        </a>
                        
                    </li>
                    <?php } ?>
                    
                    
                     <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'Townships', 'index');
            if ($option1) {
                ?>
                    <li class="site-menu-item has-sub">
                        <a href="<?php echo Configure::read('App.baseUrl'); ?>/Townships">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Townships</span>
                        </a>
                        
                    </li>
                    <?php } ?>
                    
                    
                   <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'dealList');
            $option2 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'dealAdd');
            if ($option1 || $option2) {
                ?>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Deals</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <?php if ($option1) { ?>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo Configure::read('App.baseUrl'); ?>/users/dealList">
                                    <span class="site-menu-title">Listing</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if ($option2) { ?>
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo Configure::read('App.baseUrl'); ?>/users/dealAdd">
                                    <span class="site-menu-title">Add</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    
                    
                    <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'UserOrders', 'index');
            if ($option1) {
                ?>
                    <li class="site-menu-item has-sub">
                        <a href="<?php echo Configure::read('App.baseUrl'); ?>/UserOrders/index">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">Orders</span>
                        </a>
                        
                    </li>
                    <?php } ?>
                    
                    <?php
            $option1 = $this->App->getPermission($this->Session->read("Auth.User")['User']['role_id'],'users', 'acl');
            if ($option1) {
                ?>
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                            <i class="site-menu-icon wb-file" aria-hidden="true"></i>
                            <span class="site-menu-title">System Setting</span>
                            <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                            <li class="site-menu-item">
                                <a class="animsition-link" href="<?php echo Configure::read('App.baseUrl'); ?>/users/acl">
                                    <span class="site-menu-title">Access Rights</span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                    <?php } ?>
                    
                </ul>
                
            </div>
        </div>
    </div>
    <div class="site-menubar-footer">
        <a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
           data-original-title="Settings">
            <span class="icon wb-settings" aria-hidden="true"></span>
        </a>
        <a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
            <span class="icon wb-eye-close" aria-hidden="true"></span>
        </a>
        <a href="<?php echo Configure::read('App.baseUrl'); ?>/users/acl" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
            <span class="icon wb-power" aria-hidden="true"></span>
        </a>
    </div>
</div>