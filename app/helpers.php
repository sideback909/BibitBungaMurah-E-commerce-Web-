<?php

function editDuit($price)
{
    return number_format($price * 1000);
    // return number_format('$%i', $price * 1000);
}