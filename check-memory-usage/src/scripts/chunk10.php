<?php

Inn::chunk(10, function ($inns) {
    foreach ($inns as $inn) {
        print($inn->name . "\r");
    }
});