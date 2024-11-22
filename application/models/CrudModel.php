<?php
defined("BASEPATH") or exit("No direct script access allowed");

class CrudModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // Insert User Data in Student Table (User form)
    public function Practice($data)
    {

        $insert = $this->db->insert('student', $data);
        return $insert;
    }

    // Insert User Data in Admin Table (Registration form)
    public function RegistrationModelpost($data)
    {
        $insert = $this->db->insert('admin', $data);
        return $insert;
    }

    // Data View in Table Format
    public function Dataview()
    {
        $data = $this->db->get('student')->result();
        return $data;
    }

    // Delete By id Function
    public function DeleteId($id)
    {
        $this->db->where('id', $id);

        return $this->db->delete('student');

    }


    public function UpdateId($id)
    {
        $this->db->where('id', $id);
        $data = $this->db->get('student')->row_array();
        if ($data != null) {
            return $data;
        }
        return null;
    }


    function updateData($id, $toupdatdata)
    {
        $this->db->where("id", $id);
        return $this->db->update("student", $toupdatdata);
        return $insert;
    }



    public function LoginModelpost($data)
    {
        $this->db->where("email", $data['email']);
        $this->db->where("password", $data['password']);
        $result = $this->db->get("admin")->row_array();
        if ($result) {
            return $result;
        }
        return null;
    }


}

?>