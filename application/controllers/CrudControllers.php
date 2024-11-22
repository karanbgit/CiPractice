<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CrudControllers extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('CrudModel');
        $this->load->library("session");
        $this->load->helper(array('form', 'url'));

    }

    public function ValidateSession()
    {
        $loggedin = $this->session->userdata('user');
        if (!$loggedin) {

            return false;
        }
        return true;

    }

    // Login controller
    public function index()
    {
        $loggedin = $this->ValidateSession();
        // print_r($loggedin);die;
        if ($loggedin) {
            return redirect('CrudControllers/Dataview');
        }

        $this->load->view('Login');
    }

    public function Loginpost()
    {
        $data = $this->input->post();
        $result = $this->CrudModel->LoginModelpost($data);
        if ($result) {
            $this->session->set_userdata('user', true);
            $this->session->set_flashdata('success', 'Login Successfull');
            redirect('CrudControllers/Dataview');
        } else {
            $this->session->set_flashdata('error', 'Invalid email or password');
            redirect('CrudControllers/index');

        }
    }




    public function Logout()
    {
        // Destroy the session
        $this->session->sess_destroy();
        // Optionally, redirect to login page or home
        redirect('CrudControllers/index');
        // Adjust the redirect path as needed

    }


    public function Dataview()
    {
        $loggedin = $this->ValidateSession();
        if ($loggedin) {
            $data['li'] = $this->CrudModel->Dataview();

            $this->load->view('Dataview', $data);
        } else {
            redirect('CrudControllers/index');

        }

    }

    public function Form()
    {
        if ($this->ValidateSession()) {
            $this->load->view('Form');
        } else {
            return redirect('CrudControllers/index');
        }

    }
    public function Registration()
    {
        $this->load->view('registration');

    }


    public function Practice()
    {
        $this->ValidateSession();

        $formdata = $this->input->post();

        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
        $config['max_size'] = 51200; // 50 MB in KB
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $data = []; // Initialize an array to hold the response data

        // Check if a file is uploaded

        if (isset($_FILES["img"])) {
            if (!$this->upload->do_upload('img')) {
                $data['error'] = $this->upload->display_errors();
                print_r($data);
            } else {
                $data['upload_data'] = $this->upload->data();
                $formdata['img'] = $data['upload_data']['file_name'];
            }
        }
        $result = $this->CrudModel->Practice($formdata);

        if ($result) {

            redirect('CrudControllers/Dataview');
            // echo "Successfull inserted";
        } else {
            echo "fail";
        }
    }

    public function Registrationpost()
    {
        $data = $this->input->post();
        $result = $this->CrudModel->RegistrationModelpost($data);
        if ($result) {
            redirect('CrudControllers/index');
        } else {
            echo "fail";
        }
    }


    public function DeleteById($id)
    {
        $this->CrudModel->DeleteId($id);

        redirect('CrudControllers/Dataview');
    }

    public function UpdateById($id)
    {
        // Fetch user data by ID
        $user['user'] = $this->CrudModel->UpdateId($id);

        // Load the view with user data
        $this->load->view('EditView', $user);
    }

    public function UpdateData($id)
    {
        $this->ValidateSession();

        $formdata = $this->input->post();

        // Configuration for file upload
        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = 'jpg|JPG|jpeg|JPEG|png|PNG|gif|GIF';
        $config['max_size'] = 51200; // 50 MB in KB
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        // Check if a file is uploaded
        if (isset($_FILES["img"]) && $_FILES["img"]["error"] == 0) {
            if (!$this->upload->do_upload('img')) {
                $data['error'] = $this->upload->display_errors();
                print_r($data);
                return; // Stop execution if upload fails
            } else {
                $data['upload_data'] = $this->upload->data();
                $formdata['img'] = $data['upload_data']['file_name']; // Save the filename to formdata
            }
        }

        // Update data in the database
        $result = $this->CrudModel->updateData($id, $formdata);

        // Check the result of the update
        if ($result) {
            redirect("CrudControllers/Dataview");
        } else {
            echo "Update failed";
        }
    }








}
