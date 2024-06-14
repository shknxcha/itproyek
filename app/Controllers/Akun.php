<?php
namespace App\Controllers;

use App\Models\M_akun;

class Akun extends BaseController
{
    public function index()
    {
        $akunModel = new M_akun();
        $data['akun'] = $akunModel->findAll();
        $data['title'] = 'Daftar Akun';
        return view('akun/listAkun', $data);
    }

    public function pageLogin()
    {
        return view('login/login');
    }

    public function register()
    {
        return view('login/register');
    }

    public function prosesLogin()
    {
        if (session()->get('id_akun')) {
            return redirect()->to(base_url('/dashbord'));
        }

        if ($this->request->getMethod() === 'post') {
            $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
            $recaptchaSecretKey = '6LdtHDApAAAAAKAw2IWVmAHKhTuE26vk8nzQisEo';
            $recaptchaVerification = $this->verifyRecaptcha($recaptchaResponse, $recaptchaSecretKey);

            if (!$recaptchaVerification) {
                session()->setFlashdata('error', 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.');
                return redirect()->to(base_url('Login'));
            }

            // Lakukan proses login jika reCAPTCHA terverifikasi
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $model = new M_akun();
            $user = $model->getUserByUsernameAndPassword($username, $password);

            if ($user !== null) {
                session()->set('id_akun', $user['id_akun']); // Atur ID pengguna dalam sesi
                return redirect()->to(base_url('Admin'));
            } else {
                session()->setFlashdata('error', 'Username atau Password salah.');
                return redirect()->to(base_url('Login'));
            }
        }

        return view('login/login');
    }

    public function edit_profil()
    {
        $id = 1;
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $model = new M_akun();

        $data = [];
        $alerts = [];

        if ($username !== '') {
            $data['username'] = $username;
            $alerts[] = 'Username telah diubah.';
        }

        if ($email !== '') {
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailDomain = explode('@', $email);
                if ($emailDomain[1] === 'gmail.com') {
                    $data['email'] = $email;
                    $alerts[] = 'Email telah diubah.';
                } else {
                    $alerts[] = 'Email harus menggunakan domain gmail.com.';
                }
            } else {
                $alerts[] = 'Format email tidak valid.';
            }
        }

        if ($password !== '') {
            if (strlen($password) >= 5) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $data['password'] = $hashedPassword;
                $alerts[] = 'Password telah diubah.';
            } else {
                $alerts[] = 'Password harus terdiri dari minimal 5 karakter.';
            }
        }

        if (!empty($data)) {
            $model->updateDataProfil($id, $data);
            $alerts[] = 'Profil berhasil diperbarui.';
        } else {
            $alerts[] = 'Tidak ada perubahan pada profil.';
        }

        $session = session();
        $session->setFlashdata('alerts', $alerts);

        return redirect()->to('/Profil/index');
    }

    public function __destruct()
    {
        $this->model = null;
    }

    public function logout()
    {
        session()->remove('id_akun');
        return redirect()->to(base_url('/'));
    }

    private function verifyRecaptcha($response, $secretKey)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = [
            'secret' => $secretKey,
            'response' => $response,
        ];

        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);

        if ($result === FALSE) {
            // Handle error
            return false;
        }

        $resultData = json_decode($result, true);
        return isset($resultData['success']) && $resultData['success'];
    }
}
