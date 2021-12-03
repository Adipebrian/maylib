<?php

namespace App\Controllers;

use Config\Database;
use App\Models\ModelBuku;
use App\Models\ModelPeminjaman;
use App\Controllers\BaseController;
use App\Models\ModelUser;
use Endroid\QrCode\Builder\Builder;

use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;

class GenerateQrcode extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->db = Database::connect();
    }
    public function index()
    {
        $model = new ModelPeminjaman();
        $code = $this->mRequest->getVar('code');
        $id_loan = $this->mRequest->getVar('id_loan');

        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($code)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->build();
        $data = [
            'qrcode' => 1
        ];
        $model->update($id_loan, $data);
        $result->saveToFile('img/qrcode/' . $code . '.png');
        session()->setFlashdata('pesan', 'Qrcode berhasil di buat');
        return redirect()->to('/mybook');
    }
    public function user()
    {
        $model = new ModelUser();
        $code = $this->mRequest->getVar('code');
        $id = $this->mRequest->getVar('id');

        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($code)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->build();
        $data = [
            'qrcode_status' => 1
        ];
        $model->update($id, $data);
        $result->saveToFile('img/qrcode_user/' . $code . '.png');
        session()->setFlashdata('pesan', 'Qrcode berhasil di buat');
        return redirect()->to('/user');
    }
    public function qrcode_book()
    {
        $this->builder = $this->db->table('book_list');
        $id = $this->mRequest->getVar('id');

        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($id)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->build();
        $data = [
            'qr_status' => 1,
        ];
        $this->builder->select('*');
        $this->builder->where('id', $id);
        $this->builder->update($data);
        $result->saveToFile('img/buku/qrcode/' . $id . '.png');
        session()->setFlashdata('pesan', 'Qrcode berhasil di buat');
        return redirect()->to('/buku/list');
    }
}
