<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

    /**
     * @primaryKey string - primary key column.
     * @dateFormat string - date storage format
     * @guarded string - allow mass assignment except specified
     * @CREATED_AT string - creation date column
     * @UPDATED_AT string - updated date column
     */
    protected $table = 'types';
    protected $primaryKey = 'id';
    protected $dateFormat = 'Y-m-d H:i:s';
    protected $guarded = ['id'];
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    /**
     * Relationship business rules:
     * - The Type can have many Items
     * - The Item belongs to one Type
     */
    public function items() {
        return $this->hasMany('App\Models\Item', 'type_id', 'id');
    }

    /**
     * Relationship business rules (if needed for user assignments):
     * - The Type can be assigned to many Users
     * - The User can have many Types
     */
    public function users() {
        return $this->belongsToMany('App\Models\User', 'type_users', 'typeuser_typeid', 'typeuser_userid');
    }

    /**
     * Accessor: Count of related items
     * @usage $type->count_items
     */
    public function getCountItemsAttribute() {
        return $this->items()->count();
    }

    /**
     * Accessor: Formatted created date
     * @usage $type->formatted_created
     */
    public function getFormattedCreatedAttribute() {
        return date('M d, Y', strtotime($this->type_created));
    }

    /**
     * Accessor: Formatted updated date
     * @usage $type->formatted_updated
     */
    public function getFormattedUpdatedAttribute() {
        return date('M d, Y', strtotime($this->type_updated));
    }
}
