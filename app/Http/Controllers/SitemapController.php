<?php

namespace App\Http\Controllers;


use Faker\Provider\DateTime;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Roumen\Sitemap\Sitemap;
use App\Models\Events;

class SitemapController extends Controller
{
    public function generate_sitemap()
    {
        // create new sitemap object
        $sitemap = App::make('sitemap');

        $sitemap->add(URL::to('/'), date('Y-m-d H:i:s'), '1.0', 'daily');
        $sitemap->add(URL::to('/login'), date('Y-m-d H:i:s'), '1.0', 'never');
        $sitemap->add(URL::to('/register'), date('Y-m-d H:i:s'), '1.0', 'never');
        $sitemap->add(URL::to('/organisateur/evenement/ajouter'), date('Y-m-d H:i:s'), '1.0', 'never');
        $sitemap->add(URL::to('/a-propos'), date('Y-m-d H:i:s'), '0.9', 'never');
        $sitemap->add(URL::to('/faq'), date('Y-m-d H:i:s'), '0.9', 'never');
        $sitemap->add(URL::to('/conditions-generales'), date('Y-m-d H:i:s'), '0.9', 'never');
        $sitemap->add(URL::to('/infos-billets'), date('Y-m-d H:i:s'), '0.9', 'never');
        $sitemap->add(URL::to('/contact'), date('Y-m-d H:i:s'), '0.9', 'never');
        $sitemap->add(URL::to('/vie-prive'), date('Y-m-d H:i:s'), '0.9', 'never');

        // get all products from db (or wherever you store them)
        //$events = DB::table('events')->orderBy('created_at', 'desc')->get();
        $events = Events::orderBy('created_at', 'desc')->get();

        // counters
        $counter = 0;
        $sitemapCounter = 0;
        $i=0;
        // add every product to multiple sitemaps with one sitemap index
        foreach ($events as $e) {
            if ($e->publie) {
                if ($counter == 50000) {
                    $sitemap->store('xml', 'sitemap-' . $sitemapCounter);
                    $sitemap->addSitemap(secure_url('sitemap-' . $sitemapCounter . '.xml'));
                    $sitemap->model->resetItems();
                    $counter = 0;
                    $sitemapCounter++;
                }
                $images[$counter][] = array(
                    'url' => url('/public/img/' . $e->image),
                    'title' => $e->title,
                    'caption' => $e->title
                );
                $string_url_detail = "/evenement/".$e->sous_menus->name ."/".date('Y-m-d',strtotime($e->date_debut_envent)) . "_".  str_slug($e->title)."_".$e->id;
                $sitemap->add(url($string_url_detail), $e->updated_at, '0.8', 'monthly',$images[$i]);
                $counter++;
                $i++;
            }
        }
        //dd($images);
        // you need to check for unused items
        if (!empty($sitemap->model->getItems())) {
            // generate sitemap with last items
            $sitemap->store('xml', 'sitemap-' . $sitemapCounter);
            // add sitemap to sitemaps array
            $sitemap->addSitemap(secure_url('public/sitemap-' . $sitemapCounter . '.xml'));
            // reset items array
            $sitemap->model->resetItems();
        }

        // generate new sitemapindex that will contain all generated sitemaps above
        $sitemap->store('sitemapindex', 'sitemap');
    }
}
