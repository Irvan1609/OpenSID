<?php
<<<<<<< HEAD
class Analisis_master_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
=======

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

class Analisis_master_model extends MY_Model
{
    public $analisis_master;
    public $periode;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('referensi_model');
        $this->analisis_master = $this->get_analisis_master($this->session->analisis_master);
        $this->periode         = $this->get_periode();
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function autocomplete()
    {
        return $this->autocomplete_str('nama', 'analisis_master');
    }

    private function search_sql()
    {
<<<<<<< HEAD
        if (isset($_SESSION['cari'])) {
            $cari = $_SESSION['cari'];
            $kw = $this->db->escape_like_str($cari);
            $kw = '%' .$kw. '%';
            $search_sql= " AND (u.nama LIKE '$kw' OR u.nama LIKE '$kw')";
            return $search_sql;
        }
=======
        if (empty($cari = $this->session->cari)) {
            return;
        }

        $this->db
            ->like('u.nama', $cari);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    private function filter_sql()
    {
<<<<<<< HEAD
        if (isset($_SESSION['filter'])) {
            $kf = $_SESSION['filter'];
            $filter_sql = " AND u.subjek_tipe = $kf";
            return $filter_sql;
        }
=======
        if (empty($kf = $this->session->filter)) {
            return;
        }

        $this->db
            ->where('u.subjek_tipe', $kf);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    private function state_sql()
    {
<<<<<<< HEAD
        if (isset($_SESSION['state'])) {
            $kf = $_SESSION['state'];
            $filter_sql = " AND u.lock = $kf";
            return $filter_sql;
        }
    }

    public function paging($p=1, $o=0)
    {
        $sql = "SELECT COUNT(id) AS id FROM analisis_master u WHERE 1";
        $sql .= $this->search_sql();
        $sql .= $this->filter_sql();
        $sql .= $this->state_sql();
        $query = $this->db->query($sql);
        $row = $query->row_array();
        $jml_data = $row['id'];

        $this->load->library('paging');
        $cfg['page'] = $p;
=======
        if (empty($kf = $this->session->state)) {
            return;
        }

        $this->db
            ->where('u.lock', $kf);
    }

    public function paging($p = 1, $o = 0)
    {
        $this->list_data_query();
        $jml_data = $this->db->select('COUNT(u.id) as jml_data')
            ->get()->row()->jml_data;

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
            case 1: $order_sql = ' ORDER BY u.lock'; break;
            case 2: $order_sql = ' ORDER BY u.lock DESC'; break;
            case 3: $order_sql = ' ORDER BY u.nama'; break;
            case 4: $order_sql = ' ORDER BY u.nama DESC'; break;
            case 5: $order_sql = ' ORDER BY s.subjek'; break;
            case 6: $order_sql = ' ORDER BY s.subjek DESC'; break;
            default:$order_sql = ' ORDER BY u.id';
        }

        $paging_sql = ' LIMIT ' .$offset. ',' .$limit;

        $sql = "SELECT u.*,s.subjek FROM analisis_master u LEFT JOIN analisis_ref_subjek s ON u.subjek_tipe = s.id WHERE 1 ";

        $sql .= $this->search_sql();
        $sql .= $this->filter_sql();
        $sql .= $this->state_sql();
        $sql .= $order_sql;
        $sql .= $paging_sql;

        $query = $this->db->query($sql);
        $data=$query->result_array();

        $j = $offset;
        for ($i=0; $i < count($data); $i++) {
            $data[$i]['no'] = $j+1;
            if ($data[$i]['lock'] == 1) {
                $data[$i]['lock'] = "<img src='".base_url(IRVAN)."assets/images/icon/unlock.png'>";
            } else {
                $data[$i]['lock'] = "<img src='".base_url(IRVAN)."assets/images/icon/lock.png'>";
            }
            $j++;
        }
=======
    private function list_data_query()
    {
        $this->db
            ->from('analisis_master u')
            ->join('analisis_ref_subjek s', 'u.subjek_tipe = s.id', 'left');
        $this->search_sql();
        $this->filter_sql();
        $this->state_sql();
    }

    public function list_data($o = 0, $offset = 0, $limit = 500)
    {
        $desa = ucwords($this->setting->sebutan_desa);
        $this->db->select('u.*')
            ->select("(case when u.subjek_tipe = 5 then '{$desa}' else s.subjek end) as subjek");
        $this->list_data_query();

        switch ($o) {
            case 1: $this->db->order_by('u.lock'); break;

            case 2: $this->db->order_by('u.lock DESC'); break;

            case 3: $this->db->order_by('u.nama'); break;

            case 4: $this->db->order_by('u.nama DESC'); break;

            case 5: $this->db->order_by('s.subjek'); break;

            case 6: $this->db->order_by('s.subjek DESC'); break;

            default:$this->db->order_by('u.id');
        }
        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }

        $data = $this->db->get()->result_array();

        $j = $offset;

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['no'] = $j + 1;
            if ($data[$i]['lock'] == 1) {
                $data[$i]['lock'] = "<img src='" . base_url() . "assets/images/icon/unlock.png'>";
            } else {
                $data[$i]['lock'] = "<img src='" . base_url() . "assets/images/icon/lock.png'>";
            }
            $j++;
        }

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        return $data;
    }

    private function sterilkan_data($post)
    {
<<<<<<< HEAD
        $data = array();
        $data['nama'] = alfanumerik_spasi($post['nama']);
        $data['subjek_tipe'] = $post['subjek_tipe'];
        $data['id_kelompok'] = $post['id_kelompok'] ?: null;
        $data['lock'] = $post['lock'] ?: null;
        $data['format_impor'] = $post['format_impor'] ?: null;
        $data['pembagi'] = bilangan_titik($post['pembagi']);
        $data['id_child'] = $post['id_child'] ?: null;
        $data['deskripsi'] = htmlentities($post['deskripsi']);
=======
        $data                 = [];
        $data['nama']         = alfanumerik_spasi($post['nama']);
        $data['subjek_tipe']  = $post['subjek_tipe'];
        $data['id_kelompok']  = $post['id_kelompok'] ?: null;
        $data['lock']         = $post['lock'] ?: null;
        $data['format_impor'] = $post['format_impor'] ?: null;
        $data['pembagi']      = bilangan_titik($post['pembagi']);
        $data['id_child']     = $post['id_child'] ?: null;
        $data['deskripsi']    = htmlentities($post['deskripsi']);

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        return $data;
    }

    public function insert()
    {
        $data = $this->sterilkan_data($this->input->post());
        $outp = $this->db->insert('analisis_master', $data);
        status_sukses($outp);
    }

<<<<<<< HEAD
    public function update($id=0)
=======
    public function update($id = 0)
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    {
        $data = $this->sterilkan_data($this->input->post());
        // Kolom yang tidak boleh diubah untuk analisis sistem
        if ($this->is_analisis_sistem($id)) {
<<<<<<< HEAD
            unset($data['subjek_tipe']);
            unset($data['lock']);
            unset($data['format_impor']);
=======
            unset($data['subjek_tipe'], $data['lock'], $data['format_impor']);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        }
        $this->db->where('id', $id);
        $outp = $this->db->update('analisis_master', $data);
        status_sukses($outp);
    }

    public function is_analisis_sistem($id)
    {
        $jenis = $this->db->select('jenis')->where('id', $id)
            ->get('analisis_master')->row()->jenis;
<<<<<<< HEAD
        return $jenis == 1;
    }

    public function delete($id='', $semua=false)
=======

        return $jenis == 1;
    }

    public function delete($id = '', $semua = false)
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    {
        if ($this->is_analisis_sistem($id)) {
            return;
        } // Jangan hapus analisis sistem

<<<<<<< HEAD
        if (!$semua) {
=======
        if (! $semua) {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            $this->session->success = 1;
        }
        $this->sub_delete($id);

        $outp = $this->db->where('id', $id)->delete('analisis_master');

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
=======

        foreach ($id_cb as $id) {
            $this->delete($id, $semua = true);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        }
    }

    // TODO: tambahkan relational constraint supaya data analisis terhapus secara otomatis oleh DB
<<<<<<< HEAD
    private function sub_delete($id='')
    {
        $sql = "DELETE FROM analisis_parameter WHERE id_indikator IN(SELECT id FROM analisis_indikator WHERE id_master = ?)";
        $this->db->query($sql, $id);

        $sql = "DELETE FROM analisis_respon WHERE id_periode IN(SELECT id FROM analisis_periode WHERE id_master = ?)";
        $this->db->query($sql, $id);

        $sql = "DELETE FROM analisis_kategori_indikator WHERE id_master = ?";
        $this->db->query($sql, $id);

        $sql = "DELETE FROM analisis_klasifikasi WHERE id_master = ?";
        $this->db->query($sql, $id);

        $sql = "DELETE FROM analisis_respon_hasil WHERE id_master = ?";
        $this->db->query($sql, $id);

        $sql = "DELETE FROM analisis_partisipasi WHERE id_master = ?";
        $this->db->query($sql, $id);

        $sql = "DELETE FROM analisis_periode WHERE id_master = ?";
        $this->db->query($sql, $id);

        $sql = "DELETE FROM analisis_indikator WHERE id_master = ?";
        $this->db->query($sql, $id);
    }

    public function get_analisis_master($id=0)
    {
        $sql = "SELECT * FROM analisis_master WHERE id = ?";
        $query = $this->db->query($sql, $id);
        $data = $query->row_array();
        return $data;
=======
    private function sub_delete($id = '')
    {
        $sql = 'DELETE FROM analisis_parameter WHERE id_indikator IN(SELECT id FROM analisis_indikator WHERE id_master = ?)';
        $this->db->query($sql, $id);

        $sql = 'DELETE FROM analisis_respon WHERE id_periode IN(SELECT id FROM analisis_periode WHERE id_master = ?)';
        $this->db->query($sql, $id);

        $sql = 'DELETE FROM analisis_kategori_indikator WHERE id_master = ?';
        $this->db->query($sql, $id);

        $sql = 'DELETE FROM analisis_klasifikasi WHERE id_master = ?';
        $this->db->query($sql, $id);

        $sql = 'DELETE FROM analisis_respon_hasil WHERE id_master = ?';
        $this->db->query($sql, $id);

        $sql = 'DELETE FROM analisis_partisipasi WHERE id_master = ?';
        $this->db->query($sql, $id);

        $sql = 'DELETE FROM analisis_periode WHERE id_master = ?';
        $this->db->query($sql, $id);

        $sql = 'DELETE FROM analisis_indikator WHERE id_master = ?';
        $this->db->query($sql, $id);
    }

    public function get_analisis_master($id = 0)
    {
        return $this->db
            ->select('u.*, s.subjek as subjek_nama')
            ->from('analisis_master u')
            ->join('analisis_ref_subjek s', 'u.subjek_tipe = s.id', 'left')
            ->where('u.id', $id)
            ->get()
            ->row_array();
    }

    // periode aktif
    public function get_periode($id = null)
    {
        $id = $id ?: $this->session->analisis_master;

        return $this->db
            ->select('*')
            ->from('analisis_periode')
            ->where('aktif', 1)
            ->where('id_master', $id)
            ->get()->row();
    }

    // id dari periode aktif
    public function get_aktif_periode()
    {
        return $this->periode->id;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function list_subjek()
    {
<<<<<<< HEAD
        $sql = "SELECT * FROM analisis_ref_subjek";
        $query = $this->db->query($sql);
        return $query->result_array();
=======
        $subjek                  = $this->referensi_model->list_data('analisis_ref_subjek');
        $desa                    = array_search('5', array_column($subjek, 'id'), true);
        $subjek[$desa]['subjek'] = ucwords($this->setting->sebutan_desa);

        return $subjek;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function list_kelompok()
    {
<<<<<<< HEAD
        $sql = "SELECT * FROM kelompok_master";
        $query = $this->db->query($sql);
=======
        $sql   = 'SELECT * FROM kelompok_master';
        $query = $this->db->query($sql);

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        return $query->result_array();
    }

    public function list_analisis_child()
    {
<<<<<<< HEAD
        $sql = "SELECT * FROM analisis_master WHERE subjek_tipe = 1";
        $query = $this->db->query($sql);
=======
        $sql   = 'SELECT * FROM analisis_master WHERE subjek_tipe = 1';
        $query = $this->db->query($sql);

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        return $query->result_array();
    }
}
