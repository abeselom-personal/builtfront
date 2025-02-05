<?php

/** --------------------------------------------------------------------------------
 * This repository class manages all the data abstraction for types
 *
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Log;

class TypeRepository {

    /**
     * The type repository instance.
     */
    protected $types;

    /**
     * Inject dependencies
     */
    public function __construct(Type $types) {
        $this->types = $types;
    }

    /**
     * Get all types
     * @return object
     */
    public function get() {

        //new query
        $query = $this->types->newQuery();

        //sort
        $query->orderBy('name', 'asc');

        //get
        return $query->get();
    }

    /**
     * Search model
     * @param int $id optional for getting a single, specified record
     * @return object type collection
     */
    public function search($id = '') {

        $types = $this->types->newQuery();

        //joins

        // all fields
        $types->selectRaw('*');

        //count related items
        $types->selectRaw('(SELECT COUNT(*)
                            FROM items
                            WHERE id = types.id)
                            AS count_items');

        //default where
        $types->whereRaw("1 = 1");

        //filters: id
        if (request()->filled('filter_id')) {
            $types->where('id', request('filter_id'));
        }
        if (is_numeric($id)) {
            $types->where('id', $id);
        }

        //search: various columns
        if (request()->filled('search_query') || request()->filled('query')) {
            $types->where(function ($query) {
                $query->where('name', 'LIKE', '%' . request('search_query') . '%');
            });
        }

        //sorting
        if (in_array(request('sortorder'), array('desc', 'asc')) && request('orderby') != '') {
            //direct column name
            if (Schema::hasColumn('types', request('orderby'))) {
                $types->orderBy(request('orderby'), request('sortorder'));
            }
        } else {
            //default sorting
            $types->orderBy('id', 'asc');
        }

        // Get the results and return them.
        return $types->paginate(config('system.settings_system_pagination_limits'));
    }

    /**
     * Create a new type record
     * @return mixed int|bool
     */
    public function create() {

        //save new type
        $type = new $this->types;

        //data
        $type->name = request('name');

        //save and return id
        if ($type->save()) {
            //add slug
            $type->save();
            return $type->id;
        } else {
            return false;
        }
    }

    /**
     * Update a type record
     * @param int $id record id
     * @return mixed int|bool
     */
    public function update($id) {

        //get the record
        if (!$type = $this->types->find($id)) {
            return false;
        }

        //update fields
        $type->name = request('name');

        //save
        if ($type->save()) {
            //update slug
            $type->save();
            return $type->id;
        } else {
            return false;
        }
    }

    /**
     * Get types with their related items
     * @return object
     */
    public function getTypeItems() {

        //new query
        $types = $this->types->newQuery();

        //sort
        $types->orderBy('name', 'asc');

        //eager load items
        $types->with([
            'items' => function ($query) {
                $query->orderBy('item_name', 'asc');
            },
        ]);

        //get
        return $types->get();
    }
}
