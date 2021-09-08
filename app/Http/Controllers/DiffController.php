<?php

namespace App\Http\Controllers;

use App\Services\PayloadService;
use Fisharebest\Algorithm\MyersDiff;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class DiffController extends Controller
{
    public function __construct(protected PayloadService $payloadService)
    {
    }

    public function getDiff(): View
    {
        $payload1 = $this->payloadService->getPayload(1);
        $payload2 = $this->payloadService->getPayload(2);
        $diff = $this->payloadService->getDiff($payload1, $payload2);
        $stitch = '';

//        foreach ($diff as $char) {
//            if ($char[1] === MyersDiff::INSERT) {
//                $stitch .= "\n+ {$char[0]}";
//                continue;
//            }
//            if ($char[1] === MyersDiff::DELETE) {
//                $stitch .= "\n- {$char[0]}";
//                continue;
//            }
//            $stitch .= "\n$char[0]";
//        }

//        $payload1 = json_decode($payload1);
//        $payload2 = json_decode($payload2);

        return view(
            'getDiff',
            ['payload1' => $payload1, 'payload2' => $payload2, 'diff' => $diff]
        );
    }
}
