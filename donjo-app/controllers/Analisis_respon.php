<<<<<<< HEAD
<?php  if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
=======
<?php

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
/*
 *
 * File ini bagian dari:
 *
 * OpenSID
 *
 * Sistem informasi desa sumber terbuka untuk memajukan desa
 *
 * Aplikasi dan source code ini dirilis berdasarkan lisensi GPL V3
 *
 * Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * Hak Cipta 2016 - 2021 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 *
 * Dengan ini diberikan izin, secara gratis, kepada siapa pun yang mendapatkan salinan
 * dari perangkat lunak ini dan file dokumentasi terkait ("Aplikasi Ini"), untuk diperlakukan
 * tanpa batasan, termasuk hak untuk menggunakan, menyalin, mengubah dan/atau mendistribusikan,
 * asal tunduk pada syarat berikut:
 *
 * Pemberitahuan hak cipta di atas dan pemberitahuan izin ini harus disertakan dalam
 * setiap salinan atau bagian penting Aplikasi Ini. Barang siapa yang menghapus atau menghilangkan
 * pemberitahuan ini melanggar ketentuan lisensi Aplikasi Ini.
 *
 * PERANGKAT LUNAK INI DISEDIAKAN "SEBAGAIMANA ADANYA", TANPA JAMINAN APA PUN, BAIK TERSURAT MAUPUN
 * TERSIRAT. PENULIS ATAU PEMEGANG HAK CIPTA SAMA SEKALI TIDAK BERTANGGUNG JAWAB ATAS KLAIM, KERUSAKAN ATAU
 * KEWAJIBAN APAPUN ATAS PENGGUNAAN ATAU LAINNYA TERKAIT APLIKASI INI.
 *
 * @package   OpenSID
 * @author    Tim Pengembang OpenDesa
 * @copyright Hak Cipta 2009 - 2015 Combine Resource Institution (http://lumbungkomunitas.net/)
 * @copyright Hak Cipta 2016 - 2021 Perkumpulan Desa Digital Terbuka (https://opendesa.id)
 * @license   http://www.gnu.org/licenses/gpl.html GPL V3
 * @link      https://github.com/OpenSID/OpenSID
 *
 */

<<<<<<< HEAD
=======
defined('BASEPATH') || exit('No direct script access allowed');

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
class Analisis_respon extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
<<<<<<< HEAD
        unset($_SESSION['delik']);
        $this->load->model(['analisis_respon_model', 'wilayah_model']);

        $_SESSION['submenu'] = "Input Data";
        $_SESSION['asubmenu'] = "analisis_respon";
        $this->modul_ini = 5;
=======
        $this->session->unset_userdata(['delik']);
        $this->load->model(['analisis_respon_model', 'wilayah_model', 'analisis_master_model']);
        $this->session->submenu  = 'Input Data';
        $this->session->asubmenu = "{$this->controller}";
        $this->modul_ini         = 5;
        $this->sub_modul_ini     = 110;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function clear()
    {
<<<<<<< HEAD
        unset($_SESSION['cari']);
        unset($_SESSION['dusun']);
        unset($_SESSION['rw']);
        unset($_SESSION['rt']);
        unset($_SESSION['isi']);
        $_SESSION['per_page'] = 50;
        redirect('analisis_respon');
    }

    public function leave()
    {
        $id = $_SESSION['analisis_master'];
        unset($_SESSION['analisis_master']);
        redirect("analisis_master/menu/$id");
    }

    public function index($p=1, $o=0)
    {
        if (empty($this->analisis_respon_model->get_periode())) {
            $_SESSION['success'] = -1;
            $_SESSION['error_msg'] = 'Tidak ada periode aktif. Entri data respon harus ada periode aktif.';
            redirect('analisis_periode');
        }
        unset($_SESSION['cari2']);
        $data['p']        = $p;
        $data['o']        = $o;
=======
        $this->session->unset_userdata(['cari', 'dusun', 'rw', 'rt', 'isi']);
        $this->session->per_page = 50;

        redirect($this->controller);
    }

    public function index($p = 1, $o = 0)
    {
        if (empty($this->analisis_master_model->get_aktif_periode())) {
            $this->session->success   = -1;
            $this->session->error_msg = 'Tidak ada periode aktif. Entri data respon harus ada periode aktif.';

            redirect('analisis_periode');
        }
        unset($_SESSION['cari2']);
        $data['p'] = $p;
        $data['o'] = $o;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629

        if (isset($_SESSION['cari'])) {
            $data['cari'] = $_SESSION['cari'];
        } else {
            $data['cari'] = '';
        }

        if (isset($_SESSION['isi'])) {
            $data['isi'] = $_SESSION['isi'];
        } else {
            $data['isi'] = '';
        }

        if (isset($_SESSION['dusun'])) {
<<<<<<< HEAD
            $data['dusun'] = $_SESSION['dusun'];
            $data['list_rw'] = $this->wilayah_model->list_rw($data['dusun']);

            if (isset($_SESSION['rw'])) {
                $data['rw'] = $_SESSION['rw'];
=======
            $data['dusun']   = $_SESSION['dusun'];
            $data['list_rw'] = $this->wilayah_model->list_rw($data['dusun']);

            if (isset($_SESSION['rw'])) {
                $data['rw']      = $_SESSION['rw'];
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                $data['list_rt'] = $this->wilayah_model->list_rt($data['dusun'], $data['rw']);
                if (isset($_SESSION['rt'])) {
                    $data['rt'] = $_SESSION['rt'];
                } else {
                    $data['rt'] = '';
                }
            } else {
                $data['rw'] = '';
            }
        } else {
            $data['dusun'] = '';
<<<<<<< HEAD
            $data['rw'] = '';
            $data['rt'] = '';
=======
            $data['rw']    = '';
            $data['rt']    = '';
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        }

        if (isset($_POST['per_page'])) {
            $_SESSION['per_page'] = $_POST['per_page'];
        }
        $data['per_page'] = $_SESSION['per_page'];

<<<<<<< HEAD
        $data['list_dusun'] = $this->wilayah_model->list_dusun();
        $data['paging'] = $this->analisis_respon_model->paging($p, $o);
        $data['main'] = $this->analisis_respon_model->list_data($o, $data['paging']->offset, $data['paging']->per_page);
        $data['keyword'] = $this->analisis_respon_model->autocomplete();
        $data['analisis_master'] = $this->analisis_respon_model->get_analisis_master();
        $data['analisis_periode'] = $this->analisis_respon_model->get_periode();
        $this->set_minsidebar(1);
        $this->render('analisis_respon/table', $data);
    }

    public function kuisioner($p=1, $o=0, $id='', $fs=0)
    {
        if ($fs == 1) {
            $_SESSION['fullscreen'] = 1;
        }

        if ($fs == 2) {
            unset($_SESSION['fullscreen']);
        }

        if ($fs != 0) {
            redirect("analisis_respon/kuisioner/$p/$o/$id");
        }

        $data['p'] = $p;
        $data['o'] = $o;
        $data['id'] = $id;

        $data['analisis_master'] = $this->analisis_respon_model->get_analisis_master();
        $data['subjek'] = $this->analisis_respon_model->get_subjek($id);
        $data['list_jawab'] = $this->analisis_respon_model->list_indikator($id);
        $data['list_bukti'] = $this->analisis_respon_model->list_bukti($id);
        $data['list_anggota'] = $this->analisis_respon_model->list_anggota($id);
        $data['form_action'] = site_url("analisis_respon/update_kuisioner/$p/$o/$id");

        $this->set_minsidebar(1);
        if (isset($_SESSION['fullscreen'])) {
            $data['layarpenuh']= 1;
        } else {
            $data['layarpenuh']= 2;
        }
=======
        $data['list_dusun']       = $this->wilayah_model->list_dusun();
        $data['paging']           = $this->analisis_respon_model->paging($p, $o);
        $data['main']             = $this->analisis_respon_model->list_data($o, $data['paging']->offset, $data['paging']->per_page);
        $data['keyword']          = $this->analisis_respon_model->autocomplete();
        $data['analisis_master']  = $this->analisis_master_model->get_analisis_master($this->session->analisis_master);
        $data['analisis_periode'] = $this->analisis_master_model->periode;
        $data                     = array_merge($data, $this->judul_subjek($data['analisis_master']['subjek_tipe']));

        $this->render('analisis_respon/table', $data);
    }

    private function judul_subjek($subjek_tipe)
    {
        $asubjek = $this->referensi_model->list_by_id('analisis_ref_subjek')[$subjek_tipe]['subjek'];

        switch ($subjek_tipe) {
            case 1:
                $judul = [
                    'nama'    => 'Nama',
                    'nomor'   => 'NIK',
                    'asubjek' => $asubjek,
                ];
                break;

            case 2: $judul = [
                'nama'    => 'Kepala Keluarga',
                'nomor'   => 'Nomor KK',
                'asubjek' => $asubjek,
            ];
                break;

            case 3: $judul = [
                'nama'    => 'Kepala Rumah Tangga',
                'nomor'   => 'Nomor Rumah Tangga',
                'asubjek' => $asubjek,
            ];
                break;

            case 4: $judul = [
                'nama'    => 'Nama Kelompok',
                'nomor'   => 'ID Kelompok',
                'asubjek' => $asubjek,
            ];
                break;

            case 5:
                $desa  = ucwords($this->setting->sebutan_desa);
                $judul = [
                    'nama'    => "Nama {$desa}",
                    'nomor'   => "Kode {$desa}",
                    'asubjek' => ucwords($this->setting->sebutan_desa),
                ];
                break;

            case 6:
                $dusun = ucwords($this->setting->sebutan_dusun);
                $judul = [
                    'nama'    => "Nama {$dusun}",
                    'nomor'   => $dusun,
                    'asubjek' => $asubjek,
                ];
                break;

            case 7:
                $judul = [
                    'nama'    => "Nama {$this->setting->sebutan_dusun}/RW",
                    'nomor'   => 'RW',
                    'asubjek' => $asubjek,
                ];
                break;

            case 8:
                $judul = [
                    'nama'    => "Nama {$this->setting->sebutan_dusun}/RW/RT",
                    'nomor'   => 'RT',
                    'asubjek' => $asubjek,
                ];
                break;

            default: $judul = null;
        }

        return $judul;
    }

    public function kuisioner($p = 1, $o = 0, $id = 0, $fs = 0)
    {
        if ($fs == 1) {
            $this->session->fullscreen = 1;
        }
        if ($fs == 2) {
            $this->session->unset_userdata('fullscreen');
        }
        if ($fs != 0) {
            redirect("analisis_respon/kuisioner/{$p}/{$o}/{$id}");
        }

        $data['p']  = $p;
        $data['o']  = $o;
        $data['id'] = $id;

        $data['analisis_master'] = $this->analisis_master_model->get_analisis_master($this->session->analisis_master);
        $data['subjek']          = $this->analisis_respon_model->get_subjek($id);
        $data['list_jawab']      = $this->analisis_respon_model->list_indikator($id);
        $data['list_bukti']      = $this->analisis_respon_model->list_bukti($id);
        $data['list_anggota']    = $this->analisis_respon_model->list_anggota($id);
        $data['form_action']     = site_url("{$this->controller}/update_kuisioner/{$p}/{$o}/{$id}");
        $data['perbaharui']      = site_url("{$this->controller}/perbaharui/{$p}/{$o}/{$id}");
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629

        $this->render('analisis_respon/form', $data);
    }

<<<<<<< HEAD
    public function update_kuisioner($p=1, $o=0, $id='')
    {
        $this->redirect_hak_akses('u');
        $this->analisis_respon_model->update_kuisioner($id);
        redirect("analisis_respon/kuisioner/$p/$o/$id");
    }

    //CHILD--------------------
    public function kuisioner_child($p=1, $o=0, $id='', $idc='')
=======
    public function perbaharui($p = 1, $o = 0, $id_subjek = 0)
    {
        $this->redirect_hak_akses('u');
        $data = $this->analisis_respon_model->perbaharui($id_subjek);

        redirect("{$this->controller}/kuisioner/{$p}/{$o}/{$id_subjek}");
    }

    public function update_kuisioner($p = 1, $o = 0, $id = 0)
    {
        $this->redirect_hak_akses('u');
        $this->analisis_respon_model->update_kuisioner($id);

        redirect("{$this->controller}/kuisioner/{$p}/{$o}/{$id}");
    }

    //CHILD--------------------
    public function kuisioner_child($p = 1, $o = 0, $id = 0, $idc = '')
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    {
        $data['p'] = $p;
        $data['o'] = $o;

<<<<<<< HEAD
        $data['list_jawab'] = $this->analisis_respon_model->list_indikator_child($idc);
        $data['form_action'] = site_url("analisis_respon/update_kuisioner_child/$p/$o/$id/$idc");
=======
        $data['list_jawab']  = $this->analisis_respon_model->list_indikator_child($idc);
        $data['form_action'] = site_url("{$this->controller}/update_kuisioner_child/{$p}/{$o}/{$id}/{$idc}");
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629

        $this->load->view('analisis_respon/form_ajax', $data);
    }

<<<<<<< HEAD
    public function update_kuisioner_child($p=1, $o=0, $id='', $idc='')
=======
    public function update_kuisioner_child($p = 1, $o = 0, $id = 0, $idc = '')
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    {
        $this->redirect_hak_akses('u');
        $per = $this->analisis_respon_model->get_periode_child();
        $this->analisis_respon_model->update_kuisioner($idc, $per);
<<<<<<< HEAD
        redirect("analisis_respon/kuisioner/$p/$o/$id");
=======
        redirect("{$this->controller}/kuisioner/{$p}/{$o}/{$id}");
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function aturan_unduh()
    {
        $data['main'] = $this->analisis_respon_model->aturan_unduh();
        $this->load->view('analisis_respon/import/aturan_unduh', $data);
    }

    public function data_ajax()
    {
        $this->load->view('analisis_respon/import/data_ajax');
    }

<<<<<<< HEAD
    public function data_unduh($p=0, $o=0)
    {
        $data['main'] = $this->analisis_respon_model->data_unduh($p, $o);
        $data['periode'] = $this->analisis_respon_model->get_aktif_periode();
        $data['indikator'] = $this->analisis_respon_model->indikator_unduh($p, $o);
        $this->load->view('analisis_respon/import/data_unduh', $data);
    }

    public function import($op=0)
    {
        $this->redirect_hak_akses('u');
        $data['form_action'] = site_url("analisis_respon/import_proses/$op");
        $this->load->view('analisis_respon/import/import', $data);
    }

    public function import_proses($op=0)
    {
        $this->redirect_hak_akses('u');
        $this->analisis_respon_model->import_respon($op);
        redirect('analisis_respon');
=======
    public function data_unduh($p = 0, $o = 0)
    {
        $data['subjek_tipe'] = $this->session->subjek_tipe;
        $data['main']        = $this->analisis_respon_model->data_unduh($p, $o);
        $data['periode']     = $this->analisis_master_model->get_aktif_periode();
        $data['indikator']   = $this->analisis_respon_model->indikator_unduh($p, $o);

        $key         = ($data['periode'] + 3) * ($this->session->analisis_master + 7) * ($this->session->subjek_tipe * 3);
        $data['key'] = 'AN' . $key;

        switch ($this->session->subjek_tipe) {
            case 5:
                $data['span_kolom'] = 3;
                break;

            case 6:
                $data['span_kolom'] = 3;
                break;

            case 7:
                $data['span_kolom'] = 5;
                break;

            case 8:
                $data['span_kolom'] = 6;
                break;

            default:
                $data['span_kolom'] = 7;
                break;
        }
        $data['judul'] = $this->judul_subjek($this->session->subjek_tipe);

        $this->load->view('analisis_respon/import/data_unduh', $data);
    }

    public function import($op = 0)
    {
        $this->redirect_hak_akses('u');
        $data['form_action'] = site_url("{$this->controller}/import_proses/{$op}");

        $this->load->view('analisis_respon/import/import', $data);
    }

    public function import_proses($op = 0)
    {
        $this->redirect_hak_akses('u');
        $this->analisis_respon_model->import_respon($op);

        redirect($this->controller);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function search()
    {
        $cari = $this->input->post('cari');
        if ($cari != '') {
            $_SESSION['cari'] = $cari;
        } else {
            unset($_SESSION['cari']);
        }
<<<<<<< HEAD
        redirect('analisis_respon');
=======

        redirect($this->controller);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function isi()
    {
        $isi = $this->input->post('isi');
<<<<<<< HEAD
        if ($isi != "") {
=======
        if ($isi != '') {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            $_SESSION['isi'] = $isi;
        } else {
            unset($_SESSION['isi']);
        }
<<<<<<< HEAD
        redirect('analisis_respon');
=======

        redirect($this->controller);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function dusun()
    {
<<<<<<< HEAD
        unset($_SESSION['rw']);
        unset($_SESSION['rt']);
        $dusun = $this->input->post('dusun');
        if ($dusun != "") {
=======
        unset($_SESSION['rw'], $_SESSION['rt']);

        $dusun = $this->input->post('dusun');
        if ($dusun != '') {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            $_SESSION['dusun'] = $dusun;
        } else {
            unset($_SESSION['dusun']);
        }
<<<<<<< HEAD
        redirect('analisis_respon');
=======

        redirect($this->controller);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function rw()
    {
        unset($_SESSION['rt']);
        $rw = $this->input->post('rw');
<<<<<<< HEAD
        if ($rw != "") {
=======
        if ($rw != '') {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            $_SESSION['rw'] = $rw;
        } else {
            unset($_SESSION['rw']);
        }
<<<<<<< HEAD
        redirect('analisis_respon');
=======

        redirect($this->controller);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function rt()
    {
        $rt = $this->input->post('rt');
<<<<<<< HEAD
        if ($rt != "") {
=======
        if ($rt != '') {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            $_SESSION['rt'] = $rt;
        } else {
            unset($_SESSION['rt']);
        }
<<<<<<< HEAD
        redirect('analisis_respon');
=======

        redirect($this->controller);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function form_impor_bdt()
    {
        $this->redirect_hak_akses('u');
<<<<<<< HEAD
        $data['form_action'] = site_url("analisis_respon/impor_bdt/");
=======
        $data['form_action'] = site_url("{$this->controller}/impor_bdt/");

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        $this->load->view('analisis_respon/import/impor_bdt', $data);
    }

    public function impor_bdt()
    {
        $this->redirect_hak_akses('u');
        $this->load->model('bdt_model');
        $this->bdt_model->impor();
<<<<<<< HEAD
=======

        redirect($this->controller);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function unduh_form_bdt()
    {
<<<<<<< HEAD
        header("location:".base_url(IRVAN . 'assets/import/contoh-data-bdt2015.xls'));
=======
        header('location:' . base_url('assets/import/contoh-data-bdt2015.xls'));
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }
}
