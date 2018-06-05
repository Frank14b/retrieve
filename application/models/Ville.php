<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ville extends CI_Model
{
    public $id;
    public $libeller;
    public $code;
    public $status;

    public function __construct()
    {

        parent::__construct();
        $this->load->database();
        //$this->db->method_name();
    }

    public function getAllville()
    {
        $this->db->where("status = 0");
        $query = $this->db->get("ville");
        return $query->result();
    }

    public function countAllville()
    {
        $query = $this->db->get_where("ville", array("status" => 0));
        return $query->num_rows();
    }

    public function checkIfuserExist($code)
    { // please read the below note
        $query = $this->db->get_where("ville", array("emailville" => $_POST['email']));
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
        $query = $this->db->get_where("ville", array("emailville" => $_POST['email']));
        if ($query->num_rows() == 0) {
            $query2 = $this->db->get_where("ville", array("loginville" => $_POST['login']));
            if ($query2->num_rows() == 0) {
                if ($this->insertville($code) == true) {
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
        $query = $this->db->get_where("ville", array("emailville" => $_POST['email']));
        if ($query->num_rows() == 0) {
            $query2 = $this->db->get_where("ville", array("loginville" => $_POST['login']));
            if ($query2->num_rows() == 0) {
                if ($this->insertville2($code) == true) {
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
        $this->db->set('passville', $code);
        $this->db->where('emailville', $_POST["email"]);
        if ($this->db->update("ville")) {
            return true;
        } else {
            return false;
        }
    }

    public function activateAccount($code)
    {
        $this->db->set('status', 0);
        $this->db->where('status', $code);
        if ($this->db->update("ville")) {
            return 'ok';
        } else {
            return false;
        }
    }

    public function changePassword($code)
    {
        $this->db->set('passville', sha1($_POST["pass2"]));
        $this->db->where('passville', $code);
        if ($this->db->update("ville")) {
            return 'ok';
        } else {
            return false;
        }
    }

    public function insertville($code)
    {
        $this->libeller = $_POST['libeller']; // please read the below note
        $this->details = $_POST['details'];
        $this->dates = date("Y-m-d");
        $this->status = $code;

        if ($this->db->insert("ville", $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function insertville2($code)
    {
        $this->db->select_max("id");
        $id = $this->db->get("ville");
    /////////////// ===================== /////////////////////////
        $this->id = $id;
        $this->idPays = $_POST['pays']; // please read the below note
        $this->passville = sha1($_POST['password']);
        $this->dateville = date("Y-m-d");
        $this->loginville = $_POST['login'];
        $this->nomville = $_POST['nom'];
        $this->prenomville = $_POST['prenom'];
        $this->role = $_POST['role'];
        $this->numeroville = $_POST['tel'];
        $this->emailville = $_POST['email'];
        $this->matricule = 1;
        $this->status = $code;

        if ($this->db->insert("ville", $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function editville($user)
    {
        $this->db->set('idPays', $_POST['idPays']); // please read the below note
        $this->db->set('loginville', $_POST['loginville']);
        $this->db->set('nomville', $_POST['nomville']);
        $this->db->set('prenomville', $_POST['prenomville']);
        $this->db->set('numeroville', $_POST['numeroville']);
        $this->db->set('emailville', $_POST['emailville']);
        $this->db->set('bpville', $_POST['bpville']);
        $this->db->set('autre', $_POST['autre']);

        $this->db->where('id', $user);
        if ($this->db->update("ville")) {
            return true;
        } else {
            return false;
        }
    }

    public function editPassword($user, $code)
    {
        $this->db->set('passville', sha1($_POST["pass3"])); // please read the below note
        $this->db->set('status', $code);
        $this->db->where('id', $user);

        $this->db->update('ville');
        return true;
    }

    public function updateImage($lien, $user)
    {
        $this->db->set('photoville', $lien); // please read the below note
        //$this->db->set('dateville', time());
        $this->db->where('id', $user);

        $this->db->update('ville');
        return true;
    }

    public function basculeRole($user, $role)
    {
        $this->db->set('role', $role); // please read the below note
        $this->db->where('id', $user);

        $this->db->update('ville');
        return true;
    }

    public function poweroff_entry($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('ville');
        return true;
    }

    public function poweron_entry($id)
    {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('ville');
        return true;
    }

    public function delete_entry($id)
    {
        $this->db->set('status', 3);
        $this->db->where('id', $id);
        $this->db->update('ville');
        return true;
    }

    public function connectville()
    {
        $this->password = sha1($_POST['password']);
        $this->matricule = $_POST['matricule'];
        $query = $this->db->get_where("ville", array('matricule' => $this->matricule, 'password' => $this->password));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function checkPasswordville($ville)
    {
        $this->passville = sha1($_POST['password']);
        $query = $this->db->get_where("ville", array('id' => $ville, 'passville' => $this->passville));
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
        $_SESSION['ens_user'] = $user;
        $_SESSION['ens_userid'] = $id;
    }

    public function getvilleByID($id)
    {
        $this->id = $id;
        $this->status = 3;

        $query = $this->db->get_where("ville", array('id' => $this->id));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getOneData($id, $value)
    {
        foreach ($this->getvilleByID($id) as $row):
            return $row->$value;
        endforeach;
    }

    public function getAllvilleLimit($min, $max)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where("ville", array('status !=' => 3), $max);
        return $query->result();
    }

    public function getAllvilleByStatus($id)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where("ville", array('status!=' => $id));
        return $query->result();
    }

    public function getvilleByEmail($id)
    {
        $this->emailville = $id;

        $query = $this->db->get_where("ville", array('emailville' => $this->emailville));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getOneDatabyEmail($id, $value)
    {
        foreach ($this->getvilleByID($id) as $row):
            return $row->$value;
        endforeach;
    }
}
