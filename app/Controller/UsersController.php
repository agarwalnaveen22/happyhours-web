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
class UsersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session', 'Flash');

    public function beforeFilter() {
        parent::beforeFilter();

        // For CakePHP 2.0
        $this->Auth->allow('verifyEmail', 'supplierRegistration', 'supplierDocumentUpload', 'supplierDocumentRemove', 'login', 'verifySupplier');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        //$this->User->recursive = 0;
        //pr($this->Paginator->paginate());die;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            //pr($_FILES['data']['tmp_name']['UserDetail']['profile_picture']);die;
            $this->User->create();
            $this->request->data['User']['is_verified'] = 1;
            $this->request->data['User']['status'] = 1;
            $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
            if ($this->User->save($this->request->data)) {
                if (isset($this->request->data['UserDetail']['profile_picture']) && $this->request->data['UserDetail']['profile_picture']['name'] != '') {
                    $ext = array_reverse(explode(".", $this->request->data['UserDetail']['profile_picture']['name']));
                    $ext = $ext[0];
                    $this->request->data['UserDetail']['profile_picture'] = $this->request->data['UserDetail']['profile_picture']['name'];
                    $filename = uniqid() . "." . $ext;
                    move_uploaded_file($_FILES['data']['tmp_name']['UserDetail']['profile_picture'], "uploads/" . $filename);
                    $this->request->data['UserDetail']['profile_picture'] = $filename;
                } else {
                    unset($this->request->data['UserDetail']['profile_picture']);
                }
                $userId = $this->User->getInsertID();
                $this->request->data['UserDetail']['user_id'] = $userId;
                $this->User->UserDetail->create();
                if ($this->User->UserDetail->save($this->request->data)) {
                    $this->Flash->success(__('The user has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->User->delete($userId);
                    $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->User->UserDetail->validationErrors));
                    $list = iterator_to_array($it, false);
                    $list = implode("<br>",$list);
                    $this->Flash->error(__($list));
                }
            } else {
                $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->User->validationErrors));
                $list = iterator_to_array($it, false);
                $list = implode("<br>",$list);
                $this->Flash->error(__($list));
            }
        }
        $roles = $this->User->Role->find('list');
        $countries = $this->User->UserDetail->Country->find('list');
        $this->set(compact('roles', 'countries'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->User->id = $id;
            $this->request->data['User']['is_verified'] = 1;
            $this->request->data['User']['status'] = 1;
            if ($this->request->data['User']['password'] != '') {
                $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
            } else {
                unset($this->request->data['User']['password']);
            }
            if ($this->User->save($this->request->data)) {
                if (isset($this->request->data['UserDetail']['profile_picture']) && $this->request->data['UserDetail']['profile_picture']['name'] != '') {
                    $ext = array_reverse(explode(".", $this->request->data['UserDetail']['profile_picture']['name']));
                    $ext = $ext[0];
                    $this->request->data['UserDetail']['profile_picture'] = $this->request->data['UserDetail']['profile_picture']['name'];
                    $filename = uniqid() . "." . $ext;
                    move_uploaded_file($_FILES['data']['tmp_name']['UserDetail']['profile_picture'], "uploads/" . $filename);
                    $this->request->data['UserDetail']['profile_picture'] = $filename;
                } else {
                    unset($this->request->data['UserDetail']['profile_picture']);
                }
                $userId = $id;
                $userDetails = $this->User->findById($id);
                $this->User->UserDetail->id = $userDetails['UserDetail'][0]['id'];
                $this->request->data['UserDetail']['user_id'] = $userId;
                if ($this->User->UserDetail->save($this->request->data)) {
                    $this->Flash->success(__('The user has been updated.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->User->delete($userId);
                    $this->Flash->error(__('The user could not be updated. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('The user could not be updated. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $roles = $this->User->Role->find('list');
        $countries = $this->User->UserDetail->Country->find('list');
        $states = $this->User->UserDetail->Country->State->find('list', array('conditions' => array(
                'State.country_id' => $this->request->data['UserDetail'][0]['country_id']
        )));
        $cities = $this->User->UserDetail->Country->State->City->find('list', array('conditions' => array(
                'City.state_id' => $this->request->data['UserDetail'][0]['state_id']
        )));
        $this->set(compact('roles', 'countries', 'states', 'cities'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        //$this->request->allowMethod('post', 'delete');
        if ($this->User->deleteAll(array('User.id' => $id), true)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * admin_index method
     *
     * @return void
     */
    public function admin_index() {
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

    /**
     * admin_view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * admin_add method
     *
     * @return void
     */
    public function admin_add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
    }

    /**
     * admin_edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $roles = $this->User->Role->find('list');
        $this->set(compact('roles'));
    }

    /**
     * admin_delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    // verify email address
    public function verifyEmail($email, $code) {
        $this->layout = false;
        $check = $this->User->find('first', array('conditions' => array(
                'User.email' => base64_decode($email),
                'User.verification_code' => $code
        )));
        if (!empty($check)) {
            $this->User->id = $check['User']['id'];
            $user['status'] = 1;
            $user['is_verified'] = 1;
            /*if ($check['User']['role_id'] == 1) {
                $user['is_verified'] = 1;
            }*/
            if ($this->User->save($user)) {
                echo 'Email verified success.';
            } else {
                echo 'Email can not verified.';
            }
        } else {
            echo 'Email can not verified.';
        }
    }

    public function verifySupplier($email, $code) {
        $this->layout = false;
        $check = $this->User->find('first', array('conditions' => array(
                'User.email' => base64_decode($email),
                'User.verification_code' => $code
        )));
        if (!empty($check)) {
            $this->User->id = $check['User']['id'];
            $user['status'] = 1;
            $password = uniqid();
            $user['password'] = AuthComponent::password($password);
            if ($this->User->save($user)) {
                $this->Flash->success(__('Email verified success.'));
                $this->loadModel('EmailTemplate');
                $settings = $this->viewVars['settings'];
                $emailTemplate = $this->EmailTemplate->find('first', array('conditions' => array(
                        'EmailTemplate.slug' => 'customer-welcome'
                )));
                if (!empty($emailTemplate)) {
                    App::uses('CakeEmail', 'Network/Email');
                    $Email = new CakeEmail($settings['Setting']['email_config']);
                    $Email->from(array($emailTemplate['EmailTemplate']['from_email'] => $emailTemplate['EmailTemplate']['from_name']));
                    $Email->to($this->request->data['SupplierDetail']['company_email']);
                    $Email->subject($emailTemplate['EmailTemplate']['subject']);

                    $emailTemplate['EmailTemplate']['description'] = str_replace("{USERNAME}", $check['User']['email'], $emailTemplate['EmailTemplate']['description']);
                    $emailTemplate['EmailTemplate']['description'] = str_replace("{EMAIL}", $check['User']['email'], $emailTemplate['EmailTemplate']['description']);
                    $emailTemplate['EmailTemplate']['description'] = str_replace("{PASSWORD}", $password, $emailTemplate['EmailTemplate']['description']);
                    $emailTemplate['EmailTemplate']['description'] = str_replace("{SITENAME}", $settings['Setting']['application_name'], $emailTemplate['EmailTemplate']['description']);
                    if ($Email->send($emailTemplate['EmailTemplate']['description'])) {
                        $response['message'] = 'Success';
                    }
                }
            } else {
                $this->Flash->error(__('Email can not verified.'));
            }
        } else {
            $this->Flash->error(__('Email can not verified.'));
        }
    }

    public function supplierRegistration() {
        $this->loadModel('SupplierDetail');
        $settings = $this->viewVars['settings'];
        if ($this->request->is('post')) {
            if ($this->request->data['SupplierDetail']['id'] == '') {
                $this->request->data['User']['email'] = $this->request->data['SupplierDetail']['company_email'];
                $this->request->data['User']['password'] = AuthComponent::password(uniqid());
                $this->request->data['User']['role_id'] = 2;
                $this->request->data['User']['status'] = 0;
                $this->request->data['User']['is_verified'] = 0;
                $this->User->create();
                //pr($this->request->data['User']);die;

                if ($this->User->save($this->request->data)) {
                    $userId = $this->User->getInsertID();
                    $this->request->data['SupplierDetail']['user_id'] = $userId;
                    unset($this->request->data['SupplierDetail']['id']);

                    $this->SupplierDetail->create();
                    if ($this->SupplierDetail->save($this->request->data)) {
                        $supplierId = $this->SupplierDetail->getInsertID();
                        $ponits['SupplierPoint']['supplier_detail_id'] = $supplierId;
                        $ponits['SupplierPoint']['points'] = $settings['Setting']['default_points'];
                        $ponits['SupplierPoint']['point_type'] = 1;
                        $ponits['SupplierPoint']['remaining_points'] = $settings['Setting']['default_points'];
                        $ponits['SupplierPoint']['order_type_id'] = 1;
                        $this->SupplierDetail->SupplierPoint->save($ponits);
                        $response['status'] = true;
                        $response['data'] = $supplierId;
                        $response['message'] = "";
                    } else {
                        $response['status'] = false;
                        $response['message'] = "Can not save details, please try again";
                    }
                    $this->loadModel('EmailTemplate');

                    $emailTemplate = $this->EmailTemplate->find('first', array('conditions' => array(
                            'EmailTemplate.slug' => 'customer-email-verification'
                    )));
                    if (!empty($emailTemplate)) {
                        App::uses('CakeEmail', 'Network/Email');
                        $Email = new CakeEmail($settings['Setting']['email_config']);
                        $Email->from(array($emailTemplate['EmailTemplate']['from_email'] => $emailTemplate['EmailTemplate']['from_name']));
                        $Email->to($this->request->data['SupplierDetail']['company_email']);
                        $Email->subject($emailTemplate['EmailTemplate']['subject']);
                        $code = uniqid();
                        $vcode = Configure::read('App.baseUrl') . "/users/verifySupplier/" . str_replace("==", "", base64_encode($this->request->data['SupplierDetail']['company_email'])) . "/" . $code;
                        $emailTemplate['EmailTemplate']['description'] = str_replace("{USERNAME}", $this->request->data['SupplierDetail']['company_email'], $emailTemplate['EmailTemplate']['description']);
                        $emailTemplate['EmailTemplate']['description'] = str_replace("{LINK}", $vcode, $emailTemplate['EmailTemplate']['description']);
                        $emailTemplate['EmailTemplate']['description'] = str_replace("{SITENAME}", $settings['Setting']['application_name'], $emailTemplate['EmailTemplate']['description']);
                        if ($Email->send($emailTemplate['EmailTemplate']['description'])) {
                            $response['message'] = 'A verification email has been sent to you, please check your email account, please continue to registration';
                        }
                    }
                } else {
                    $response['status'] = false;
                    $response['message'] = "Can not create your account";
                }
            } else {
                $this->loadModel('SupplierDetail');
                $this->SupplierDetail->id = $this->request->data['SupplierDetail']['id'];
                if (isset($this->request->data['SupplierDetail']['declaration'])) {
                    $this->request->data['SupplierDetail']['declaration'] = ($this->request->data['SupplierDetail']['declaration'] == "on") ? 1 : 2;
                }
                if ($this->SupplierDetail->save($this->request->data)) {
                    $response['status'] = true;
                    $response['data'] = $this->request->data['SupplierDetail']['id'];
                } else {
                    $response['status'] = false;
                    $response['message'] = "Can not update details, please try again";
                }
            }
            echo json_encode($response);
            die;
        }
        $this->layout = 'supplier_registration';
        $this->loadModel('Country');
        $this->Country->recursive = 0;
        $this->Country->State->recursive = 0;
        $countries = $this->Country->find('all');

        $states = $this->Country->State->find('all', array('conditions' => array(
                'State.country_id' => 101
        )));
        $supplierCompany = $this->SupplierDetail->CompanyCategory->find('all');
        $supplierCompanyStatus = $this->SupplierDetail->CompanyStatus->find('all');
        $this->set('supplierCompanyStatus', $supplierCompanyStatus);
        //pr($states);die;
        $this->set('countries', $countries);
        $this->set('states', $states);
        $this->set('supplierCompany', $supplierCompany);
    }

    public function supplierDocumentUpload() {
        if ($this->request->is('post')) {
            $this->loadModel('SupplierDocument');
            if (!empty($this->request->form)) {
                if (isset($this->request->form['other'])) {
                    $this->request->data['SupplierDocument']['file_type_id'] = 2;
                    $ext = array_reverse(explode(".", $this->request->form['other']['name']));
                    $ext = $ext[0];
                    $this->request->data['SupplierDocument']['original_name'] = $this->request->form['other']['name'];
                    $filename = uniqid() . "." . $ext;
                    move_uploaded_file($this->request->form['other']['tmp_name'], "uploads/" . $filename);
                } else if (isset($this->request->form['profile'])) {
                    $data = $this->SupplierDocument->find('first', array('conditions' => array(
                            'SupplierDocument.supplier_detail_id' => $this->request->data['id'],
                            'SupplierDocument.file_type_id' => 1
                    )));
                    if (!empty($data)) {
                        $this->SupplierDocument->delete($data['SupplierDocument']['id']);
                        unlink("uploads/" . $data['SupplierDocument']['converted_name']);
                    }
                    $this->request->data['SupplierDocument']['file_type_id'] = 1;
                    $ext = array_reverse(explode(".", $this->request->form['profile']['name']));
                    $ext = $ext[0];
                    $this->request->data['SupplierDocument']['original_name'] = $this->request->form['profile']['name'];
                    $filename = uniqid() . "." . $ext;
                    move_uploaded_file($this->request->form['profile']['tmp_name'], "uploads/" . $filename);
                }
                $this->request->data['SupplierDocument']['converted_name'] = $filename;
                $this->request->data['SupplierDocument']['supplier_detail_id'] = $this->request->data['id'];

                if ($this->SupplierDocument->save($this->request->data)) {
                    $response['status'] = true;
                    $response['id'] = $this->SupplierDocument->getInsertID();
                    $response['name'] = $this->request->data['SupplierDocument']['original_name'];
                } else {
                    $response['status'] = false;
                }
            } else {
                $data = $this->SupplierDocument->find('first', array('conditions' => array(
                        'SupplierDocument.supplier_detail_id' => $this->request->data['id'],
                        'SupplierDocument.file_type_id' => 1
                )));
                $response['status'] = true;
                $response['id'] = $data['SupplierDocument']['id'];
                $response['name'] = $data['SupplierDocument']['original_name'];
            }
            echo json_encode($response);
            die;
        }
    }

    public function supplierDocumentRemove() {
        $this->loadModel('SupplierDocument');
        $data = $this->SupplierDocument->findById($this->request->data['id']);
        if (!empty($data)) {
            $this->SupplierDocument->delete($this->request->data['id']);
            unlink("uploads/" . $data['SupplierDocument']['converted_name']);
            $response['status'] = true;
        } else {
            $response['status'] = false;
            $response['message'] = "can not delete";
        }
        echo json_encode($response);
        die;
    }

    public function login() {
        $this->layout = false;
        if ($this->request->is('post')) {
            $check = $this->User->checkLogin($this->request->data['email'], $this->request->data['password']);
            if (empty($check)) {
                $this->Flash->error(__('Either email address or password is wrong'));
            } else if ($check['User']['role_id'] == 3) {
                $this->Flash->error(__('Your account is not authorized to use this application'));
            } else if ($check['User']['is_verified'] == 0 || $check['User']['status'] == 0) {
                $this->Flash->error(__('Your account is not activated or not verified, please contact to administrator'));
            } else {
                $this->Session->write("Auth.User", $check);
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
            }
        }
    }

    public function dashboard() {
        //pr($this->Session->read("Auth.User"));die;
    }

    public function logout() {
        $this->Auth->logout();
        $this->redirect(array('controller' => 'users', 'action' => 'login'));
    }

    public function supplierList() {
        $this->loadModel('SupplierDetail');
        $supplierList = $this->SupplierDetail->find('all');
        //pr($supplierList);die;
        $this->set('supplierList', $supplierList);
        //echo $this->encryption("naveen");die;
    }

    public function supplierEdit($id) {
        $this->loadModel('SupplierDetail');
        $data = $this->SupplierDetail->findById($id);
        $supplierCompany = $this->SupplierDetail->CompanyCategory->find('all');
        $supplierCompanyStatus = $this->SupplierDetail->CompanyStatus->find('all');
        $this->set('supplierCompanyStatus', $supplierCompanyStatus);
        $countries = $this->SupplierDetail->Country->find('all');

        $states = $this->SupplierDetail->Country->State->find('all', array('conditions' => array(
                'State.country_id' => $data['SupplierDetail']['country_id']
        )));

        $this->set('countries', $countries);
        $this->set('states', $states);
        //pr($supplierCompany);die;
        $this->set('supplierData', $data);
        $this->set('supplierCompany', $supplierCompany);
    }

    public function supplierRegister() {
        $this->loadModel('Country');
        $this->loadModel('SupplierDetail');
        $this->Country->recursive = 0;
        $this->Country->State->recursive = 0;
        $countries = $this->Country->find('all');

        $states = $this->Country->State->find('all', array('conditions' => array(
                'State.country_id' => 101
        )));
        $supplierCompany = $this->SupplierDetail->CompanyCategory->find('all');
        $supplierCompanyStatus = $this->SupplierDetail->CompanyStatus->find('all');
        $this->set('supplierCompanyStatus', $supplierCompanyStatus);
        //pr($states);die;
        $this->set('countries', $countries);
        $this->set('states', $states);
        $this->set('supplierCompany', $supplierCompany);
    }

    public function supplierApproval() {
        if ($this->request->is('post')) {
            $approved = ($this->request->data['is_verified'] == 1) ? "approve" : "reject";
            $this->loadModel('SupplierDetail');
            $checkDocumentVerified = $this->SupplierDetail->SupplierDocument->find('first', array('condtions' => array(
                    'SupplierDocument.supplier_detail_id' => $this->request->data['id'],
                    'SupplierDocument.is_verified' => 0
            )));
            if ($this->request->data['is_verified'] == 0) {
                $user['User']['is_verified'] = $this->request->data['is_verified'];
                $this->User->id = $this->request->data['userId'];
                if ($this->User->save($user)) {
                    $response['status'] = true;
                    $response['message'] = 'Successfully ' . $approved;
                } else {
                    $response['status'] = false;
                    $response['message'] = 'Can not ' . $approved;
                }
            } else {
                if (!empty($checkDocumentVerified)) {
                    $response['status'] = false;
                    $response['message'] = 'Please verify all the documents first';
                } else {
                    $user['User']['is_verified'] = $this->request->data['is_verified'];
                    $this->User->id = $this->request->data['userId'];
                    if ($this->User->save($user)) {
                        $response['status'] = true;
                        $response['message'] = 'Successfully ' . $approved;
                    } else {
                        $response['status'] = false;
                        $response['message'] = 'Can not ' . $approved;
                    }
                }
            }
        }
        echo json_encode($response);
        die;
    }

    public function supplierView($id) {
        $this->loadModel('SupplierDetail');
        $data = $this->SupplierDetail->findById($id);
        //pr($data);die;
        $this->set('supplierData', $data);
    }

    public function supplierVerifyDocuments() {
        if ($this->request->is('post')) {
            if (!empty($this->request->data)) {
                $this->loadModel('SupplierDetail');
                foreach ($this->request->data['document'] as $key => $verify) {
                    $this->SupplierDetail->SupplierDocument->create();
                    $this->SupplierDetail->SupplierDocument->id = array_keys($verify)[0];
                    $data['is_verified'] = 1;
                    $this->SupplierDetail->SupplierDocument->save($data);
                }
                $response['status'] = true;
                $response['message'] = "Successfully verified";
            }
        } else {
            $response['status'] = false;
            $response['message'] = "Invalid request";
        }
        echo json_encode($response);
        die;
    }

    public function campaignList() {
        $this->loadModel('Campaign');
        if ($this->request->is('post')) {
            $this->request->data['Campaign']['start_datetime'] = date("Y-m-d H:i:s", strtotime($this->request->data['Campaign']['start_datetime']));
            $this->request->data['Campaign']['end_datetime'] = date("Y-m-d H:i:s", strtotime($this->request->data['Campaign']['end_datetime']));
            if ($this->request->data['Campaign']['id'] != '') {
                $this->Campaign->id = $this->request->data['Campaign']['id'];
            }
            if ($this->Session->read("Auth.User")['User']['role_id'] == 2) {
                $this->request->data['Campaign']['supplier_detail_id'] = $this->Session->read("Auth.User")['SupplierDetail'][0]['id'];
            }
            if ($this->Campaign->save($this->request->data)) {
                $response['status'] = true;
            } else {
                $response['status'] = false;
                $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->Campaign->validationErrors));
                $list = iterator_to_array($it, false);
                $response['message'] = $list;
            }
            echo json_encode($response);
            die;
        }
        $suppliers = $this->Campaign->SupplierDetail->find('list', array('fields' => array('SupplierDetail.id', 'SupplierDetail.company_name')));
        if ($this->Session->read("Auth.User")['User']['role_id'] == 1) {
            $campaignList = $this->Campaign->find('all');
        } else if ($this->Session->read("Auth.User")['User']['role_id'] == 2) {
            $campaignList = $this->Campaign->find('all', array('conditions' => array(
                    'Campaign.supplier_detail_id' => $this->Session->read("Auth.User")['SupplierDetail'][0]['id']
            )));
        }

        //pr($campaignList);die;
        $this->set('suppliers', $suppliers);
        $this->set('campaignList', $campaignList);
    }

    public function campaignDetail($id) {
        $this->loadModel('Campaign');
        $data = $this->Campaign->findById($id);
        if (!empty($data)) {
            $data['start_datetime'] = date("d/m/Y H:i:s");
            $data['end_datetime'] = date("d/m/Y H:i:s");
            $response['status'] = true;
            $response['data'] = $data;
        } else {
            $response['status'] = false;
            $response['message'] = "Can not found campaign detail";
        }
        echo json_encode($response);
        die;
    }

    public function campaignDelete($id) {
        $this->loadModel('Campaign');
        if ($this->Campaign->deleteAll(array('Campaign.id' => $id), true)) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
            $response['message'] = "Can not delete";
        }
        echo json_encode($response);
        die;
    }

    public function dealAdd($id = null) {
        $this->loadModel('Campaign');
        if ($this->request->is('post')) {
            //pr($this->request);die;
            $campaign = $this->Campaign->findById($this->request->data['Deal']['campaign_id']);
            $this->request->data['Deal']['supplier_detail_id'] = $campaign['Campaign']['supplier_detail_id'];
            $this->request->data['Deal']['start_date'] = date("Y-m-d", strtotime($this->request->data['Deal']['start_date']));
            $this->request->data['Deal']['end_date'] = date("Y-m-d", strtotime($this->request->data['Deal']['end_date']));
            if ($this->request->data['Deal']['id'] != '') {
                $this->Campaign->Deal->id = $this->request->data['Deal']['id'];
            }

            if (isset($this->request->data['Deal']['image']) && $this->request->data['Deal']['image']['name'] != '') {
                $ext = array_reverse(explode(".", $this->request->form['image']['name']));
                $ext = $ext[0];
                $this->request->data['Deal']['image'] = $this->request->form['image']['name'];
                $filename = uniqid() . "." . $ext;
                move_uploaded_file($this->request->form['image']['tmp_name'], "uploads/" . $filename);
                $this->request->data['Deal']['image'] = $filename;
            } else {
                unset($this->request->data['Deal']['image']);
            }
            //pr($this->request->data);die;
            $this->request->data['Deal']['deal_value'] = number_format($this->request->data['Deal']['deal_value'], 2);
            $this->request->data['Deal']['target_country_id'] = $this->request->data['Deal']['country_id'];
            $this->request->data['Deal']['amount'] = number_format($this->request->data['Deal']['amount'], 2);
            if ($this->Campaign->Deal->save($this->request->data)) {
                if ($this->request->data['Deal']['id'] != '') {
                    $dealId = $this->request->data['Deal']['id'];
                } else {
                    $dealId = $this->Campaign->Deal->getInsertID();
                }
                ######### Supplier Points Redemption #############
                
               
               
                //if ($this->request->data['Deal']['id'] == '') {
                if (isset($this->request->data['Deal']['locations']) && $this->request->data['Deal']['locations'] != '') {
                    if ($this->request->data['Deal']['id'] != '') {
                        $this->Campaign->Deal->DealLocation->deleteAll(array('DealLocation.deal_id' => $dealId), true);
                    }
                    $locations = explode(",", $this->request->data['locations']);
                    //pr($this->request->data['Deal']['locations']);die;
                    foreach ($locations as $loc) {
                        $this->Campaign->Deal->DealLocation->create();
                        $location['deal_id'] = $dealId;
                        $location['location_id'] = $loc;
                        $this->Campaign->Deal->DealLocation->save($location);
                    }
                }

                if ((isset($this->request->data['Town']) && !empty($this->request->data['Town'])) || (isset($this->request->data['City']) && !empty($this->request->data['City'])) || (isset($this->request->data['State']) && !empty($this->request->data['State']))) {
                    if ($this->request->data['Deal']['id'] != '') {
                        $this->Campaign->Deal->DealTargetLocation->deleteAll(array('DealTargetLocation.deal_id' => $dealId), true);
                    }
                }

                if (isset($this->request->data['Town']) && !empty($this->request->data['Town'])) {

                    sort($this->request->data['Town']);
                    foreach ($this->request->data['Town'] as $loc) {
                        $this->Campaign->Deal->DealTargetLocation->create();
                        $location['deal_id'] = $dealId;
                        $location['township_id'] = $loc;
                        $this->Campaign->Deal->DealTargetLocation->save($location);
                    }
                }
                $this->loadModel('Country');
                if (isset($this->request->data['City']) && !empty($this->request->data['City'])) {

                    sort($this->request->data['City']);
                    foreach ($this->request->data['City'] as $loc) {
                        $location = array();
                        $towns = $this->Country->State->City->Township->find('list', array('conditions' => array(
                                'Township.city_id' => $loc
                        )));

                        if (!empty($towns)) {
                            $array = array();
                            foreach ($towns as $k => $town) {
                                $array[] = $k;
                            }
                            $already = $this->Campaign->Deal->DealTargetLocation->find('first', array('conditions' => array(
                                    'DealTargetLocation.deal_id' => $dealId,
                                    'DealTargetLocation.township_id' => $array
                            )));

                            if (empty($already)) {
                                $this->Campaign->Deal->DealTargetLocation->create();
                                $location['deal_id'] = $dealId;
                                $location['city_id'] = $loc;
                                $location['township_id'] = 0;
                                $this->Campaign->Deal->DealTargetLocation->save($location);
                            }
                        } else {
                            $this->Campaign->Deal->DealTargetLocation->create();
                            $location['deal_id'] = $dealId;
                            $location['city_id'] = $loc;
                            $location['township_id'] = 0;
                            $this->Campaign->Deal->DealTargetLocation->save($location);
                        }
                    }
                }
                if (isset($this->request->data['State']) && !empty($this->request->data['State'])) {

                    sort($this->request->data['State']);

                    foreach ($this->request->data['State'] as $loc) {
                        $location = array();
                        $towns = $this->Country->State->City->find('all', array('conditions' => array(
                                'City.state_id' => $loc
                        )));

                        if (!empty($towns)) {
                            $array = array();
                            if (!empty($towns['Township'])) {
                                foreach ($towns['Township'] as $town) {
                                    $array[] = $town['id'];
                                }
                                $already = $this->Campaign->Deal->DealTargetLocation->find('first', array('conditions' => array(
                                        'DealTargetLocation.deal_id' => $dealId,
                                        'DealTargetLocation.township_id' => $array
                                )));
                                if (empty($already)) {
                                    $this->Campaign->Deal->DealTargetLocation->create();
                                    $location['deal_id'] = $dealId;
                                    $location['state_id'] = $loc;
                                    $location['city_id'] = 0;
                                    $location['township_id'] = 0;
                                    $this->Campaign->Deal->DealTargetLocation->save($location);
                                }
                            } else {
                                $this->Campaign->Deal->DealTargetLocation->create();
                                $location['deal_id'] = $dealId;
                                $location['city_id'] = 0;
                                $location['township_id'] = 0;
                                $location['state_id'] = $loc;
                                $this->Campaign->Deal->DealTargetLocation->save($location);
                            }
                        } else {
                            $this->Campaign->Deal->DealTargetLocation->create();
                            $location['deal_id'] = $dealId;
                            $location['state_id'] = $loc;
                            $location['city_id'] = 0;
                            $location['township_id'] = 0;
                            $this->Campaign->Deal->DealTargetLocation->save($location);
                        }
                    }
                }
                //}
                $response['status'] = true;
            } else {
                $response['status'] = false;
                $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->Campaign->Deal->validationErrors));
                $list = iterator_to_array($it, false);
                $response['message'] = $list;
            }
            echo json_encode($response);
            die;
        }
        if ($id) {
            //echo $id;die;
            $this->Campaign->Deal->recursive = 2;
            $deal = $this->Campaign->Deal->findById($id);
            $this->loadModel('Country');
            //pr($deal);die;
            $states = $this->Country->findById($deal['Deal']['target_country_id']);
            foreach ($states['State'] as $k => $state) {
                $data['State'][$k] = $state;
                $cities = $this->Country->State->City->findAllByStateId($state['id']);
                $data['State'][$k]['City'] = $cities;
            }
            $stateArray = array();
            $cityArray = array();
            $townArray = array();
            foreach ($deal['DealTargetLocation'] as $tl) {
                if ($tl['state_id'] > 0) {
                    $stateArray[] = $tl['state_id'];
                }
                if ($tl['city_id'] > 0) {
                    $cityArray[] = $tl['city_id'];
                }
                if ($tl['township_id'] > 0) {
                    $townArray[] = $tl['township_id'];
                }
            }
            //pr($deal);die;
            $this->set('stateArray', $stateArray);
            $this->set('cityArray', $cityArray);
            $this->set('townArray', $townArray);
            $this->set('deal', $deal);
            $this->set('dealAllTargetLocation', $data);
        }
        if ($this->Session->read("Auth.User")['User']['role_id'] == 1) {
            $campaigns = $this->Campaign->find('all');
        } else if ($this->Session->read("Auth.User")['User']['role_id'] == 2) {
            $campaigns = $this->Campaign->find('all', array('conditions' => array(
                    'Campaign.supplier_detail_id' => $this->Session->read("Auth.User")['SupplierDetail'][0]['id']
            )));
        }

        $productCategories = $this->Campaign->Deal->ProductCategory->generateTreeList();
        $refreshPeriods = $this->Campaign->Deal->DealRefreshPeriod->find('list');
        $countries = $this->Campaign->Deal->TargetCountry->find('list');
        $this->set('campaigns', $campaigns);
        $this->set('productCategories', $productCategories);
        $this->set('refreshPeriods', $refreshPeriods);
        $this->set('countries', $countries);
    }

    public function getLocations() {
        $this->loadModel('Campaign');
        $supplier = $this->Campaign->findById($this->request->data['id']);
        $list = $this->Campaign->SupplierDetail->Location->find('list', array('conditions' => array(
                'Location.supplier_detail_id' => $supplier['SupplierDetail']['id']
            ), 'fields' => array('Location.id', 'Location.landmark')));
        $response['status'] = true;
        $response['data'] = $list;
        echo json_encode($response);
        die;
    }

    public function getAllTargetLocations() {
        $this->loadModel('Country');
        //$this->request->data['id'] = 101;
        $data = array();
        $states = $this->Country->findById($this->request->data['id']);
        foreach ($states['State'] as $k => $state) {
            $data['State'][$k] = $state;
            $cities = $this->Country->State->City->findAllByStateId($state['id']);
            $data['State'][$k]['City'] = $cities;
        }
        //pr($data);die;
        $response['status'] = true;
        $response['data'] = $data;
        echo json_encode($response);
        die;
    }

    public function dealList() {
        $this->loadModel('Campaign');
        if ($this->Session->read("Auth.User")['User']['role_id'] == 1) {
            $dealList = $this->Campaign->Deal->find('all');
        } else if ($this->Session->read("Auth.User")['User']['role_id'] == 2) {
            $dealList = $this->Campaign->Deal->find('all', array('conditions' => array(
                    'Deal.supplier_detail_id' => $this->Session->read("Auth.User")['SupplierDetail'][0]['id']
            )));
        }
        //pr($dealList);die;
        $this->set('dealList', $dealList);
    }

    public function dealDelete($id) {
        $this->loadModel('Campaign');
        if ($this->Campaign->Deal->deleteAll(array('Deal.id' => $id), true)) {
            $this->redirect(array('controller' => 'users', 'action' => 'dealList'));
        } else {
            $this->Flash->error(__('Can not delete'));
        }
    }

    public function locations($id = NULL) {
        $this->loadModel('SupplierDetail');
        if ($this->request->is('post')) {
            //pr($this->request->data);die;
            if ($this->request->data['Location']['id'] != '') {
                $this->SupplierDetail->Location->id = $this->request->data['Location']['id'];
            }
            if($this->Session->read("Auth.User")['Role']['id']>1){
                $this->request->data['Location']['supplier_detail_id'] = $this->Session->read("Auth.User")['SupplierDetail'][0]['id'];
            }
            if ($this->SupplierDetail->Location->save($this->request->data)) {
                $response['status'] = true;
            } else {
                $response['status'] = false;
                $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->SupplierDetail->Location->validationErrors));
                $list = iterator_to_array($it, false);
                $response['message'] = $list;
            }
            echo json_encode($response);
            die;
        }

        if ($id) {
            $locationDetail = $this->SupplierDetail->Location->findById($id);
            if (!empty($locationDetail)) {
                $response['status'] = true;
                $response['data'] = $locationDetail;
            } else {
                $response['status'] = false;
                $response['message'] = "Location detail can not found";
            }
            echo json_encode($response);
            die;
        }
        $suppliers = $this->SupplierDetail->find('list', array('fields' => array('SupplierDetail.id', 'SupplierDetail.company_name')));
        $countries = $this->SupplierDetail->Country->find('list', array('fields' => array('Country.id', 'Country.name')));
        $states = $this->SupplierDetail->Country->State->find('list', array('conditions' => array('State.country_id' => 132), 'fields' => array('State.id', 'State.name')));
        if ($this->Session->read("Auth.User")['User']['role_id'] == 1) {
            $locations = $this->SupplierDetail->Location->find('all');
        } else if ($this->Session->read("Auth.User")['User']['role_id'] == 2) {
            $locations = $this->SupplierDetail->Location->find('all', array('conditions' => array(
                    'Location.supplier_detail_id' => $this->Session->read("Auth.User")['SupplierDetail'][0]['id']
            )));
        }
        $this->set('suppliers', $suppliers);
        $this->set('countries', $countries);
        $this->set('states', $states);
        $this->set('locations', $locations);
    }

    public function locationDelete($id) {
        $this->loadModel('SupplierDetail');
        if ($this->SupplierDetail->Location->deleteAll(array('Location.id' => $id), true)) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
            $response['message'] = "Can not delete";
        }
        echo json_encode($response);
        die;
    }

    public function acl() {
        if ($this->request->is('post')) {
            $this->User->Role->Acl->deleteAll(array('1 = 1'));
            foreach ($this->request->data as $modules => $value) {
                $module = explode("-", $modules);
                $this->User->Role->Acl->create();
                $acl['role_id'] = $module[0];
                $acl['module'] = str_replace("_", " ", $module[1]);
                $acl['controller'] = $module[2];
                $acl['action'] = $module[3];
                $acl['task'] = $module[4];
                if ($this->User->Role->Acl->save($acl)) {
                    $this->Flash->success(__('Permissions has been saved.'));
                } else {
                    $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($this->User->Role->Acl->validationErrors));
                    $list = iterator_to_array($it, false);
                    $this->Flash->error(__($list));
                }
            }
        }
        $roles = $this->User->Role->find('list', array('conditions' => array('Role.id <>' => 1)));
        $modules = array();
        $modules[] = array("Module" => "Role", "Controller" => "Roles", "Actions" => array("index" => "List", "index_1" => "Add", "index_2" => "Update", "roleDelete" => "Delete"));
        $modules[] = array("Module" => "User", "Controller" => "Users", "Actions" => array("index" => "List", "add" => "Add", "edit" => "Update", "delete" => "Delete"));
        $modules[] = array("Module" => "Supplier", "Controller" => "Users", "Actions" => array("supplierList" => "List", "supplierRegister" => "Add", "supplierView" => "View", "supplierEdit" => "Update"));
        $modules[] = array("Module" => "Campaign", "Controller" => "Users", "Actions" => array("campaignList" => "List", "campaignList_1" => "Add", "campaignDetail" => "Update", "campaignDelete" => "Delete"));
        $modules[] = array("Module" => "Location", "Controller" => "Users", "Actions" => array("locations" => "List", "locations_1" => "Add", "locations_2" => "Update", "locationDelete" => "Delete"));
        $modules[] = array("Module" => "Product Category", "Controller" => "ProductCategories", "Actions" => array("products" => "List", "products_1" => "Add", "products_2" => "Update", "productsDelete" => "Delete"));
        $modules[] = array("Module" => "Deal Refresh Period", "Controller" => "DealRefreshPeriods", "Actions" => array("index" => "List", "index_1" => "Add", "index_2" => "Update", "periodsDelete" => "Delete"));
        $modules[] = array("Module" => "City", "Controller" => "Cities", "Actions" => array("index" => "List", "index_1" => "Add", "index_2" => "Update", "cityDelete" => "Delete"));
        $modules[] = array("Module" => "Township", "Controller" => "Townships", "Actions" => array("index" => "List", "index_1" => "Add", "index_2" => "Update", "townshipDelete" => "Delete"));
        $modules[] = array("Module" => "Deal", "Controller" => "Users", "Actions" => array("dealList" => "List", "dealAdd" => "Add", "dealAdd_1" => "Update", "dealDelete" => "Delete"));
        $modules[] = array("Module" => "Order", "Controller" => "UserOrders", "Actions" => array("index" => "List", "ordersDelete" => "Delete"));

        $this->set('modules', $modules);
        $this->set('roles', $roles);
        $existPermissions = $this->User->Role->Acl->find('all');
        $acls = array();
        if (!empty($existPermissions)) {
            foreach ($existPermissions as $acl) {
                $acls[] = $acl['Acl']['role_id'] . "-" . $acl['Acl']['module'] . "-" . $acl['Acl']['controller'] . "-" . $acl['Acl']['action'] . "-" . $acl['Acl']['task'];
            }
            //pr($acls);die;
        }
        $this->set('acl', $acls);
    }

}