<?php

if (isset($_GET['keyword'])) {
    header('Location:search-'.$_GET['keyword']);
} else {
    echo 'coucou';
    header('Location:home-1');
}