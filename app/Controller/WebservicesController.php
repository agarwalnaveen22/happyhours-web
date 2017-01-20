<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class WebservicesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');

    public function beforeFilter() {
        parent::beforeFilter();
        // For CakePHP 2.0
        $this->Auth->allow();
        $this->autoRender = false;
    }

    /**
     * login method
     *
     * @return void
     */
    public function login() {
        if ($this->request->is('post')) {
            if (!isset($this->request->data['email']) || !filter_var($this->request->data['email'], FILTER_VALIDATE_EMAIL)) {
                $response['status'] = false;
                $response['message'] = 'Email address is not valid';
            } else if (!isset($this->request->data['password']) || $this->request->data['password'] == '') {
                $response['status'] = false;
                $response['message'] = 'Password is required';
            } else {
                $this->loadModel('User');
                $check = $this->User->checkLogin($this->request->data['email'], $this->request->data['password']);
                if (empty($check)) {
                    $response['status'] = false;
                    $response['message'] = 'Either email address or password is wrong';
                } else {
                    if ($check['User']['is_verified'] != 1) {
                        $response['status'] = false;
                        $response['message'] = 'Your email address is not verified, please check your email account to verification email';
                    } else if ($check['User']['status'] != 1) {
                        $response['status'] = false;
                        $response['message'] = 'Your account is not active';
                    } else if ($check['User']['role_id'] != 3) {
                        $response['status'] = false;
                        $response['message'] = 'Your account is not authorized to use this application';
                    } else {
                        $response['status'] = true;
                        $response['message'] = 'Login success';
                        $response['data'] = $check;
                    }
                }
            }
        } else {
            $response['status'] = false;
            $response['message'] = 'Request is not valid';
        }
        echo json_encode($response);
    }

    public function socialLogin() {
        if ($this->request->is('post')) {

            $this->loadModel('User');
            $checkAlready = $this->User->find('first', array('conditions' => array(
                    'User.social_id' => $this->request->data['social_id'],
                    'User.social_type_id' => $this->request->data['social_type']
            )));

            $this->request->data['social_type_id'] = $this->request->data['social_type'];
            if (empty($checkAlready)) {
                $this->request->data['role_id'] = 3;
                $this->request->data['status'] = 1;
                $this->request->data['is_verified'] = 1;
                $this->User->validate = array();
                if ($this->User->save($this->request->data)) {
                    $userId = $this->User->getInsertID();
                    $userDetail['user_id'] = $userId;
                    if (isset($this->request->data['name'])) {
                        $name = explode(" ", $this->request->data['name']);
                        $userDetail['first_name'] = @$name[0];
                        $userDetail['last_name'] = @$name[1];
                    }
                    if (isset($this->request->data['image']) && $this->request->data['image'] != '') {
                        $filename = uniqid() . ".jpg";
                        if (file_put_contents("uploads/" . $filename, file_get_contents($this->request->data['image']))) {
                            $userDetail['profile_picture'] = $filename;
                        }
                    }
                    $this->User->UserDetail->create();
                    $this->User->UserDetail->save($userDetail);
                    $response['status'] = true;
                    $response['message'] = 'Registration success';
                    $response['data'] = $this->User->findById($userId);
                } else {
                    $response['status'] = false;
                    $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->User->validationErrors));
                    $list = iterator_to_array($it, false);
                    $response['message'] = $list;
                }
            } else {
                $userId = $checkAlready['User']['id'];

                $this->User->id = $checkAlready['User']['id'];
                if ($this->User->save($this->request->data)) {
                    if (!empty($checkAlready['UserDetail'])) {
                        $this->User->UserDetail->id = $checkAlready['UserDetail'][0]['id'];
                    }
                    $userDetail['user_id'] = $userId;
                    if (isset($this->request->data['name'])) {
                        $name = explode(" ", $this->request->data['name']);
                        $userDetail['first_name'] = @$name[0];
                        $userDetail['last_name'] = @$name[1];
                    }
                    if (isset($this->request->data['image']) && $this->request->data['image'] != '') {
                        $filename = uniqid() . ".jpg";
                        if (file_put_contents("uploads/" . $filename, file_get_contents($this->request->data['image']))) {
                            $userDetail['profile_picture'] = $filename;
                        }
                    }
                    $this->User->UserDetail->save($userDetail);
                    $response['status'] = true;
                    $response['message'] = 'Registration success';
                    $response['data'] = $checkAlready;
                } else {
                    $response['status'] = false;
                    $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->User->validationErrors));
                    $list = iterator_to_array($it, false);
                    $response['message'] = $list;
                }
            }
        } else {
            $response['status'] = false;
            $response['message'] = 'Request is not valid';
        }
        echo json_encode($response);
    }

    public function register() {
        if ($this->request->is('post')) {
            $this->loadModel('User');
            $this->request->data['role_id'] = 3;
            $this->request->data['status'] = 0;
            $this->request->data['is_verified'] = 0;
            $this->request->data['social_id'] = '';
            $this->request->data['password'] = AuthComponent::password($this->request->data['password']);
            $this->User->set($this->request->data);
            if ($this->User->validates()) {
                $settings = $this->viewVars['settings'];
                $this->User->save();
                $userId = $this->User->getInsertID();
                $userDetail['user_id'] = $userId;
                if (isset($this->request->data['name'])) {
                    $name = explode(" ", $this->request->data['name']);
                    $userDetail['first_name'] = @$name[0];
                    $userDetail['last_name'] = @$name[1];
                }
                if (isset($this->request->data['image']) && $this->request->data['image'] != '') {
                    $filename = uniqid() . ".jpg";
                    if (file_put_contents("uploads/" . $filename, file_get_contents($this->request->data['image']))) {
                        $userDetail['profile_picture'] = $filename;
                    }
                }
                $this->User->UserDetail->create();
                $this->User->UserDetail->save($userDetail);
                $response['status'] = true;
                $response['message'] = 'Registration success';
                $userId = $this->User->getInsertID();
                $response['data'] = $userId;
                $code = uniqid();
                $user['verification_code'] = $code;
                $this->User->id = $userId;
                $this->User->save($user);
                $this->loadModel('EmailTemplate');
                $emailTemplate = $this->EmailTemplate->find('first', array('conditions' => array(
                        'EmailTemplate.slug' => 'customer-email-verification'
                )));
                if (!empty($emailTemplate)) {
                    App::uses('CakeEmail', 'Network/Email');
                    $Email = new CakeEmail($settings['Setting']['email_config']);
                    $Email->from(array($emailTemplate['EmailTemplate']['from_email'] => $emailTemplate['EmailTemplate']['from_name']));
                    $Email->to($this->request->data['email']);
                    $Email->subject($emailTemplate['EmailTemplate']['subject']);
                    $vcode = Configure::read('App.baseUrl') . "/users/verifyEmail/" . str_replace("==", "", base64_encode($this->request->data['email'])) . "/" . $code;
                    $emailTemplate['EmailTemplate']['description'] = str_replace("{USERNAME}", $this->request->data['email'], $emailTemplate['EmailTemplate']['description']);
                    $emailTemplate['EmailTemplate']['description'] = str_replace("{LINK}", $vcode, $emailTemplate['EmailTemplate']['description']);
                    $emailTemplate['EmailTemplate']['description'] = str_replace("{SITENAME}", $settings['Setting']['application_name'], $emailTemplate['EmailTemplate']['description']);
                    if ($Email->send($emailTemplate['EmailTemplate']['description'])) {
                        $response['message'] = 'A verification email has been sent to you, please check your email account';
                    }
                }
            } else {
                $response['status'] = false;
                $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->User->validationErrors));
                $list = iterator_to_array($it, false);
                $response['message'] = $list;
            }
        } else {
            $response['status'] = false;
            $response['message'] = 'Request is not valid';
        }
        echo json_encode($response);
    }

    public function getDealsNearBy() {
        if ($this->request->is('post')) {
            $lat = $this->request->data['lat']; //'26.956432'; //
            $lng = $this->request->data['lng']; //'75.741253'; //
            $radius = 10;
            $this->loadModel('Location');
            $this->loadModel('Deal');
            if ($lat != '' && $lng != '') {
                $deals = $this->Location->query("SELECT
                    Location.*,Deal.*,SupplierDetail.*,
                    ( 6371 * acos( cos( radians({$lat}) ) * cos( radians( `lat` ) ) * cos( radians( `lng` ) - "
                        . "radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( `lat` ) ) ) ) AS distance
                FROM `locations` as Location,deals as Deal, deal_locations as DealLocation, campaigns as Campaign,supplier_details as SupplierDetail
                where Deal.start_date<='" . date("Y-m-d") . "' "
                        . "and Deal.end_date>='" . date("Y-m-d") . "' "
                        . "and ((Deal.is_all_day=1) or (Deal.start_time<='" . date("H:i:s") . "' and Deal.end_time>='" . date("H:i:s") . "')) "
                        . "and Deal.supplier_detail_id=SupplierDetail.id "
                        . "and Campaign.id=Deal.campaign_id "
                        . "AND DealLocation.deal_id=Deal.id AND Location.id=DealLocation.location_id "
                        . "and date(Campaign.start_datetime)<='" . date("Y-m-d") . "' and date(Campaign.end_datetime)>='" . date("Y-m-d") . "'
                        
                HAVING distance <= {$radius}
                ORDER BY distance ASC");
                if (!empty($deals)) {
                    $deal = array();
                    foreach ($deals as $d) {
                        if ($this->returnAddDeal($d)) {
                            $deal[] = $d;
                        }
                    }
                    $deals = $deal;
                    $response['status'] = true;
                    $response['message'] = 'Success';
                    $response['data'] = $deals;
                } else {
                    $deals = $this->Location->query("SELECT
                    Location.*,Deal.*,SupplierDetail.*,
                    ( 6371 * acos( cos( radians({$lat}) ) * cos( radians( `lat` ) ) * cos( radians( `lng` ) - "
                            . "radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( `lat` ) ) ) ) AS distance
                FROM `locations` as Location,deals as Deal, deal_locations as DealLocation, campaigns as Campaign,supplier_details as SupplierDetail
                where Deal.start_date<='" . date("Y-m-d") . "' "
                            . "and Deal.end_date>='" . date("Y-m-d") . "' "
                            . "and ((Deal.is_all_day=1) or (Deal.start_time<='" . date("H:i:s") . "' and Deal.end_time>='" . date("H:i:s") . "')) "
                            . "and Deal.supplier_detail_id=SupplierDetail.id "
                            . "and Campaign.id=Deal.campaign_id "
                            . "AND DealLocation.deal_id=Deal.id AND Location.id=DealLocation.location_id "
                            . "and date(Campaign.start_datetime)<='" . date("Y-m-d") . "' and date(Campaign.end_datetime)>='" . date("Y-m-d") . "'
                ORDER BY distance ASC");
                    if (!empty($deals)) {
                        $deal = array();
                        foreach ($deals as $d) {
                            if ($this->returnAddDeal($d)) {
                                $deal[] = $d;
                            }
                        }
                        $deals = $deal;
                        $response['status'] = true;
                        $response['message'] = 'Success';
                        $response['data'] = $deals;
                    } else {
                        $response['status'] = false;
                        $response['message'] = 'Deals can not found';
                    }
                }
            } else {
                $deals = $this->Location->query("SELECT
                    Deal.*,SupplierDetail.* 
                    from deals as Deal, campaigns as Campaign,supplier_details as SupplierDetail
                where Deal.start_date<='" . date("Y-m-d") . "' "
                        . "and Deal.end_date>='" . date("Y-m-d") . "' "
                        . "and ((Deal.is_all_day=1) or (Deal.start_time<='" . date("H:i:s") . "' and Deal.end_time>='" . date("H:i:s") . "')) "
                        . "and Deal.supplier_detail_id=SupplierDetail.id "
                        . "and Campaign.id=Deal.campaign_id "
                        . "and date(Campaign.start_datetime)<='" . date("Y-m-d") . "' and date(Campaign.end_datetime)>='" . date("Y-m-d") . "'
                ");
                if (!empty($deals)) {
                    $deal = array();
                    foreach ($deals as $d) {
                        if ($this->returnAddDeal($d)) {
                            $deal[] = $d;
                        }
                    }
                    $deals = $deal;
                    $response['status'] = true;
                    $response['message'] = 'Success';
                    $response['data'] = $deals;
                } else {
                    $response['status'] = false;
                    $response['message'] = 'Deals can not found';
                }
            }
        } else {
            $response['status'] = false;
            $response['message'] = 'Request is not valid';
        }
        echo json_encode($response);
    }

    public function returnAddDeal($d) {
        $currentMonth = date("m");
        $currentWeek = date("W");
        $date = $d['Deal']['start_date'];
        $dealMonth = date("m", strtotime($d['Deal']['start_date']));
        $dealWeek = date("W", strtotime($d['Deal']['start_date']));
        if ($d['Deal']['deal_refresh_period_id'] == 1) {
            if ($date == date("Y-m-d")) {
                return true;
            }
        } else if ($d['Deal']['deal_refresh_period_id'] == 2) {
            return true;
        } else if ($d['Deal']['deal_refresh_period_id'] == 3) {
            $days = $currentWeek - $dealWeek;
            $days = 7 * $days;
            $lastWeek = date('Y-m-d', strtotime("-$days days"));
            if ($date == date("Y-m-d") || $date == $lastWeek) {
                return true;
            }
        } else if ($d['Deal']['deal_refresh_period_id'] == 4) {
            $days = $currentMonth - $dealMonth;
            $days = 30 * $days;
            $lastMonth = date('Y-m-d', strtotime("-$days days"));
            if ($date == date("Y-m-d") || $date == $lastMonth) {
                return true;
            }
        } else if ($d['Deal']['deal_refresh_period_id'] == 5) {
            $days = $currentMonth - $dealMonth;
            $days = 90 * $days;
            $lastQuarter = date('Y-m-d', strtotime("-$days days"));
            if ($date == date("Y-m-d") || $date == $lastQuarter) {
                return true;
            }
        } else if ($d['Deal']['deal_refresh_period_id'] == 6) {
            $days = $currentMonth - $dealMonth;
            $days = 180 * $days;
            $lastHalfYear = date('Y-m-d', strtotime("-$days days"));
            if ($date == date("Y-m-d") || $date == $lastHalfYear) {
                return true;
            }
        } else if ($d['Deal']['deal_refresh_period_id'] == 7) {
            $days = $currentMonth - $dealMonth;
            $days = 360 * $days;
            $lastYear = date('Y-m-d', strtotime("-$days days"));
            if ($date == date("Y-m-d") || $date == $lastYear) {
                return true;
            }
        } else {
            return false;
        }
    }

    public function getCountries() {
        $this->loadModel('User');
        $countries = $this->User->UserDetail->Country->find('list');
        $response['status'] = true;
        $response['data'] = $countries;
        echo json_encode($response);
    }

    public function getStates() {
        $this->loadModel('User');
        $states = $this->User->UserDetail->Country->State->find('list', array('conditions' => array(
                'State.country_id' => $this->request->data['id']
        )));
        $response['status'] = true;
        $response['data'] = $states;
        echo json_encode($response);
    }

    public function getCities() {
        $this->loadModel('User');
        $cities = $this->User->UserDetail->Country->State->City->find('list', array('conditions' => array(
                'City.state_id' => $this->request->data['id']
        )));
        $response['status'] = true;
        $response['data'] = $cities;
        echo json_encode($response);
    }

    public function updateProfile() {
        if ($this->request->is('post')) {
            $this->loadModel('User');
            if ($this->request->data['password'] != '') {
                $this->request->data['password'] = AuthComponent::password($this->request->data['password']);
                $this->User->id = $this->request->data['id'];
                $this->User->save($this->request->data);
            }
            $userDetails = $this->User->findById($this->request->data['id']);
            $this->User->UserDetail->create();
            $this->User->UserDetail->id = $userDetails['UserDetail'][0]['id'];
            $this->request->data['user_id'] = $this->request->data['id'];
            unset($this->request->data['id']);
            if ($this->User->UserDetail->save($this->request->data)) {
                $response['status'] = true;
                $response['message'] = 'Profile updated';
            } else {
                $response['status'] = false;
                $response['message'] = $userDetails;
            }
        } else {
            $response['status'] = false;
            $response['message'] = 'Request is not valid';
        }
        echo json_encode($response);
    }

    public function getDealDetail() {
        if ($this->request->is('post')) {
            $this->loadModel('Deal');
            $lat = $this->request->data['lat']; //'26.956432'; //
            $lng = $this->request->data['lng']; //'75.741253'; //
            $id = $this->request->data['id']; //2; //
            if ($lat != '' && $lng != '') {
                $deal = $this->Deal->query("SELECT
                    Deal.*,SupplierDetail.*,Location.*,
                    ( 6371 * acos( cos( radians({$lat}) ) * cos( radians( `lat` ) ) * cos( radians( `lng` ) - "
                        . "radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( `lat` ) ) ) ) AS distance
                FROM deals as Deal, supplier_details as SupplierDetail, deal_locations as DealLocation, locations as Location WHERE Deal.id=$id 
                    AND DealLocation.deal_id=Deal.id AND Location.id=DealLocation.location_id 
                    AND SupplierDetail.id=Deal.supplier_detail_id
                ORDER BY distance ASC");
                $deal = $deal[0];
            } else {
                $deal = $this->Deal->findById($id);
            }
            $response['status'] = true;
            $response['data'] = $deal;
        } else {
            $response['status'] = false;
            $response['message'] = 'Request is not valid';
        }
        echo json_encode($response);
    }

    public function paymentProcess() {
        if ($this->request->is('post')) {
            $paymentMode = $this->request->data['payment_mode'];
            if ($paymentMode == 2) {
                $card_number = str_replace("+", "", $this->request->data['card_number']);
                $card_name = $this->request->data['card_name'];
                $expiry_month = $this->request->data['card_expire_month'];
                $expiry_year = $this->request->data['card_expire_year'];
                $cvv = $this->request->data['card_cvv'];
                $expirationDate = $expiry_month . '/' . $expiry_year;
                $price = $this->request->data['price']; //10; //
                $userId = $this->request->data['user_id'];

                require_once 'braintree/Braintree.php';
                Braintree_Configuration::environment('sandbox');
                Braintree_Configuration::merchantId('vxq87t2crtkmm73w');
                Braintree_Configuration::publicKey('hdx9dsys3z3j5xnt');
                Braintree_Configuration::privateKey('6e6059a94037dfc465f8ccdfd230a095');

                $result = Braintree_Transaction::sale(array(
                            'amount' => $price,
                            'creditCard' => array(
                                'number' => $card_number,
                                'cardholderName' => $card_name,
                                'expirationDate' => $expirationDate,
                                'cvv' => $cvv
                            )
                ));
                $this->loadModel('User');
                $cardExist = $this->User->UserCard->find('first', array('conditions' => array(
                        'UserCard.card_number' => $card_number,
                        'UserCard.user_id' => $userId,
                )));
                if (empty($cardExist)) {
                    $userCard['user_id'] = $userId;
                    $userCard['card_number'] = $card_number;
                    $userCard['card_expire_month'] = $expiry_month;
                    $userCard['card_expire_year'] = $expiry_year;
                    $userCard['person_name'] = $card_name;
                    $userCard['cvv'] = $cvv;
                    $this->User->UserCard->create();
                    $this->User->UserCard->save($userCard);
                    $userCardId = $this->User->UserCard->getInsertID();
                } else {
                    $userCardId = $cardExist['UserCard']['id'];
                }
                if ($result->success) {
                    if ($result->transaction->id) {
                        $braintreeCode = $result->transaction->id;
                        $userTr['user_id'] = $userId;
                        $userTr['deal_id'] = $this->request->data['id'];
                        $userTr['transaction_amount'] = $price;
                        $userTr['transaction_status'] = 1;
                        $userTr['transaction_id'] = $braintreeCode;
                        $userTr['user_card_id'] = $userCardId;
                        $this->User->UserOrder->create();
                        $this->User->UserOrder->save($userTr);
                        $response['status'] = true;
                        $orderId = $this->User->UserOrder->getInsertID();
                        $response['data'] = 1000000 + $orderId;
                    }
                } else {
                    $userTr['user_id'] = $userId;
                    $userTr['deal_id'] = $this->request->data['id'];
                    $userTr['transaction_amount'] = $price;
                    $userTr['transaction_status'] = 2;
                    $userTr['failure_reason'] = 'invalid';
                    $userTr['transaction_id'] = $braintreeCode;
                    $userTr['user_card_id'] = $userCardId;
                    $this->User->UserOrder->create();
                    $this->User->UserOrder->save($userTr);
                    $response['status'] = false;
                    $response['message'] = "Payment failed";
                }
            } else {
                $response['status'] = true;
                $orderId = 10000005;
                $response['data'] = $orderId;
            }
        } else {
            $response['status'] = false;
            $response['message'] = 'Request is not valid';
        }
        echo json_encode($response);
    }

    public function getUserHistory() {
        if ($this->request->is('post')) {
            $this->loadModel('User');
            $this->User->UserOrder->recursive = 2;
            $userId = $this->request->data['id'];
            $userOrders = $this->User->UserOrder->find('all', array('conditions' => array(
                    'UserOrder.user_id' => $userId
                ), 'fields' => array('UserOrder.*', 'DATE_FORMAT(UserOrder.created,"%Y-%m-%d") as created')));
            //pr($userOrders);die;
            if (!empty($userOrders)) {
                $response['status'] = true;
                $response['data'] = $userOrders;
            } else {
                $response['status'] = false;
                $response['message'] = 'Can not found user orders';
            }
        } else {
            $response['status'] = false;
            $response['message'] = 'Request is not valid';
        }
        echo json_encode($response);
    }

    public function getDealsTest() {
        $lat = '3.1319229';
        $lng = '101.59472430000005';
        $radius = 5;
        $time = '17:30:00';
        echo "SELECT
                    Location.*,Deal.*,SupplierDetail.*,
                    ( 6371 * acos( cos( radians({$lat}) ) * cos( radians( `lat` ) ) * cos( radians( `lng` ) - "
        . "radians({$lng}) ) + sin( radians({$lat}) ) * sin( radians( `lat` ) ) ) ) AS distance
                FROM `locations` as Location,deals as Deal, deal_locations as DealLocation, campaigns as Campaign,supplier_details as SupplierDetail
                where Deal.start_date<='" . date("Y-m-d") . "' "
        . "and Deal.end_date>='" . date("Y-m-d") . "' "
        . "and ((Deal.is_all_day=1) or (Deal.start_time<='$time' and Deal.end_time>='$time')) "
        . "and Deal.supplier_detail_id=SupplierDetail.id "
        . "and Campaign.id=Deal.campaign_id "
        . "AND DealLocation.deal_id=Deal.id AND Location.id=DealLocation.location_id "
        . "and date(Campaign.start_datetime)<='" . date("Y-m-d") . "' and date(Campaign.end_datetime)>='" . date("Y-m-d") . "'
                        
                HAVING distance <= {$radius}
                ORDER BY distance ASC";
        die;
    }

    public function getAllSuppliers() {
        if ($this->request->is('post')) {
            $this->loadModel('SupplierDetail');
            $suppliers = $this->SupplierDetail->find('all');
            $response['status'] = true;
            $response['data'] = $suppliers;           
        } else {
            $response['status'] = false;
            $response['message'] = 'Request is not valid';
        }
        echo json_encode($response);
    }
    
    public function forgetPassword() {
        if ($this->request->is('post')) {
            $this->loadModel('User');
            $user = $this->User->findByEmail($this->request->data['email']);
            
            if(!empty($user)){
                $vcode = uniqid();
                
                $this->request->data['password'] = AuthComponent::password($vcode);
                
                $this->User->validate = array();
                $this->User->id = $user['User']['id'];
                $this->User->save($this->request->data);
                $this->loadModel('EmailTemplate');
                $emailTemplate = $this->EmailTemplate->find('first', array('conditions' => array(
                        'EmailTemplate.slug' => 'customer-forget-password'
                )));
                if (!empty($emailTemplate)) {
                    $settings = $this->viewVars['settings'];
                    App::uses('CakeEmail', 'Network/Email');
                    $Email = new CakeEmail($settings['Setting']['email_config']);
                    $Email->from(array($emailTemplate['EmailTemplate']['from_email'] => $emailTemplate['EmailTemplate']['from_name']));
                    $Email->to($this->request->data['email']);
                    $Email->subject($emailTemplate['EmailTemplate']['subject']);
                    $emailTemplate['EmailTemplate']['description'] = str_replace("{USERNAME}", $this->request->data['email'], $emailTemplate['EmailTemplate']['description']);
                    $emailTemplate['EmailTemplate']['description'] = str_replace("{TEMP_PASS}", $vcode, $emailTemplate['EmailTemplate']['description']);
                    $emailTemplate['EmailTemplate']['description'] = str_replace("{SITENAME}", $settings['Setting']['application_name'], $emailTemplate['EmailTemplate']['description']);
                    if ($Email->send($emailTemplate['EmailTemplate']['description'])) {
                        $response['status'] = true;
                        $response['message'] = 'A temporary password has been sent to your email id';
                    }
                }
                 
            }else{
                $response['status'] = false;
                $response['message'] = 'Email is not correct';
            }
                     
        } else {
            $response['status'] = false;
            $response['message'] = 'Request is not valid';
        }
        echo json_encode($response);
    }

}