<<<<<<< HEAD
<?php class Analisis_respon_model extends CI_Model
{
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

class Analisis_respon_model extends CI_Model
{
    protected $per;
    protected $master;

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Spreadsheet_Excel_Reader');
<<<<<<< HEAD
=======
        $this->load->model('analisis_master_model');
        $this->per    = $this->analisis_master_model->get_aktif_periode();
        $this->master = $this->analisis_master_model->get_analisis_master($this->session->analisis_master);
        $this->subjek = $this->session->subjek_tipe;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function autocomplete()
    {
<<<<<<< HEAD
        $subjek = $_SESSION['subjek_tipe'];
        switch ($subjek) {
            case 1: $sql = "SELECT nik AS no_kk FROM penduduk_hidup UNION SELECT u.nama FROM penduduk_hidup u LEFT JOIN tweb_wil_clusterdesa c ON u.id_cluster = c.id "; break;
            case 2: $sql = "SELECT no_kk FROM keluarga_aktif UNION SELECT p.nama FROM keluarga_aktif u LEFT JOIN penduduk_hidup p ON u.nik_kepala = p.id LEFT JOIN tweb_wil_clusterdesa c ON p.id_cluster = c.id "; break;
            case 3: $sql = "SELECT no_kk FROM tweb_rtm UNION SELECT p.nama FROM tweb_rtm u LEFT JOIN penduduk_hidup p ON u.nik_kepala = p.id LEFT JOIN tweb_wil_clusterdesa c ON p.id_cluster = c.id WHERE 1"; break;
            case 4: $sql = "SELECT u.nama AS no_kk FROM kelompok u LEFT JOIN penduduk_hidup p ON u.id_ketua = p.id LEFT JOIN tweb_wil_clusterdesa c ON p.id_cluster = c.id WHERE 1"; break;
            default: return null;
        }
        $sql .= $this->dusun_sql();
        $sql .= $this->rw_sql();
        $sql .= $this->rt_sql();
        $query = $this->db->query($sql);
        $data = $query->result_array();

        $outp = '';
        for ($i=0; $i < count($data); $i++) {
            $outp .= ',"' .$data[$i]['no_kk']. '"';
        }
        $outp = strtolower(substr($outp, 1));
        $outp = '[' .$outp. ']';
        return $outp;
=======
        switch ($this->subjek) {
            case 1:
                $this->db
                    ->select('nik, u.nama')
                    ->from('penduduk_hidup u')
                    ->join('tweb_wil_clusterdesa c', 'u.id_cluster = c.id', 'left');
                break;

            case 2:
                $this->db
                    ->select('no_kk, p.nama')
                    ->from('keluarga_aktif u')
                    ->join('penduduk_hidup p', 'u.nik_kepala = p.id', 'left')
                    ->join('tweb_wil_clusterdesa c', 'p.id_cluster = c.id', 'left');
                break;

            case 3:
                $this->db
                    ->select('no_kk, p.nama')
                    ->from('tweb_rtm u')
                    ->join('penduduk_hidup p', 'u.nik_kepala = p.id', 'left')
                    ->join('tweb_wil_clusterdesa c', 'p.id_cluster = c.id', 'left');
                break;

            case 4:
                $this->db
                    ->select('u.nama AS no_kk, p.nama')
                    ->from('kelompok u')
                    ->join('penduduk_hidup p', 'u.id_ketua = p.id', 'left')
                    ->join('tweb_wil_clusterdesa c', 'p.id_cluster = c.id', 'left');
                break;

            case 5:
                $this->db
                    ->select('u.kode_desa AS no_kk, u.nama_desa as nama')
                    ->from('config u');
                break;

            case 6:
                $this->db
                    ->select('u.dusun')
                    ->from('tweb_wil_clusterdesa u')
                    ->where('u.rt', '0')
                    ->where('u.rw', '0');
                break;

            case 7:
                $this->db
                    ->select('u.dusun, u.rw')
                    ->from('tweb_wil_clusterdesa u')
                    ->where('u.rt', '0')
                    ->where('u.rw <>', '0');
                break;

            case 8:
                $this->db
                    ->select('u.dusun, u.rw, u.rt')
                    ->from('tweb_wil_clusterdesa u')
                    ->where('u.rt <> 0')
                    ->where('u.rt <> "-"');
                break;
        }
        $this->dusun_sql();
        $this->rw_sql();
        $this->rt_sql();
        $data = $this->db->get()->result_array();

        return autocomplete_data_ke_str($data);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    private function search_sql()
    {
<<<<<<< HEAD
        if (isset($_SESSION['cari'])) {
            $cari = $_SESSION['cari'];
            $kw = $this->db->escape_like_str($cari);
            $kw = '%' .$kw. '%';
            $search_sql= " AND (u.no_kk LIKE '$kw' OR p.nama LIKE '$kw')";
            $subjek = $_SESSION['subjek_tipe'];
            switch ($subjek) {
                case 1: $search_sql = " AND (u.nik LIKE '$kw' OR u.nama LIKE '$kw')"; break;
                case 2: $search_sql = " AND (u.no_kk LIKE '$kw' OR p.nama LIKE '$kw')"; break;
                case 3: $search_sql = " AND ((u.no_kk LIKE '$kw' OR p.nama LIKE '$kw') OR ((SELECT COUNT(id) FROM penduduk_hidup WHERE nik LIKE '$kw' AND id_rtm = u.id) > 1) OR ((SELECT COUNT(id) FROM penduduk_hidup WHERE nama LIKE '$kw' AND id_rtm = u.id) > 1))"; break;
                case 4: $search_sql = " AND (u.nama LIKE '$kw' OR p.nama LIKE '$kw')"; break;
                default: return null;
            }
            return $search_sql;
=======
        if (empty($cari = $this->session->cari)) {
            return;
        }

        switch ($this->subjek) {
            case 1:
                $this->db
                    ->group_start()
                    ->like('u.nik', $cari)
                    ->or_like('u.nama', $cari)
                    ->group_end();
                break;

            case 2:
                $this->db
                    ->group_start()
                    ->like('u.no_kk', $cari)
                    ->or_like('p.nama', $cari)
                    ->group_end();
                break;

            case 3:
                $kw = $this->db->escape_like_str($cari);
                $kw = '%' . $kw . '%';
                $this->db
                    ->group_start()
                    ->group_start()
                    ->like('u.no_kk', $cari)
                    ->or_like('p.nama', $cari)
                    ->group_end()
                    ->or_where("(SELECT COUNT(id) FROM penduduk_hidup WHERE nik LIKE '{$kw}' AND id_rtm = u.id) > 1")
                    ->or_where("(SELECT COUNT(id) FROM penduduk_hidup WHERE nama LIKE '{$kw}' AND id_rtm = u.id) > 1")
                    ->group_end();
                break;

            case 4:
                $this->db
                    ->group_start()
                    ->like('u.nama', $cari)
                    ->or_like('p.nama', $cari)
                    ->group_end();
                break;

            case 6:
                $this->db
                    ->like('u.dusun', $cari);
                break;

            case 7:
                $this->db
                    ->group_start()
                    ->like('u.dusun', $cari)
                    ->or_like('u.rw', $cari)
                    ->group_end();
                break;

            case 8:
                $this->db
                    ->group_start()
                    ->like('u.dusun', $cari)
                    ->or_like('u.rw', $cari)
                    ->or_like('u.rt', $cari)
                    ->group_end();
                break;

            default: return null;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        }
    }

    private function dusun_sql()
    {
<<<<<<< HEAD
        if (isset($_SESSION['dusun'])) {
            $kf = $_SESSION['dusun'];
            $dusun_sql = " AND c.dusun = '$kf'";
            return $dusun_sql;
        }
=======
        if (empty($this->session->dusun) || $this->subjek == 5) {
            return;
        }

        $this->db->where('dusun', $this->session->dusun);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    private function rw_sql()
    {
<<<<<<< HEAD
        if (isset($_SESSION['rw'])) {
            $kf = $_SESSION['rw'];
            $rw_sql = " AND c.rw = '$kf'";
            return $rw_sql;
        }
=======
        if (empty($this->session->rw) || $this->subjek == 5) {
            return;
        }

        $this->db->where('rw', $this->session->rw);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    private function rt_sql()
    {
<<<<<<< HEAD
        if (isset($_SESSION['rt'])) {
            $kf = $_SESSION['rt'];
            $rt_sql = " AND c.rt = '$kf'";
            return $rt_sql;
        }
    }

    private function isi_sql()
    {
        if (isset($_SESSION['isi'])) {
            $per = $this->get_aktif_periode();
            $kf = $_SESSION['isi'];
            if ($kf == 1) {
                $isi_sql = " AND (SELECT COUNT(id_subjek) FROM analisis_respon_hasil WHERE id_subjek = u.id AND id_periode=$per ) = 1 ";
            } else {
                $isi_sql = " AND (SELECT COUNT(id_subjek) FROM analisis_respon_hasil WHERE id_subjek = u.id AND id_periode=$per ) = 0 ";
            }
            return $isi_sql;
        }
    }

    private function kelompok_sql($kf=0)
    {
        $kelompok_sql = " AND id_master = $kf ";
        return $kelompok_sql;
    }

    public function paging($p=1, $o=0)
    {
        $sql = "SELECT COUNT(u.id) AS id ";
        $sql .= $this->list_data_sql();
        $query = $this->db->query($sql);
        $row = $query->row_array();
        $jml_data = $row['id'];

        $this->load->library('paging');
        $cfg['page'] = $p;
=======
        if (empty($this->session->rt) || $this->subjek == 5) {
            return;
        }

        $this->db->where('rt', $this->session->rt);
    }

    // Pertanyaan telah diisi atau belum
    // $this->session->isi == 1 untuk pertanyaan yg telah diisi
    private function isi_sql()
    {
        if (empty($isi = $this->session->isi)) {
            return;
        }

        $isi = $isi == 1 ? 1 : 0;
        $this->db
            ->where("(SELECT COUNT(id_subjek) FROM analisis_respon_hasil WHERE id_subjek = u.id AND id_periode = {$this->per}) = {$isi}");
    }

    private function kelompok_sql($kf = 0)
    {
        $this->db->where('id_master', $kf);
    }

    public function paging($p = 1, $o = 0)
    {
        $this->list_data_sql();
        $jml_data = $this->db
            ->select('COUNT(*) AS jml_data')
            ->get()->row()->jml_data;

        $this->load->library('paging');
        $cfg['page']     = $p;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        $cfg['per_page'] = $_SESSION['per_page'];
        $cfg['num_rows'] = $jml_data;
        $this->paging->init($cfg);

        return $this->paging;
    }

    private function list_data_sql()
    {
<<<<<<< HEAD
        $per = $this->get_aktif_periode();
        $master = $this->get_analisis_master();
        $id_kelompok = $master['id_kelompok'];
        $subjek = $_SESSION['subjek_tipe'];
        switch ($subjek) {
            case 1:
                $sql = " FROM penduduk_hidup u
					LEFT JOIN tweb_wil_clusterdesa c ON u.id_cluster = c.id
					WHERE 1
				";
                break;

            case 2:
                $sql = " FROM keluarga_aktif u
					LEFT JOIN penduduk_hidup p ON u.nik_kepala = p.id
					LEFT JOIN tweb_wil_clusterdesa c ON p.id_cluster = c.id
					WHERE 1
				" ;
                break;

            case 3:
                $sql = " FROM tweb_rtm u
					LEFT JOIN penduduk_hidup p ON u.nik_kepala = p.id
					LEFT JOIN tweb_wil_clusterdesa c ON p.id_cluster = c.id
					WHERE 1
				";
                break;

            case 4:
                $sql = " FROM kelompok u
					LEFT JOIN penduduk_hidup p ON u.id_ketua = p.id
					LEFT JOIN tweb_wil_clusterdesa c ON p.id_cluster = c.id
					WHERE 1
				";
=======
        $id_kelompok = $this->master['id_kelompok'];

        switch ($this->subjek) {
            case 1:
                $this->db
                    ->from('penduduk_hidup u')
                    ->join('tweb_wil_clusterdesa c', 'u.id_cluster = c.id', 'left');
                break;

            case 2:
                $this->db
                    ->from('keluarga_aktif u')
                    ->join('penduduk_hidup p', 'u.nik_kepala = p.id', 'left')
                    ->join('tweb_wil_clusterdesa c', 'p.id_cluster = c.id', 'left');
                break;

            case 3:
                $this->db
                    ->from('tweb_rtm u')
                    ->join('penduduk_hidup p', 'u.nik_kepala = p.id', 'left')
                    ->join('tweb_wil_clusterdesa c', 'p.id_cluster = c.id', 'left');
                break;

            case 4:
                $this->db
                    ->from('kelompok u')
                    ->join('penduduk_hidup p', 'u.id_ketua = p.id', 'left')
                    ->join('tweb_wil_clusterdesa c', 'p.id_cluster = c.id', 'left');
                break;

            case 5:
                $this->db
                    ->from('config u');
                break;

            case 6:
                $this->db
                    ->from('tweb_wil_clusterdesa u')
                    ->where('u.rt', '0')
                    ->where('u.rw', '0');
                break;

            case 7:
                $this->db
                    ->from('tweb_wil_clusterdesa u')
                    ->where('u.rt', '0')
                    ->where('u.rw <>', '0')
                    ->where('u.rw <>', '-');
                break;

            case 8:
                $this->db
                    ->from('tweb_wil_clusterdesa u')
                    ->where('u.rt <> 0')
                    ->where('u.rt <> "-"');
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                break;

            default: return null;
        }
        if ($id_kelompok != 0) {
<<<<<<< HEAD
            $sql .= $this->kelompok_sql($id_kelompok);
        }

        $sql .= $this->search_sql();
        $sql .= $this->dusun_sql();
        $sql .= $this->rw_sql();
        $sql .= $this->rt_sql();
        $sql .= $this->isi_sql();
        return $sql;
    }

    public function list_data($o=0, $offset=0, $limit=500)
    {
        $per = $this->get_aktif_periode();
        $master = $this->get_analisis_master();

        switch ($o) {
            case 1: $order_sql = ' ORDER BY u.id'; break;
            case 2: $order_sql = ' ORDER BY u.id DESC'; break;
            case 3: $order_sql = ' ORDER BY u.id'; break;
            case 4: $order_sql = ' ORDER BY u.id DESC'; break;
            default:$order_sql = ' ORDER BY u.id';
        }

        $paging_sql = ' LIMIT ' .$offset. ',' .$limit;

        $subjek = $_SESSION['subjek_tipe'];
        switch ($subjek) {
            case 1:
                $sql = "SELECT u.id,u.nik AS nid,u.nama,u.sex,c.dusun,c.rw,c.rt,(SELECT id_subjek FROM analisis_respon WHERE id_subjek = u.id AND id_periode=? LIMIT 1) as cek,
					(SELECT pengesahan from analisis_respon_bukti b WHERE b.id_master = ? AND b.id_periode = ? AND b.id_subjek = u.id) as bukti_pengesahan
				";
                break;

            case 2:
                $sql = "SELECT u.id,u.no_kk AS nid,p.nama,p.sex,c.dusun,c.rw,c.rt,(SELECT id_subjek FROM analisis_respon WHERE id_subjek = u.id AND id_periode = ? LIMIT 1) as cek,
					(SELECT pengesahan from analisis_respon_bukti b WHERE b.id_master = ? AND b.id_periode = ? AND b.id_subjek = u.id) as bukti_pengesahan
				" ;
                break;

            case 3:
                $sql = "SELECT u.id,u.no_kk AS nid,p.nama,p.sex,c.dusun,c.rw,c.rt,(SELECT id_subjek FROM analisis_respon WHERE id_subjek = u.id AND id_periode=? LIMIT 1) as cek,
					(SELECT pengesahan from analisis_respon_bukti b WHERE b.id_master = ? AND b.id_periode = ? AND b.id_subjek = u.id) as bukti_pengesahan
				";
                break;

            case 4:
                $sql = "SELECT u.id,u.kode AS nid,u.nama,p.sex,c.dusun,c.rw,c.rt,(SELECT id_subjek FROM analisis_respon WHERE id_subjek = u.id AND id_periode=? LIMIT 1) as cek,
					(SELECT pengesahan from analisis_respon_bukti b WHERE b.id_master = ? AND b.id_periode = ? AND b.id_subjek = u.id) as bukti_pengesahan
				";
                break;

            default: return null;
        }
        $sql .= $this->list_data_sql();
        $sql .= $order_sql;
        $sql .= $paging_sql;

        $query = $this->db->query($sql, array($per, $master['id'], $per));
        $data =$query->result_array();

        $j = $offset;
        for ($i=0; $i<count($data); $i++) {
            $data[$i]['no'] = $j + 1;

            if ($data[$i]['cek']) {
                $data[$i]['set'] = "<img src='".base_url(IRVAN)."assets/images/icon/ok.png'>";
            } else {
                $data[$i]['set'] = "<img src='".base_url(IRVAN)."assets/images/icon/nok.png'>";
            }

            $data[$i]['jk'] = "-";
            if ($data[$i]['sex'] == 1) {
                $data[$i]['jk'] = "L";
            } else {
                $data[$i]['jk'] = "P";
            }

            $data[$i]['alamat'] = $data[$i]['dusun']." RW-".$data[$i]['rw']." RT-".$data[$i]['rt'];
            $j++;
        }
        return $data;
    }

    public function update_kuisioner($id=0, $per=0)
    {
        $outp = true;
        $this->session->error_msg = '';
        if ($per == 0) {
            $per = $this->get_aktif_periode();
            $id_master = $_SESSION['analisis_master'];
        } else {
            $sql = "SELECT id_master FROM analisis_periode WHERE id = ?";
            $query = $this->db->query($sql, $per);
            $id_master = $query->row_array();
=======
            $this->kelompok_sql($id_kelompok);
        }

        $this->search_sql();
        $this->dusun_sql();
        $this->rw_sql();
        $this->rt_sql();
        $this->isi_sql();
    }

    public function list_data($o = 0, $offset = 0, $limit = 500)
    {
        $this->db
            ->select("(SELECT id_subjek FROM analisis_respon WHERE id_subjek = u.id AND id_periode = {$this->per} LIMIT 1) as cek")
            ->select("(SELECT pengesahan from analisis_respon_bukti b WHERE b.id_master = {$this->master['id']} AND b.id_periode = {$this->per} AND b.id_subjek = u.id) as bukti_pengesahan");

        switch ($this->subjek) {
            case 1:
                $this->db
                    ->select('u.id, u.nik AS nid, u.nama, u.sex, c.dusun, c.rw, c.rt');
                break;

            case 2:
                $this->db
                    ->select('u.id, u.no_kk AS nid, p.nama, p.sex, c.dusun, c.rw, c.rt');
                break;

            case 3:
                $this->db
                    ->select('u.id, u.no_kk AS nid, p.nama, p.sex, c.dusun, c.rw, c.rt');
                break;

            case 4:
                $this->db
                    ->select('u.id, u.kode AS nid, u.nama, p.sex, c.dusun, c.rw, c.rt');
                break;

            case 5:
                $this->db
                    ->select('u.id, u.kode_desa as nid, u.nama_desa as nama, "-" as sex, "-" as dusun, "-" as rw, "-" as rt');
                break;

            case 6:
                $this->db->select("u.id, u.dusun AS nid, CONCAT(UPPER('{$this->setting->sebutan_dusun} '), u.dusun) as nama, '-' as sex, u.dusun, '-' as rw, '-' as rt");
                break;

            case 7:
                $this->db->select("u.id, u.rw AS nid, CONCAT( UPPER('{$this->setting->sebutan_dusun} '), u.dusun, ' RW ', u.rw) as nama, '-' as sex, u.dusun, u.rw, '-' as rt");
                break;

            case 8:
                $this->db
                    ->select("u.id, u.rt AS nid, CONCAT( UPPER('{$this->setting->sebutan_dusun} '), u.dusun, ' RW ', u.rw, ' RT ', u.rt) as nama, '-' as sex, u.dusun, u.rw, u.rt");
                break;

            default: return null;
        }
        $this->list_data_sql();

        switch ($o) {
            case 1: $this->db->order_by('u.id'); break;

            case 2: $this->db->order_by('u.id DESC'); break;

            case 3: $this->db->order_by('nama'); break;

            case 4: $this->db->order_by('nama DESC'); break;

            default:$this->db->order_by('u.id');
        }

        if ($limit > 0) {
            $this->db->limit($limit, $offset);
        }

        $data = $this->db->get()->result_array();
        $j    = $offset;

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['no']     = $j + 1;
            $data[$i]['set']    = '<img src="' . base_url('assets/images/icon/') . ($data[$i]['cek'] ? 'ok' : 'nok') . '.png">';
            $data[$i]['jk']     = ($data[$i]['sex'] == 1) ? 'L' : 'P';
            $data[$i]['alamat'] = $data[$i]['dusun'] . ' RW-' . $data[$i]['rw'] . ' RT-' . $data[$i]['rt'];
            $j++;
        }

        return $data;
    }

    public function data_unduh($p, $o)
    {
        $per = $this->analisis_master_model->get_aktif_periode();

        switch ($this->subjek) {
            case 1:
                $this->db->select('u.id, u.nik AS nid, u.nama, u.sex, c.dusun, c.rw, c.rt');
                break;

            case 2:
                $this->db->select('u.id, u.no_kk AS nid, p.nama, p.sex, c.dusun, c.rw, c.rt');
                break;

            case 3:
                $this->db->select('u.id, u.no_kk AS nid, p.nama, p.sex, c.dusun, c.rw,c.rt');
                break;

            case 4:
                $this->db->select('u.id, u.kode AS nid, u.nama, p.sex, c.dusun, c.rw, c.rt');
                break;

            case 5:
                $this->db->select('u.id, u.kode_desa as nid, u.nama_desa as nama, "-" as sex, "-" as dusun, "-" as rw, "-" as rt');
                break;

            case 6:
                $this->db->select("u.id, u.dusun AS nid, CONCAT( UPPER('{$this->setting->sebutan_dusun} '), u.dusun) as nama, '-' as sex, u.dusun, '-' as rw, '-' as rt");
                break;

            case 7:
                $this->db->select("u.id, u.rw AS nid, CONCAT( UPPER('{$this->setting->sebutan_dusun} '), u.dusun, ' RW ', u.rw) as nama, '-' as sex, u.dusun, u.rw, '-' as rt");
                break;

            case 8:
                $this->db->select("u.id, u.rt AS nid, CONCAT( UPPER('{$this->setting->sebutan_dusun} '), u.dusun, ' RW ', u.rw, ' RT ', u.rt) as nama, '-' as sex, u.dusun, u.rw, u.rt");
                break;

            default:
                return null;
                break;
        }

        $this->list_data_sql();

        switch ($o) {
            case 1: $this->db->order_by('u.id'); break;

            case 2: $this->db->order_by('u.id DESC'); break;

            case 3: $this->db->order_by('nama'); break;

            case 4: $this->db->order_by('nama DESC'); break;

            default:$this->db->order_by('u.id');
        }

        $data = $this->db->get()->result_array();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['no'] = $i + 1;
            if ($p == 1) {
                $par = $this->db
                    ->select('kode_jawaban, asign, jawaban, r.id_indikator, r.id_parameter AS korek')
                    ->from('analisis_respon r')
                    ->join('analisis_parameter p', 'p.id = r.id_parameter', 'left')
                    ->where('r.id_periode', $per)
                    ->where('r.id_subjek', $data[$i]['id'])
                    ->order_by('r.id_indikator')
                    ->get()->result_array();
                $data[$i]['par'] = $par;
            } else {
                $data[$i]['par'] = null;
            }

            $data[$i]['jk'] = ($data[$i]['sex'] == 1) ? 'L' : 'P';
        }

        return $data;
    }

    public function update_kuisioner($id = 0, $per = 0)
    {
        $outp                     = true;
        $this->session->error_msg = '';
        if ($per == 0) {
            $per       = $this->analisis_master_model->get_aktif_periode();
            $id_master = $_SESSION['analisis_master'];
        } else {
            $id_master = $this->db->get_where('analisis_periode', ['id' => $per])->row_array();
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            $id_master = $id_master['id_master'];
        }
        $ia = 0;
        $it = 0;
        $ir = 0;
        $ic = 0;

        if (isset($_POST['rb'])) {
            $id_rbx = $_POST['rb'];
<<<<<<< HEAD
            foreach ($id_rbx as $id_px) {
                if ($id_px != "") {
=======

            foreach ($id_rbx as $id_px) {
                if ($id_px != '') {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                    $ir = 1;
                }
            }
        }
        if (isset($_POST['cb'])) {
            $id_rby = $_POST['cb'];
<<<<<<< HEAD
            foreach ($id_rby as $id_py) {
                if ($id_py != "") {
=======

            foreach ($id_rby as $id_py) {
                if ($id_py != '') {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                    $ic = 1;
                }
            }
        }
        if (isset($_POST['ia'])) {
            $id_iax = $_POST['ia'];
<<<<<<< HEAD
            foreach ($id_iax as $id_px) {
                if ($id_px != "") {
=======

            foreach ($id_iax as $id_px) {
                if ($id_px != '') {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                    $ia = 1;
                }
            }
        }
        if (isset($_POST['it'])) {
            $id_iay = $_POST['it'];
<<<<<<< HEAD
            foreach ($id_iay as $id_py) {
                if ($id_py != "") {
=======

            foreach ($id_iay as $id_py) {
                if ($id_py != '') {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                    $it = 1;
                }
            }
        }

        //CEK ada input
<<<<<<< HEAD
        if ($ir != 0 or $ic != 0 or $ia != 0 or $it != 0) {
            $sql = "DELETE FROM analisis_respon WHERE id_subjek = ? AND id_periode=?";
            $this->db->query($sql, array($id, $per));
            if (!empty($_POST['rb'])) {
                $id_rb = $_POST['rb'];
=======
        if ($ir != 0 || $ic != 0 || $ia != 0 || $it != 0) {
            $sql = 'DELETE FROM analisis_respon WHERE id_subjek = ? AND id_periode=?';
            $this->db->query($sql, [$id, $per]);
            if (! empty($_POST['rb'])) {
                $id_rb = $_POST['rb'];

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                foreach ($id_rb as $id_p) {
                    if (empty($id_p)) {
                        continue;
                    } // Abaikan isian kosong
<<<<<<< HEAD
                    $p = preg_split("/\./", $id_p);

                    $data['id_subjek'] = $id;
                    $data['id_periode'] = $per;
=======
                    $p = preg_split('/\\./', $id_p);

                    $data['id_subjek']    = $id;
                    $data['id_periode']   = $per;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                    $data['id_indikator'] = $p[0];
                    $data['id_parameter'] = $p[1];
                    $outp &= $this->db->insert('analisis_respon', $data);
                }
            }
            if (isset($_POST['cb'])) {
                $id_cb = $_POST['cb'];
                if ($id_cb) {
                    foreach ($id_cb as $id_p) {
<<<<<<< HEAD
                        $p = preg_split("/\./", $id_p);

                        $data['id_subjek'] = $id;
                        $data['id_periode'] = $per;
=======
                        $p = preg_split('/\\./', $id_p);

                        $data['id_subjek']    = $id;
                        $data['id_periode']   = $per;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                        $data['id_indikator'] = $p[0];
                        $data['id_parameter'] = $p[1];
                        $outp &= $this->db->insert('analisis_respon', $data);
                    }
                }
            }

            if (isset($_POST['ia'])) {
                $id_ia = $_POST['ia'];
<<<<<<< HEAD
                foreach ($id_ia as $id_p) {
                    if ($id_p != "") {
                        unset($data);
                        $indikator = key($id_ia);

                        $sql = "SELECT * FROM analisis_parameter u WHERE jawaban = ? AND id_indikator = ?";
                        $query = $this->db->query($sql, array($id_p, $indikator));
                        $dx = $query->row_array();
                        if (!$dx) {
                            $data['id_indikator'] = $indikator;
                            $data['jawaban'] = $id_p;
                            $outp &= $this->db->insert('analisis_parameter', $data);
                            unset($data);

                            $sql = "SELECT * FROM analisis_parameter u WHERE jawaban = ? AND id_indikator = ?";
                            $query = $this->db->query($sql, array($id_p, $indikator));
                            $dx = $query->row_array();

                            $data['id_parameter'] = $dx['id'];
                            $data['id_indikator'] = $indikator;
                            $data['id_subjek'] = $id;
                            $data['id_periode'] = $per;
=======

                foreach ($id_ia as $id_p) {
                    if ($id_p != '') {
                        unset($data);
                        $indikator = key($id_ia);

                        $sql   = 'SELECT * FROM analisis_parameter u WHERE jawaban = ? AND id_indikator = ?';
                        $query = $this->db->query($sql, [$id_p, $indikator]);
                        $dx    = $query->row_array();
                        if (! $dx) {
                            $data['id_indikator'] = $indikator;
                            $data['jawaban']      = $id_p;
                            $outp &= $this->db->insert('analisis_parameter', $data);
                            unset($data);

                            $sql   = 'SELECT * FROM analisis_parameter u WHERE jawaban = ? AND id_indikator = ?';
                            $query = $this->db->query($sql, [$id_p, $indikator]);
                            $dx    = $query->row_array();

                            $data['id_parameter'] = $dx['id'];
                            $data['id_indikator'] = $indikator;
                            $data['id_subjek']    = $id;
                            $data['id_periode']   = $per;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                            $outp &= $this->db->insert('analisis_respon', $data);
                        } else {
                            unset($data);
                            $data['id_indikator'] = $indikator;
                            $data['id_parameter'] = $dx['id'];
<<<<<<< HEAD
                            $data['id_subjek'] = $id;
                            $data['id_periode'] = $per;
=======
                            $data['id_subjek']    = $id;
                            $data['id_periode']   = $per;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                            $outp &= $this->db->insert('analisis_respon', $data);
                        }
                    }
                    next($id_ia);
                }
            }
            if (isset($_POST['it'])) {
                $id_it = $_POST['it'];
<<<<<<< HEAD
                foreach ($id_it as $id_p) {
                    if ($id_p != "") {
                        unset($data);
                        $indikator = key($id_it);

                        $sql = "SELECT * FROM analisis_parameter u WHERE jawaban = ? AND id_indikator = ?";
                        $query = $this->db->query($sql, array($id_p, $indikator));
                        $dx = $query->row_array();
                        if (!$dx) {
                            $data['id_indikator'] = $indikator;
                            $data['jawaban'] = $id_p;
                            $outp &= $this->db->insert('analisis_parameter', $data);
                            unset($data);

                            $sql = "SELECT * FROM analisis_parameter u WHERE jawaban = ? AND id_indikator = ?";
                            $query = $this->db->query($sql, array($id_p, $indikator));
                            $dx = $query->row_array();

                            $data2['id_parameter'] = $dx['id'];
                            $data2['id_indikator'] = $indikator;
                            $data2['id_subjek'] = $id;
                            $data2['id_periode'] = $per;
=======

                foreach ($id_it as $id_p) {
                    if ($id_p != '') {
                        unset($data);
                        $indikator = key($id_it);

                        $sql   = 'SELECT * FROM analisis_parameter u WHERE jawaban = ? AND id_indikator = ?';
                        $query = $this->db->query($sql, [$id_p, $indikator]);
                        $dx    = $query->row_array();
                        if (! $dx) {
                            $data['id_indikator'] = $indikator;
                            $data['jawaban']      = $id_p;
                            $outp &= $this->db->insert('analisis_parameter', $data);
                            unset($data);

                            $sql   = 'SELECT * FROM analisis_parameter u WHERE jawaban = ? AND id_indikator = ?';
                            $query = $this->db->query($sql, [$id_p, $indikator]);
                            $dx    = $query->row_array();

                            $data2['id_parameter'] = $dx['id'];
                            $data2['id_indikator'] = $indikator;
                            $data2['id_subjek']    = $id;
                            $data2['id_periode']   = $per;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                            $outp &= $this->db->insert('analisis_respon', $data2);
                        } else {
                            unset($data);
                            $data['id_indikator'] = $indikator;
                            $data['id_parameter'] = $dx['id'];

<<<<<<< HEAD
                            $data['id_subjek'] = $id;
=======
                            $data['id_subjek']  = $id;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                            $data['id_periode'] = $per;
                            $outp &= $this->db->insert('analisis_respon', $data);
                        }
                    }
                    next($id_it);
                }
            }

<<<<<<< HEAD
            $sql = "SELECT SUM(i.bobot * nilai) as jml FROM analisis_respon r LEFT JOIN analisis_indikator i ON r.id_indikator = i.id LEFT JOIN analisis_parameter z ON r.id_parameter = z.id WHERE r.id_subjek = ? AND i.act_analisis=1 AND r.id_periode=?";
            $query = $this->db->query($sql, array($id, $per));
            $dx = $query->row_array();

            $upx['id_master'] = $id_master;
            $upx['akumulasi'] = 0 + $dx['jml'];
            $upx['id_subjek'] = $id;
            $upx['id_periode'] = $per;

            $sql = "DELETE FROM analisis_respon_hasil WHERE id_subjek = ? AND id_periode=?";
            $this->db->query($sql, array($id, $per));
=======
            $sql   = 'SELECT SUM(i.bobot * nilai) as jml FROM analisis_respon r LEFT JOIN analisis_indikator i ON r.id_indikator = i.id LEFT JOIN analisis_parameter z ON r.id_parameter = z.id WHERE r.id_subjek = ? AND i.act_analisis=1 AND r.id_periode=?';
            $query = $this->db->query($sql, [$id, $per]);
            $dx    = $query->row_array();

            $upx['id_master']  = $id_master;
            $upx['akumulasi']  = 0 + $dx['jml'];
            $upx['id_subjek']  = $id;
            $upx['id_periode'] = $per;

            $sql = 'DELETE FROM analisis_respon_hasil WHERE id_subjek = ? AND id_periode=?';
            $this->db->query($sql, [$id, $per]);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            $outp &= $this->db->insert('analisis_respon_hasil', $upx);
        }
        if (isset($_FILES['pengesahan'])) {
            $lokasi_file = $_FILES['pengesahan']['tmp_name'];
<<<<<<< HEAD
            $tipe_file = $_FILES['pengesahan']['type'];
            if (!empty($lokasi_file)) {
                if ($tipe_file != "image/jpeg" and $tipe_file != "image/pjpeg") {
                    $_SESSION['sukses'] = -1;
                } else {
                    $nama_file = $_SESSION['analisis_master']."_".$per."_".$id."_".rand(10000, 99999).".jpg";
                    UploadPengesahan($nama_file);
                    $bukti['pengesahan'] = $nama_file;
                    $bukti['id_master'] = $id_master;
                    $bukti['id_subjek'] = $id;
                    $bukti['id_periode'] = $per;

                    $ada_bukti = $this->db->where(array('id_master' => $id_master, 'id_subjek' => $id, 'id_periode' => $per))->get('analisis_respon_bukti')->num_rows();
                    if ($ada_bukti > 0) {
                        $outp = $this->db->where(array('id_master' => $id_master, 'id_subjek' => $id, 'id_periode' => $per))->update('analisis_respon_bukti', $bukti);
=======
            $tipe_file   = $_FILES['pengesahan']['type'];
            if (! empty($lokasi_file)) {
                if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/pjpeg') {
                    $_SESSION['sukses'] = -1;
                } else {
                    $nama_file = $_SESSION['analisis_master'] . '_' . $per . '_' . $id . '_' . mt_rand(10000, 99999) . '.jpg';
                    UploadPengesahan($nama_file);
                    $bukti['pengesahan'] = $nama_file;
                    $bukti['id_master']  = $id_master;
                    $bukti['id_subjek']  = $id;
                    $bukti['id_periode'] = $per;

                    $ada_bukti = $this->db->where(['id_master' => $id_master, 'id_subjek' => $id, 'id_periode' => $per])->get('analisis_respon_bukti')->num_rows();
                    if ($ada_bukti > 0) {
                        $outp = $this->db->where(['id_master' => $id_master, 'id_subjek' => $id, 'id_periode' => $per])->update('analisis_respon_bukti', $bukti);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                    } else {
                        $outp &= $this->db->insert('analisis_respon_bukti', $bukti);
                    }
                }
            }
        }
        status_sukses($outp);
    }

<<<<<<< HEAD
    private function list_jawab2($id=0, $in=0, $per=0)
    {
        if (isset($_SESSION['delik'])) {
            $sql = "SELECT s.id as id_parameter,s.jawaban,s.kode_jawaban FROM analisis_parameter s WHERE id_indikator = ? ORDER BY s.kode_jawaban ASC ";
            $query = $this->db->query($sql, $in);
        } else {
            $sql = "SELECT s.id as id_parameter,s.jawaban,s.kode_jawaban,(SELECT count(id_subjek) FROM analisis_respon WHERE id_parameter = s.id AND id_subjek = ? AND id_periode=?) as cek FROM analisis_parameter s WHERE id_indikator = ? ORDER BY s.kode_jawaban ASC ";
            $query = $this->db->query($sql, array($id, $per, $in));
=======
    private function list_jawab2($id = 0, $in = 0, $per = 0)
    {
        if (isset($this->session->delik)) {
            $sql   = 'SELECT s.id as id_parameter,s.jawaban,s.kode_jawaban FROM analisis_parameter s WHERE id_indikator = ? ORDER BY s.kode_jawaban ASC ';
            $query = $this->db->query($sql, $in);
        } else {
            $sql   = 'SELECT s.id as id_parameter,s.jawaban,s.kode_jawaban,(SELECT count(id_subjek) FROM analisis_respon WHERE id_parameter = s.id AND id_subjek = ? AND id_periode=?) as cek FROM analisis_parameter s WHERE id_indikator = ? ORDER BY s.kode_jawaban ASC ';
            $query = $this->db->query($sql, [$id, $per, $in]);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        }

        $data = $query->result_array();

<<<<<<< HEAD
        for ($i=0; $i<count($data); $i++) {
            $data[$i]['no'] = $i+1;
            if (isset($_SESSION['delik'])) {
                $data[$i]['cek'] = 0;
            }
        }
        return $data;
    }

    private function list_jawab3($id=0, $in=0, $per=0)
    {
        $sql = "SELECT s.id as id_parameter,s.jawaban FROM analisis_respon r LEFT JOIN analisis_parameter s ON r.id_parameter = s.id WHERE r.id_indikator = ? AND r.id_subjek = ? AND r.id_periode=?";
        $query = $this->db->query($sql, array($in, $id, $per));
        $data = $query->row_array();
        return $data;
    }

    public function list_indikator($id=0)
    {
        $per = $this->get_aktif_periode();

        $data = $this->db
            ->select('u.id, u.id_kategori, u.nomor, u.id_tipe, u.pertanyaan, k.kategori')
=======
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['no'] = $i + 1;
            if (isset($this->session->delik)) {
                $data[$i]['cek'] = 0;
            }
        }

        return $data;
    }

    private function list_jawab3($id = 0, $in = 0, $per = 0)
    {
        $sql   = 'SELECT s.id as id_parameter,s.jawaban FROM analisis_respon r LEFT JOIN analisis_parameter s ON r.id_parameter = s.id WHERE r.id_indikator = ? AND r.id_subjek = ? AND r.id_periode=?';
        $query = $this->db->query($sql, [$in, $id, $per]);

        return $query->row_array();
    }

    public function list_indikator($id = 0)
    {
        $per = $this->analisis_master_model->get_aktif_periode();

        $data = $this->db
            ->select('u.id, u.id_kategori, u.nomor, u.id_tipe, u.pertanyaan, u.referensi, k.kategori')
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            ->from('analisis_indikator u')
            ->join('analisis_kategori_indikator k', 'u.id_kategori = k.id', 'left')
            ->where('u.id_master', $this->session->analisis_master)
            ->order_by("LPAD(u.nomor, 10, ' ') ASC")
            ->get()
            ->result_array();

<<<<<<< HEAD
        for ($i=0; $i<count($data); $i++) {
            $data[$i]['no'] = $i + 1;

            if ($data[$i]['id_tipe'] == 1 or $data[$i]['id_tipe'] == 2) {
                $data[$i]['parameter_respon'] = $this->list_jawab2($id, $data[$i]['id'], $per);
            } else {
                if (isset($_SESSION['delik'])) {
                    $data[$i]['parameter_respon'] = "";
                } else {
                    $data[$i]['parameter_respon'] = $this->list_jawab3($id, $data[$i]['id'], $per);
                }
            }
        }
=======
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['no'] = $i + 1;

            if ($data[$i]['id_tipe'] == 1 || $data[$i]['id_tipe'] == 2) {
                $data[$i]['parameter_respon'] = $this->list_jawab2($id, $data[$i]['id'], $per);
            } else {
                $data[$i]['parameter_respon'] = (isset($this->session->delik)) ? '' : $this->list_jawab3($id, $data[$i]['id'], $per);
            }
        }

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        return $data;
    }

    //CHILD-----------------------

<<<<<<< HEAD
    private function list_jawab4($id=0, $in=0, $per=0)
    {
        if (isset($_SESSION['delik'])) {
            $sql = "SELECT s.id as id_parameter,s.jawaban,s.kode_jawaban FROM analisis_parameter s WHERE id_indikator = ? ";
            $query = $this->db->query($sql, $in);
        } else {
            $sql = "SELECT s.id as id_parameter,s.jawaban,s.kode_jawaban,(SELECT count(id_subjek) FROM analisis_respon WHERE id_parameter = s.id AND id_subjek = ? AND id_periode=?) as cek FROM analisis_parameter s WHERE id_indikator = ? ";
            $query = $this->db->query($sql, array($id, $per, $in));
        }
        $data = $query->result_array();

        for ($i=0; $i<count($data); $i++) {
            $data[$i]['no'] = $i + 1;
            if (isset($_SESSION['delik'])) {
                $data[$i]['cek']=0;
            }
        }
        return $data;
    }

    private function list_jawab5($id=0, $in=0, $per=0)
    {
        $sql = "SELECT s.id as id_parameter,s.jawaban FROM analisis_respon r LEFT JOIN analisis_parameter s ON r.id_parameter = s.id WHERE r.id_indikator = ? AND r.id_subjek = ? AND r.id_periode = ?";
        $query = $this->db->query($sql, array($in, $id, $per));
        $data = $query->row_array();
        return $data;
    }

    public function list_indikator_child($id=0)
    {
        $sql = "SELECT id_child FROM analisis_master WHERE id = ? ";
        $query = $this->db->query($sql, $_SESSION['analisis_master']);
        $id_child = $query->row_array();
        $id_child = $id_child['id_child'];

        $sql = "SELECT id FROM analisis_periode WHERE id_master = ? AND aktif = 1";
        $query = $this->db->query($sql, $id_child);
        $per = $query->row_array();
        $per = $per['id'];

        $sql = "SELECT * FROM analisis_indikator u WHERE id_master = ? ";
        $sql .= " ORDER BY nomor";
        $query = $this->db->query($sql, $id_child);
        $data = $query->result_array();

        for ($i=0; $i<count($data); $i++) {
            $data[$i]['no'] = $i + 1;

            if ($data[$i]['id_tipe'] == 1 or $data[$i]['id_tipe'] == 2) {
                $data[$i]['parameter_respon'] = $this->list_jawab4($id, $data[$i]['id'], $per);
            } else {
                if (isset($_SESSION['delik'])) {
                    $data[$i]['parameter_respon'] = "";
                } else {
                    $data[$i]['parameter_respon'] = $this->list_jawab5($id, $data[$i]['id'], $per);
                }
            }
        }
=======
    private function list_jawab4($id = 0, $in = 0, $per = 0)
    {
        if (isset($this->session->delik)) {
            $sql   = 'SELECT s.id as id_parameter,s.jawaban,s.kode_jawaban FROM analisis_parameter s WHERE id_indikator = ? ';
            $query = $this->db->query($sql, $in);
        } else {
            $sql   = 'SELECT s.id as id_parameter,s.jawaban,s.kode_jawaban,(SELECT count(id_subjek) FROM analisis_respon WHERE id_parameter = s.id AND id_subjek = ? AND id_periode=?) as cek FROM analisis_parameter s WHERE id_indikator = ? ';
            $query = $this->db->query($sql, [$id, $per, $in]);
        }
        $data = $query->result_array();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['no'] = $i + 1;
            if (isset($this->session->delik)) {
                $data[$i]['cek'] = 0;
            }
        }

        return $data;
    }

    private function list_jawab5($id = 0, $in = 0, $per = 0)
    {
        $sql   = 'SELECT s.id as id_parameter,s.jawaban FROM analisis_respon r LEFT JOIN analisis_parameter s ON r.id_parameter = s.id WHERE r.id_indikator = ? AND r.id_subjek = ? AND r.id_periode = ?';
        $query = $this->db->query($sql, [$in, $id, $per]);

        return $query->row_array();
    }

    public function list_indikator_child($id = 0)
    {
        $sql      = 'SELECT id_child FROM analisis_master WHERE id = ? ';
        $query    = $this->db->query($sql, $_SESSION['analisis_master']);
        $id_child = $query->row_array();
        $id_child = $id_child['id_child'];

        $sql   = 'SELECT id FROM analisis_periode WHERE id_master = ? AND aktif = 1';
        $query = $this->db->query($sql, $id_child);
        $per   = $query->row_array();
        $per   = $per['id'];

        $sql = 'SELECT * FROM analisis_indikator u WHERE id_master = ? ';
        $sql .= ' ORDER BY nomor';
        $query = $this->db->query($sql, $id_child);
        $data  = $query->result_array();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['no'] = $i + 1;

            if ($data[$i]['id_tipe'] == 1 || $data[$i]['id_tipe'] == 2) {
                $data[$i]['parameter_respon'] = $this->list_jawab4($id, $data[$i]['id'], $per);
            } else {
                $data[$i]['parameter_respon'] = (isset($this->session->delik)) ? '' : $this->list_jawab5($id, $data[$i]['id'], $per);
            }
        }

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        return $data;
    }

    public function get_periode_child()
    {
<<<<<<< HEAD
        $sql = "SELECT id_child FROM analisis_master WHERE id = ? ";
        $query = $this->db->query($sql, $_SESSION['analisis_master']);
        $id_child = $query->row_array();
        $id_child = $id_child['id_child'];

        $sql = "SELECT id FROM analisis_periode WHERE id_master = ? AND aktif = 1";
        $query = $this->db->query($sql, $id_child);
        $per = $query->row_array();
        $per = $per['id'];
=======
        $sql      = 'SELECT id_child FROM analisis_master WHERE id = ? ';
        $query    = $this->db->query($sql, $_SESSION['analisis_master']);
        $id_child = $query->row_array();
        $id_child = $id_child['id_child'];

        $sql   = 'SELECT id FROM analisis_periode WHERE id_master = ? AND aktif = 1';
        $query = $this->db->query($sql, $id_child);
        $per   = $query->row_array();
        $per   = $per['id'];

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        return $per;
    }
    //---------------------------

<<<<<<< HEAD
    public function list_bukti($id=0)
    {
        $per = $this->get_aktif_periode();
        $sql = "SELECT pengesahan FROM analisis_respon_bukti WHERE id_subjek = ? AND id_master = ? AND id_periode = ? ";
        $sql .= " ORDER BY tgl_update DESC";
        $query = $this->db->query($sql, array($id, $_SESSION['analisis_master'], $per));
        $data = $query->result_array();
=======
    public function list_bukti($id = 0)
    {
        $per = $this->analisis_master_model->get_aktif_periode();
        $sql = 'SELECT pengesahan FROM analisis_respon_bukti WHERE id_subjek = ? AND id_master = ? AND id_periode = ? ';
        $sql .= ' ORDER BY tgl_update DESC';
        $query = $this->db->query($sql, [$id, $_SESSION['analisis_master'], $per]);
        $data  = $query->result_array();
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629

        return $data;
    }

<<<<<<< HEAD
    public function get_subjek($id=0)
    {
        $subjek = $_SESSION['subjek_tipe'];
        switch ($subjek) {
            case 1: $sql = "SELECT u.id,u.nik AS nid,u.nama,u.sex,c.dusun,c.rw,c.rt FROM penduduk_hidup u LEFT JOIN tweb_wil_clusterdesa c ON u.id_cluster = c.id WHERE u.id = ? "; break;

            case 2: $sql = "SELECT u.id,u.no_kk AS nid,p.nama,p.sex,c.dusun,c.rw,c.rt FROM keluarga_aktif u LEFT JOIN penduduk_hidup p ON u.nik_kepala = p.id LEFT JOIN tweb_wil_clusterdesa c ON p.id_cluster = c.id WHERE u.id = ? " ; break;

            case 3: $sql = "SELECT u.id,u.no_kk AS nid,p.nama,p.sex,c.dusun,c.rw,c.rt FROM tweb_rtm u LEFT JOIN penduduk_hidup p ON u.nik_kepala = p.id LEFT JOIN tweb_wil_clusterdesa c ON p.id_cluster = c.id WHERE u.id = ? "; break;

            case 4: $sql = "SELECT u.id,u.kode AS nid,u.nama,p.sex,c.dusun,c.rw,c.rt FROM kelompok u LEFT JOIN penduduk_hidup p ON u.id_ketua = p.id LEFT JOIN tweb_wil_clusterdesa c ON p.id_cluster = c.id WHERE u.id = ? "; break;

            default: return null;
        }
        $query = $this->db->query($sql, $id);
        return $query->row_array();
    }

    public function list_anggota($id=0)
    {
        $subjek = $_SESSION['subjek_tipe'];
        if ($subjek == 2 or $subjek == 3) {
            switch ($subjek) {
                case 2: $sql = "SELECT u.* FROM penduduk_hidup u WHERE u.id_kk = ? ORDER BY kk_level" ;break;
                case 3: $sql = "SELECT u.* FROM penduduk_hidup u WHERE u.id_rtm = ? ORDER BY rtm_level" ;break;
                default: return null;
            }
            $query = $this->db->query($sql, $id);
            return $query->result_array();
        } else {
            return null;
        }
=======
    public function get_subjek($id = 0)
    {
        $sebutan_dusun = ucwords($this->setting->sebutan_dusun);

        switch ($this->subjek) {
            case 1:
                $this->db
                    ->select('u.*, u.nik AS nid, c.dusun, c.rw, c.rt')
                    ->select("CONCAT('{$sebutan_dusun} ', c.dusun, ', RT ', c.rt, ' / RW ', c.rw) as wilayah")
                    ->from('penduduk_hidup u')
                    ->join('tweb_wil_clusterdesa c', 'u.id_cluster = c.id', 'left');
                break;

            case 2:
                $this->db
                    ->select('u.*, u.no_kk AS nid, p.nik AS nik_kepala, p.nama, p.sex, c.dusun, c.rw, c.rt')
                    ->select("CONCAT('{$sebutan_dusun} ', c.dusun, ', RT ', c.rt, ' / RW ', c.rw) as wilayah")
                    ->from('keluarga_aktif u')
                    ->join('penduduk_hidup p', 'u.nik_kepala = p.id', 'left')
                    ->join('tweb_wil_clusterdesa c', 'u.id_cluster = c.id', 'left');

                break;

            case 3:
                $this->db
                    ->select('u.id, u.no_kk AS nid, p.nama, p.sex, c.dusun, c.rw, c.rt')
                    ->from('tweb_rtm u')
                    ->join('penduduk_hidup p', 'u.nik_kepala = p.id', 'left')
                    ->join('tweb_wil_clusterdesa c', 'p.id_cluster = c.id', 'left');
                break;

            case 4: $
                {$this}->db
                    ->select('u.id, u.kode AS nid, u.nama, p.sex, c.dusun, c.rw, c.rt')
                    ->join('penduduk_hidup p', 'u.id_ketua = p.id', 'left')
                    ->join('tweb_wil_clusterdesa c', 'p.id_cluster = c.id', 'left');
                break;

            case 5:
                $this->db
                    ->select("u.id, u.kode_desa AS nid, u.nama_desa as nama, '-' as sex, '-' as dusun, '-' as rw, '-' as rt")
                    ->select("
						u.nama_desa, u.kode_desa, u.kode_pos, u.alamat_kantor, u.telepon as no_telepon_kantor_desa, u.email_desa, CONCAT('Lintang : ', u.lat, ', ', 'Bujur : ', u.lng) as titik_koordinat_desa")
                    ->select('
						c.pamong_nip AS nip_kepala_desa,
						(case when p.sex is not null then p.sex else c.pamong_sex end) as jk_kepala_desa,
						(case when p.pendidikan_kk_id is not null then b.nama else c.pamong_pendidikan end) as pendidikan_kepala_desa,
						(case when p.nama is not null then p.nama else c.pamong_nama end) AS nama_kepala_desa,
						p.telepon as no_telepon_kepala_desa
					')
                    ->from('config u')
                    ->join('tweb_desa_pamong c', 'u.pamong_id = c.pamong_id', 'left')
                    ->join('tweb_penduduk p', 'c.id_pend = p.id', 'left')
                    ->join('tweb_penduduk_pendidikan_kk b', 'p.pendidikan_kk_id = b.id', 'LEFT')
                    ->join('tweb_penduduk_sex x', 'p.sex = x.id', 'LEFT')
                    ->join('tweb_penduduk_pendidikan_kk b2', 'c.pamong_pendidikan = b2.id', 'LEFT')
                    ->join('tweb_penduduk_sex x2', 'c.pamong_sex = x2.id', 'LEFT');

                break;

            case 6:
                $this->db
                    ->select("u.id, u.dusun AS nid, UPPER('{$sebutan_dusun}') as nama, '-' as sex, u.dusun, '-' as rw, '-' as rt")
                    ->from('tweb_wil_clusterdesa u')
                    ->where('u.rt', '0')
                    ->where('u.rw', '0');
                break;

            case 7:
                $this->db
                    ->select("u.id, u.rw AS nid, CONCAT( UPPER('{$sebutan_dusun} '), u.dusun, ' RW ', u.rw) as nama, '-' as sex, u.dusun, u.rw, '-' as rt")
                    ->from('tweb_wil_clusterdesa u')
                    ->where('u.rt', '0')
                    ->where('u.rw <>', '0');
                break;

            case 8:
                $this->db
                    ->select("u.id, u.rt AS nid, CONCAT( UPPER('{$sebutan_dusun} '), u.dusun, ' RW ', u.rw, ' RT ', u.rt) as nama, '-' as sex, u.dusun, u.rw, u.rt")
                    ->from('tweb_wil_clusterdesa u')
                    ->where('u.rt <> 0')
                    ->where('u.rt <> "-"');
                break;

            default: return null;
        }
        $data = $this->db
            ->where('u.id', $id)
            ->limit(1)
            ->get()
            ->row_array();

        // Data tambahan subjek desa
        if ($this->subjek == 5) {
            $tambahan = [
                'jumlah_total_penduduk'            => $this->db->count_all_results('penduduk_hidup'),
                'jumlah_penduduk_laki_laki'        => $this->db->where('sex', 1)->count_all_results('penduduk_hidup'),
                'jumlah_penduduk_perempuan'        => $this->db->where('sex', 2)->count_all_results('penduduk_hidup'),
                'jumlah_penduduk_pedatang'         => $this->db->where('status', 2)->count_all_results('penduduk_hidup'),
                'jumlah_penduduk_yang_pergi'       => $this->db->where('kode_peristiwa', 3)->count_all_results('log_penduduk'),
                'jumlah_total_kepala_keluarga'     => $this->db->join('penduduk_hidup t', 'u.nik_kepala = t.id', 'left')->count_all_results('keluarga_aktif u'),
                'jumlah_kepala_keluarga_laki_laki' => $this->db->join('penduduk_hidup t', 'u.nik_kepala = t.id', 'left')->where('sex', 1)->count_all_results('keluarga_aktif u'),
                'jumlah_kepala_keluarga_perempuan' => $this->db->join('penduduk_hidup t', 'u.nik_kepala = t.id', 'left')->where('sex', 2)->count_all_results('keluarga_aktif u'),
                'jumlah_peserta_bpjs'              => $this->db->where('bpjs_ketenagakerjaan != ', null)->count_all_results('penduduk_hidup'),
            ];

            $data = array_merge($data, $tambahan);
        }

        return $data;
    }

    public function list_anggota($id = 0)
    {
        $subjek = $this->subjek;
        if ($subjek == 2 || $subjek == 3) {
            switch ($subjek) {
                case 2: $sql = 'SELECT u.* FROM penduduk_hidup u WHERE u.id_kk = ? ORDER BY kk_level'; break;

                case 3: $sql = 'SELECT u.* FROM penduduk_hidup u WHERE u.id_rtm = ? ORDER BY rtm_level'; break;

                default: return null;
            }
            $query = $this->db->query($sql, $id);

            return $query->result_array();
        }

        return null;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
    }

    public function aturan_unduh()
    {
<<<<<<< HEAD
        $subjek = $_SESSION['subjek_tipe'];
        $order_sql = " ORDER BY u.nomor ASC";
        $sql = "SELECT u.*,t.tipe AS tipe_indikator,k.kategori AS kategori FROM analisis_indikator u LEFT JOIN analisis_tipe_indikator t ON u.id_tipe = t.id LEFT JOIN analisis_kategori_indikator k ON u.id_kategori = k.id WHERE u.id_master = ? ";
        $sql .= $order_sql;

        $query = $this->db->query($sql, $_SESSION['analisis_master']);
        $data=$query->result_array();

        $per = $this->get_aktif_periode();
        for ($i=0; $i<count($data); $i++) {
            $data[$i]['no'] = $i + 1;

            if ($data[$i]['id_tipe'] == 1 or $data[$i]['id_tipe'] == 2) {
                $sql2 = "SELECT i.id,i.kode_jawaban,i.jawaban FROM analisis_parameter i WHERE i.id_indikator = ? ORDER BY i.kode_jawaban ASC ";
                $query2 = $this->db->query($sql2, $data[$i]['id']);
                $respon2 = $query2->result_array();
                $data[$i]['par']=$respon2;
=======
        $subjek    = $this->subjek;
        $order_sql = ' ORDER BY u.nomor ASC';
        $sql       = 'SELECT u.*,t.tipe AS tipe_indikator,k.kategori AS kategori FROM analisis_indikator u LEFT JOIN analisis_tipe_indikator t ON u.id_tipe = t.id LEFT JOIN analisis_kategori_indikator k ON u.id_kategori = k.id WHERE u.id_master = ? ';
        $sql .= $order_sql;

        $query = $this->db->query($sql, $_SESSION['analisis_master']);
        $data  = $query->result_array();

        $per = $this->analisis_master_model->get_aktif_periode();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['no'] = $i + 1;

            if ($data[$i]['id_tipe'] == 1 || $data[$i]['id_tipe'] == 2) {
                $sql2            = 'SELECT i.id,i.kode_jawaban,i.jawaban FROM analisis_parameter i WHERE i.id_indikator = ? ORDER BY i.kode_jawaban ASC ';
                $query2          = $this->db->query($sql2, $data[$i]['id']);
                $respon2         = $query2->result_array();
                $data[$i]['par'] = $respon2;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            } else {
                $data[$i]['par'] = null;
            }
            if ($data[$i]['act_analisis'] == 1) {
<<<<<<< HEAD
                $data[$i]['act_analisis'] = "Ya";
            } else {
                $data[$i]['act_analisis'] = "Tidak";
            }
        }
        return $data;
    }

    public function data_unduh($p, $o)
    {
        $per = $this->get_aktif_periode();
        $master = $this->get_analisis_master();
        $id_kelompok = $master['id_kelompok'];

        switch ($o) {
            case 1: $order_sql = ' ORDER BY u.id'; break;
            case 2: $order_sql = ' ORDER BY u.id DESC'; break;
            case 3: $order_sql = ' ORDER BY u.id'; break;
            case 4: $order_sql = ' ORDER BY u.id DESC'; break;
            default:$order_sql = ' ORDER BY u.id';
        }

        $sql = "SELECT * FROM analisis_indikator WHERE id_master = ? ORDER BY nomor";
        $query = $this->db->query($sql, $_SESSION['analisis_master']);
        $indikator = $query->result_array();

        $subjek = $_SESSION['subjek_tipe'];
        switch ($subjek) {
            case 1: $sql = "SELECT u.id,u.nik AS nid,u.nama,u.sex,c.dusun,c.rw,c.rt FROM penduduk_hidup u LEFT JOIN tweb_wil_clusterdesa c ON u.id_cluster = c.id WHERE 1 "; break;
            case 2: $sql = "SELECT u.id,u.no_kk AS nid,p.nama,p.sex,c.dusun,c.rw,c.rt FROM keluarga_aktif u LEFT JOIN penduduk_hidup p ON u.nik_kepala = p.id LEFT JOIN tweb_wil_clusterdesa c ON p.id_cluster = c.id WHERE 1 "; break;
            case 3: $sql = "SELECT u.id,u.no_kk AS nid,p.nama,p.sex,c.dusun,c.rw,c.rt FROM tweb_rtm u LEFT JOIN penduduk_hidup p ON u.nik_kepala = p.id LEFT JOIN tweb_wil_clusterdesa c ON p.id_cluster = c.id WHERE 1" ; break;
            case 4: $sql = "SELECT u.id,u.kode AS nid,u.nama,p.sex,c.dusun,c.rw,c.rt FROM kelompok u LEFT JOIN penduduk_hidup p ON u.id_ketua = p.id LEFT JOIN tweb_wil_clusterdesa c ON p.id_cluster = c.id WHERE 1 "; break;

            default: return null; break;
        }
        if ($id_kelompok != 0) {
            $sql .= $this->kelompok_sql($id_kelompok);
        }

        $sql .= $this->search_sql();
        $sql .= $this->dusun_sql();
        $sql .= $this->rw_sql();
        $sql .= $this->rt_sql();
        $sql .= $this->isi_sql();
        $sql .= $order_sql;

        $query = $this->db->query($sql, $per);
        $data=$query->result_array();

        for ($i=0; $i<count($data); $i++) {
            $data[$i]['no'] = $i + 1;
            if ($p == 1) {
                $sql2 	= "SELECT kode_jawaban,asign,jawaban,r.id_indikator,r.id_parameter AS korek FROM analisis_respon r LEFT JOIN analisis_parameter p ON p.id = r.id_parameter WHERE r.id_periode = ? AND r.id_subjek = ? ORDER BY r.id_indikator";
                $query2 = $this->db->query($sql2, array($per, $data[$i]['id']));
                $par = $query2->result_array();
                $data[$i]['par'] = $par;
            } else {
                $data[$i]['par'] = null;
            }

            $data[$i]['jk'] = "-";
            if ($data[$i]['sex'] == 1) {
                $data[$i]['jk'] = "L";
            } else {
                $data[$i]['jk'] = "P";
            }
        }
=======
                $data[$i]['act_analisis'] = 'Ya';
            } else {
                $data[$i]['act_analisis'] = 'Tidak';
            }
        }

>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        return $data;
    }

    public function indikator_data_unduh()
    {
<<<<<<< HEAD
        $master = $this->get_analisis_master();

        $order_sql = ' ORDER BY u.nomor';

        $sql = "SELECT u.* FROM analisis_indikator u WHERE u.id_master = ? ";
        $sql .= $order_sql;
        $query = $this->db->query($sql, $_SESSION['analisis_master']);
        $data	= $query->result_array();

        for ($i=0; $i<count($data); $i++) {
            $data[$i]['no'] = $i + 1;
            $data[$i]['par'] = null;

            $sql2 = "SELECT id_parameter FROM analisis_respon WHERE id_indikator = ? AND asign = 1 ";
            $query2 = $this->db->query($sql2, $data[$i]['id']);
            $par = $query2->result_array();
            $data[$i]['par'] = $par;
        }
        return $data;
    }

    public function indikator_unduh($p=0)
    {
        $master = $this->get_analisis_master();

=======
        $order_sql = ' ORDER BY u.nomor';

        $sql = 'SELECT u.* FROM analisis_indikator u WHERE u.id_master = ? ';
        $sql .= $order_sql;
        $query = $this->db->query($sql, $_SESSION['analisis_master']);
        $data  = $query->result_array();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['no']  = $i + 1;
            $data[$i]['par'] = null;

            $sql2            = 'SELECT id_parameter FROM analisis_respon WHERE id_indikator = ? AND asign = 1 ';
            $query2          = $this->db->query($sql2, $data[$i]['id']);
            $par             = $query2->result_array();
            $data[$i]['par'] = $par;
        }

        return $data;
    }

    public function indikator_unduh($p = 0)
    {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        $data = $this->db
            ->select('u.*')
            ->where('u.id_master', $this->session->analisis_master)
            ->order_by('LPAD(u.nomor, 10, " ")')
            ->get('analisis_indikator u')
            ->result_array();

<<<<<<< HEAD
        for ($i=0; $i<count($data); $i++) {
            $data[$i]['no'] = $i + 1;
=======
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['no']  = $i + 1;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            $data[$i]['par'] = null;

            if ($p == 2) {
                $par = $this->db
                    ->select('*')
                    ->where('id_indikator', $data[$i]['id'])
                    ->where('asign', 1)
                    ->get('analisis_parameter')
                    ->result_array();
<<<<<<< HEAD

                // $sql2 = "SELECT * FROM analisis_parameter WHERE id_indikator = ? AND asign = 1 ";
                // $query2 = $this->db->query($sql2, $data[$i]['id']);
                // $par = $query2->result_array();
                $data[$i]['par'] = $par;
            }
        }
        return $data;
    }

    public function pre_update($pr=0)
    {
        if ($pr == 0) {
            $per = $this->get_aktif_periode();
=======
                $data[$i]['par'] = $par;
            }
        }

        return $data;
    }

    public function pre_update($pr = 0)
    {
        if ($pr == 0) {
            $per = $this->analisis_master_model->get_aktif_periode();
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        } else {
            $per = $pr;
        }

<<<<<<< HEAD
        $sql = "SELECT DISTINCT(id_subjek) AS id FROM analisis_respon WHERE id_periode = ? ";
        $query 	= $this->db->query($sql, $per);
        $data	= $query->result_array();

        $sql = "DELETE FROM analisis_respon_hasil WHERE id_subjek = 0";
        $this->db->query($sql);

        $sql = "DELETE FROM analisis_respon WHERE id_subjek = 0";
        $this->db->query($sql);

        $sql = "DELETE FROM analisis_respon_hasil WHERE id_periode = ?";
        $this->db->query($sql, $per);

        for ($i=0; $i<count($data); $i++) {
            $sql = "SELECT SUM(i.bobot * nilai) as jml FROM analisis_respon r LEFT JOIN analisis_indikator i ON r.id_indikator = i.id LEFT JOIN analisis_parameter z ON r.id_parameter = z.id WHERE r.id_subjek = ? AND i.act_analisis=1 AND r.id_periode=?";
            $query = $this->db->query($sql, array($data[$i]['id'], $per));
            $dx = $query->row_array();

            $upx[$i]['id_master'] = $_SESSION['analisis_master'];
            $upx[$i]['akumulasi'] = 0+$dx['jml'];
            $upx[$i]['id_subjek'] = $data[$i]['id'];
=======
        $sql   = 'SELECT DISTINCT(id_subjek) AS id FROM analisis_respon WHERE id_periode = ? ';
        $query = $this->db->query($sql, $per);
        $data  = $query->result_array();

        $sql = 'DELETE FROM analisis_respon_hasil WHERE id_subjek = 0';
        $this->db->query($sql);

        $sql = 'DELETE FROM analisis_respon WHERE id_subjek = 0';
        $this->db->query($sql);

        $sql = 'DELETE FROM analisis_respon_hasil WHERE id_periode = ?';
        $this->db->query($sql, $per);

        for ($i = 0; $i < count($data); $i++) {
            $sql   = 'SELECT SUM(i.bobot * nilai) as jml FROM analisis_respon r LEFT JOIN analisis_indikator i ON r.id_indikator = i.id LEFT JOIN analisis_parameter z ON r.id_parameter = z.id WHERE r.id_subjek = ? AND i.act_analisis=1 AND r.id_periode=?';
            $query = $this->db->query($sql, [$data[$i]['id'], $per]);
            $dx    = $query->row_array();

            $upx[$i]['id_master']  = $_SESSION['analisis_master'];
            $upx[$i]['akumulasi']  = 0 + $dx['jml'];
            $upx[$i]['id_subjek']  = $data[$i]['id'];
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            $upx[$i]['id_periode'] = $per;
        }
        if (@$upx) {
            $this->db->insert_batch('analisis_respon_hasil', $upx);
        }
    }

<<<<<<< HEAD
    public function update_hasil($id=0)
    {
        $per = $this->get_aktif_periode();

        $sql = "SELECT SUM(i.bobot * nilai) as jml FROM analisis_respon r LEFT JOIN analisis_indikator i ON r.id_indikator = i.id LEFT JOIN analisis_parameter z ON r.id_parameter = z.id WHERE r.id_subjek = ? AND i.act_analisis = 1 AND r.id_periode = ?";
        $query = $this->db->query($sql, array($id, $per));
        $dx = $query->row_array();

        $upx['id_master'] = $_SESSION['analisis_master'];
        $upx['akumulasi'] = 0 + $dx['jml'];
        $upx['id_subjek'] = $id;
        $upx['id_periode'] = $per;

        $sql = "DELETE FROM analisis_respon_hasil WHERE id_subjek = ? AND id_periode=?";
        $this->db->query($sql, array($id, $per));
        $this->db->insert('analisis_respon_hasil', $upx);
    }

    public function import_respon($op=0)
    {
        $per = $this->get_aktif_periode();

        $subjek = $_SESSION['subjek_tipe'];
        $mas = $_SESSION['analisis_master'];
        $key = ($per+3)*($mas+7)*($subjek*3);
        $key = "AN".$key;
        $respon = array();

        $sql = "SELECT * FROM analisis_indikator WHERE id_master=? ORDER BY id ASC";
        $query = $this->db->query($sql, $_SESSION['analisis_master']);
        $indikator = $query->result_array();
        $jml = count($indikator);

        $data = new Spreadsheet_Excel_Reader($_FILES['respon']['tmp_name']);
        $s = 0;
=======
    public function update_hasil($id = 0)
    {
        $per = $this->analisis_master_model->get_aktif_periode();

        $sql   = 'SELECT SUM(i.bobot * nilai) as jml FROM analisis_respon r LEFT JOIN analisis_indikator i ON r.id_indikator = i.id LEFT JOIN analisis_parameter z ON r.id_parameter = z.id WHERE r.id_subjek = ? AND i.act_analisis = 1 AND r.id_periode = ?';
        $query = $this->db->query($sql, [$id, $per]);
        $dx    = $query->row_array();

        $upx['id_master']  = $_SESSION['analisis_master'];
        $upx['akumulasi']  = 0 + $dx['jml'];
        $upx['id_subjek']  = $id;
        $upx['id_periode'] = $per;

        $sql = 'DELETE FROM analisis_respon_hasil WHERE id_subjek = ? AND id_periode=?';
        $this->db->query($sql, [$id, $per]);
        $this->db->insert('analisis_respon_hasil', $upx);
    }

    public function import_respon($op = 0)
    {
        $per = $this->analisis_master_model->get_aktif_periode();

        $subjek = $this->subjek;
        $mas    = $_SESSION['analisis_master'];
        $key    = ($per + 3) * ($mas + 7) * ($subjek * 3);
        $key    = 'AN' . $key;
        $respon = [];

        $sql       = 'SELECT * FROM analisis_indikator WHERE id_master=? ORDER BY id ASC';
        $query     = $this->db->query($sql, $_SESSION['analisis_master']);
        $indikator = $query->result_array();
        $jml       = count($indikator);

        $data  = new Spreadsheet_Excel_Reader($_FILES['respon']['tmp_name']);
        $s     = 0;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        $baris = $data->rowcount($s);
        $kolom = $data->colcount($s);

        $ketemu = 0;

<<<<<<< HEAD
        for ($b=1; $b<=$baris; $b++) {
            for ($k=1; $k<=$kolom; $k++) {
                $isi = $data->val($b, $k, $s);
                // ketemu njuk stop
                if ($isi == $key) {
                    $br = $b+1;
                    $kl = $k+1;

                    $b = $baris+1;
                    $k = $kolom+1;
=======
        for ($b = 1; $b <= $baris; $b++) {
            for ($k = 1; $k <= $kolom; $k++) {
                $isi = $data->val($b, $k, $s);
                // ketemu njuk stop
                if ($isi == $key) {
                    $br = $b + 1;
                    $kl = $k + 1;

                    $b      = $baris + 1;
                    $k      = $kolom + 1;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                    $ketemu = 1;
                }
            }
        }
<<<<<<< HEAD
        if ($ketemu==1) {
            $dels = "";
            $true = 0;
            for ($i=$br; $i<=$baris; $i++) {
                $id_subjek = $data->val($i, $kl-1, $s);

                $j = $kl;
                foreach ($indikator as $indi) {
                    $isi = $data->val($i, $j, $s);
                    if ($isi != "") {
=======
        if ($ketemu == 1) {
            $dels = '';
            $true = 0;

            for ($i = $br; $i <= $baris; $i++) {
                $id_subjek = $data->val($i, $kl - 1, $s);

                $j = $kl;

                foreach ($indikator as $indi) {
                    $isi = $data->val($i, $j, $s);
                    if ($isi != '') {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                        $true = 1;
                    }

                    $j++;
                }
                if ($true == 1) {
<<<<<<< HEAD
                    $dels .= $id_subjek.",";
=======
                    $dels .= $id_subjek . ',';
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                    $true = 0;
                }
            }

<<<<<<< HEAD
            $dels .= "9999999";
            //cek ada row
            $this->db->where("id_subjek in($dels)")->where('id_periode', $per)->delete('analisis_respon');
            $dels = "";

            for ($i=$br; $i<=$baris; $i++) {
                $id_subjek = $data->val($i, $kl-1, $s);
                if (strlen($id_subjek) > 14 and $subjek == 1) {
                    $sqls = "SELECT id FROM penduduk_hidup WHERE nik = ?;";
                    $querys = $this->db->query($sqls, array($id_subjek));
                    $isbj = $querys->row_array();
=======
            $dels .= '9999999';
            //cek ada row
            $this->db->where("id_subjek in({$dels})")->where('id_periode', $per)->delete('analisis_respon');
            $dels = '';

            for ($i = $br; $i <= $baris; $i++) {
                $id_subjek = $data->val($i, $kl - 1, $s);
                if (strlen($id_subjek) > 14 && $subjek == 1) {
                    $sqls      = 'SELECT id FROM penduduk_hidup WHERE nik = ?;';
                    $querys    = $this->db->query($sqls, [$id_subjek]);
                    $isbj      = $querys->row_array();
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                    $id_subjek = $isbj['id'];
                } elseif ($subject == 3) {
                    // sasaran rumah tangga, simpan id, bukan nomor rumah tangga
                    $id_subjek = $this->db->select('id')
                        ->where('id_rtm', $id_subjek)
                        ->get('tweb_rtm')
                        ->row()->id;
                }

<<<<<<< HEAD
                $j = $kl+$op;
                $all = "";
                foreach ($indikator as $indi) {
                    $isi = $data->val($i, $j, $s);
                    if ($isi != "") {
                        if ($indi['id_tipe'] == 1) {
                            $sql = "SELECT id FROM analisis_parameter WHERE id_indikator = ? AND kode_jawaban = ?;";
                            $query = $this->db->query($sql, array($indi['id'],$isi));
=======
                $j   = $kl + $op;
                $all = '';

                foreach ($indikator as $indi) {
                    $isi = $data->val($i, $j, $s);
                    if ($isi != '') {
                        if ($indi['id_tipe'] == 1) {
                            $sql   = 'SELECT id FROM analisis_parameter WHERE id_indikator = ? AND kode_jawaban = ?;';
                            $query = $this->db->query($sql, [$indi['id'], $isi]);
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                            $param = $query->row_array();

                            if ($param) {
                                $in_param = $param['id'];
                            } else {
<<<<<<< HEAD
                                if ($isi == "") {
=======
                                if ($isi == '') {
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                                    $in_param = 0;
                                } else {
                                    $in_param = -1;
                                }
                            }

<<<<<<< HEAD
                            $respon[] = array(
                                'id_parameter' 	=> $in_param,
                                'id_indikator' 	=> $indi['id'],
                                'id_subjek'			=> $id_subjek,
                                'id_periode'		=> $per);
                        } elseif ($indi['id_tipe'] == 2) {
                            $this->respon_checkbox($indi, $isi, $id_subjek, $per, $respon);
                        } else {
                            $sql = "SELECT id FROM analisis_parameter WHERE id_indikator = ? AND jawaban = ?;";
                            $query = $this->db->query($sql, array($indi['id'], $isi));
                            $param 	= $query->row_array();
=======
                            $respon[] = [
                                'id_parameter' => $in_param,
                                'id_indikator' => $indi['id'],
                                'id_subjek'    => $id_subjek,
                                'id_periode'   => $per, ];
                        } elseif ($indi['id_tipe'] == 2) {
                            $this->respon_checkbox($indi, $isi, $id_subjek, $per, $respon);
                        } else {
                            $sql   = 'SELECT id FROM analisis_parameter WHERE id_indikator = ? AND jawaban = ?;';
                            $query = $this->db->query($sql, [$indi['id'], $isi]);
                            $param = $query->row_array();
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629

                            // apakah sdh ada jawaban yg sama
                            if ($param) {
                                $in_param = $param['id'];
                            } else {
<<<<<<< HEAD
                                $parameter['jawaban']	= $isi;
                                $parameter['id_indikator'] = $indi['id'];
                                $parameter['asign']	= 0;

                                $this->db->insert('analisis_parameter', $parameter);

                                $sql = "SELECT id FROM analisis_parameter WHERE id_indikator = ? AND jawaban = ?;";
                                $query = $this->db->query($sql, array($indi['id'], $isi));
                                $param 	= $query->row_array();
                                $in_param = $param['id'];
                            }

                            $respon[] = array(
                                'id_parameter' 	=> $in_param,
                                'id_indikator' 	=> $indi['id'],
                                'id_subjek'			=> $id_subjek,
                                'id_periode'		=> $per);
=======
                                $parameter['jawaban']      = $isi;
                                $parameter['id_indikator'] = $indi['id'];
                                $parameter['asign']        = 0;

                                $this->db->insert('analisis_parameter', $parameter);

                                $sql      = 'SELECT id FROM analisis_parameter WHERE id_indikator = ? AND jawaban = ?;';
                                $query    = $this->db->query($sql, [$indi['id'], $isi]);
                                $param    = $query->row_array();
                                $in_param = $param['id'];
                            }

                            $respon[] = [
                                'id_parameter' => $in_param,
                                'id_indikator' => $indi['id'],
                                'id_subjek'    => $id_subjek,
                                'id_periode'   => $per, ];
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                        }
                    }

                    $j++;
                }
            }

            if (count($respon) > 0) {
                $outp = $this->db->insert_batch('analisis_respon', $respon);
            } else {
<<<<<<< HEAD
                $outp = false;
=======
                $outp                  = false;
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
                $_SESSION['error_msg'] = 'Tidak ada data';
            }
        }

        $this->pre_update();

        status_sukses($outp); //Tampilkan Pesan
    }

    private function respon_checkbox($indi, $isi, $id_subjek, $per, &$respon)
    {
<<<<<<< HEAD
        $list_isi = explode(",", $isi);
        foreach ($list_isi as $isi_ini) {
            if ($indi['is_teks'] == 1) {
                // Isian sebagai teks pilihan bukan kode
                $teks = strtolower($isi_ini);
                $param = $this->db->where('id_indikator', $indi['id'])->where("LOWER(jawaban) = '$teks'")
                    ->get('analisis_parameter')->row_array();
            } else {
                $param = $this->db->where('id_indikator', $indi['id'])->where("kode_jawaban", $isi_ini)
                    ->get('analisis_parameter')->row_array();
            }
            if ($param['id'] != "") {
                $in_param = $param['id'];
                $respon[] = array(
                    'id_parameter' => $in_param,
                    'id_indikator' => $indi['id'],
                    'id_subjek'	=> $id_subjek,
                    'id_periode' => $per);
=======
        $list_isi = explode(',', $isi);

        foreach ($list_isi as $isi_ini) {
            if ($indi['is_teks'] == 1) {
                // Isian sebagai teks pilihan bukan kode
                $teks  = strtolower($isi_ini);
                $param = $this->db->where('id_indikator', $indi['id'])->where("LOWER(jawaban) = '{$teks}'")
                    ->get('analisis_parameter')->row_array();
            } else {
                $param = $this->db->where('id_indikator', $indi['id'])->where('kode_jawaban', $isi_ini)
                    ->get('analisis_parameter')->row_array();
            }
            if ($param['id'] != '') {
                $in_param = $param['id'];
                $respon[] = [
                    'id_parameter' => $in_param,
                    'id_indikator' => $indi['id'],
                    'id_subjek'    => $id_subjek,
                    'id_periode'   => $per,
                ];
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
            }
        }
    }

<<<<<<< HEAD
    public function get_aktif_periode()
    {
        $sql = "SELECT * FROM analisis_periode WHERE aktif = 1 AND id_master = ?";
        $query = $this->db->query($sql, $_SESSION['analisis_master']);
        $data = $query->row_array();
        return $data['id'];
    }

    public function get_analisis_master()
    {
        $sql = "SELECT * FROM analisis_master WHERE id = ?";
        $query = $this->db->query($sql, $_SESSION['analisis_master']);
        return $query->row_array();
    }

    public function get_periode()
    {
        $sql = "SELECT * FROM analisis_periode WHERE aktif = 1 AND id_master = ?";
        $query = $this->db->query($sql, $_SESSION['analisis_master']);
        $data = $query->row_array();
        return $data['nama'];
    }

    public function get_respon_by_id_periode($id_periode = 0, $subjek = 1)
    {
        $result = array();
=======
    public function get_respon_by_id_periode($id_periode = 0, $subjek = 1)
    {
        $result = [];
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
        if ($subjek == 1) { // Untuk Subjek Penduduk
            $list_penduduk = $this->db->select('r.*, p.nik')
                ->from('analisis_respon r')
                ->join('tweb_penduduk p', 'r.id_subjek = p.id')
                ->where('r.id_periode', $id_periode)
                ->get()
                ->result_array();

            foreach ($list_penduduk as $penduduk) {
                $result[$penduduk['nik']][$penduduk['id_indikator']] = $penduduk;
            }
        } else { // Untuk Subjek Keluarga
            $list_keluarga = $this->db->select('r.*, k.no_kk')
                ->from('analisis_respon r')
                ->join('tweb_keluarga k', 'r.id_subjek = k.id')
                ->where('r.id_periode', $id_periode)
                ->get()
                ->result_array();

            foreach ($list_keluarga as $keluarga) {
                $result[$keluarga['no_kk']][$keluarga['id_indikator']] = $keluarga;
            }
        }
<<<<<<< HEAD
        
        return $result;
    }
=======

        return $result;
    }

    public function perbaharui($id_subjek = 0)
    {
        // Daftar indikator yg menggunakan referensi
        $id_indikator = $this->db
            ->select('id')
            ->get_where('analisis_indikator', ['id_master' => $this->session->analisis_master])
            ->result_array();

        if ($id_indikator) {
            $id_indikator = array_column($id_indikator, 'id');

            $outp = $this->db
                ->where('id_subjek', $id_subjek)
                ->where_in('id_indikator', $id_indikator)
                ->delete('analisis_respon');
        }

        status_sukses($outp);
    }
>>>>>>> ec32238eb3e141c01ed908fd0401488c17ee0629
}
