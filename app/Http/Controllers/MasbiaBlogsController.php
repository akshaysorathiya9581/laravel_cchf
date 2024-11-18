<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Models\CampaignMenu;
use App\Models\Blogs;

class MasbiaBlogsController extends Controller
{
	/**
	 * Blogs Listing Page
	 */
	public function index(Request $request): View
	{

		$mainMenu = $this->getMainMenu();

		return view('frontend.templates.masbia-template.blogs', [
			'user' => $request->user(),
			'mainMenu' => $mainMenu
		]);
	}

	/**
	 * Get blog lists with pagination
	 */
	public function getBlogs(Request $request)
	{
		$searchTerm = $request->input('search', '');
		$offset = $request->input('offset', 0);  // Default offset to 0
		$perPage = $request->input('per_page', 10);  // Default to 10 per page

		// Start building the query
		$query = Blogs::query();

		// Add condition for search term (name)
		if (!empty($searchTerm)) {
			$query->where('title', 'like', '%' . $searchTerm . '%')
				->orWhere('author', 'like', '%' . $searchTerm . '%');
		}

		// Get the blogs with pagination
		$blogs = $query->orderBy('id', 'desc')
			->skip($offset)
			->take($perPage)
			->get();

		// Check if there are more blogs to load
		$hasMore = $query->skip($offset + $perPage)->exists();

		// Return the blogs and pagination status
		return response()->json([
			'blogs' => view('frontend.templates.masbia-template.blogs.blog-list', compact('blogs'))->render(),
			'hasMore' => $hasMore
		]);
	}


	/**
	 * Blog view page
	 */
	public function view(Request $request, $slug): View
	{

		$mainMenu = $this->getMainMenu();
		$blog = Blogs::where('slug', $slug)->firstOrFail();  // Retrieves the blog by slug

		return view('frontend.templates.masbia-template.blog-detail', [
			'user' => $request->user(),
			'mainMenu' => $mainMenu,
			'blog' => $blog
		]);
	}

	protected function getMainMenu() {

		$main_Menu = CampaignMenu::where('type', 'primary')
			->where('campaign_id', 17)
			->get();

		$mainMenu = $main_Menu->map(function ($primary) {
			return [
				'id' => $primary->id ?? '',
				'text' => $primary->title ?? '',
				'link' => $primary->url ?? '',
			];
		});

		return $mainMenu;
	}
}
