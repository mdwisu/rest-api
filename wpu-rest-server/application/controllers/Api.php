<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Mahasiswa_model', 'mahasiswa');
        $this->load->model('Auth_model', 'auth');

        $this->methods['mahasiswa_get']['limit'] = 100;
        $this->methods['mahasiswa_post']['limit'] = 100;
        $this->methods['mahasiswa_delete']['limit'] = 100;
        $this->methods['mahasiswa_put']['limit'] = 100;

    }

    public function mahasiswa_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $mahasiswa = $this->mahasiswa->getMahasiswa();
        } else {
            $mahasiswa = $this->mahasiswa->getMahasiswa($id);
        }
        if ($mahasiswa) {
            $this->response( [
                'status' => true,
                'data' => $mahasiswa
            ], 200 );
        } else {
            $this->response( [
                'status' => false,
                'message' => 'id not found'
            ], 404 );
        }
    }
    public function mahasiswa_delete()
    {
        $id = $this->delete('id');
        if ($id === null) {
            $this->response( [
                'status' => false,
                'message' => 'provide an id!'
            ], 404 );
        } else {
            if ($this->mahasiswa->deleteMahasiswa($id) > 0 ) {
                $this->response( [
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted'
                ], 200 );
            } else {
                $this->response( [
                    'status' => false,
                    'message' => 'id not found!'
                ], 404 );
            }
        }
    }

    public function mahasiswa_post()
    {
        $data = [
            'nrp' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'email' => $this->post('email'),
            'jurusan' => $this->post('jurusan')
        ];

        if ($this->mahasiswa->createMahasiswa($data) > 0 ) {
            $this->response( [
                'status' => true,
                'message' => 'new mahasiswa has been created'
            ], 200 );
        } else {
            $this->response( [
                'status' => false,
                'message' => 'failed to create new data!'
            ], 404 );
        }
    }

    public function mahasiswa_put()
    {
        $id = $this->put('id');
        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan')
        ];

        if ($this->mahasiswa->updateMahasiswa($data, $id) > 0 ) {
            $this->response( [
                'status' => true,
                'message' => 'data mahasiswa has been updated'
            ], 200 );
            // 201 created
        } else {
            $this->response( [
                'status' => false,
                'message' => 'failed to update data data!'
            ], 400 );
        }
    }
    public function login_post()
    {
        $email = $this->post('email');
        $password = $this->post('password');

        $user = $this->auth->getUser($email);
        //  jika usernya ada
        if ($user) {
            // jika user avtive
            if ($user['is_active'] == 1) {
                // cek passowrd
                if (password_verify($password, $user['password'])) {
                    if ($user['role_id'] == 1) {
                        $this->response( [
                            'status' => false,
                            'message' => 'Welcome Admin'
                        ], 200 );
                        redirect('admin');
                    }else{
                        $this->response( [
                            'status' => false,
                            'message' => 'Welcome user'
                        ], 200 );
                        redirect('user');
                    }
                }else{
                    $this->response( [
                        'status' => false,
                        'message' => 'wrong password'
                    ], 404 );
                    redirect('auth');
                }
            }else{
                $this->response( [
                    'status' => false,
                    'message' => 'user has not bennt activated!'
                ], 404 );
                redirect('auth');
            }
        } else {
            $this->response( [
                'status' => false,
                'message' => 'user not found!'
            ], 404 );
            redirect('auth');
        }
    }

    public function logout_post()
    {
        $this->response( [
            'status' => false,
            'message' => 'Logout Berhasil!'
        ], 404 );
        redirect('auth');
    }
    
    public function password_put()
    {
        $id = $this->put('id');
        $data = password_hash($this->put('password'), PASSWORD_DEFAULT);
        if ($this->auth->updatePassword($data, $id) > 0 ) {
            $this->response( [
                'status' => true,
                'message' => 'password has been updated'
            ], 200 );
            // 201 created
        } else {
            $this->response( [
                'status' => false,
                'message' => 'failed to update password!'
            ], 400 );
        }
    }
}