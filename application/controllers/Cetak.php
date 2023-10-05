<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\Shared\ZipArchive;
use PhpOffice\PhpWord\Shared\Text;
class Cetak extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Suratkeluar_model');
	}
	public function cetakSuratKeluar($id){
        $data = Suratkeluar_model::join('template', 'template.templateId','=','surat_keluar.templateId')
		->join('penandatangan', 'penandatangan.penandatanganId','=','surat_keluar.penandatanganId')
		->where('surat_keluar.suratkeluarId', $id)
		->get(['surat_keluar.*', 'template.file_template', 'penandatangan.nama', 'penandatangan.jabatan', 'penandatangan.pangkat_golongan', 'penandatangan.nip'])->first();
		// echo json_encode($data);
		// die;
        $nomor = "";
        $kepada = "";
        $cq = "";
        $tujuan = "";
        $alamat = "";
        $perihal = "";
        $sifat = "";
        $tanggal = "";
        $nama = "";
        $jabatan = "";
        $pangkat_golongan = "";
        $nip = "";
		$template = "";
        if($data){
			$template .= $data['file_template'];
			$nomor = $data['nomor'];
			$kepada = $data['kepada'];
			$cq = $data['cq'];
			$tujuan = $data['tujuan'];
			$sifat = $data['sifat'];
			$alamat = $data['alamat'];
			$perihal = $data['perihal'];
			$tanggal = $data['tanggal'];
			$nama = $data['nama'];
			$jabatan = $data['jabatan'];
			$pangkat_golongan = $data['pangkat_golongan'];
			$nip = $data['nip'];
			$filename = 'SURAT No.'.$data['nomor'];
        }
        // Creating the new document...
        $temp = FCPATH."doc_template/$template";
        Settings::setOutputEscapingEnabled(true);
        $tempProcessor = new \PhpOffice\PhpWord\TemplateProcessor($temp);
        $tempProcessor->setValues([
        	'nomor'=>$nomor,
			'kepada'=>$kepada,
			'cq'=>$cq,
			'tujuan'=>$tujuan,
			'alamat'=>$alamat,
			'perihal'=>$perihal,
			'tanggal'=>$tanggal,
			'sifat'=>$sifat,
			'nama'=>$nama,
			'jabatan'=>$jabatan,
			'pangkat_golongan'=>$pangkat_golongan,
			'nip'=>$nip,
        ]);
        // $listObj = $this->handler->get_objek_pajak($data['idsipd']);
        // $replacements = array();
        // $n = 1;
        // foreach ($listObj->data as $val) {
        //     $block = array('n'=> $n++, 'nama_objek' => $val->nama, 'alamat_objek' => $val->alamat, 'masa_objek'=> mdate('%Y-%m-%d',strtotime($val->tanggal_mulai)).' s/d '. mdate('%Y-%m-%d',strtotime($val->tanggal_selesai)));
        //     $replacements[] = $block;
        // }
        // $tempProcessor->cloneBlock('block_dataobjek', 0, true, false, $replacements);
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
		// header('Cache-Control: max-age=0');
        header('Content-Disposition: attachment;filename='.$filename.'.docx');
        $tempProcessor->saveAs('php://output');
    }

}
/* End of file Cetak.php */
