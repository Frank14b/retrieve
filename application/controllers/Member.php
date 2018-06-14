<?php

defined('BASEPATH') or exit('No direct script access allowed');

if (!isset($_SESSION)) {
    session_start();
}

$_SESSION['abbr_lang'] = "fr";

if (!isset($_SESSION['re_user'])) {
    $lang = $_SESSION['abbr_lang'] ?? "en";
    $url = "http://localhost/retrieve/";
    $url1 = "https://ensjobs.cm/";
    header("Location:" . $url . $lang);
    die();
}

class Member extends CI_Controller {

    public function view($page = "acceuil") {
        if (!file_exists(APPPATH . '/views/member/' . $page . 'php')) {

            if ($page == "acceuil") {
                $titre = "dashboard";
            } else {
                $titre = $page;
            }


            $data['title'] = $titre;

            $this->load->library('email');
            $this->load->model('users');
            $this->load->model('ville');
            $this->load->model('pieces');
            $this->load->model('newsletter');
            $this->load->model('contacts');
            $this->load->library('user_agent');
            $this->load->library('pagination');
            //$this->load->model('Langue');

            $data['refer'] = $this->agent->referrer();

            $param1 = $this->uri->segment(4);
            $param2 = $this->uri->segment(5);

            if (isset($param2)) {
                $data[$param2] = $param1;

                if ($param2 == "delete") {
                    if($titre == "config"){
                        $titre = "users";
                    }
                    if ($this->$titre->delete_entry($param1)) {
                        $data['supprimer'] = $titre . " supprimer avec succes";
                    }
                } else if ($param2 == "power-off") {
                    if ($this->$titre->poweroff_entry($param1)) {
                        $data['power'] = $titre . " desactiver avec succes";
                    }
                } else if ($param2 == "power-on") {
                    if ($this->$titre->poweron_entry($param1)) {
                        $data['power'] = $titre . " activer avec succes";
                    }
                } else if (explode("-", $param2)[0] == "define") {
                    if ($this->post_offre->setPC($param1, explode("-", $param2)[1])) {
                        $data['define'] = "Postulant associé avec succes à l'offre";
                    }
                    $data['details'] = explode("-", $param2)[1];
                }
            } else {
                $data["details"] = $param1;
            }

            if ($this->uri->segment(3) == "bascule") {
                if ($this->users->getOneData($_SESSION['re_userid'], 'role') == "Postulant") {
                    $role = "Entreprise";
                } else {
                    $role = "Postulant";
                }
                $this->users->basculeRole($_SESSION['re_userid'], $role);
                header("Location:" . base_url() . $this->uri->segment(1) . "/dashboard");
            }

            if ($this->users->getOneData($_SESSION["re_userid"], "status") != 0) {
                header("Location:" . base_url() . $this->uri->segment(1) . "/dashboard/deconnexion");
            }


            $data['roleUser'] = $this->users->getOneData($_SESSION['re_userid'], 'role');

            $this->adddoc();

            //$this->changeProfile();

            if (isset($_POST['sendsms'])) {
                $this->sendSMS();
            }


            $this->lang->load('form', $this->config->item('language'));
            $this->load->view('templates/header', $data);
            $this->load->view('member/' . $page);
            $this->load->view('templates/footer');

            //$this->Mouchard($titre);
        } else {
            show_404();
        }
    }

    public function Mouchard($t) {
        $page = $t;
        $details = $_POST['M-Details'];
        $this->mouchar->insertmouchar($t, $details);
    }

//////////////////////////////// inscription ........................///////////////////////////

    public function Inscription() {
        if (isset($_POST['saveUserss'])) {
            $code = substr(sha1($_POST['email'] . time() . "ensJobs"), 0, 20);
            if ($this->users->checkIfExist2($code) != false) {
                
                mail($_POST['email'], 'Inscription Confirmer', "Merci d'avoir souscrit au service RETRIEVE vous serez notifier en cas de trouvaille de vos documents");
                
                $_POST['phone'] = $_POST['tel'];
                $_POST['Details'] = "Bienvenue sur ensJobs " . $_POST['login'];
                //$this->sendSMS();

                echo "0";
            } else {
                echo "Echec: soit Email ou login existant; soit veuillez reessayer plutard";
            }
            die();
        }
    }

    public function adddoc() {
        if (isset($_POST['addfile'])) {
            if (isset($_POST['imageP'])) {
               
                $croped_image = $_POST['imageP'];
                list($type, $croped_image) = explode(';', $croped_image);
                list(, $croped_image) = explode(',', $croped_image);
                $croped_image = base64_decode($croped_image);
                $name = time() . "png";
                $image_name = base_url() . 'assets/documents/' . $name;
                // upload cropped image to server
                //$id = $_SESSION['agz_userid'];

                if ($this->pieces->insertpieces($image_name) == true) {
                    //$resultat = move_uploaded_file($_FILES['imageP']['tmp_name'], "../../images/gallery/proprioLogo/" . $image_name);
                    file_put_contents('assets/documents/' . $name, $croped_image);
                    echo 'Operation effectue avec succes';
                    die();
                } else {
                    echo 'echec lors de lajout du document';
                    die();
                }
            }
        }
    }

    public function addRubr() {
        if (isset($_POST['addRubr'])) {
            if (isset($_POST['imageP'])) {
                $croped_image = $_POST['imageP'];
                list($type, $croped_image) = explode(';', $croped_image);
                list(, $croped_image) = explode(',', $croped_image);
                $croped_image = base64_decode($croped_image);
                $name = time() . "png";

                $image_name = base_url() . 'assets/img/rubriques/' . $name;
                // upload cropped image to server
                //$id = $_SESSION['agz_userid'];

                if ($this->rubriques->insertrubriques($image_name, 0) == true) {
                    //$resultat = move_uploaded_file($_FILES['imageP']['tmp_name'], "../../images/gallery/proprioLogo/" . $image_name);
                    file_put_contents('assets/img/rubriques/' . $name, $croped_image);
                    echo 'Operation effectue avec succes';
                    die();
                } else {
                    echo 'echec lors de lajout de la rubrique';
                    die();
                }
            }
        }
    }

    public function sendSMS() {
        require 'osms-php-master/src/Osms.php';

        //use Osms\Osms;

        $config = array(
            'clientId' => 'ythYdifKMRbkGJIst2uU2Zpt9IKooNQ3',
            'clientSecret' => 'bbxpxCGgjJ7gP5cR',
        );

        $osms = new Osms\Osms($config);
        // retrieve an access token
        $response = $osms->getTokenFromConsumerKey();

        if (!empty($response['access_token'])) {
            $senderAddress = 'tel:+237698924416';
            $receiverAddress = 'tel:+237' . $_POST['phone'];
            $message = $_POST['Details'];
            $senderName = 'ensJobs';

            $osms->sendSMS($senderAddress, $receiverAddress, $message, $senderName);

            echo 'Message Envoye avec Succes';
        } else {
            echo 'Echec denvoi du message reéssayer !';
        }
    }

}
