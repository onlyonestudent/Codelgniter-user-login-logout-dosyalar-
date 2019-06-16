<?php

/**
 * Kullanıcı kayıt
 *
 * @author Alexander
 */
class kullanici extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        
        $this->load->library('session');
        $this->load->helper('url');
        
        $this->load->database();
    }

    function index()
    {
        if( !class_exists('CI_Session') ) $this->load->library('session');

        if( $this->session->userdata('giris') )
        {
            $data['kullanici_adi'] = $this->session->userdata('kullanici_adi');
        }
        else
        {
            redirect(site_url('kullanici/kullanici_giris'));
        }

        $data['icerik'] = $this->load->view('kullanici/kullanici_view', $data, TRUE);
        $this->load->view('tema', $data);
    }

    function kullanici_giris()
    {
        $data['icerik'] = $this->load->view('kullanici/kullanici_giris_view', '', TRUE);
        $this->load->view('tema', $data);
    }

    function giris_yap()
    {
        $this->load->model('kullanici_model');

        $form_kural = array(
            array(
                'field' => 'kullanici_adi',
                'label' => 'Kullanıcı Adı',
                'rules' => 'trim|required|min_length[6]|max_length[12]|alpha_numeric|xss_clean'
            ),
            array(
                'field' => 'parola',
                'label' => 'Parola',
                'rules' => 'trim|required|min_length[6]|max_length[12]|alpha_numeric|xss_clean'
            )
        );

        if( !class_exists('CI_Form_validation') )
            $this->load->library('form_validation');
        
        $this->form_validation->set_rules($form_kural);

        if( $this->form_validation->run() === TRUE )
        {
            $kullanici_adi = $this->input->post('kullanici_adi');
            $parola = md5(sha1($this->input->post('parola')));

            $kullanici = $this->kullanici_model->kullanici_adi_parola_ile_al($kullanici_adi, $parola);

            if( !$kullanici )
            {
                $this->session->set_flashdata('hata', 'Giriş başarısız');
                redirect(site_url('kullanici/kullanici_giris'));
            }
            else
            {
                if( !class_exists('CI_Session') ) $this->load->library('session');

                $session_bilgileri = array(
                    'kullanici_adi' => $kullanici->kullanici_adi,
                    'giris' => TRUE
                );

                $this->session->set_userdata($session_bilgileri);
                redirect(site_url('kullanici'));
            }
        }

        $this->session->set_flashdata('hata', 'Bilgileri eksiksiz giriniz.');
        redirect(site_url('kullanici/kullanici_giris'));
    }

    function cikis_yap()
    {
        $this->session->sess_destroy();
        redirect('kullanici');
    }

    function kullanici_kayit()
    {
		if( !class_exists('CI_Form_validation') )
            $this->load->library('form_validation');
			
        $data['icerik'] = $this->load->view('kullanici/kullanici_kayit_view', '', TRUE);
        $this->load->view('tema', $data);
    }

    function kullanici_ekle()
    {
        $this->load->model('kullanici_model');

        $form_kural = array(
            array(
                'field' => 'kullanici_adi',
                'label' => 'Kullanıcı Adı',
                'rules' => 'trim|required|min_length[6]|max_length[12]|alpha_numeric|xss_clean|callback_kullanici_adi_kontrol'
            ),
            array(
                'field' => 'parola',
                'label' => 'Parola',
                'rules' => 'trim|required|min_length[6]|max_length[12]|matches[parola2]|alpha_numeric|xss_clean'
            ),
            array(
                'field' => 'parola2',
                'label' => 'İkinci parola bilgisi',
                'rules' => 'trim|required|min_length[6]|max_length[12]|alpha_numeric'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|xss_clean|callback_email_kontrol'
            )
        );

        if( !class_exists('CI_Form_validation') )
            $this->load->library('form_validation');

        $this->form_validation->set_rules($form_kural);
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', '%s bilgisini girmelisiniz.');
        $this->form_validation->set_message('matches', 'Parolalar eşleşmiyor.');
        $this->form_validation->set_message('valid_email', 'Geçerli email adresi giriniz.');
        $this->form_validation->set_message('kullanici_kontrol', 'Girdiğiniz kullanıcı adı daha önce kullanılmış!');

        if( $this->form_validation->run() === TRUE )
        {
            $kullanici_adi = $this->input->post('kullanici_adi');
            $parola = md5(sha1($this->input->post('parola')));
            $email = $this->input->post('email');

            if( $this->kullanici_model->kullanici_ekle($kullanici_adi, $parola, $email) )
            {
                $this->session->set_flashdata('mesaj', 'Kullanıcı kaydı başarıyla gerçekleştirildi.');
                redirect(site_url('kullanici/kullanici_kayit'));
            }
        }

        $data['icerik'] = $this->load->view('kullanici/kullanici_kayit_view', '', TRUE);
        $this->load->view('tema', $data);
    }

    function kullanici_adi_kontrol($kullanici_adi)
    {
        if( $this->kullanici_model->kullanici_al('kullanici_adi', $kullanici_adi) )
        {
            $this->form_validation->set_message('kullanici_adi_kontrol', 'Girdiğiniz kullanıcı adı daha önce kullanılmış.');
            return FALSE;
        }

        return TRUE;
    }

    function email_kontrol($email)
    {
        if( $this->kullanici_model->kullanici_al('email', $email) )
        {
            $this->form_validation->set_message('email_kontrol', 'Girdiğiniz email adresi daha önce kullanılmış.');
            return FALSE;
        }

        return TRUE;
    }

}

