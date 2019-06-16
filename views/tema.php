<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
    <title>Codeigniter Kullanıcı Kayıt formu</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }

        body{
            font: 13px/1.5 Helvetica Neue,Arial,Helvetica,'Liberation Sans',FreeSans,sans-serif;
            text-align: center;
            background-color: #222222;
            color: #FFFFFF;
        }
        h2{
            color: #fff;
            margin-top: 40px;
        }
        a{
            color: #0166FF;
            text-decoration: none;
        }

        #kapsayici{
            margin: 0 auto;
            width: 800px;
        }
        .icerik{
            margin: 40px auto;
            width: 400px;
            text-align: left;
            color: #FFFFFF;
        }

        .section{
            border: 3px solid #E0E0E0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            padding: 10px;
            background: #FFFFFF;
            color: #222222;
        }
        h3{
            font-size: 16px;
            font-weight: bold;
            padding: 3px;
            color: #FFFFFF;
            background-color: #222222;
        }

        label{
            color: #666666;
            font-weight: bold;
            display: block;
        }

        input{
            padding: 5px;
            width: 200px;
        }

        button{
            padding: 2px 7px 2px 7px;
            background-color: #0166FF;
            border: none;
            font-weight: bold;
            color: #FFFFFF;
            cursor: pointer;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        p{
            margin: 6px 0;
            padding: 3px;
        }

        .error{
            margin-bottom: 3px;
            color: red;
            font-weight: bold;
        }

        .mesaj{color: #02f918}

        .kullanici_adi{
            font-size: 20px;
            font-weight: bold;
}

    </style>
</head>
<body>
<div id="kapsayici">
    <h2>Codeigniter Kullanıcı Kayıt Formu</h2>
    <p>Yazıya dönmek için <a href="http://www.serkandaglioglu.com/?p=487">tıklayınız</a></p>
    <div class="icerik">        
        <?php if( isset($icerik) ) echo $icerik; ?>
    </div>
</div>
</body>
</html>
