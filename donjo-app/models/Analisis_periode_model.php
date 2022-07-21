<<<<<<< HEAD
<?php class Analisis_periode_model extends MY_Model
=======
<?php

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

defined('BASEPATH') || exit('No direct script access allowed');

class Analisis_periode_model extends MY_Model
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
{
    public function __construct()
    {
        parent::__construct();
    }

    public function autocomplete()
    {
        return $this->autocomplete_str('nama', 'analisis_periode');
    }

    private function search_sql()
    {
        if (isset($_SESSION['cari'])) {
<<<<<<< HEAD
            $cari = $_SESSION['cari'];
            $kw = $this->db->escape_like_str($cari);
            $kw = '%' .$kw. '%';
            $search_sql= " AND (u.nama LIKE '$kw' OR u.nama LIKE '$kw')";
=======
            $cari       = $_SESSION['cari'];
            $kw         = $this->db->escape_like_str($cari);
            $kw         = '%' . $kw . '%';
            $search_sql = " AND (u.nama LIKE '{$kw}' OR u.nama LIKE '{$kw}')";

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            return $search_sql;
        }
    }

    private function master_sql()
    {
        if (isset($_SESSION['analisis_master'])) {
<<<<<<< HEAD
            $kf = $_SESSION['analisis_master'];
            $filter_sql = " AND u.id_master = $kf";
=======
            $kf         = $_SESSION['analisis_master'];
            $filter_sql = " AND u.id_master = {$kf}";

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            return $filter_sql;
        }
    }

    private function state_sql()
    {
        if (isset($_SESSION['state'])) {
<<<<<<< HEAD
            $kf = $_SESSION['state'];
            $filter_sql = " AND u.id_state = $kf";
=======
            $kf         = $_SESSION['state'];
            $filter_sql = " AND u.id_state = {$kf}";

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            return $filter_sql;
        }
    }

<<<<<<< HEAD
    public function paging($p=1, $o=0)
    {
        $sql = "SELECT COUNT(id) AS id FROM analisis_periode u WHERE 1";
        $sql .= $this->search_sql();
        $sql .= $this->master_sql();
        $sql .= $this->state_sql();
        $query = $this->db->query($sql);
        $row = $query->row_array();
        $jml_data = $row['id'];

        $this->load->library('paging');
        $cfg['page'] = $p;
=======
    public function paging($p = 1, $o = 0)
    {
        $sql = 'SELECT COUNT(id) AS id FROM analisis_periode u WHERE 1';
        $sql .= $this->search_sql();
        $sql .= $this->master_sql();
        $sql .= $this->state_sql();
        $query    = $this->db->query($sql);
        $row      = $query->row_array();
        $jml_data = $row['id'];

        $this->load->library('paging');
        $cfg['page']     = $p;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        $cfg['per_page'] = $_SESSION['per_page'];
        $cfg['num_rows'] = $jml_data;
        $this->paging->init($cfg);

        return $this->paging;
    }

<<<<<<< HEAD
    public function list_data($o=0, $offset=0, $limit=500)
    {
        switch ($o) {
            case 1: $order_sql = ' ORDER BY u.id'; break;
            case 2: $order_sql = ' ORDER BY u.id DESC'; break;
            case 3: $order_sql = ' ORDER BY u.id'; break;
            case 4: $order_sql = ' ORDER BY u.id DESC'; break;
            case 5: $order_sql = ' ORDER BY g.id'; break;
            case 6: $order_sql = ' ORDER BY g.id DESC'; break;
            default:$order_sql = ' ORDER BY u.id';
        }

        $paging_sql = ' LIMIT ' .$offset. ',' .$limit;

        $sql = "SELECT u.*,s.nama AS status FROM analisis_periode u LEFT JOIN analisis_ref_state s ON u.id_state = s.id WHERE 1 ";
=======
    public function list_data($o = 0, $offset = 0, $limit = 500)
    {
        switch ($o) {
            case 1: $order_sql = ' ORDER BY u.id'; break;

            case 2: $order_sql = ' ORDER BY u.id DESC'; break;

            case 3: $order_sql = ' ORDER BY u.id'; break;

            case 4: $order_sql = ' ORDER BY u.id DESC'; break;

            case 5: $order_sql = ' ORDER BY g.id'; break;

            case 6: $order_sql = ' ORDER BY g.id DESC'; break;

            default:$order_sql = ' ORDER BY u.id';
        }

        $paging_sql = ' LIMIT ' . $offset . ',' . $limit;

        $sql = 'SELECT u.*,s.nama AS status FROM analisis_periode u LEFT JOIN analisis_ref_state s ON u.id_state = s.id WHERE 1 ';
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629

        $sql .= $this->search_sql();
        $sql .= $this->master_sql();
        $sql .= $this->state_sql();
        $sql .= $order_sql;
        $sql .= $paging_sql;

        $query = $this->db->query($sql);
<<<<<<< HEAD
        $data=$query->result_array();

        $j = $offset;
        for ($i=0; $i<count($data); $i++) {
            $data[$i]['no'] = $j + 1;
            if ($data[$i]['aktif'] == 1) {
                $data[$i]['aktif'] = "<img src='".base_url(IRVAN)."assets/images/icon/tick.png'>";
            } else {
                $data[$i]['aktif'] = "";
            }
            $j++;
        }
=======
        $data  = $query->result_array();

        $j = $offset;

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['no'] = $j + 1;
            if ($data[$i]['aktif'] == 1) {
                $data[$i]['aktif'] = "<img src='" . base_url() . "assets/images/icon/tick.png'>";
            } else {
                $data[$i]['aktif'] = '';
            }
            $j++;
        }

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        return $data;
    }

    private function validasi_data($post)
    {
<<<<<<< HEAD
        $data = array();
        $data['nama'] = nomor_surat_keputusan($post['nama']);
        $data['id_state'] = $post['id_state'] ?: null;
        $data['tahun_pelaksanaan'] = bilangan($post['tahun_pelaksanaan']);
        $data['keterangan'] = htmlentities($post['keterangan']);
        $data['aktif'] = $post['aktif'] ?: null;
=======
        $data                      = [];
        $data['nama']              = nomor_surat_keputusan($post['nama']);
        $data['id_state']          = $post['id_state'] ?: null;
        $data['tahun_pelaksanaan'] = bilangan($post['tahun_pelaksanaan']);
        $data['keterangan']        = htmlentities($post['keterangan']);
        $data['aktif']             = $post['aktif'] ?: null;

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        return $data;
    }

    public function insert()
    {
        $data = $this->validasi_data($this->input->post());
<<<<<<< HEAD
        $dp = $data['duplikasi'];
        unset($data['duplikasi']);

        if ($dp == 1) {
            $sqld = "SELECT id FROM analisis_periode WHERE id_master = ? ORDER BY id DESC LIMIT 1";
            $queryd = $this->db->query($sqld, $this->session->analisis_master);
            $dpd = $queryd->row_array();
            $sblm = $dpd['id'];
        }

        $akt = array();
=======
        $dp   = $data['duplikasi'];
        unset($data['duplikasi']);

        if ($dp == 1) {
            $sqld   = 'SELECT id FROM analisis_periode WHERE id_master = ? ORDER BY id DESC LIMIT 1';
            $queryd = $this->db->query($sqld, $this->session->analisis_master);
            $dpd    = $queryd->row_array();
            $sblm   = $dpd['id'];
        }

        $akt               = [];
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        $data['id_master'] = $this->session->analisis_master;
        if ($data['aktif'] == 1) {
            $akt['aktif'] = 2;
            $this->db->where('id_master', $this->session->analisis_master);
            $this->db->update('analisis_periode', $akt);
        }
        $outp = $this->db->insert('analisis_periode', $data);

        if ($dp == 1) {
<<<<<<< HEAD
            $sqld = "SELECT id FROM analisis_periode WHERE id_master = ? ORDER BY id DESC LIMIT 1";
            $queryd = $this->db->query($sqld, $this->session->analisis_master);
            $dpd = $queryd->row_array();
            $skrg = $dpd['id'];

            $sql 	= "SELECT id_subjek,id_indikator,id_parameter FROM analisis_respon WHERE id_periode = ? ";
            $query 	= $this->db->query($sql, $sblm);
            $data	= $query->result_array();

            for ($i=0; $i<count($data); $i++) {
=======
            $sqld   = 'SELECT id FROM analisis_periode WHERE id_master = ? ORDER BY id DESC LIMIT 1';
            $queryd = $this->db->query($sqld, $this->session->analisis_master);
            $dpd    = $queryd->row_array();
            $skrg   = $dpd['id'];

            $sql   = 'SELECT id_subjek,id_indikator,id_parameter FROM analisis_respon WHERE id_periode = ? ';
            $query = $this->db->query($sql, $sblm);
            $data  = $query->result_array();

            for ($i = 0; $i < count($data); $i++) {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                $data[$i]['id_periode'] = $skrg;
            }
            $outp = $this->db->insert_batch('analisis_respon', $data);
            $this->load->model('analisis_respon_model');
            $this->analisis_respon_model->pre_update($skrg);
        }

        status_sukses($outp); //Tampilkan Pesan
    }

<<<<<<< HEAD
    public function update($id=0)
    {
        $data = $this->validasi_data($this->input->post());
        $akt = array();
=======
    public function update($id = 0)
    {
        $data = $this->validasi_data($this->input->post());
        $akt  = [];
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629

        $data['id_master'] = $this->session->analisis_master;
        if ($data['aktif'] == 1) {
            $akt['aktif'] = 2;
            $this->db->where('id_master', $this->session->analisis_master);
            $this->db->update('analisis_periode', $akt);
        }
        $data['id_master'] = $this->session->analisis_master;
        $this->db->where('id', $id);
        $outp = $this->db->update('analisis_periode', $data);

        status_sukses($outp); //Tampilkan Pesan
    }

<<<<<<< HEAD
    public function delete($id='', $semua=false)
    {
        if (!$semua) {
=======
    public function delete($id = '', $semua = false)
    {
        if (! $semua) {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            $this->session->success = 1;
        }

        $outp = $this->db->where('id', $id)->delete('analisis_periode');

<<<<<<< HEAD
        status_sukses($outp, $gagal_saja=true); //Tampilkan Pesan
=======
        status_sukses($outp, $gagal_saja = true); //Tampilkan Pesan
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function delete_all()
    {
        $this->session->success = 1;

        $id_cb = $_POST['id_cb'];
<<<<<<< HEAD
        foreach ($id_cb as $id) {
            $this->delete($id, $semua=true);
        }
    }

    public function get_analisis_periode($id=0)
    {
        $sql = "SELECT * FROM analisis_periode WHERE id = ?";
        $query = $this->db->query($sql, $id);
        $data = $query->row_array();
        return $data;
    }

    public function get_analisis_master()
    {
        $sql = "SELECT * FROM analisis_master WHERE id = ?";
        $query = $this->db->query($sql, $_SESSION['analisis_master']);
=======

        foreach ($id_cb as $id) {
            $this->delete($id, $semua = true);
        }
    }

    public function get_analisis_periode($id = 0)
    {
        $sql   = 'SELECT * FROM analisis_periode WHERE id = ?';
        $query = $this->db->query($sql, $id);

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        return $query->row_array();
    }

    public function list_state()
    {
<<<<<<< HEAD
        $sql = "SELECT * FROM analisis_ref_state";
        $query = $this->db->query($sql);
=======
        $sql   = 'SELECT * FROM analisis_ref_state';
        $query = $this->db->query($sql);

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        return $query->result_array();
    }

    public function get_id_periode_aktif($id = 0)
    {
        $data = $this->db->where([
<<<<<<< HEAD
            'aktif' => 1,
            'id_master' => $id
        ])
        ->get('analisis_periode')
        ->row_array();
=======
            'aktif'     => 1,
            'id_master' => $id,
        ])
            ->get('analisis_periode')
            ->row_array();
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629

        return $data['id'];
    }
}
