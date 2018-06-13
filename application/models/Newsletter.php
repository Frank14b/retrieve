<?php
defined('BASEPATH') or exit('No direct script access allowed');

class newsletter extends CI_Model
{
    public $id;
    public $email;
    public $dates;
    //public $status;

    public function __construct()
    {

        parent::__construct();
        $this->load->database();
        //$this->db->method_name();
    }

    public function getAllnewsletter()
    {
        //$this->db->where("status = 0");
        $query = $this->db->get("newsletter");
        return $query->result();
    }

    public function countAllnewsletter()
    {
        $query = $this->db->get_where("newsletter", array("status" => 0));
        return $query->num_rows();
    }

    public function checkIfuserExist($dates)
    { // please read the below note
        $query = $this->db->get_where("newsletter", array("emailnewsletter" => $_POST['email']));
        if ($query->num_rows() == 1) 
        {
            if ($this->restorPassword($dates) == true) {
                return true;
            }

        } else {
            return false;
        }
    }

    public function checkIfExist($dates)
    { // please read the below note
        $query = $this->db->get_where("newsletter", array("emailnewsletter" => $_POST['email']));
        if ($query->num_rows() == 0) {
            $query2 = $this->db->get_where("newsletter", array("loginnewsletter" => $_POST['login']));
            if ($query2->num_rows() == 0) {
                if ($this->insertnewsletter($dates) == true) {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function checkIfExist2($dates)
    { // please read the below note
        $query = $this->db->get_where("newsletter", array("emailnewsletter" => $_POST['email']));
        if ($query->num_rows() == 0) {
            $query2 = $this->db->get_where("newsletter", array("loginnewsletter" => $_POST['login']));
            if ($query2->num_rows() == 0) {
                if ($this->insertnewsletter2($dates) == true) {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function restorPassword($dates)
    {
        $this->db->set('status', $dates);
        $this->db->set('passnewsletter', $dates);
        $this->db->where('emailnewsletter', $_POST["email"]);
        if ($this->db->update("newsletter")) {
            return true;
        } else {
            return false;
        }
    }

    public function activateAccount($dates)
    {
        $this->db->set('status', 0);
        $this->db->where('status', $dates);
        if ($this->db->update("newsletter")) {
            return 'ok';
        } else {
            return false;
        }
    }

    public function changePassword($dates)
    {
        $this->db->set('passnewsletter', sha1($_POST["pass2"]));
        $this->db->where('passnewsletter', $dates);
        if ($this->db->update("newsletter")) {
            return 'ok';
        } else {
            return false;
        }
    }

    public function insertnewsletter()
    {
        $this->email = $_POST['email']; // please read the below note
        $this->dates = date("Y-m-d");

        if ($this->db->insert("newsletter", $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function insertnewsletter2($dates)
    {
        $this->db->select_max("id");
        $id = $this->db->get("newsletter");
    /////////////// ===================== /////////////////////////
        $this->id = $id;
        $this->idPays = $_POST['pays']; // please read the below note
        $this->passnewsletter = sha1($_POST['password']);
        $this->datenewsletter = date("Y-m-d");
        $this->loginnewsletter = $_POST['login'];
        $this->nomnewsletter = $_POST['nom'];
        $this->prenomnewsletter = $_POST['prenom'];
        $this->role = $_POST['role'];
        $this->numeronewsletter = $_POST['tel'];
        $this->emailnewsletter = $_POST['email'];
        $this->matricule = 1;
        $this->status = $dates;

        if ($this->db->insert("newsletter", $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function editnewsletter($user)
    {
        $this->db->set('idPays', $_POST['idPays']); // please read the below note
        $this->db->set('loginnewsletter', $_POST['loginnewsletter']);
        $this->db->set('nomnewsletter', $_POST['nomnewsletter']);
        $this->db->set('prenomnewsletter', $_POST['prenomnewsletter']);
        $this->db->set('numeronewsletter', $_POST['numeronewsletter']);
        $this->db->set('emailnewsletter', $_POST['emailnewsletter']);
        $this->db->set('bpnewsletter', $_POST['bpnewsletter']);
        $this->db->set('autre', $_POST['autre']);

        $this->db->where('id', $user);
        if ($this->db->update("newsletter")) {
            return true;
        } else {
            return false;
        }
    }

    public function editPassword($user, $dates)
    {
        $this->db->set('passnewsletter', sha1($_POST["pass3"])); // please read the below note
        $this->db->set('status', $dates);
        $this->db->where('id', $user);

        $this->db->update('newsletter');
        return true;
    }

    public function updateImage($lien, $user)
    {
        $this->db->set('photonewsletter', $lien); // please read the below note
        //$this->db->set('datenewsletter', time());
        $this->db->where('id', $user);

        $this->db->update('newsletter');
        return true;
    }

    public function basculeRole($user, $role)
    {
        $this->db->set('role', $role); // please read the below note
        $this->db->where('id', $user);

        $this->db->update('newsletter');
        return true;
    }

    public function poweroff_entry($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('newsletter');
        return true;
    }

    public function poweron_entry($id)
    {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('newsletter');
        return true;
    }

    public function delete_entry($id)
    {
        $this->db->set('status', 3);
        $this->db->where('id', $id);
        $this->db->update('newsletter');
        return true;
    }

    public function connectnewsletter()
    {
        $this->password = sha1($_POST['password']);
        $this->matricule = $_POST['matricule'];
        $query = $this->db->get_where("newsletter", array('matricule' => $this->matricule, 'password' => $this->password));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function checkPasswordnewsletter($newsletter)
    {
        $this->passnewsletter = sha1($_POST['password']);
        $query = $this->db->get_where("newsletter", array('id' => $newsletter, 'passnewsletter' => $this->passnewsletter));
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

    public function getnewsletterByID($id)
    {
        $this->id = $id;
        $this->status = 3;

        $query = $this->db->get_where("newsletter", array('id' => $this->id));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getOneData($id, $value)
    {
        foreach ($this->getnewsletterByID($id) as $row):
            return $row->$value;
        endforeach;
    }

    public function getAllnewsletterLimit($min, $max)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where("newsletter", array('status !=' => 3), $max);
        return $query->result();
    }

    public function getAllnewsletterByStatus($id)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where("newsletter", array('status!=' => $id));
        return $query->result();
    }

    public function getnewsletterByEmail($id)
    {
        $this->emailnewsletter = $id;

        $query = $this->db->get_where("newsletter", array('emailnewsletter' => $this->emailnewsletter));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getOneDatabyEmail($id, $value)
    {
        foreach ($this->getnewsletterByID($id) as $row):
            return $row->$value;
        endforeach;
    }
}
