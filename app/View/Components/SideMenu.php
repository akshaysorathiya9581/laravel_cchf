<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\CampaignMenu;

class SideMenu extends Component
{
    public $mainMenu;

    /**
     * Create a new component instance.
     *
     * @param array $mainMenu
     * @return void
     */
    public function __construct($campaign_id = '17')
    {

        $main_Menu = CampaignMenu::where('type', 'primary')
			->where('campaign_id', $campaign_id)
			->get();

		$mainMenu = $main_Menu->map(function ($primary) {
			return [
				'id' => $primary->id ?? '',
				'text' => $primary->title ?? '',
				'link' => $primary->url ?? '',
			];
		});
        $this->mainMenu = $mainMenu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function render()
    {
        return view('components.side-menu');
    }
}
