<?php

foreach(Inn::all() as $i => $inn) {
    print($inn->name . "\r");
}