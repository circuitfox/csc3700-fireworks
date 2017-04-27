<?php

namespace Tests;

trait TestHelpers {
    // Escapes quotes and other characters in a string
    public function h(string $str) {
        return htmlspecialchars($str, ENT_QUOTES);
    }
}
