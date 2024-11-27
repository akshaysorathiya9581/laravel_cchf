<?php

namespace App\Http\Controllers;

use App\Mail\VolunteerNotification;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class VolunteerController extends Controller
{
	/**
	 * Volunteer Signup Page
	 */
	public function index(Request $request): View
	{

		$user = auth()->user();

		return view('frontend.templates.masbia-template.volunteer', [
			'user' => $request->user(),
			'page' => 'volunteer'
		]);
	}

    /**
     * save volunteer data
     */
    public function save(Request $request)
    {

        $rules = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email_id' => 'required|email|max:255',
            'phone_no' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'post_code' => 'required|string|max:20',
            'country' => 'required|string|max:255',
            'email_updates' => 'nullable|in:yes', // Optional field
            'roles' => 'required|array|min:1', // At least one role should be selected
            'vol_opportunity' => 'required|string|in:An ongoing opportunity,Occasional opportunity,One-time', // Ensures valid options
            'special_skills' => 'required|string|max:1000',
            'venue' => 'required|array|min:1', // At least one venue should be selected
            'avail_day' => 'required|array|min:1', // At least one day must be selected
            'avail_day.*' => 'string|in:monday,tuesday,wednesday,thursday,friday', // Valid days
            'avail_time' => 'required|array|min:1', // At least one time must be selected
            'avail_time.*' => 'string|in:morning,afternoon,evening', // Valid times
            'emergency_contact' => 'required|string|max:15',
            'contact_relationship' => 'required|string|max:255',

            // Conditional validation if volunteering as a group
            'group_name' => 'nullable|required_if:is_group,yes|string|max:255',
            'adults_in_group' => 'nullable|required_if:is_group,yes|integer|min:1',
            'children_in_group' => 'nullable|required_if:is_group,yes|integer|min:0',
        ];

        // Validate the request data
        $validated = $request->validate($rules);
        $validated['is_group'] = (!empty($validated['is_group'])) ? 'no' : 'yes';

        try {

            setSendgridApiKey();

            Mail::to('divyesh.developer7@gmail.com')->send(new VolunteerNotification((object) $validated));
            $message = 'Volunteer information submitted successfully!';

        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message,
            'data' => $validated
        ]);
    }
}
