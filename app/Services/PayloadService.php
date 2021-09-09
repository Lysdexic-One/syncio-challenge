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

    /**
     * Takes a payload ID and returns matched payload from the repository
     * @param int $id
     * @return string
     */
    #[Pure] public function getPayload(int $id): string|null
    {
        /**
         * Ask repository for a payload
         */
        return $this->payloadRepository->getPayload($id);
    }

}
