<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function register()
    {
        // ✅ Đổi từ getPost() sang getJSON(true)
        $data = $this->request->getJSON(true);

        // Check dữ liệu có đủ không
        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        if (empty($email) || empty($password)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Email and password are required.'
            ]);
        }

        // Khai báo rules validation
        $rules = [
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
        ];

        // ✅ validateData chứ không phải validate (vì bạn truyền data ngoài post)
        if (!$this->validateData($data, $rules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => $this->validator->getErrors()
            ]);
        }

        // Lưu vào database
        $userModel = new \App\Models\UserModel();
        $userModel->save([
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'), // ✅ thêm dòng này
        ]);

        // Trả về kết quả
        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Registration successful.'
        ]);
    }


    public function login()
    {
        $data = $this->request->getJSON(true); // ✅ đọc JSON body

        $email = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        if (empty($email) || empty($password)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Email and password are required.'
            ]);
        }

        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid email or password'
            ]);
        }

        // Set session
        session()->set([
            'isLoggedIn' => true,
            'userId' => $user['id'],
            'userEmail' => $user['email']
        ]);

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Login successful'
        ]);
    }


    public function me()
    {
        if (!session()->get('isLoggedIn')) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Not logged in.'
            ]);
        }

        // Lấy user từ DB theo session userId
        $userModel = new \App\Models\UserModel();
        $user = $userModel->find(session()->get('userId'));

        if (!$user) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'User not found.'
            ]);
        }

        // Xóa field password trước khi trả về
        unset($user['password']);

        return $this->response->setJSON([
            'status' => 'success',
            'user' => $user
        ]);
    }


    public function logout()
    {
        // Hủy session đăng nhập
        session()->destroy();

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Logout successful'
        ]);
    }


}
