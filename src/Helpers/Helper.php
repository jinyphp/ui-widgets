<?php

function code_view($code) {
    //dd($code);
    $code = str_replace("<","&lt;",$code);
    $code = str_replace(">","&gt;",$code);

    $code = str_replace("\"","&quot",$code);

    return $code;
}
