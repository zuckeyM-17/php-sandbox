<?php

foreach (Inn::cursor() as $inn) {
    print($inn->name . "\r");
}