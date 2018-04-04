<?php

    /*
     * Format the date
     */
    function formatDate($date){

        return date('F j, Y, g:i A', strtotime($date));
    }