<?php
list($width, $height) = getimagesize(base_url('imgs/' . $comercio->logo));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<!--        <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.3.0/build/cssreset/reset-min.css">-->
        <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
        <link href="<?php echo base_url('css/fb.css'); ?>" rel="stylesheet" type="text/css" />
        <title></title>
    </head>
    <body>
        <div class="wrapper">
            <div class="maincontent">
                <div class="logo"><img src="<?php echo base_url('imgs/' . $comercio->logo); ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" alt="<?php echo $comercio->nombre; ?>" /></div>
                <ul class="tabs">
                    <li><a href="<?php echo site_url('fb'); ?>">Nuestro menú</a></li>
                    <li><a href="<?php echo site_url('shared/ordenActual/ver/fb'); ?>">Tu orden</a></li>
                    <li><a href="<?php echo site_url('fb/datos-envio'); ?>">Dirección de envío</a></li>
                    <li><a href="<?php echo site_url('fb/nosotros'); ?>">Horarios y ubicación</a></li>
                </ul>
                <div class="tab_container">
                    <div id="tab1" class="tab_content">
                        <div>
                            <h3><?php echo $comercio->nombre; ?></h3>
                            <p><?php echo $comercio->descripcion; ?></p>
                            <h4>Horarios</h4>
                            <span><?php echo $comercio->toHtmlHorarios(); ?></span>
                            <h4>Teléfono</h4>
                            <?php echo $comercio->telefono; ?>
                            <h4>Dirección</h4>
                        </div>
                    </div><!--End Tab 2 -->
                </div><!--End Tab Container -->
                <div style="clear: both;"></div>
            </div><!--End Main Content-->

        </div><!--End Wrapper -->
        </br>
        <div style="clear: both;"></div>
        <div class="powered">
            <p>Un servicio de</br><a href="#"><img src="<?php echo base_url('imgs/mobilivery.png'); ?>" width="100" height="22" alt="Mobilivery"></a></p>
        </div>
    </body>
</html>