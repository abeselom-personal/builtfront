<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetItem extends Model
{
    use HasFactory;

    protected $fillable = ['budget_id', 'item_id', 'markup', 'margin', 'cost'];

    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }
}
