<?php

/** --------------------------------------------------------------------------------
 * This class renders the response for the [index] process for the items
 * controller
 * @package    Grow CRM
 * @author     NextLoop
 *----------------------------------------------------------------------------------*/

namespace App\Http\Responses\Types;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Log;

class IndexResponse implements Responsable {

    private $payload;

    public function __construct($payload = array()) {
        $this->payload = $payload;
    }

    /**
     * render the view for items
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request) {

        //set all data to arrays
        foreach ($this->payload as $key => $value) {
            $$key = $value;
        }

        //was this call made from an embedded page/ajax or directly on temp page
        if (request('source') == 'ext' || request('action') == 'search' || request()->ajax()) {

            //template and dom - for additional ajax loading
            switch (request('action')) {
                case 'load':
                    $template = 'pages/types/components/table/ajax';
                    $dom_container = '#items-td-container';
                    $dom_action = 'append';
                    break;

                case 'sort':
                    $template = 'pages/types/components/table/ajax';
                    $dom_container = '#items-td-container';
                    $dom_action = 'replace';
                    break;

                case 'search':
                    $template = 'pages/types/components/table/wrapper';
                    $dom_container = '#items-table-wrapper';
                    $dom_action = 'replace';
                    break;

                default:
                    $template = 'pages/types/tabswrapper';
                    $dom_container = '#embed-content-container';
                    $dom_action = 'replace';
                    break;
            } // <-- Add this closing brace here

            //load more button - change the page number and determine buttons visibility
            if ($types->currentPage() < $types->lastPage()) {
                $url = loadMoreButtonUrl($types->currentPage() + 1, request('source'));
                $jsondata['dom_attributes'][] = array(
                    'selector' => '#load-more-button',
                    'attr' => 'data-url',
                    'value' => $url);
                $jsondata['dom_visibility'][] = array('selector' => '.loadmore-button-container', 'action' => 'show');
                $page['visibility_show_load_more'] = true;
                $page['url'] = $url;
            } else {
                $jsondata['dom_visibility'][] = array('selector' => '.loadmore-button-container', 'action' => 'hide');
            }            //flip sorting url for this particular link
            if (request('action') == 'sort') {
                $sort_url = flipSortingUrl(request()->fullUrl(), request('sortorder'));
                $element_id = '#sort_' . request('orderby');
                $jsondata['dom_attributes'][] = array(
                    'selector' => $element_id,
                    'attr' => 'data-url',
                    'value' => $sort_url);
            }

            //render the view and save to json
            $html = view($template, compact('page', 'types'))->render();
            $jsondata['dom_html'][] = array(
                'selector' => $dom_container,
                'action' => $dom_action,
                'value' => $html);

            //move the actions buttons
            if (request('source') == 'ext' && request('action') == '') {
                $jsondata['dom_move_element'][] = array(
                    'element' => '#list-page-actions',
                    'newparent' => '.parent-page-actions',
                    'method' => 'replace',
                    'visibility' => 'show');
                $jsondata['dom_visibility'][] = [
                    'selector' => '#list-page-actions-container',
                    'action' => 'show',
                ];
            }

            //update breadcrumbs
            $html = view('misc/heading-crumbs', compact('page'))->render();
            $jsondata['dom_html'][] = array(
                'selector' => '#breadcrumbs',
                'action' => 'replace-with',
                'value' => $html);


                //POSTRUN FUNCTIONS------
            $jsondata['postrun_functions'][] = [
                'value' => 'NXBootItems',
            ];

            //ajax response
            Log::info('Types/IndexResponse: ', $jsondata);
            return response()->json($jsondata);

        }else {
            abort(404);
        }
    }
}
