<?php

namespace App\Http\Controllers;

use App\Services\DiffService;
use App\Services\PayloadService;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

/**
 * Create a controller that will handle all of our views non display logic
 */

class DiffController extends Controller
{
    public function __construct(protected PayloadService $payloadService, protected DiffService $diffService)
    {
    }

    /**
     * returns the getDiff view to the route
     * @return View
     */
    public function getDiff(): View
    {
        /**
         * Get each payload from the payload repository via the payload service
         *
         * This implements the Service Payload pattern
         */
        $payload1 = $this->payloadService->getPayload(1);
        $payload2 = $this->payloadService->getPayload(2);

        /**
         * Get the difference between the two payloads
         */
        $diff = $this->diffService->getDiff($payload1, $payload2);

        /**
         * return the view to the route engine with the blade vars inserted
         */
        return view(
            'getDiff',
            ['payload1' => $payload1, 'payload2' => $payload2, 'diff' => $diff]
        );
    }
}
