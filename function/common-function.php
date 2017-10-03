<?php

function nl2p($text) {
    return "<p>" . str_replace("\n", "</p><p>", $text) . "</p>";
}
