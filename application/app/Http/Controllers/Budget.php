<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\BudgetItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    // Get all budgets
    public function getAll()
    {
        $budgets = Budget::with('items')->get();
        return response()->json($budgets);
    }
    public function insert(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'cost' => 'required|numeric',
            'markup' => 'required|numeric',
            'margin' => 'required|numeric',
        ]);

        $item = BudgetItem::create($data);

        return response()->json($item);
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'ids' => 'required|array',
        ]);

        $items = BudgetItem::whereIn('id', $data['ids'])->get();

        return response()->json($items);
    }

    // Get budget details by product ID
    public function getByProductId($productId)
    {
        Log::info('Getting budget by product ID', ['product_id' => $productId]);
        $budgetItems = BudgetItem::where('item_id', $productId)->with('budget')->get();
        Log::info('Budget items retrieved', ['budget_items' => $budgetItems]);
        return response()->json($budgetItems);
    }

    // Create a new budget and budget items
    public function create(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'items' => 'required|array',
            'items.*.item_id' => 'required|exists:items,id',
            'items.*.markup' => 'nullable|numeric',
            'items.*.margin' => 'nullable|numeric',
            'items.*.cost' => 'nullable|numeric'
        ]);

        DB::transaction(function () use ($request) {
            $budget = Budget::create(['project_id' => $request->project_id]);

            foreach ($request->items as $item) {
                BudgetItem::create([
                    'budget_id' => $budget->id,
                    'item_id' => $item['item_id'],
                    'markup' => $item['markup'] ?? 0,
                    'margin' => $item['margin'] ?? 0,
                    'cost' => $item['cost'] ?? 0,
                ]);
            }
        });

        return response()->json(['message' => 'Budget created successfully']);
    }

    // Update budget items
    public function update(Request $request, $id)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.id' => 'required|exists:budget_items,id',
            'items.*.markup' => 'nullable|numeric',
            'items.*.margin' => 'nullable|numeric',
            'items.*.cost' => 'nullable|numeric'
        ]);

        DB::transaction(function () use ($request) {
            foreach ($request->items as $item) {
                BudgetItem::where('id', $item['id'])->update([
                    'markup' => $item['markup'] ?? 0,
                    'margin' => $item['margin'] ?? 0,
                    'cost' => $item['cost'] ?? 0,
                ]);
            }
        });

        return response()->json(['message' => 'Budget updated successfully']);
    }

    // Calculate total cost, markup, and margin for a budget
    public function calculate($budgetId)
    {
        $budgetItems = BudgetItem::where('budget_id', $budgetId)->get();
        $totalCost = $budgetItems->sum('cost');
        $totalMarkup = $budgetItems->sum('markup');
        $totalMargin = $budgetItems->sum('margin');

        return response()->json([
            'total_cost' => $totalCost,
            'total_markup' => $totalMarkup,
            'total_margin' => $totalMargin,
        ]);
    }
}
