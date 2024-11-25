<?php

namespace App\Http\Controllers;

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

		return view('frontend.templates.masbia-template.blogs', [
			'user' => $request->user(),
			'page' => 'blog'
		]);
	}

	/**
	 * Get blog lists with pagination
	 */
	public function getBlogs(Request $request)
	{
		$offset = $request->input('offset', 0);
		$perPage = 10;

		$query = Blogs::query();

		// Get the blogs with pagination
		$blogs = $query
			->where('publish_date', '<=' ,date('Y-m-d'))
			->orderBy('publish_date', 'desc')
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
	public function view(Request $request, $id): View
	{

		$blog = Blogs::where('id', $id)->firstOrFail();  // Retrieves the blog by slug

		$ogmeta = array(
			'og_title' => $blog->title,
			'og_description' => $blog->description,
			'og_image' => $blog->image
		);

		return view('frontend.templates.masbia-template.blog-detail', [
			'user' => $request->user(),
			'ogcustommeta' => $ogmeta,
			'blog' => $blog
		]);
	}
}
