<?php
$target = '{{server-path}}/etc/public/uploads';
$shortcut = 'uploads';
symlink($target, $shortcut);
?>