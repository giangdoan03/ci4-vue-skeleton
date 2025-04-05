<?php

namespace App\Controllers;

use App\Models\QrCodeModel;
use App\Models\ProductModel;
use App\Models\BusinessModel;
use App\Models\PersonModel;

class QrCodeController extends BaseController
{
    protected $qrCodeModel;
    protected $productModel;
    protected $businessModel;
    protected $personModel;

    public function __construct()
    {
        $this->qrCodeModel = new QrCodeModel();
        $this->productModel = new ProductModel();
        $this->businessModel = new BusinessModel();
        $this->personModel = new PersonModel();
    }

    public function index()
    {
        $data['qrcodes'] = $this->qrCodeModel
            ->where('user_id', session()->get('user_id'))
            ->findAll();

        return view('qrcode/index', $data);
    }

    public function create()
    {
        return view('qrcode/create');
    }

    public function store()
    {
        $type = $this->request->getPost('type');
        $referenceId = $this->request->getPost('reference_id');
        $customUrl = $this->request->getPost('custom_url');

        // Lưu DB trước
        $qrData = [
            'user_id' => session()->get('user_id'),
            'type' => $type,
            'reference_id' => $referenceId ?: null,
            'custom_url' => $customUrl ?: null,
            'qr_image_url' => '', // Tạm, lát nữa cập nhật
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->qrCodeModel->insert($qrData);
        $qrId = $this->qrCodeModel->getInsertID();

        // Sinh ảnh QR code
        $qrLink = base_url('scan/' . $qrId);
        $filePath = WRITEPATH . 'uploads/qrcodes/qr_' . $qrId . '.png';

        if (!is_dir(dirname($filePath))) {
            mkdir(dirname($filePath), 0777, true);
        }

        \QRcode::png($qrLink, $filePath, QR_ECLEVEL_H, 5);

        // Cập nhật lại đường dẫn ảnh vào DB
        $this->qrCodeModel->update($qrId, ['qr_image_url' => 'uploads/qrcodes/qr_' . $qrId . '.png']);

        return redirect()->to('/qrcode')->with('success', 'Tạo mã QR thành công!');
    }

    public function edit($id)
    {
        $qr = $this->qrCodeModel->find($id);
        if (!$qr || $qr['user_id'] != session()->get('user_id')) {
            return redirect()->back()->with('error', 'Không tìm thấy mã QR');
        }

        $userId = session()->get('user_id');
        $data = [
            'qr' => $qr,
            'products' => $this->productModel->where('user_id', $userId)->findAll(),
            'businesses' => $this->businessModel->where('user_id', $userId)->findAll(),
            'persons' => $this->personModel->where('user_id', $userId)->findAll(),
        ];

        return view('qrcode/edit', $data);
    }

    public function update($id)
    {
        $qr = $this->qrCodeModel->find($id);
        if (!$qr || $qr['user_id'] != session()->get('user_id')) {
            return redirect()->back()->with('error', 'Không tìm thấy mã QR');
        }

        $type = $this->request->getPost('type');
        $referenceId = $this->request->getPost('reference_id');
        $customUrl = $this->request->getPost('custom_url');

        $this->qrCodeModel->update($id, [
            'type' => $type,
            'reference_id' => $referenceId ?: null,
            'custom_url' => $customUrl ?: null,
        ]);

        return redirect()->to('/qrcode')->with('success', 'Cập nhật mã QR thành công!');
    }

    public function delete($id)
    {
        $qr = $this->qrCodeModel->find($id);
        if (!$qr || $qr['user_id'] != session()->get('user_id')) {
            return redirect()->back()->with('error', 'Không tìm thấy mã QR');
        }

        // Xoá file QR code
        $filePath = WRITEPATH . $qr['qr_image_url'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        // Xoá record DB
        $this->qrCodeModel->delete($id);

        return redirect()->to('/qrcode')->with('success', 'Xóa mã QR thành công!');
    }

    public function formData()
    {
        $productModel = new \App\Models\ProductModel();
        $businessModel = new \App\Models\BusinessModel();
        $personModel = new \App\Models\PersonModel();

        $products = $productModel->where('user_id', session()->get('user_id'))->findAll();
        $businesses = $businessModel->where('user_id', session()->get('user_id'))->findAll();
        $persons = $personModel->where('user_id', session()->get('user_id'))->findAll();

        return $this->response->setJSON([
            'status' => 'success',
            'products' => $products,
            'businesses' => $businesses,
            'persons' => $persons,
        ]);
    }

}
