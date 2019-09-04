<?php

if (isset($_GET['keyword'])) {
    header('Location:search-'.$_GET['keyword']);
} else {
    header('Location:home-1');
}