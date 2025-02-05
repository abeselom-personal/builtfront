<?php

namespace App\Http\Responses\Projects;
use Illuminate\Contracts\Support\Responsable;

class BudgetsResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    public function toResponse($request) {

        $data = $this->payload['data'];

        // Render the budget view with all data
        $html = view('pages/project/components/tabs/budgets', compact(
            'data',
        ))->render();

        // DOM updates
        $jsondata['dom_html'][] = [
            'selector' => '#embed-content-container',
            'action' => 'replace',
            'value' => $html,
        ];

        // Activate budget tab
        $jsondata['dom_classes'][] = [
            'selector' => '#tabs-menu-budgets',
            'action' => 'add',
            'value' => 'active',
        ];



        return response()->json($jsondata);
    }
}
