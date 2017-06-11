<?php

Class Users_model extends CI_Model
{

// Insert registration data in database
    public function register($email, $pass)
    {
// Query to check whether username already exist or not
        $condition = "email =" . "'" . $email . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            $data = array(
                'email' => $email,
                'pass' => $pass
            );
// Query to insert data in database
            $this->db->insert('users', $data);
            if ($this->db->affected_rows() > 0) {
                return true;
            }
        } else {
            return false;
        }
    }

// Read data using username and password
    public function login($email, $pass)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->where('pass', $pass);
        $this->db->limit(1);
        $query = $this->db->get();
        $ret = $query->row();
        if ($query->num_rows() == 1) {
            if ($ret->status == 'neactivat') {
                /*
                 * metoda generat link activare:
                 * genereaza un link de tip http://localhost/epic_quiz/verify_account/md5 de email-time()
                 * metoda verificat link activare
                 * decodeaza md5 venit si se uita daca exista user cu acel mail si cu status neactivat si cu time() mai mic de 48 ore
                 * metoda activare cont, schimba neactivat in activ
                 */

//                $to = $ret->email;
//                $subject = 'Activare cont EpicQUIZ';
//                $message = 'Va multumim pentru inregistrare!
//                            Contul dumneavoastra a fost creeat.
//                            Accesati link-ul de mai jos pentru activarea contului:
//                            -------------------';
//                $headers = 'From: boss@epicquiz.com' . "\r\n" .
//                    'Reply-To: boss@epicquiz.com' . "\r\n" .
//                    'X-Mailer: PHP/' . phpversion();
                $file = ASSETS . "links.txt";
                var_dump($file);
                return write_file($file, $this->generate_link($ret->email));


//                if ($save) {
//                    return 'neactivat';
//                } else {
//                    return $save;
//                }
            } elseif ($ret->status == 'activ') {
                return 'activ';
            }
        } else {
            return 'error';
        }
    }

    public function validate_register($email)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $email);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function generate_link($email)
    {
        return 'http://' . $_SERVER["HTTP_HOST"] . '/epic_quiz/verify_account/' . base64_encode($email . SALT) . '-' . time();
    }

}



