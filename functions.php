<?php
    function getLink($link)
    {
        return "http://" . $_SERVER['HTTP_HOST'] . "/" . getSiteBase() . "/" . $link;
    }

    function getSiteBase()
    {
        return __BASE__;
    }
?>