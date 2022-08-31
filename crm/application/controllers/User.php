<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        date_default_timezone_set('Europe/Istanbul');
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User_Model');
        $this->load->helper('url');
        $this->load->library('parser');
        $this->load->library('upload');
        $this->load->library("pagination");
    }

    public function login()
    {
        $this->load->view('admin/login');
    }

    public function assign_user_lead()
    {
        $data = array('Lead_Assign_User_id' => $this->input->post('assign_user_id'),"lead_type"=>0);
        $where_data = array('Lead_id' => $this->input->post('lead_id'));
        $this->db->update("crm_leads", $data, $where_data);
        $this->session->set_flashdata('message', "<div class='alert alert-success'>Lead Assigned Successfully</div>");
        return redirect($this->agent->referrer());
    }

    public function admin_login()
    {
        date_default_timezone_set('Europe/Istanbul');
        $date_time = date('Y-m-d H:i:s');
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $login_data = $this->User_Model->get_login_deatils($user, $pass);
        if ($login_data) {
            if ($login_data->status == 1) {
                $data = array(
                    'id' => $login_data->user_id,
                    'name' => $login_data->name,
                    'phone' => $login_data->mobile,
                    'password' => $login_data->password,
                    'email' => $login_data->email,
                    'image' => $login_data->image,
                    'status' => $login_data->status,
                    'type' => $login_data->type
                );
                $this->session->set_userdata($data);
                if ($login_data->type == 1) {
                    return redirect(base_url('User/dashboard'));
                } elseif ($login_data->type == 2) {
                    return redirect(base_url('User/dashboard'));
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-success"><strong>Error! </strong>Your Account Blocked</div>');
                return redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger"><strong>Error! </strong>Invalid username or password</div>');
            return redirect($this->agent->referrer());
        }
    }

    public function open_user()
    {
        $type_data = array('admin_user_type' => $this->uri->segment(3), 'user_type' => 'super');
        $this->session->set_userdata($type_data);
        return redirect(base_url('User/dashboard'));
    }

    public function dashboard()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/dashboard";
                $config["total_rows"] = $this->User_Model->get_all_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_all_lead($config["per_page"], $page);
                $this->load->view("admin/dashboard", $data);
            }

            if ($this->session->userdata('type') != 1) {

                $config = array();
                $config["base_url"] = base_url() . "User/dashboard";
                $config["total_rows"] = $this->User_Model->get_user_all_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_user_all_lead($config["per_page"], $page);
                $this->load->view("admin/dashboard", $data);

            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function dashboard_high()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/dashboard_high";
                $config["total_rows"] = $this->User_Model->get_all_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_all_lead_high($config["per_page"], $page);
                $this->load->view("admin/dashboard", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/dashboard_high";
                $config["total_rows"] = $this->User_Model->get_user_all_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_user_all_lead_high($config["per_page"], $page);
                $this->load->view("admin/dashboard", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function dashboard_low()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/dashboard_low";
                $config["total_rows"] = $this->User_Model->get_all_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_all_lead_low($config["per_page"], $page);
                $this->load->view("admin/dashboard", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/dashboard_low";
                $config["total_rows"] = $this->User_Model->get_user_all_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_user_all_lead_low($config["per_page"], $page);
                $this->load->view("admin/dashboard", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function manage_news_letter()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "1") {
            $config = array();
            $config["base_url"] = base_url() . "User/manage_news_letter";
            $config["total_rows"] = $this->User_Model->get_all_lead_countt();
            $config['per_page'] = 20;
            $config['uri_segment'] = '3';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["total_lead"] = $config;
            $data["all_links"] = $this->pagination->create_links();
            $data['all_leads'] = $this->User_Model->get_all_lead($config["per_page"], $page);
            $this->load->view('admin/news_letter/index', $data);
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function manage_user_news_letter()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "2") {
            $config = array();
            $config["base_url"] = base_url() . "User/manage_user_news_letter";
            $config["total_rows"] = $this->User_Model->get_all_lead_counttt();
            $config['per_page'] = 20;
            $config['uri_segment'] = '3';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["total_lead"] = $config;
            $data["all_links"] = $this->pagination->create_links();
            $data['all_leads'] = $this->User_Model->get_all_leadd($config["per_page"], $page);
            print_r($this->session->userdata());
            $this->load->view('admin/news_letter/user_news_letter', $data);
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function user_dashboard()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "2") {
            $this->load->view('admin/user-dashboard');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function add_user()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "1") {
            if (isset($_POST['register'])) {
                $Customer_Phone = $this->User_Model->get_primary_phone($this->input->post('phone'));
                if ($Customer_Phone->Customer_Phone == "") {
                    $user_data = array(
                        'name' => $this->input->post('name'),
                        'mobile' => $this->input->post('phone'),
                        'password' => $this->input->post('password'),
                        'email' => $this->input->post('email'),
                        'status' => 1,
                        'type' => 2,
                        'LastUpdateDate' => date('Y-m-d h:i:s'),
                        'register_date' => date('Y-m-d h:i:s')
                    );
                    $this->db->insert("crm_user", $user_data);
                    $this->session->set_flashdata('message', "<div class='alert alert-success'>User Added Successfully</div>");
                    return redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('message', "<div class='alert alert-danger'>Mobile Number Already Exist</div>");
                    return redirect($this->agent->referrer());
                }
            } else {
                $this->load->view("admin/add-user");
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function update_user_data()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "1") {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $this->input->post();
                $where_data = array('user_id' => $this->input->post('user_id'));
                $history_data = $this->db->update("crm_user", $data, $where_data);
                $this->session->set_flashdata('message', "<div class='alert alert-success'>User Record Updated Successfully</div>");
                return redirect($this->agent->referrer());
            } else {
                return redirect($this->agent->referrer());
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function add_lead()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $lead_Phone = $this->User_Model->get_lead_phone($this->input->post('mobile'));
                if ($lead_Phone->mobile == "") {
                    $data_array = $this->input->post();
                    if ($this->input->post('source_of_enquiry') == 'dubai_pool') {
                        $data_array['dubai_pool'] = 1;
                    } else {
                        $data_array['dubai_pool'] = 0;
                    }
                    if ($this->input->post('source_of_enquiry') == 'dubai_pool') {
                        $data_array['Referance_id'] = 'dubai_pool';
                    }
                    $data_array['Lead_created_date'] = date('Y-m-d H:i:s');
                    $data_array['country'] = $this->input->post('origin_country');
                    $this->db->insert("crm_leads", $data_array);
                    $this->session->set_flashdata('message', "<div class='alert alert-success'>Lead Added Successfully</div>");
                    return redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('message', "<div class='alert alert-danger'>Mobile Number Already Exist</div>");
                    return redirect($this->agent->referrer());
                }
            } else {
                $this->load->view("admin/add-lead");
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function update_lead_data()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $this->input->post();
                $data['lead_update_date'] = date('Y-m-d H:i:s');
                $where_data = array('Lead_id' => $this->input->post('lead_id'));
                $history_data = $this->db->update("crm_leads", $data, $where_data);
                $this->session->set_flashdata('message', "<div class='alert alert-success'>Lead Updated Successfully</div>");
                return redirect($this->agent->referrer());

            } else {
                return redirect($this->agent->referrer());
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function rollback_uninterested()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->uri->segment('3') == '') {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>Sorry, something went wrong</div>");
                return redirect($this->agent->referrer());
            } else {
                $data = array('uninterested_pool' => 0);
                $where_data = array('Lead_id' => $this->uri->segment('3'));
                $assign_data = $this->db->update("crm_leads", $data, $where_data);
                $this->session->set_flashdata('message', "<div class='alert alert-success'>Lead Rollback Successfully</div>");
                return redirect($this->agent->referrer());
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function rollback_soldpool()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->uri->segment('3') == '') {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>Sorry, something went wrong</div>");
                return redirect($this->agent->referrer());
            } else {
                $data = array('sold_pool' => 0);
                $where_data = array('Lead_id' => $this->uri->segment('3'));
                $assign_data = $this->db->update("crm_leads", $data, $where_data);
                $this->session->set_flashdata('message', "<div class='alert alert-success'>Lead Rollback Successfully</div>");
                return redirect($this->agent->referrer());
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function assign_lead()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "1") {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if ($this->input->post('lead_id') == "") {
                    $this->session->set_flashdata('message', "<div class='alert alert-danger'>Please Check Any Lead Than Assign </div>");
                    return redirect($this->agent->referrer());
                } else {
                    foreach ($this->input->post('lead_id') as $value) {
                        $this->db->set('Lead_Assign_User_id', $this->input->post('user_id'));
                        $this->db->where('Lead_id', $value);
                        $this->db->update("crm_leads");
                    }
                    $this->session->set_flashdata('message', "<div class='alert alert-success'>Lead Assigned Successfully</div>");
                    return redirect($this->agent->referrer());
                }
            } else {
                return redirect($this->agent->referrer());
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function delete_lead()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "1") {
            if ($this->uri->segment('3') != "") {
                $data = $this->db->delete('crm_leads', array('Lead_id' => $this->uri->segment('3')));
                if ($data) {
                    $this->session->set_flashdata('message', "<div class='alert alert-success'>Lead Deleted Successfully</div>");
                    return redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('message', "<div class='alert alert-danger'>Lead Not Deleted</div>");
                    return redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>Lead Not Deleted</div>");
                return redirect($this->agent->referrer());
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function add_sale_details()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $this->input->post();
                $data['Sale_created_date'] = date('Y-m-d h:i:s');
                $sale_data = $this->db->insert("crm_sale_details", $data);
                if ($sale_data) {
                    $this->session->set_flashdata('message', "<div class='alert alert-success'>Sale Details Added Successfully</div>");
                    return redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('message', "<div class='alert alert-danger'>Sale Details Not Added</div>");
                    return redirect($this->agent->referrer());
                }
            } else {
                $this->load->view("admin/add-lead");
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function get_sale_data()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            $this->load->view("admin/get-ajax-data");
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function get_raising_sale_data()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            $this->load->view("admin/get-ajax-data");
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function get_edit_lead_data()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            $this->load->view("admin/get-ajax-data");
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function add_raising_sale_details()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = $this->input->post();
                $data['created_date'] = date('Y-m-d h:i:s');
                $raising_sale_data = $this->db->insert("crm_raising_details", $data);
                if ($raising_sale_data) {
                    $this->session->set_flashdata('message', "<div class='alert alert-success'>Raising Sale Details Added Successfully</div>");
                    return redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('message', "<div class='alert alert-danger'>Raising Sale Details Not Added</div>");
                    return redirect($this->agent->referrer());
                }
            } else {
                $this->load->view("admin/add-lead");
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function add_history_comment()
    {
        $this->db->set('lead_type', 1);
        $this->db->set('circled', 1);
        $this->db->where('Lead_id', $this->input->post('lead_id'));
        $this->db->update('crm_leads');

        $data = array(
            'History_User_id' => $this->session->userdata('id'),
            'History_Lead_id' => $this->input->post('lead_id'),
            'History_Referance' => $this->input->post('referred_to'),
            'History_Status' => "Followup",
            'History_Description' => $this->input->post('comment'),
            'History_Date' => date('Y-m-d h:i:s'));
        $this->db->insert("crm_history", $data);
        echo json_encode($data);
    }

    public function save_lead_details()
    {
        if ($this->input->post('spoken') == "") {
            $data = array('spoken' => $this->input->post('spoken'));
        }
        if ($this->input->post('called') == "") {
            $data = array('called' => $this->input->post('called'));
        }

        $data = array(
            'history_user_id' => $this->session->userdata('id'),
            'lead_id' => $this->input->post('lead_id'),
            'next_call_date' => $this->input->post('next_call'),
            'history_date' => date("Y-m-d"));
        $this->db->insert("crm_call_history", $data);

        $user_lead_type = 0;
        if ($this->input->post('user_lead_type')==1){
            $user_lead_type= 1;
        }
        $data = array(
            'client_category' => $this->input->post('source_category'),
            'booking_status' => $this->input->post('client_status'),
            'maximum_budget' => $this->input->post('maximum_budget'),
            'booking_date' => $this->input->post('booking_date'),
            'priority' => $this->input->post('priority'),
            'sold_pool' => $this->input->post('sold_pool'),
            'uninterested_pool' => $this->input->post('uninterested_pool'),
            'next_call_date' => $this->input->post('next_call'),
            'visiting_date' => $this->input->post('visiting_date'),
            'user_lead_type' => $user_lead_type,
            'circled' => 1,
            'lead_type' => 1
        );
        $where_data = array('Lead_id' => $this->input->post('lead_id'));
        $history_data = $this->db->update("crm_leads", $data, $where_data);
        if ($history_data) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>Lead Updated Successfully</div>");
            return redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Lead Not Updated</div>");
            return redirect($this->agent->referrer());
        }
    }

    public function manage_leads()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "1") {
            $config = array();
            $config["base_url"] = base_url() . "User/manage_leads";
            $config["total_rows"] = $this->User_Model->get_count();
            $config['per_page'] = 10;
            $config['uri_segment'] = '2';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
            $data["links"] = $this->pagination->create_links();
            $data['leads'] = $this->User_Model->get_fresh_lead($config["per_page"], $page);
            $this->load->view("admin/manage-leads", $data);
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function manage_dubai_leads()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "1") {
            $config = array();
            $config["base_url"] = base_url() . "User/manage_dubai_leads";
            $config["total_rows"] = $this->User_Model->get_count_dubai();

            $config['per_page'] = 10;
            $config['uri_segment'] = '3';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["total_lead"] = $config;
            $data["links"] = $this->pagination->create_links();


            $data['leads'] = $this->User_Model->get_fresh_lead_dubai($config["per_page"], $page);
            $this->load->view("admin/manage-leads-dubai", $data);
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function sold_pool()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/sold_pool";
                $config["total_rows"] = $this->User_Model->get_sold_pool_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_all_sold_lead($config["per_page"], $page);
                $this->load->view("admin/sold_pool", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/sold_pool";
                $config["total_rows"] = $this->User_Model->get_user_sold_pool_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_user_all_sold_lead($config["per_page"], $page);
                $this->load->view("admin/sold_pool", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function dubai_pool()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/dubai_pool";
                $config["total_rows"] = $this->User_Model->get_dubai_pool_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $data["total_lead"] = $config;

                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_all_dubai_lead($config["per_page"], $page);
                $this->load->view("admin/dubai_pool", $data);
            }
            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/dubai_pool";
                $config["total_rows"] = $this->User_Model->get_user_dubai_pool_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $data["total_lead"] = $config;

                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_user_all_dubai_lead($config["per_page"], $page);
                $this->load->view("admin/dubai_pool", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function dubai_pool_low()
    {

        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/dubai_pool_low";
                $config["total_rows"] = $this->User_Model->get_dubai_pool_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $data["total_lead"] = $config;

                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_all_dubai_lead_low($config["per_page"], $page);
                $this->load->view("admin/dubai_pool", $data);
            }
            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/dubai_pool_low";
                $config["total_rows"] = $this->User_Model->get_user_dubai_pool_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $data["total_lead"] = $config;

                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_user_all_dubai_lead_low($config["per_page"], $page);
                $this->load->view("admin/dubai_pool", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function uninterested_pool()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $data=array();
                $config["base_url"] = base_url() . "User/uninterested_pool";
                $config["total_rows"] = $this->User_Model->get_uninterested_pool_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_all_uninterested_lead($config["per_page"], $page);
                $this->load->view("admin/uninterested_pool", $data);
            }
            if ($this->session->userdata('type') != 1) {
                $config = array();
                $data=array();
                $config["base_url"] = base_url() . "User/uninterested_pool";
                $config["total_rows"] = $this->User_Model->get_user_uninterested_pool_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["all_links"] = $this->pagination->create_links();
                $data['all_leads'] = $this->User_Model->get_user_all_uninterested_lead($config["per_page"], $page);
                $this->load->view("admin/uninterested_pool", $data);
            }

        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function today_call_list()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/today_call_list";
                $config["total_rows"] = $this->User_Model->get_today_call_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["today_call_links"] = $this->pagination->create_links();
                $data['today_call_leads'] = $this->User_Model->get_today_call_lead($config["per_page"], $page);
                $this->load->view("admin/today_call_list", $data);
            }
            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/today_call_list";
                $config["total_rows"] = $this->User_Model->get_user_today_call_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["today_call_links"] = $this->pagination->create_links();
                $data['today_call_leads'] = $this->User_Model->get_user_today_call_lead($config["per_page"], $page);
                $this->load->view("admin/today_call_list", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function today_call_list_high()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/today_call_list_high";
                $config["total_rows"] = $this->User_Model->get_today_call_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["today_call_links"] = $this->pagination->create_links();
                $data['today_call_leads'] = $this->User_Model->get_today_call_lead_high($config["per_page"], $page);
                $this->load->view("admin/today_call_list", $data);
            }
            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/today_call_list_high";
                $config["total_rows"] = $this->User_Model->get_user_today_call_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["today_call_links"] = $this->pagination->create_links();
                $data['today_call_leads'] = $this->User_Model->get_user_today_call_lead_high($config["per_page"], $page);
                $this->load->view("admin/today_call_list", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function today_call_list_low()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/today_call_list_low";
                $config["total_rows"] = $this->User_Model->get_today_call_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["today_call_links"] = $this->pagination->create_links();
                $data['today_call_leads'] = $this->User_Model->get_today_call_lead_low($config["per_page"], $page);
                $this->load->view("admin/today_call_list", $data);
            }
            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/today_call_list_low";
                $config["total_rows"] = $this->User_Model->get_user_today_call_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["today_call_links"] = $this->pagination->create_links();
                $data['today_call_leads'] = $this->User_Model->get_user_today_call_lead_low($config["per_page"], $page);
                $this->load->view("admin/today_call_list", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function today_call_list_dubai()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/today_call_list_dubai";
                $config["total_rows"] = $this->User_Model->get_today_call_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["today_call_links"] = $this->pagination->create_links();
                $data['today_call_leads'] = $this->User_Model->get_today_call_lead_dubai($config["per_page"], $page);
                $this->load->view("admin/today_call_list_dubai", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/today_call_list_dubai";
                $config["total_rows"] = $this->User_Model->get_user_today_call_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["today_call_links"] = $this->pagination->create_links();
                $data['today_call_leads'] = $this->User_Model->get_user_today_call_lead_dubai($config["per_page"], $page);
                $this->load->view("admin/today_call_list_dubai", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function today_call_list_dubai_low()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/today_call_list_dubai_low";
                $config["total_rows"] = $this->User_Model->get_today_call_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["today_call_links"] = $this->pagination->create_links();
                $data['today_call_leads'] = $this->User_Model->get_today_call_lead_dubai_low($config["per_page"], $page);
                $this->load->view("admin/today_call_list_dubai", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/today_call_list_dubai_low";
                $config["total_rows"] = $this->User_Model->get_user_today_call_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["today_call_links"] = $this->pagination->create_links();
                $data['today_call_leads'] = $this->User_Model->get_user_today_call_lead_dubai_low($config["per_page"], $page);
                $this->load->view("admin/today_call_list_dubai", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function new_lead()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/new_lead";
                $config["total_rows"] = $this->User_Model->get_new_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["new_links"] = $this->pagination->create_links();
                $data['new_leads'] = $this->User_Model->get_new_lead($config["per_page"], $page);
                $this->load->view("admin/new_lead", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/new_lead";
                $config["total_rows"] = $this->User_Model->get_user_new_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["new_links"] = $this->pagination->create_links();
                $data['new_leads'] = $this->User_Model->get_user_new_lead($config["per_page"], $page);
                $this->load->view("admin/new_lead", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function new_lead_high()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/new_lead_high";
                $config["total_rows"] = $this->User_Model->get_new_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["new_links"] = $this->pagination->create_links();
                $data['new_leads'] = $this->User_Model->get_new_lead_high($config["per_page"], $page);
                $this->load->view("admin/new_lead", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/new_lead_high";
                $config["total_rows"] = $this->User_Model->get_user_new_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["new_links"] = $this->pagination->create_links();
                $data['new_leads'] = $this->User_Model->get_user_new_lead_high($config["per_page"], $page);
                $this->load->view("admin/new_lead", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function new_lead_low()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/new_lead_low";
                $config["total_rows"] = $this->User_Model->get_new_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["new_links"] = $this->pagination->create_links();
                $data['new_leads'] = $this->User_Model->get_new_lead_low($config["per_page"], $page);
                $this->load->view("admin/new_lead", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/new_lead_low";
                $config["total_rows"] = $this->User_Model->get_user_new_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["new_links"] = $this->pagination->create_links();
                $data['new_leads'] = $this->User_Model->get_user_new_lead_low($config["per_page"], $page);
                $this->load->view("admin/new_lead", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function new_lead_dubai()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/new_lead_dubai";
                $config["total_rows"] = $this->User_Model->get_new_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["new_links"] = $this->pagination->create_links();
                $data['new_leads'] = $this->User_Model->get_new_lead_dubai($config["per_page"], $page);
                $this->load->view("admin/new_lead_dubai", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/new_lead_dubai";
                $config["total_rows"] = $this->User_Model->get_user_new_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["new_links"] = $this->pagination->create_links();
                $data['new_leads'] = $this->User_Model->get_user_new_lead_dubai($config["per_page"], $page);
                $this->load->view("admin/new_lead_dubai", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function new_lead_dubai_low()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/new_lead_dubai_low";
                $config["total_rows"] = $this->User_Model->get_new_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["new_links"] = $this->pagination->create_links();
                $data['new_leads'] = $this->User_Model->get_new_lead_dubai_low($config["per_page"], $page);
                $this->load->view("admin/new_lead_dubai", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/new_lead_dubai_low";
                $config["total_rows"] = $this->User_Model->get_user_new_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["new_links"] = $this->pagination->create_links();
                $data['new_leads'] = $this->User_Model->get_user_new_lead_dubai_low($config["per_page"], $page);
                $this->load->view("admin/new_lead_dubai", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function future_next_call()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/future_next_call";
                $config["total_rows"] = $this->User_Model->get_future_next_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["future_links"] = $this->pagination->create_links();
                $data['future_leads'] = $this->User_Model->get_future_next_lead($config["per_page"], $page);
                $this->load->view("admin/future_next_call", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/future_next_call";
                $config["total_rows"] = $this->User_Model->get_user_future_next_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["future_links"] = $this->pagination->create_links();
                $data['future_leads'] = $this->User_Model->get_user_future_next_lead($config["per_page"], $page);
                $this->load->view("admin/future_next_call", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function future_next_call_high()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/future_next_call_high";
                $config["total_rows"] = $this->User_Model->get_future_next_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["future_links"] = $this->pagination->create_links();
                $data['future_leads'] = $this->User_Model->get_future_next_lead_high($config["per_page"], $page);
                $this->load->view("admin/future_next_call", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/future_next_call_high";
                $config["total_rows"] = $this->User_Model->get_user_future_next_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["future_links"] = $this->pagination->create_links();
                $data['future_leads'] = $this->User_Model->get_user_future_next_lead_high($config["per_page"], $page);
                $this->load->view("admin/future_next_call", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function future_next_call_low()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/future_next_call_low";
                $config["total_rows"] = $this->User_Model->get_future_next_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["future_links"] = $this->pagination->create_links();
                $data['future_leads'] = $this->User_Model->get_future_next_lead_low($config["per_page"], $page);
                $this->load->view("admin/future_next_call", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/future_next_call_low";
                $config["total_rows"] = $this->User_Model->get_user_future_next_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["future_links"] = $this->pagination->create_links();
                $data['future_leads'] = $this->User_Model->get_user_future_next_lead_low($config["per_page"], $page);
                $this->load->view("admin/future_next_call", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function future_next_call_dubai()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/future_next_call_dubai";
                $config["total_rows"] = $this->User_Model->get_future_next_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["future_links"] = $this->pagination->create_links();
                $data['future_leads'] = $this->User_Model->get_future_next_lead_dubai($config["per_page"], $page);
                $this->load->view("admin/future_next_call_dubai", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/future_next_call_dubai";
                $config["total_rows"] = $this->User_Model->get_user_future_next_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["future_links"] = $this->pagination->create_links();
                $data['future_leads'] = $this->User_Model->get_user_future_next_lead_dubai($config["per_page"], $page);
                $this->load->view("admin/future_next_call_dubai", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function future_next_call_dubai_low()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/future_next_call_dubai_low";
                $config["total_rows"] = $this->User_Model->get_future_next_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["future_links"] = $this->pagination->create_links();
                $data['future_leads'] = $this->User_Model->get_future_next_lead_dubai_low($config["per_page"], $page);
                $this->load->view("admin/future_next_call_dubai", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/future_next_call_dubai_low";
                $config["total_rows"] = $this->User_Model->get_user_future_next_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["future_links"] = $this->pagination->create_links();
                $data['future_leads'] = $this->User_Model->get_user_future_next_lead_dubai_low($config["per_page"], $page);
                $this->load->view("admin/future_next_call_dubai", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function previous_next_call()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {

            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/previous_next_call";
                $config["total_rows"] = $this->User_Model->get_previous_next_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["previous_links"] = $this->pagination->create_links();
                $data['previous_leads'] = $this->User_Model->get_previous_next_lead($config["per_page"], $page);
                $this->load->view("admin/previous_next_call", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/previous_next_call";
                $config["total_rows"] = $this->User_Model->get_user_previous_next_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["previous_links"] = $this->pagination->create_links();
                $data['previous_leads'] = $this->User_Model->get_user_previous_next_lead($config["per_page"], $page);
                $this->load->view("admin/previous_next_call", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function previous_next_call_high()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {

            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/previous_next_call_high";
                $config["total_rows"] = $this->User_Model->get_previous_next_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["previous_links"] = $this->pagination->create_links();
                $data['previous_leads'] = $this->User_Model->get_previous_next_lead_high($config["per_page"], $page);
                $this->load->view("admin/previous_next_call", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/previous_next_call_high";
                $config["total_rows"] = $this->User_Model->get_user_previous_next_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["previous_links"] = $this->pagination->create_links();
                $data['previous_leads'] = $this->User_Model->get_user_previous_next_lead_high($config["per_page"], $page);
                $this->load->view("admin/previous_next_call", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function previous_next_call_low()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {

            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/previous_next_call_low";
                $config["total_rows"] = $this->User_Model->get_previous_next_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["previous_links"] = $this->pagination->create_links();
                $data['previous_leads'] = $this->User_Model->get_previous_next_lead_low($config["per_page"], $page);
                $this->load->view("admin/previous_next_call", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/previous_next_call_low";
                $config["total_rows"] = $this->User_Model->get_user_previous_next_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["previous_links"] = $this->pagination->create_links();
                $data['previous_leads'] = $this->User_Model->get_user_previous_next_lead_low($config["per_page"], $page);
                $this->load->view("admin/previous_next_call", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function previous_next_call_dubai()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/previous_next_call_dubai";
                $config["total_rows"] = $this->User_Model->get_previous_next_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["previous_links"] = $this->pagination->create_links();
                $data['previous_leads'] = $this->User_Model->get_previous_next_lead_dubai($config["per_page"], $page);
                $this->load->view("admin/previous_next_call_dubai", $data);
            }
            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/previous_next_call_dubai";
                $config["total_rows"] = $this->User_Model->get_user_previous_next_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["previous_links"] = $this->pagination->create_links();
                $data['previous_leads'] = $this->User_Model->get_user_previous_next_lead_dubai($config["per_page"], $page);
                $this->load->view("admin/previous_next_call_dubai", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }
    public function previous_next_call_dubai_low()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/previous_next_call_dubai_low";
                $config["total_rows"] = $this->User_Model->get_previous_next_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["previous_links"] = $this->pagination->create_links();
                $data['previous_leads'] = $this->User_Model->get_previous_next_lead_dubai_low($config["per_page"], $page);
                $this->load->view("admin/previous_next_call_dubai", $data);
            }
            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/previous_next_call_dubai_low";
                $config["total_rows"] = $this->User_Model->get_user_previous_next_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["previous_links"] = $this->pagination->create_links();
                $data['previous_leads'] = $this->User_Model->get_user_previous_next_lead_dubai_low($config["per_page"], $page);
                $this->load->view("admin/previous_next_call_dubai", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function low_to_high()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/low_to_high";
                $config["total_rows"] = $this->User_Model->get_low_to_high_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["low_to_high_links"] = $this->pagination->create_links();
                $data['low_to_high_leads'] = $this->User_Model->get_low_to_high_lead($config["per_page"], $page);
                $this->load->view("admin/low_to_high", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/low_to_high";
                $config["total_rows"] = $this->User_Model->get_user_low_to_high_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["low_to_high_links"] = $this->pagination->create_links();
                $data['low_to_high_leads'] = $this->User_Model->get_user_low_to_high_lead($config["per_page"], $page);
                $this->load->view("admin/low_to_high", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function low_to_high_dubai()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/low_to_high_dubai";
                $config["total_rows"] = $this->User_Model->get_low_to_high_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["low_to_high_links"] = $this->pagination->create_links();
                $data['low_to_high_leads'] = $this->User_Model->get_low_to_high_lead_dubai($config["per_page"], $page);
                $this->load->view("admin/low_to_high_dubai", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/low_to_high_dubai";
                $config["total_rows"] = $this->User_Model->get_user_low_to_high_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["low_to_high_links"] = $this->pagination->create_links();
                $data['low_to_high_leads'] = $this->User_Model->get_user_low_to_high_lead_dubai($config["per_page"], $page);
                $this->load->view("admin/low_to_high_dubai", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function high_to_low()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/high_to_low";
                $config["total_rows"] = $this->User_Model->get_high_to_low_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["high_to_low_links"] = $this->pagination->create_links();
                $data['high_to_low_leads'] = $this->User_Model->get_high_to_low_lead($config["per_page"], $page);
                $this->load->view("admin/high_to_low", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/high_to_low";
                $config["total_rows"] = $this->User_Model->get_user_high_to_low_lead_count();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["high_to_low_links"] = $this->pagination->create_links();
                $data['high_to_low_leads'] = $this->User_Model->get_user_high_to_low_lead($config["per_page"], $page);
                $this->load->view("admin/high_to_low", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function high_to_low_dubai()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            if ($this->session->userdata('type') == 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/high_to_low_dubai";
                $config["total_rows"] = $this->User_Model->get_high_to_low_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["high_to_low_links"] = $this->pagination->create_links();
                $data['high_to_low_leads'] = $this->User_Model->get_high_to_low_lead_dubai($config["per_page"], $page);
                $this->load->view("admin/high_to_low_dubai", $data);
            }

            if ($this->session->userdata('type') != 1) {
                $config = array();
                $config["base_url"] = base_url() . "User/high_to_low_dubai";
                $config["total_rows"] = $this->User_Model->get_user_high_to_low_lead_count_dubai();
                $config['per_page'] = 10;
                $config['uri_segment'] = '3';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
                $data["total_lead"] = $config;
                $data["high_to_low_links"] = $this->pagination->create_links();
                $data['high_to_low_leads'] = $this->User_Model->get_user_high_to_low_lead_dubai($config["per_page"], $page);
                $this->load->view("admin/high_to_low_dubai", $data);
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function get_user_data()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "1") {
            $this->load->view('admin/get-ajax-data');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function user_profile()
    {

        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            $this->load->view("admin/user-profile");
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function update_user()
    {
        if (isset($_POST['update_profile'])) {
            $data = array(
                'name' => $this->input->post('name'),
                'mobile' => $this->input->post('phone'),
                // 'email'    		=> $this->input->post('email'),
                'status' => $this->input->post('status'),
                'LastUpdateDate' => date('Y-m-d h:i:s')
            );
            $update_data = $this->User_Model->update_user($data);
            if ($update_data) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'>Profile Updated Successfully</div>");
                return redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>Profile Not Updated</div>");
                return redirect($this->agent->referrer());
            }
        }
    }

    public function update_user_activity()
    {
        if ($this->uri->segment('3') == 1) {
            $data = array(
                'Customer_Status' => 1,
                'Customer_Date_Updated' => date('Y-m-d h:i:s')
            );
        } else {
            $data = array(
                'Customer_Status' => 0,
                'Customer_Date_Updated' => date('Y-m-d h:i:s')
            );
        }
        $this->User_Model->update_user_activity($this->uri->segment('4'), $data);
        $this->session->set_flashdata('message', "<div class='alert alert-success'>Account Updated Successfully</div>");
        return redirect($this->agent->referrer());
    }

    public function add_sale_product()
    {
        if (isset($_POST['add_sale'])) {
            $data = array(
                'Sale_Amount' => $this->input->post('amount'),
                'Sale_Description' => $this->input->post('description'),
                'Sale_Date' => $this->input->post('sale_date'),
                'Sale_Customer_Id' => $this->input->post('customer_id'),
                'Sale_parent_comission' => $this->input->post('amount') * 2.5 / 100,
                'Sale_self_comission' => $this->input->post('amount') * 5 / 100,
                'Sale_Status' => 0,
                'Sale_Date_Date' => date('Y-m-d h:i:s')
            );
            $this->db->insert("sale_product", $data);
            $this->session->set_flashdata('message', "<div class='alert alert-success'>Sale Added Successfully</div>");
            return redirect($this->agent->referrer());
        }
    }

    public function search_connection()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "2") {
            $this->load->view('admin/search-connection');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function settlement()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "2") {
            $this->load->view('admin/settlement');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function view_settlement()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "2") {
            $this->load->view('admin/view-settlement');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function user_connection()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            $this->load->view('admin/user-connection');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function our_comission()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            $this->load->view('admin/user-comission');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function our_connection_comission()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            $this->load->view('admin/user-connection-comission');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function our_sale()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            $this->load->view('admin/user-sale');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function change_password()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1") {
            $this->load->view('admin/change-password');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function get_ajax_data()
    {
        $this->load->view('admin/get-ajax-data');
    }

    public function update_website_contact()
    {
        $Contact_type = $this->input->post('Contact_type');
        $data = array('configValue' => $this->input->post('configValue'));
        $login_query = $this->User_Model->update_website_contact($Contact_type, $data);
        if ($data) {
            $this->session->set_flashdata('success_message', "<div class='alert alert-success'>Contact details updated successfully</div>");
            return redirect(base_url('User/manage_contact_details'));
        } else {
            $this->session->set_flashdata('error_message', "<div class='alert alert-danger'>Contact details not updated</div>");
            return redirect(base_url('User/manage_contact_details'));
        }
    }

    public function contact_us_details()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "2") {
            $this->load->view('admin/contact-us-details');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function manage_contact_details()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "2") {
            $this->load->view('admin/manage-contact-details');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function manage_customer()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "2") {
            $this->load->view('admin/manage-customer');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function update_profile()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "1") {
            $this->load->view('admin/update-profile');
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function user_filter_lead()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "2") {
            if ($this->input->post('first_name') == "" and $this->input->post('Lead_id') == "" and $this->input->post('phone') == "" and $this->input->post('email') == "" and $this->input->post('date') == "") {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Something went wrong</div>');
                return redirect($this->agent->referrer());
            } else {
                if ($this->input->post('Lead_id') != "") {
                    $data['filter_lead'] = $this->User_Model->get_user_filter_leads($this->input->post('Lead_id'));
                    $this->load->view('admin/filter-record', $data);
                }

                if ($this->input->post('first_name') != "") {
                    $data['filter_lead'] = $this->User_Model->get_user_filter_lead($this->input->post('first_name'));
                    $this->load->view('admin/filter-record', $data);
                }

                if ($this->input->post('phone') != "") {
                    $data['filter_lead'] = $this->User_Model->get_user_filter_lead($this->input->post('phone'));
                    $this->load->view('admin/filter-record', $data);
                }
                if ($this->input->post('email') != "") {
                    $data['filter_lead'] = $this->User_Model->get_user_filter_lead($this->input->post('email'));
                    $this->load->view('admin/filter-record', $data);
                }
                if ($this->input->post('date') != "") {
                    $data['filter_lead'] = $this->User_Model->get_user_filter_lead($this->input->post('date'));
                    $this->load->view('admin/filter-record', $data);
                }
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function filter_lead()
    {
        if ($this->session->userdata('id') != "" and $this->session->userdata('status') == "1" and $this->session->userdata('type') == "1") {

            if ($this->input->post('first_name') == "" and $this->input->post('Lead_id') == "" and $this->input->post('phone') == "" and $this->input->post('email') == "" and $this->input->post('date') == "") {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">Something went wrong</div>');
                return redirect($this->agent->referrer());
            } else {
                if ($this->input->post('Lead_id') != "") {
                    $data['filter_lead'] = $this->User_Model->get_filter_lead($this->input->post('Lead_id'));
                    $this->load->view('admin/filter-record', $data);
                }

                if ($this->input->post('first_name') != "") {
                    $data['filter_lead'] = $this->User_Model->get_filter_lead($this->input->post('first_name'));
                    $this->load->view('admin/filter-record', $data);
                }

                if ($this->input->post('phone') != "") {
                    $data['filter_lead'] = $this->User_Model->get_filter_lead($this->input->post('phone'));
                    $this->load->view('admin/filter-record', $data);
                }
                if ($this->input->post('email') != "") {
                    $data['filter_lead'] = $this->User_Model->get_filter_lead($this->input->post('email'));
                    $this->load->view('admin/filter-record', $data);
                }
                if ($this->input->post('date') != "") {
                    $data['filter_lead'] = $this->User_Model->get_filter_lead($this->input->post('date'));
                    $this->load->view('admin/filter-record', $data);
                }
            }
        } else {
            return redirect(base_url('User/login'));
        }
    }

    public function change_password_details()
    {
        $oldPassword = $this->input->post('OldPassword');
        $NewPassword = $this->input->post('NewPassword');
        $ConfirmPassword = $this->input->post('ConfirmPassword');
        $loginID = $this->session->userdata('id');
        $getDBpassword = $this->User_Model->get_password($loginID, $oldPassword);
        if ($oldPassword == $getDBpassword->password) {
            if ($NewPassword == "$ConfirmPassword") {
                $update_password = $this->User_Model->update_password($loginID, $NewPassword);
                $this->session->set_flashdata('message', '<div class="alert alert-success">Your Password Successfully Changed</div>');
                return redirect($this->agent->referrer());
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger">New Password and  confirm Password not match</div>');
                return redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Old Password incorrect</div>');
            return redirect($this->agent->referrer());
        }
    }

    public function sent_enquiry_details()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                $count_email = $this->User_Model->filter_duplicate_email($this->input->post('email'));
                // if($count_email==""){
                $secretKey = $this->config->item('google_secret');
                $responseKey = $_POST['g-recaptcha-response'];
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
                $response = file_get_contents($url);
                $response = json_decode($response);
                error_reporting(0);
                $date_time = date('Y-m-d H:i:s');
                $data = array(
                    'first_name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'message' => $this->input->post('note'),
                    'city' => $this->input->post('interest'),
                    'source_of_enquiry' => "Website",
                    'mobile' => $this->input->post('phone'),
                    'maximum_budget' => $this->input->post('budget'),
                    'Referance_id' => $this->input->post('ref_id'),
                    'Lead_created_date' => $date_time,
                );

                $subject = 'Enquiry from Prime Property Turkey';
                $message = "<html><body><table width=\"800\" cellpadding=\"5\" cellspacing=\"0\" align=\"center\"  style=\"border:1px solid #DEDBDB; font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#595959;\">";
                $message .= "<tr><td colspan=\"2\"  style=\"background-color:#EAEAEA; color:#CB0001; font-size:16px; font-weight:bold;\">Dear Administrator,</td></tr>";
                $message .= "<tr><td colspan=\"2\" style=\"color:#262626; font-size:12px;\">Message For Enquiry from Prime Property Turkey</td></tr>";
                $message .= "
                    		    <tr>
                    			  <td><strong>Full Name : </strong></td><td>" . $this->input->post('name') . "</td>
                    			</tr>
                    			<tr>
                    			  <td><strong>Email : </strong></td><td>" . $this->input->post('email') . "</td>
                    			</tr>
                    			<tr>
                    			  <td><strong>Phone : </strong></td><td>" . $this->input->post('phone') . "</td>
                    			</tr>
                    			<tr>
                    			  <td><strong>City Of Interest : </strong></td><td>" . $this->input->post('interest') . "</td>
                    			</tr>
                    			<tr>
                    			  <td><strong>Referance id : </strong></td><td>" . $this->input->post('budget') . "</td>
                    			</tr>
                    			<tr>
                    			  <td><strong>Budget : </strong></td><td>" . $this->input->post('ref_id') . "</td>
                    			</tr>
                    			
                    				<tr>
                    			  <td><strong>Notes : </strong></td><td>" . $this->input->post('note') . "</td>
                    			</tr>
                        		<tr><td> <b></b></td></tr>
                        		<tr><td colspan='2'> <b>Thanks & Regards,</b></td></tr>
                        		<tr><td  colspan='2'> <b>" . stripslashes($_POST['name']) . "</b></td></tr>";
                $message .= "</table></body></html>";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <info@primepropertyturkey.com>' . "\r\n";
                $headers .= 'Cc: info@primepropertyturkey.com' . "\r\n";
                $to = "primepropertiesturkey@gmail.com";
                $send = mail($to, $subject, $message, $headers);
                if ($send) {
                    $contact_successful = $this->db->insert("crm_leads", $data);
                    echo("<script LANGUAGE='JavaScript'>
                                window.alert('Message Sent successfully');
                                window.location.href='https://www.primepropertyturkey.com/';
                                </script>");
                    //$this->session->set_flashdata('success_message', '<div style="color:white;background-color:green;padding:10px;">Message Sent successfully</div>');
                    //return redirect($this->agent->referrer());
                } else {
                    echo("<script LANGUAGE='JavaScript'>
                                window.alert('Message Not Sent successfully');
                                window.location.href='https://www.primepropertyturkey.com/';
                                </script>");
                }
                // }else{
                //     // echo"Email Already Exit";
                //     echo ("<script LANGUAGE='JavaScript'>
                //         window.alert('Message Send successfully');
                //         window.location.href='https://www.primepropertyturkey.com/';
                //         </script>");
                //}
            } else {
                echo("<script LANGUAGE='JavaScript'>
                        window.alert('Captcha code does not match, please try again.');
                        window.location.href='https://www.primepropertyturkey.com/';
                        </script>");
                // $this->session->set_flashdata('error_message', '<div style="color:white;background-color:red;padding:10px;">Captcha code does not match, please try again.</div>');
                // return redirect($this->agent->referrer());
            }
        }
    }

    public function sent_nd_enquiry_details()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
                $secretKey = $this->config->item('google_secret');
                $responseKey = $_POST['g-recaptcha-response'];
                $userIP = $_SERVER['REMOTE_ADDR'];
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
                $response = file_get_contents($url);
                $response = json_decode($response);
                error_reporting(0);
                $date_time = date('Y-m-d H:i:s');
                $data = array(
                    'first_name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'message' => $this->input->post('message'),
                    // 'city'=>$this->input->post('interest'),
                    'source_of_enquiry' => "Website",
                    'mobile' => $this->input->post('phone'),
                    //'maximum_budget'=>$this->input->post('budget'),
                    //'Referance_id'=>$this->input->post('ref_id'),
                    'Lead_created_date' => $date_time,
                );

                $subject = 'Enquiry from Prime Property Turkey';
                $message = "<html><body><table width=\"800\" cellpadding=\"5\" cellspacing=\"0\" align=\"center\"  style=\"border:1px solid #DEDBDB; font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#595959;\">";
                $message .= "<tr><td colspan=\"2\"  style=\"background-color:#EAEAEA; color:#CB0001; font-size:16px; font-weight:bold;\">Dear Administrator,</td></tr>";
                $message .= "<tr><td colspan=\"2\" style=\"color:#262626; font-size:12px;\">Message For Enquiry from Prime Property Turkey</td></tr>";
                $message .= "
                		    <tr>
                			  <td><strong>Full Name : </strong></td><td>" . $this->input->post('name') . "</td>
                			</tr>
                			<tr>
                			  <td><strong>Email : </strong></td><td>" . $this->input->post('email') . "</td>
                			</tr>
                			<tr>
                			  <td><strong>Phone : </strong></td><td>" . $this->input->post('phone') . "</td>
                			</tr>
                			<tr>
                			  <td><strong>Notes : </strong></td><td>" . $this->input->post('message') . "</td>
                			</tr>
                    		<tr><td> <b></b></td></tr>
                    		<tr><td colspan='2'> <b>Thanks & Regards,</b></td></tr>
                    		<tr><td  colspan='2'> <b>" . stripslashes($_POST['name']) . "</b></td></tr>";
                $message .= "</table></body></html>";
                // 		print_r($data);
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                // More headers
                $headers .= 'From: <info@primepropertyturkey.com>' . "\r\n";
                $headers .= 'Cc: info@primepropertyturkey.com' . "\r\n";
                $to = "primepropertiesturkey@gmail.com";
                $send = mail($to, $subject, $message, $headers);
                if ($send) {
                    $contact_successful = $this->db->insert("crm_leads", $data);
                    $this->session->set_flashdata('message', '<div style="color:white;background-color:green;padding:10px;">Message Sent successfully</div>');
                    return redirect($this->agent->referrer());
                } else {
                    $this->session->set_flashdata('message', '<div style="color:white;background-color:green;padding:10px;">Message Sent successfully</div>');
                    return redirect($this->agent->referrer());
                }
            } else {
                $this->session->set_flashdata('message', '<div style="color:white;background-color:red;padding:10px;">Captcha code does not match, please try again.</div>');
                return redirect($this->agent->referrer());
            }
        }
    }

    public function sent_query_landing_page()
    {
        //  if(isset($_POST['submit'])){
        print_r($_POST);
        $date_time = date('Y-m-d H:i:s');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $source = $this->input->post('source');
        $maximum_budget = $this->input->post('maximum_budget');
        $data = array(
            'first_name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'source_of_enquiry' => $this->input->post('source'),
            'maximum_budget' => $this->input->post('maximum_budget'),
            'mobile' => $this->input->post('phone'),
            'Lead_created_date' => $date_time,
        );
        $subject = 'Enquiry from Landing Page';
        $message = "<html><body><table width=\"800\" cellpadding=\"5\" cellspacing=\"0\" align=\"center\"  style=\"border:1px solid #DEDBDB; font-family:Arial, Helvetica, sans-serif; font-size:15px; color:#595959;\">";
        $message .= "<tr><td colspan=\"2\"  style=\"background-color:#EAEAEA; color:#CB0001; font-size:16px; font-weight:bold;\">Dear Administrator,</td></tr>";
        $message .= "<tr><td colspan=\"2\" style=\"color:#262626; font-size:12px;\">Message For Enquiry from Landing Page</td></tr>";
        $message .= "
                		    <tr>
                			  <td><strong>Full Name : </strong></td><td>" . $name . "</td>
                			</tr>
                			<tr>
                			  <td><strong>Email : </strong></td><td>" . $email . "</td>
                			</tr>
                			<tr>
                			  <td><strong>Phone : </strong></td><td>" . $phone . "</td>
                			</tr>
                			<tr>
                			  <td><strong>Budget : </strong></td><td>" . $maximum_budget . "</td>
                			</tr>
                			<tr>
                			  <td><strong>Source Of Enquiry : </strong></td><td>" . $source . "</td>
                			</tr>
                    		<tr><td> <b></b></td></tr>
                    		<tr><td colspan='2'> <b>Thanks & Regards,</b></td></tr>
                    		<tr><td  colspan='2'> <b>" . stripslashes($_POST['name']) . "</b></td></tr>";
        $message .= "</table></body></html>";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <info@primepropertyturkey.com>' . "\r\n";
        $headers .= 'Cc: info@primepropertyturkey.com' . "\r\n";
        $to = "primepropertiesturkey@gmail.com";
        $send = mail($to, $subject, $message, $headers);
        if ($send) {
            $url = $this->input->post('url');
            $this->db->insert("crm_leads", $data);
            echo "<script LANGUAGE='JavaScript'>
                                window.location.href='$url';
                            </script>";
        } else {
            echo "<script LANGUAGE='JavaScript'>
                                window.alert('Message Sent Succesfully');
                                window.location.href='https://landing.primepropertyturkey.com';
                            </script>";
        }
        // }
    }

    function logout()
    {
        $user_data = $this->session->all_userdata();
        $this->session->unset_userdata($user_data);
        $this->session->sess_destroy($user_data);
        return redirect(base_url('User/login'));
    }

    public function loadSearchRecord($row_no = 0)
    {
        if (isset($_POST['submit'])) {
            $search_Lead_id = $this->input->post('Lead_id');
            $search_name_phrase = $this->input->post('name');
            $search_phone = $this->input->post('phone');
            $search_email = $this->input->post('email');
            $search_date = $this->input->post('date');
            if ($this->input->post("dubai_pool")== 'Yes'){
                $pool_type =  'dubai_pool';
            }else{
                $pool_type =  'normal';
            }
            $priority = 'low';
            if ($this->input->post("Priority")== 'high'){
                $priority = 'high';
            }

            if (
                $search_Lead_id == "" or
                $search_name_phrase == "" or
                $search_phone == "" or
                $search_email == "" or
                $search_date == ""
            ) {
                $this->session->set_userdata(
                    array(
                        "search_Lead_id" => $this->input->post('Lead_id'),
                        "search_name_phrase" => $this->input->post('name'),
                        "search_phone" => $this->input->post('phone'),
                        "search_email" => $this->input->post('email'),
                        "search_date" => $this->input->post('date'),
                        "pool_type" => $pool_type,
                        "Priority" => $priority
                    )
                );
            }
        } else {
            if (
                $this->session->userdata('search_Lead_id') != "" or
                $this->session->userdata('search_name_phrase') != "" or
                $this->session->userdata('search_phone') != "" or
                $this->session->userdata('search_email') != "" or
                $this->session->userdata('search_date') != ""
            ) {
                $search_Lead_id = $this->session->userdata('search_Lead_id');
                $search_name_phrase = $this->session->userdata('search_name_phrase');
                $search_phone = $this->session->userdata('search_phone');
                $search_email = $this->session->userdata('search_email');
                $search_date = $this->session->userdata('search_date');
                $priority = $this->session->userdata('Priority');
                $pool_type = $this->session->userdata('pool_type');

            }
        }

        // Row per page
        $row_per_page = 10;

        // Row position
        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }

        // All records count
        $allCount = $this->User_Model->getRecordCount($search_Lead_id, $search_name_phrase, $search_phone, $search_email, $search_date,$pool_type);

        // Get records
        $users_record = $this->User_Model->getData($row_no, $row_per_page, $search_Lead_id, $search_name_phrase, $search_phone, $search_email, $search_date,$pool_type,$priority);

        // Pagination Configuration
        $config['base_url'] = base_url("User/loadSearchRecord");
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allCount;
        $config['per_page'] = $row_per_page;

        // Initialize
        $this->pagination->initialize($config);
        $data["total_lead"] = $config;
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $row_no;
        $data['search_Lead_id'] = $search_Lead_id;
        $data['search_name_phrase'] = $search_name_phrase;
        $data['search_phone'] = $search_phone;
        $data['search_email'] = $search_email;
        $data['search_date'] = $search_date;
        $data['type'] = $pool_type;
        $data['Priority'] = $priority;
        $this->load->view('admin/filter-record', $data);
    }
    public function loadSearchRecordUninterested($row_no = 0)
    {
        if (isset($_POST['submit'])) {
            $search_Lead_id = $this->input->post('Lead_id');
            $search_name_phrase = $this->input->post('name');
            $search_phone = $this->input->post('phone');
            $search_email = $this->input->post('email');
            $search_date = $this->input->post('date');
            if (
                $search_Lead_id == "" or
                $search_name_phrase == "" or
                $search_phone == "" or
                $search_email == "" or
                $search_date == ""
            ) {
                $this->session->set_userdata(
                    array(
                        "search_Lead_id" => $this->input->post('Lead_id'),
                        "search_name_phrase" => $this->input->post('name'),
                        "search_phone" => $this->input->post('phone'),
                        "search_email" => $this->input->post('email'),
                        "search_date" => $this->input->post('date'),
                    )
                );
            }
        } else {
            if (
                $this->session->userdata('search_Lead_id') != "" or
                $this->session->userdata('search_name_phrase') != "" or
                $this->session->userdata('search_phone') != "" or
                $this->session->userdata('search_email') != "" or
                $this->session->userdata('search_date') != ""
            ) {
                $search_Lead_id = $this->session->userdata('search_Lead_id');
                $search_name_phrase = $this->session->userdata('search_name_phrase');
                $search_phone = $this->session->userdata('search_phone');
                $search_email = $this->session->userdata('search_email');
                $search_date = $this->session->userdata('search_date');
            }
        }

        // Row per page
        $row_per_page = 10;

        // Row position
        if ($row_no != 0) {
            $row_no = ($row_no - 1) * $row_per_page;
        }

        // All records count
        $allCount = $this->User_Model->getRecordCountUninterested($search_Lead_id, $search_name_phrase, $search_phone, $search_email, $search_date);

        // Get records
        $users_record = $this->User_Model->getDataUninterested($row_no, $row_per_page, $search_Lead_id, $search_name_phrase, $search_phone, $search_email, $search_date);

        // Pagination Configuration
        $config['base_url'] = base_url("User/loadSearchRecordUninterested");
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allCount;
        $config['per_page'] = $row_per_page;

        // Initialize
        $this->pagination->initialize($config);
        $data["total_lead"] = $config;
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $row_no;
        $data['search_Lead_id'] = $search_Lead_id;
        $data['search_name_phrase'] = $search_name_phrase;
        $data['search_phone'] = $search_phone;
        $data['search_email'] = $search_email;
        $data['search_date'] = $search_date;
        $this->load->view('admin/filter-record-Uninterested', $data);
    }

    public function assign_lead_record()
    {
        $this->load->view('admin/get-ajax-data');
    }

    public function get_lead_cat()
    {
        $this->load->view('admin/get-ajax-data');
    }

    public function send_manage_news_letter()
    {
        if (isset($_FILES["attachment"]["name"])) {
            $email = "info@primepropertyturkey.com";
            // $name = $_POST['name'];
            $subject = $_POST['subject'];
            $message = $_POST['comment'];
            $fromemail = $email;
            $subject = "Uploaded file attachment";
            $email_message = '<div>' . $message . '</div>';
            $semi_rand = md5(uniqid(time()));
            $headers = "From: " . $fromemail;
            $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

            $headers .= "\nMIME-Version: 1.0\n" .
                "Content-Type: multipart/mixed;\n" .
                " boundary=\"{$mime_boundary}\"";

            if ($_FILES["attachment"]["name"] != "") {
                $strFilesName = $_FILES["attachment"]["name"];
                $strContent = chunk_split(base64_encode(file_get_contents($_FILES["attachment"]["tmp_name"])));
                $email_message .= "This is a multi-part message in MIME format.\n\n" .
                    "--{$mime_boundary}\n" .
                    "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
                    "Content-Transfer-Encoding: 7bit\n\n" .
                    $email_message .= "\n\n";

                $email_message .= "--{$mime_boundary}\n" .
                    "Content-Type: application/octet-stream;\n" .
                    " name=\"{$strFilesName}\"\n" .
                    "Content-Transfer-Encoding: base64\n\n" .
                    $strContent .= "\n\n" .
                        "--{$mime_boundary}--\n";
            }
            foreach ($_POST['lead_id'] as $key => $value) {
                $toemail = $this->input->post('email')[$key];
                $data = array(
                    'news_letter_user_id' => $this->session->userdata('id'),
                    'news_letter_lead_id' => $this->input->post('lead_id')[$key],
                    'news_letter_date' => date('Y-m-d h:i:s'));
                $data = $this->db->insert("news_letter", $data);
                mail($toemail, $subject, $email_message, $headers);
            }
            echo "mil sent successfully with attachment";

        }


    }

}