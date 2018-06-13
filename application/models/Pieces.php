<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pieces extends CI_Model
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
    public $photo;

    public function __construct()
    {

        parent::__construct();
        $this->load->database();
        //$this->db->method_name();
    }

    public function getAllpieces()
    {
        $this->db->where("status = 0");
        $query = $this->db->get("pieces");
        return $query->result();
    }

    public function countAllpieces()
    {
        $query = $this->db->get_where("pieces", array("status" => 0));
        return $query->num_rows();
    }

    public function checkIfuserExist($code)
    { // please read the below note
        $query = $this->db->get_where("pieces", array("emailpieces" => $_POST['email']));
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
        $query = $this->db->get_where("pieces", array("emailpieces" => $_POST['email']));
        if ($query->num_rows() == 0) {
            $query2 = $this->db->get_where("pieces", array("loginpieces" => $_POST['login']));
            if ($query2->num_rows() == 0) {
                if ($this->insertpieces($code) == true) {
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
        $query = $this->db->get_where("pieces", array("emailpieces" => $_POST['email']));
        if ($query->num_rows() == 0) {
            $query2 = $this->db->get_where("pieces", array("loginpieces" => $_POST['login']));
            if ($query2->num_rows() == 0) {
                if ($this->insertpieces2($code) == true) {
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
        $this->db->set('passpieces', $code);
        $this->db->where('emailpieces', $_POST["email"]);
        if ($this->db->update("pieces")) {
            return true;
        } else {
            return false;
        }
    }

    public function activateAccount($code)
    {
        $this->db->set('status', 0);
        $this->db->where('status', $code);
        if ($this->db->update("pieces")) {
            return 'ok';
        } else {
            return false;
        }
    }

    public function changePassword($code)
    {
        $this->db->set('passpieces', sha1($_POST["pass2"]));
        $this->db->where('passpieces', $code);
        if ($this->db->update("pieces")) {
            return 'ok';
        } else {
            return false;
        }
    }

    public function insertpieces($code)
    {
        //$this->db->select_max("id");
        //$id = $this->db->get("pieces");
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

        if ($this->db->insert("pieces", $this)) {
            return true;
        } else {
            return false;
        }
    }

    public function editpieces($user)
    {
        $this->db->set('idPays', $_POST['idPays']); // please read the below note
        $this->db->set('loginpieces', $_POST['loginpieces']);
        $this->db->set('nompieces', $_POST['nompieces']);
        $this->db->set('prenompieces', $_POST['prenompieces']);
        $this->db->set('numeropieces', $_POST['numeropieces']);
        $this->db->set('emailpieces', $_POST['emailpieces']);
        $this->db->set('bppieces', $_POST['bppieces']);
        $this->db->set('autre', $_POST['autre']);

        $this->db->where('id', $user);
        if ($this->db->update("pieces")) {
            return true;
        } else {
            return false;
        }
    }

    public function editPassword($user, $code)
    {
        $this->db->set('passpieces', sha1($_POST["pass3"])); // please read the below note
        $this->db->set('status', $code);
        $this->db->where('id', $user);

        $this->db->update('pieces');
        return true;
    }

    public function updateImage($lien, $user)
    {
        $this->db->set('photopieces', $lien); // please read the below note
        //$this->db->set('datepieces', time());
        $this->db->where('id', $user);

        $this->db->update('pieces');
        return true;
    }

    public function basculeRole($user, $role)
    {
        $this->db->set('role', $role); // please read the below note
        $this->db->where('id', $user);

        $this->db->update('pieces');
        return true;
    }

    public function poweroff_entry($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('pieces');
        return true;
    }

    public function poweron_entry($id)
    {
        $this->db->set('status', 0);
        $this->db->where('id', $id);
        $this->db->update('pieces');
        return true;
    }

    public function delete_entry($id)
    {
        $this->db->set('status', 3);
        $this->db->where('id', $id);
        $this->db->update('pieces');
        return true;
    }

    public function connectpieces()
    {
        $this->password = sha1($_POST['password']);
        $this->email = $_POST['email'];
        $query = $this->db->get_where("pieces", array('email' => $this->email, 'password' => $this->password));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function checkPasswordpieces($pieces)
    {
        $this->passpieces = sha1($_POST['password']);
        $query = $this->db->get_where("pieces", array('id' => $pieces, 'passpieces' => $this->passpieces));
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

    public function getpiecesByID($id)
    {
        $this->id = $id;
        $this->status = 3;

        $query = $this->db->get_where("pieces", array('id' => $this->id));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getOneData($id, $value)
    {
        foreach ($this->getpiecesByID($id) as $row):
            return $row->$value;
        endforeach;
    }

    public function getAllpiecesLimit($min, $max)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where("pieces", array('status !=' => 3), $max);
        return $query->result();
    }

    public function getAllpiecesByStatus($id)
    {
        $this->db->order_by("id", "desc");
        $query = $this->db->get_where("pieces", array('status!=' => $id));
        return $query->result();
    }

    public function getpiecesByEmail($id)
    {
        $this->emailpieces = $id;

        $query = $this->db->get_where("pieces", array('emailpieces' => $this->emailpieces));
        if ($query) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function getOneDatabyEmail($id, $value)
    {
        foreach ($this->getpiecesByID($id) as $row):
            return $row->$value;
        endforeach;
    }
}
