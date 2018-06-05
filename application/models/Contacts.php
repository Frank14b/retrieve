<?php
defined('BASEPATH') or exit('No direct script access allowed');

class contacts extends CI_Model
{
    public $id;
    public $nom;
    public $email;
    public $messages;
    public $sujet;
    public $status;
    public $dates;

    public function __construct()
    {

        parent::__construct();
        $this->load->database();
        //$this->db->method_name();
    }

    public function getAllcontacts()
    {
        $this->db->where("status = 0");
        $query = $this->db->get("contacts");
        return $query->result();
    }

    public function countAllcontacts()
    {
        $query = $this->db->get_where("contacts", array("status" => 0));
        return $query->num_rows();
    }

    public function checkIfuserExist($code)
    { // please read the below note
        $query = $this->db->get_where("contacts", array("emailcontacts" => $_POST['email']));
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
        $query = $this->db->get_where("contacts", array("emailcontacts" => $_POST['email']));
        if ($query->num_rows() == 0) {
            $query2 = $this->db->get_where("contacts", array("logincontacts" => $_POST['login']));
            if ($query2->num_rows() == 0) {
                if ($this->insertcontacts($code) == true) {
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
        $query = $this->db->get_where("contacts", array("emailcontacts" => $_POST['email']));
        if ($query->num_rows() == 0) {
            $query2 = $this->db->get_where("contacts", array("logincontacts" => $_POST['login']));
            if ($query2->num_rows() == 0) {
                if ($this->insertcontacts2($code) == true) {
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
        $this->db->set('passcontacts', $code);
        $this->db->where('emailcontacts', $_POST["email"]);
        if ($this->db->update("contacts")) {
            return true;
        } else {
            return false;
        }
    }

    public function activateAccount($code)
    {
        $this->db->set('status', 0);
        $this->db->where('status', $code);
        if ($this->db->update("contacts")) {
            return 'ok';
        } else {
            return false;
        }
    }

    public function changePassword($code)
    {
        $this->db->set('passcontacts', sha1($_POST["pass2"]));
        $this->db->where('passcontacts', $code);
        if ($this->db->update("contacts")) {
            return 'ok';
        } else {
            return false;
        }
    }

    public function insertcontacts($code)
    {
        $this->nom = $_POST['nom']; // please read the below note
        $this->email = $_POST['email'];
        $this->sujet = $_POST['sujet'];
        $this->messages = $_POST['messages'];
        $this->dates = date("Y-m-d");
        $this->status = $code;

        if ($this->db->insert("contacts", $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function insertcontacts2($code)
    {
        $this->db->select_max("id");
        $id = $this->db->get("contacts");
    /////////////// ===================== /////////////////////////
        $this->id = $id;
        $this->idPays = $_POST['pays']; // please read the below note
        $this->passcontacts = sha1($_POST['password']);
        $this->datecontacts = date("Y-m-d");
        $this->logincontacts = $_POST['login'];
        $this->nomcontacts = $_POST['nom'];
        $this->prenomcontacts = $_POST['prenom'];
        $this->role = $_POST['role'];
        $this->numerocontacts = $_POST['tel'];
        $this->emailcontacts = $_POST['email'];
        $this->matricule = 1;
        $this->status = $code;

        if ($this->db->insert("contacts", $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function editcontacts($user)
    {
        $this->db->set('idPays', $_POST['idPays']); // please read the below note
        $this->db->set('logincontacts', $_POST['logincontacts']);
        $this->db->set('nomcontacts', $_POST['nomcontacts']);
        $this->db->set('prenomcontacts', $_POST['prenomcontacts']);
        $this->db->set('numerocontacts', $_POST['numerocontacts']);
        $this->db->set('emailcontacts', $_POST['emailcontacts']);
        $this->db->set('bpcontacts', $_POST['bpcontacts']);
        $this->db->set('autre', $_POST['autre']);

        $this->db->where('id', $user);
        if ($this->db->update("contacts")) {
            return true;
        } else {
            return false;
        }
    }

    public function editPassword($user, $code)
    {
        $this->db->set('passcontacts', sha1($_POST["pass3"])); // please read the below note
        $this->db->set('status', $code);
        $this->db->where('id', $user);

        $this->db->update('contacts');
        return true;
    }

    public function updateImage($lien, $user)
    {
        $this->db->set('photocontacts', $lien); // please read the below note
        //$this->db->set('datecontacts', time());
        $this->db->where('id', $user);

        $this->db->update('contacts');
        return true;
    }

    public function basculeRole($user, $role)
    {
        $this->db->set('role', $role); // please read the below note
        $this->db->where('id', $user);

        $this->db->update('contacts');
        return true;
    }

    public function poweroff_entry($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('contacts');
        return true;
    }

    public function poweron_entry($id)
    {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('contacts');
        return true;
    }

    public function delete_entry($id)
    {
        $this->db->set('status', 3);
        $this->db->where('id', $id);
        $this->db->update('contacts');
        return true;
    }

    public function connectcontacts()
    {
        $this->password = sha1($_POST['password']);
        $this->matricule = $_POST['matricule'];
        $query = $this->db->get_where("contacts", array('matricule' => $this->matricule, 'password' => $this->password));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function checkPasswordcontacts($contacts)
    {
        $this->passcontacts = sha1($_POST['password']);
        $query = $this->db->get_where("contacts", array('id' => $contacts, 'passcontacts' => $this->passcontacts));
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

    public function getcontactsByID($id)
    {
        $this->id = $id;
        $this->status = 3;

        $query = $this->db->get_where("contacts", array('id' => $this->id));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getOneData($id, $value)
    {
        foreach ($this->getcontactsByID($id) as $row):
            return $row->$value;
        endforeach;
    }

    public function getAllcontactsLimit($min, $max)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where("contacts", array('status !=' => 3), $max);
        return $query->result();
    }

    public function getAllcontactsByStatus($id)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where("contacts", array('status!=' => $id));
        return $query->result();
    }

    public function getcontactsByEmail($id)
    {
        $this->emailcontacts = $id;

        $query = $this->db->get_where("contacts", array('emailcontacts' => $this->emailcontacts));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getOneDatabyEmail($id, $value)
    {
        foreach ($this->getcontactsByID($id) as $row):
            return $row->$value;
        endforeach;
    }
}
