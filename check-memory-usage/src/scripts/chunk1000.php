<?php

Inn::chunk(1000, function ($inns) {
    foreach ($inns as $inn) {
        print($inn->name . "\r");
    }
});