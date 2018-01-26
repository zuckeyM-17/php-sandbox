<?php

Inn::chunk(100, function ($inns) {
    foreach ($inns as $inn) {
        print($inn->name . "\r");
    }
});