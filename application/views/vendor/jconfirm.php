<link rel="stylesheet" href="<?php echo site_url('common/vendor/jconfirm/dist/jquery-confirm.min.css') ?>"/>
<script src="<?php echo site_url('common/vendor/jconfirm/dist/jquery-confirm.min.js') ?>"></script>
<script>
function notif(msg){
    $.alert({
        title: 'Ok!',
        confirmButtonClass: 'btn-info',
        content: msg+' !'
    });
}
</script>