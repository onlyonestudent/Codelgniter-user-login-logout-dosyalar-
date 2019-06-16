<div class="section">

    <form action="<?php echo site_url('kullanici/giris_yap'); ?>" method="POST">
        <h3>Kullanıcı Giriş</h3>
        <p>
            <?php if( $this->session->flashdata('hata') ) echo '<div class="error">' . $this->session->flashdata('hata') . '</div>'; ?>
        </p>
        <p>
            <label>Kullanıcı adı :</label><input type="text" name="kullanici_adi" value="" />
        </p>
        <p>
            <label>Parola :</label><input type="password" name="parola" value="" />
        </p>
        <p>
            <button type="submit">Giriş</button>
        </p>
    </form>
    
    <p>
        <a href="<?php echo site_url('kullanici/kullanici_kayit'); ?>">Yeni kayıt</a>
    </p>

</div>
