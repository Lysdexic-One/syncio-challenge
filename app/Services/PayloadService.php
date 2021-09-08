<?php

namespace App\Services;

use App\Repositories\PayloadRepository;
use Fisharebest\Algorithm\MyersDiff;
use JetBrains\PhpStorm\Pure;

class PayloadService
{
    public function __construct(protected PayloadRepository $payloadRepository)
    {
    }

    #[Pure] public function getPayload(int $id): string
    {
        return $this->payloadRepository->getPayload($id);
    }

    public function getDiff(string $payload1, $payload2): array
    {
        $algorithm = new MyersDiff;
        $array1 = preg_split("/((\r?\n)|(\r\n?))/", $payload1);
        $array2 = preg_split("/((\r?\n)|(\r\n?))/", $payload2);

//        if (count($array1) < count($array2) ) {
//            return $algorithm->calculate($array2, $array1);
//        }

        return $algorithm->calculate($array1, $array2);
    }
}
