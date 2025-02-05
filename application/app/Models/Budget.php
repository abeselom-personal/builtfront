<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = ['project_id'];

    public function items()
    {
        return $this->hasMany(BudgetItem::class);
    }

    public function calculateTotals()
    {
        return [
            'total_cost' => $this->items()->sum('cost'),
            'total_markup' => $this->items()->sum('markup'),
            'total_margin' => $this->items()->sum('margin'),
        ];
    }
}
