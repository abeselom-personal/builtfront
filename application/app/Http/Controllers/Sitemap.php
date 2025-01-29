<?php

namespace App\Http\Controllers;

use App\Models\Landlord\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Sitemap extends Controller
{
    public function get()
    {
        $urls = [];

        // Frontend pages
        $pages = ['', 'contact', 'pricing'];
        foreach ($pages as $page){
            $urls[] = [
                'loc' => url("/$page"),
                'lastmod' => Carbon::now()->startOfWeek()->format('c')
            ];
        }


        // Features
        $features = ['project-management', 'sales-management', 'client-management', 'team-management'];

        foreach ($features as $feature){
            $urls[] = [
                'loc' => url("/page/{$feature}"),
                'lastmod' => Carbon::now()->startOfWeek()->format('c')
            ];
        }

        // "Page"s
        $pages = Page::where('page_status', 'published')->select(['page_permanent_link', 'page_updated'])->get();
        foreach ($pages as $page){
            $urls[] = [
                'loc' => url('/page') . "/{$page->page_permanent_link}",
                'lastmod' => $page->page_updated->format('c')
            ];
        }

        return $this->generate([], $urls);
    }



    private function generate($urlset, $urls)
    {
        return response(view('misc.sitemap', ['urlset' => $urlset, 'urls' => $urls])->render(), 200, [
            "Content-Type" => 'application/xml'
        ]);
    }
}
