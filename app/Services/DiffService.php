<?php

namespace App\Services;

use Fisharebest\Algorithm\MyersDiff;

class DiffService
{
    public function getDiff(string $payload1, $payload2): array
    {
        /**
         * Instantiate the MyersDiff object from fisharegreat/algorithm library
         */
        $algorithm = new MyersDiff;

        /**
         * split each line of the payload into an array, this will allow the Myers algorithm to compare line by line
         */
        $payload1Array = preg_split("/((\r?\n)|(\r\n?))/", $payload1);
        $payload2Array = preg_split("/((\r?\n)|(\r\n?))/", $payload2);

        /**
         * Calculate the difference between the two payloads
         */
        return $algorithm->calculate($payload1Array, $payload2Array);
    }
}
