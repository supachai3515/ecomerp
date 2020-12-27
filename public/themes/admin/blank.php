<?php
    echo Template::message();
    echo isset($content) ? $content : Template::content();
?>