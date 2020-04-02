<?php
$target = '/home/accasrilanka/etc.acca.lk/etc/public/uploads';
$shortcut = 'uploads';
symlink($target, $shortcut);
?>