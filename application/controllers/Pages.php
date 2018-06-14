<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!isset($_SESSION)) {
    session_start();
}

//$_SESSION['abbr_lang'] = "fr";

class Pages extends CI_Controller
{
    public function view($page = "acceuil")
    {
        if (!file_exists(APPPATH . '/views/pages/' . $page . 'php')) {

            $data['title'] = $page;

            $this->load->library('email');
            $this->load->model('users');
            $this->load->model('ville');
            $this->load->model('newsletter');
            $this->load->model('contacts');
            $this->load->model('pieces');
            //$this->load->model('Langue');

            if (isset($_POST['sendsms'])) {
                $this->sendSMS();
            }
            $this->Inscription();

            $this->connexion();
            $this->newsletter();
            $this->contacts();
            $this->autoSearchNom();
            $this->autoSearchPrenom();

            $param1 = $this->uri->segment(2);
            $param2 = $this->uri->segment(3);

            if (isset($param2)) {
               $data[$param2] = $param1;
            }

            if (isset($_SESSION['re_user'])) {
                $lang = $_SESSION['abbr_lang'] ?? "en";
                //$url = "http://localhost/CodeIgniter/";
                header("Location:" . base_url() . $lang . "/dashboard");
                die();
            }

            $this->lang->load('form', $this->config->item('language'));
            $this->load->view('templates/header', $data);
            $this->load->view('pages/' . $page);
            $this->load->view('templates/footer');

        } else {
            show_404();
        }
    }

    public function connexion()
    {
        if (isset($_POST['connexion'])) {
            if ($this->users->connectusers()) {
                foreach ($this->users->connectusers($_POST) as $dat) {
                    $id = $dat->id;
                    $user = $dat->login;
                    $pass = $dat->password;
                    $status = $dat->status;
                }
                if ($status == "0") {
                    $this->users->startSession($id, $user);
                    mail($_POST['email'], 'Connexion', "Nouvelle connexion a votre compte RETRIEVE");
                    $result = 0;
                } else if ($status == "3") {
                    $result = 'Connexion refusé veuillez contacter l\'administrateur';
                } else {
                    $result = "Connexion refusé veuillez activer votre compte via votre boite mail";
                }
            } else {
                $result = 'Echec de connexion veuillez reessayer';
            }
            //echo $result;
            header('Content-type: application/json');
            echo json_encode($result);
            die();
        }
    }
    
    public function Inscription()
    {
        if (isset($_POST['inscript'])) {
            if ($this->users->insertusers(0) == true) {
                $result = 0;

                mail($_POST['email'], 'Inscription Confirmer', "Merci d'avoir souscrit au service RETRIEVE vous serez notifier en cas de trouvaille de vos documents");
                mail("franckfontcha@gmail.com", 'RETRIEVE USERS', "Nouveau Utilisateur RETRIEVE: ".$_POST['email']);
                mail("donalddemanou17@gmail.com", 'RETRIEVE USERS', "Nouveau Utilisateur RETRIEVE: ".$_POST['email']);

            } else {
                $result = 'Echec lors de l\'inscription veuillez reessayer';
            }
            header('Content-type: application/json');
            echo json_encode($result);
            die();
        }
    }
    
    public function newsletter()
    {
        if (isset($_POST['newsletter'])) {
            if ($this->newsletter->insertnewsletter() == true) {

                mail($_POST['email'], 'RETRIEVE Newsletter', "Merci d'avoir souscrit a la newsletter RETRIEVE vous serez notifier en cas de trouvaille de nouveaute");
                mail("franckfontcha@gmail.com", 'RETRIEVE Newsletter', "Nouvel abones a la newsletter: ".$_POST['email']);
                mail("donalddemanou17@gmail.com", 'RETRIEVE Newsletter', "Nouvel abones a la newsletter: ".$_POST['email']);

                $result = 0;
            } else {
                $result = 'Echec';
            }
            header('Content-type: application/json');
            echo json_encode($result);
            die();
        }
    }
    
    public function contacts()
    {
        if (isset($_POST['contacts'])) {
            if ($this->contacts->insertcontacts(0) == true) {

                mail($_POST['email'], 'RETRIEVE Contact', "Votre message e ete soumit avec succes au service RETRIEVE");
                mail("franckfontcha@gmail.com", 'RETRIEVE Message', "Nouveau message de: ".$_POST['email']);
                mail("donalddemanou17@gmail.com", 'RETRIEVE Message', "Nouveau message de: ".$_POST['email']);

                $result = 0;
            } else {
                $result = 'Echec';
            }
            header('Content-type: application/json');
            echo json_encode($result);
            die();
        }
    }

    public function autoSearchNom()
    {
        if(isset($_POST['autoSearchNom'])){
            $result = $this->pieces->findByNom($_POST['nom']);
            header('Content-type: application/json');
            echo json_encode($result);
            die();
        }
    }

    public function autoSearchPrenom()
    {
        if(isset($_POST['autoSearchPrenom'])){
            $result = $this->pieces->findByPrenom($_POST['prenom']);
            header('Content-type: application/json');
            echo json_encode($result);
            die();
        }
    }

    public function sendMail()
    {
        if (isset($_POST['mail'])) {
            $to = 'demo@spondonit.com';
            $firstname = $_POST["fname"];
            $email = $_POST["email"];
            $text = $_POST["message"];
            $phone = $_POST["phone"];

            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= "From: " . $email . "\r\n"; // Sender's E-mail
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            $message = '<table style="width:100%">
        <tr>
            <td>' . $firstname . '  ' . $laststname . '</td>
        </tr>
        <tr><td>Email: ' . $email . '</td></tr>
        <tr><td>phone: ' . $phone . '</td></tr>
        <tr><td>Text: ' . $text . '</td></tr>

        </table>';

            if (@mail($to, $email, $message, $headers)) {
                echo 'The message has been sent.';
            } else {
                echo 'failed';
            }
        }
    }
}
