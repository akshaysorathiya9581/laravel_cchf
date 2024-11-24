<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Donations;
use App\Models\CampaignMenu;
use Illuminate\Http\JsonResponse;

class BillingController extends Controller
{
	/**
	 * Display users billing page
	 */
	public function index(Request $request): View
	{

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

		return view('frontend.templates.masbia-template.user-billing', [
			'user' => $request->user(),
			'mainMenu' => $mainMenu
		]);
	}

	/**
	 * Get Donation Data
	 */
	public function getDonationList(Request $request): JsonResponse
	{

		$pageNo = $request->input('page', 1);
		$perPage = $request->input('perPage', 10);
		$offset = ($pageNo - 1) * $perPage;

		// Get the paginated donations
		$billing = Donations::with('campaign:id,org_name')
			->select('id', 'donated_amount', 'recurring', 'status', 'created_at', 'campaign_id')
			->orderBy('id', 'desc')
			->offset($offset)
			->limit($perPage)
			->get();

		// Get the total count to calculate pagination
		$total = Donations::count();

		// Calculate the total number of pages
		$totalPages = ceil($total / $perPage);

		// Return the data and pagination information
		$pagination = view('frontend.templates.masbia-template.pagination', [
			'totalPages' => $totalPages,
			'perPage' => $perPage,
			'offset' => $offset,
			'pageNo' => $pageNo
		])->render();

		return response()->json([
			'success' => true,
			'billing' => $billing,
			'totalPages' => $totalPages,
			'pagination' => $pagination,
		]);
	}

	/**
	 * Get Donation Detail
	 */
	public function donationDetail(Request $request): JsonResponse
	{

		$billing = Donations::with('campaign:id,org_name')
			->where('id',$request->id)
			->first();

		return response()->json([
			'success' => true,
			'billing' => $billing
		]);
	}
}
