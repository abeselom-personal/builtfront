<?php

/** --------------------------------------------------------------------------------
 * This controller manages all the business logic for types
 *
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Responses\Types\CreateResponse;
use App\Http\Responses\Types\IndexResponse;
use App\Http\Responses\Types\DestroyResponse;
use App\Http\Responses\Types\EditResponse;
use App\Http\Responses\Types\StoreResponse;
use App\Http\Responses\Types\UpdateResponse;
use App\Repositories\TypeRepository;
use App\Rules\NoTags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;

class Types extends Controller {

    /**
     * The type repository instance.
     */
    protected $typerepo;

    /**
     * Valid type resources
     */
    protected $resource_types;

    public function __construct(TypeRepository $typerepo) {

        // Parent constructor
        parent::__construct();

        // Authentication
        $this->middleware('auth');
        $this->middleware('adminCheck');

        // Type repository
        $this->typerepo = $typerepo;

        // Valid resource types
        $this->resource_types = [
            'item' // Focus on item types only
        ];

    }

    /**
     * Display a listing of types
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request) {

        // Page settings
        $page = $this->pageSettings();

        // Get types
        $types = $this->typerepo->search();
        $this->applyCount($types);

        // Response payload
        $payload = [
            'page' => $page,
            'types' => $types,
        ];

        // Log types
        Log::info('Types', ['types' => $types]);

        // Show view
        return new IndexResponse($payload);
    }

    /**
     * Show the form for creating a new type
     * @return \Illuminate\Http\Response
     */
    public function create() {

        // Page settings
        $page = $this->pageSettings('create');

        // Response payload
        $payload = [
            'page' => $page,
        ];

        // Show form
        return new CreateResponse($payload);
    }

    /**
     * Store a newly created type
     * @return \Illuminate\Http\Response
     */
    public function store() {

        // Validate input
        $validator = Validator::make(request()->all(), [
            'name' => ['required', new NoTags]
        ]);

        // Handle errors
        if ($validator->fails()) {
            $messages = implode('<li>', $validator->errors()->all());
            abort(409, $messages);
        }

        // Check duplicates
        if (\App\Models\Type::where('name', request('name'))->exists()) {
            abort(409, __('lang.type_already_exists'));
        }

        // Create type
        if (!$type_id = $this->typerepo->create()) {
            abort(409, __('lang.error_request_could_not_be_completed'));
        }

        // Get created type
        $types = $this->typerepo->search($type_id);
        $this->applyCount($types);

        // Response payload
        $payload = [
            'types' => $types,
        ];

        return new StoreResponse($payload);
    }

    /**
     * Show the form for editing a type
     * @param int $id Type ID
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {

        // Page settings
        $page = $this->pageSettings('edit');
        $page['section'] = 'edit';

        // Get type
        $types = $this->typerepo->search($id);
        if (!$type = $types->first()) {
            abort(409, __('lang.error_loading_item'));
        }
        $types = $this->typerepo->search();

        // Response payload
        $payload = [
            'page' => $page,
            'type' => $type,
            'types' => $types,
        ];
        Log::info('Types after update', ['types' => $types]);

        return new EditResponse($payload);
    }

    /**
     * Update a type
     * @param int $id Type ID
     * @return \Illuminate\Http\Response
     */
    public function update($id) {
        Log::info('Updating type', ['id' => $id]);


        // Validate input
        $validator = Validator::make(request()->all(), [
            'name' => ['required', new NoTags]
        ]);

        // Handle errors
        if ($validator->fails()) {
            $messages = implode('<li>', $validator->errors()->all());
            abort(409, $messages);
        }

        // Check duplicates
        if (\App\Models\Type::where('name', request('name'))
            ->where('id', '!=', $id)
            ->exists()) {
            abort(409, __('lang.type_already_exists'));
        }

        // Update type
        if (!$this->typerepo->update($id)) {
            abort(409, __('lang.error_request_could_not_be_completed'));
        }

        // Get updated types
        $types = $this->typerepo->search();
        $this->applyCount($types);

        // Response payload
        $payload = [
            'types' => $types,
        ];
        return new UpdateResponse($payload);
    }

    /**
     * Delete a type
     * @param int $id Type ID
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        if (!\App\Models\Category::find($id)) {
            abort(409, __('lang.error_request_could_not_be_completed'));
        }

        //get it in useful format
        $type = $this->typerepo->search($id);
        $this->applyCount($type);
        $type = $type->first();

        //delete the category
        $type->delete();
        $payload = [
            'id' => $id,
        ];
        return new DestroyResponse($payload);
    }

    // /**
    //  * Calculate item counts for types
    //  * @param mixed $types
    //  */
    private function applyCount($types = '') {
        if ($types instanceof \Illuminate\Pagination\LengthAwarePaginator) {
            foreach ($types as $type) {
                $type->count = $type->count_items;
            }
        }
    }


    /**
     * basic page setting for this section of the app
     * @param string $section page section (optional)
     * @param array $data any other data (optional)
     * @return array
     */
    private function pageSettings($section = '', $data = []) {

        //common settings
        $page = [
            'crumbs' => [
                __('lang.settings'),
                __('lang.types'),
            ],
            'crumbs_special_class' => 'list-pages-crumbs',
            'page' => 'types',
            'no_results_message' => __('lang.item_not_found'),
            'add_button_classes' => 'add-edit-invoice-button',
            'load_more_button_route' => 'types',
            'meta_title' => __('lang.types'),
            'heading' => __('lang.types'),
            'source' => 'list',
            'form_label_type_name' => __('lang.type_name'),
            'form_label_move_items' => __('lang.move_to_another_type'),
        ];

        config([
            //visibility - add project buttton
            'visibility.list_page_actions_add_button' => true,
            //visibility - filter button
            'visibility.list_page_actions_filter_button' => false,
            //visibility - search field
            'visibility.list_page_actions_search' => false,
            //visibility - toggle stats
            'visibility.stats_toggle_button' => false,
            'visibility.left_menu_toggle_button' => true,
        ]);

        //default modal settings (modify for sepecif sections)
        $page += [
            'add_modal_title' => __('lang.add_type'),
            'add_modal_create_url' => url('types/create'),
            'add_modal_action_url' => url('types'),
            'add_modal_action_ajax_class' => '',
            'add_modal_action_ajax_loading_target' => 'commonModalBody',
            'add_modal_action_method' => 'POST',
            'edit_modal_action_title' => __('lang.edit_type'),
        ];

        //ext page settings
        if (request('source') == 'ext') {
            $page += [
                'list_page_actions_size' => 'col-lg-12',
            ];
        }

        //[tickets] change settings for this type category
        if (request('filter_category_type') == 'ticket' || in_array($section, ['ticket', 'milestone'])) {
            $page['crumbs'] = [
                __('lang.settings'),
                __('lang.tickets'),
                __('lang.departments'),
            ];
            $page['heading'] = __('lang.tickets');
            $page['add_modal_title'] = __('lang.add_department');
            $page['form_label_category_name'] = __('lang.department_name');
            $page['form_label_move_items'] = __('lang.move_tickets_to_another_department');
            $page['edit_modal_action_title'] = __('lang.edit_department');
        }

        //create new resource
        if ($section == 'create') {
            $page += [
                'section' => 'create',
            ];
            return $page;
        }

        //return
        return $page;
    }
}
