<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\OpenGraph;

class OpenGraphMeta extends Component
{
    public $og_title;
    public $og_description;
    public $og_image;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($page = 'blog')
    {
        // Retrieve the OpenGraph data based on the current route or URI
        $ogData = OpenGraph::where('page', $page)->first();

        // Fallback to default values if no data is found
        if (!$ogData) {
            $ogData = (object) [
                'og_title' => 'Masbia donation',
                'og_description' => 'Masbia donation',
                'og_image' => '',
            ];
        }

        $this->og_title = $ogData->og_title;
        $this->og_description = $ogData->og_description;
        $this->og_image = $ogData->og_image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.open-graph-meta');
    }
}
