<?php

function redict_to($url = "?page=home") {
    if(!empty($url)) {
        header("Location: {$url}");
    }
}