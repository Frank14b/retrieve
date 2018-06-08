<?php
defined('BASEPATH') or exit('No direct script access allowed');

class users extends CI_Model
{
    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $pcontacter;
    public $pprenom;
    public $phone;
    public $facebook;
    public $role;
    public $Vil_id;
    public $dates;
    public $login;
    public $password;

    public function __construct()
    {

        parent::__construct();
        $this->load->database();
        //$this->db->method_name();
    }

    public function getAllusers()
    {
        $this->db->where("status = 0");
        $query = $this->db->get("users");
        return $query->result();
    }

    public function countAllusers()
    {
        $query = $this->db->get_where("users", array("status" => 0));
        return $query->num_rows();
    }

    public function checkIfuserExist($code)
    { // please read the below note
        $query = $this->db->get_where("users", array("emailusers" => $_POST['email']));
        if ($query->num_rows() == 1) 
        {
            if ($this->restorPassword($code) == true) {
                return true;
            }

        } else {
            return false;
        }
    }

    public function checkIfExist($code)
    { // please read the below note
        $query = $this->db->get_where("users", array("emailusers" => $_POST['email']));
        if ($query->num_rows() == 0) {
            $query2 = $this->db->get_where("users", array("loginusers" => $_POST['login']));
            if ($query2->num_rows() == 0) {
                if ($this->insertusers($code) == true) {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function checkIfExist2($code)
    { // please read the below note
        $query = $this->db->get_where("users", array("emailusers" => $_POST['email']));
        if ($query->num_rows() == 0) {
            $query2 = $this->db->get_where("users", array("loginusers" => $_POST['login']));
            if ($query2->num_rows() == 0) {
                if ($this->insertusers2($code) == true) {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function restorPassword($code)
    {
        $this->db->set('status', $code);
        $this->db->set('passusers', $code);
        $this->db->where('emailusers', $_POST["email"]);
        if ($this->db->update("users")) {
            return true;
        } else {
            return false;
        }
    }

    public function activateAccount($code)
    {
        $this->db->set('status', 0);
        $this->db->where('status', $code);
        if ($this->db->update("users")) {
            return 'ok';
        } else {
            return false;
        }
    }

    public function changePassword($code)
    {
        $this->db->set('passusers', sha1($_POST["pass2"]));
        $this->db->where('passusers', $code);
        if ($this->db->update("users")) {
            return 'ok';
        } else {
            return false;
        }
    }

    public function insertusers($code)
    {
        //$this->db->select_max("id");
        //$id = $this->db->get("users");
    /////////////// ===================== /////////////////////////
        //$this->id = $id;
        $this->Vil_id = $_POST['Vil_id']; // please read the below note
        $this->password = sha1($_POST['password']);
        $this->dates = date("Y-m-d");
        $this->login = $_POST['login'];
        $this->nom = $_POST['nom'];
        $this->prenom = $_POST['prenom'];
        $this->role = $_POST['role'];
        $this->phone = $_POST['phone'];
        $this->email = $_POST['email'];
        $this->pcontacter = $_POST['pphone'];
        $this->pprenom = $_POST['pprenom'];
        $this->facebook = $_POST['facebook'];
        //$this->status = $code;

        if ($this->db->insert("users", $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function editusers($user)
    {
        $this->db->set('idPays', $_POST['idPays']); // please read the below note
        $this->db->set('loginusers', $_POST['loginusers']);
        $this->db->set('nomusers', $_POST['nomusers']);
        $this->db->set('prenomusers', $_POST['prenomusers']);
        $this->db->set('numerousers', $_POST['numerousers']);
        $this->db->set('emailusers', $_POST['emailusers']);
        $this->db->set('bpusers', $_POST['bpusers']);
        $this->db->set('autre', $_POST['autre']);

        $this->db->where('id', $user);
        if ($this->db->update("users")) {
            return true;
        } else {
            return false;
        }
    }

    public function editPassword($user, $code)
    {
        $this->db->set('passusers', sha1($_POST["pass3"])); // please read the below note
        $this->db->set('status', $code);
        $this->db->where('id', $user);

        $this->db->update('users');
        return true;
    }

    public function updateImage($lien, $user)
    {
        $this->db->set('photousers', $lien); // please read the below note
        //$this->db->set('dateusers', time());
        $this->db->where('id', $user);

        $this->db->update('users');
        return true;
    }

    public function basculeRole($user, $role)
    {
        $this->db->set('role', $role); // please read the below note
        $this->db->where('id', $user);

        $this->db->update('users');
        return true;
    }

    public function poweroff_entry($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('users');
        return true;
    }

    public function poweron_entry($id)
    {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('users');
        return true;
    }

    public function delete_entry($id)
    {
        $this->db->set('status', 3);
        $this->db->where('id', $id);
        $this->db->update('users');
        return true;
    }

    public function connectusers()
    {
        $this->password = sha1($_POST['password']);
        $this->email = $_POST['email'];
        $query = $this->db->get_where("users", array('email' => $this->email, 'password' => $this->password));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function checkPasswordusers($users)
    {
        $this->passusers = sha1($_POST['password']);
        $query = $this->db->get_where("users", array('id' => $users, 'passusers' => $this->passusers));
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function sendMail($from, $to, $subject, $mess, $to1, $to2)
    {
        $this->email->from($from, "AGZJobs");
        $this->email->to($to);
        $this->email->cc($to1);
        $this->email->bcc($to2);

        $this->email->subject($subject);
        $this->email->message($mess);

        $this->email->send();
    }

    public function startSession($id, $user)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['re_user'] = $user;
        $_SESSION['re_userid'] = $id;
    }

    public function getusersByID($id)
    {
        $this->id = $id;
        $this->status = 3;

        $query = $this->db->get_where("users", array('id' => $this->id));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getOneData($id, $value)
    {
        foreach ($this->getusersByID($id) as $row):
            return $row->$value;
        endforeach;
    }

    public function getAllusersLimit($min, $max)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where("users", array('status !=' => 3), $max);
        return $query->result();
    }

    public function getAllusersByStatus($id)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where("users", array('status!=' => $id));
        return $query->result();
    }

    public function getusersByEmail($id)
    {
        $this->emailusers = $id;

        $query = $this->db->get_where("users", array('emailusers' => $this->emailusers));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getOneDatabyEmail($id, $value)
    {
        foreach ($this->getusersByID($id) as $row):
            return $row->$value;
        endforeach;
    }
}
