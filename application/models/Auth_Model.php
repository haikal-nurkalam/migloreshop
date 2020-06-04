<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_Model extends CI_Model
{
    // Pengecekan login
    public function login_validator($input)
    {   
        $check = $this->db->where('user_name',$input['username'])->or_where('user_email',$input['username'])->get('user');

        // pengecekan username dan password
        if ($check->num_rows()>0) {
            if (password_verify($input['password'], $check->row_array()['user_password'])) {

                // Membuat session ketika login
                $data = array(
                    'user_id' => $check->row_array()['user_id'],
                    'user_name'  => $check->row_array()['user_full_name'],
                    'role'     => $check->row_array()['user_role'],
                    'logged_in' => TRUE,
                    'cover_img' => $check->row_array()['user_img'],
                    'address_id' => $check->row_array()['user_address_id']
                );

                $this->session->set_userdata($data);

                redirect(base_url());
            } else {
                echo "<script>
                alert('Password salah !');
                document.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
                </script>";
            }
        } else {
            echo "<script>
            alert('User tidak dapat di temukan !');
            document.location.href = '". $_SERVER['HTTP_REFERER']."';
            </script>";
        }
    }

    // Daftar User Baru
    public function add_user($input)
    {
        $check = $this->db->where('user_name',$input['username'])->or_where('user_email', $input['email'])->get('user');

        if ($check->num_rows()>0) {
            echo "<script>
            alert('User sudah terdaftar !');
            document.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
            </script>";
        } else {
            $data = [
                'user_id' => NULL,
                'user_full_name' => $input['fullname'],
                'user_email' => $input['email'],
                'user_name' => $input['username'],
                'user_password' => password_hash($input['password'], PASSWORD_DEFAULT),
                'user_role' => 0,
                'user_address_id' => uniqid(),
                'user_img' => 'defaultPP.png',
                'user_birth_date' => NULL,
                'user_gender' => NULL
            ];
            $this->db->insert('user',$data);

            echo "<script>
            alert('Pendaftaran berhasil');
            document.location.href = '" . base_url('auth/login') . "';
            </script>";
        }
        
    }
}
