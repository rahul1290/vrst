<!doctype html>
<html lang="en">
    <head>
        <?php if(isset($header)){ print_r($header); }?>
    </head>
    <body data-sidebar="light">
        <input type="hidden" id="baseUrl" value="<?= base_url(); ?>" />
        <?php if(isset($footer)){ print_r($footer); }?>
        <?php if(isset($mainBody)){ print_r($mainBody); }?>
        <?php if(isset($footer)){ print_r($footer); }?>
    </body>
</html>
