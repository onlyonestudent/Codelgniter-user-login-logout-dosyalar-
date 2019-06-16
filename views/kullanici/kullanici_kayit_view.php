<div class="section">

    <form action="<?php echo site_url('kullanici/kullanici_ekle'); ?>" method="POST">
        <h3>Kullanıcı Kayıt</h3>
        <p>
            <?php
            if( $this->session->flashdata('mesaj') ) echo '<div class="mesaj">' . $this->session->flashdata('mesaj') . '</div>';
            echo validation_errors();
            ?>
        </p>
        <p>
            <label>Kullanıcı adı :</label><input type="text" name="kullanici_adi" value="<?php echo set_value('kullanici_adi'); ?>" />
        </p>
        <p>
            <label>Parola :</label><input type="password" name="parola" value="" />
        </p>
        <p>
            <label>Parola tekrar :</label><input type="password" name="parola2" value="" />
        </p>
        <p>
            <label>Email :</label><input type="text" name="email" value="<?php echo set_value('email'); ?>" />
        </p>
        <button type="submit">Kayıt ol</button>
    </form>
    
    <p>
        <a href="<?php echo site_url('kullanici/kullanici_giris'); ?>">Kullanıcı Girişi</a>
    </p>
    
</div>


