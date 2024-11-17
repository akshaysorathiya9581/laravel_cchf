<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\CampaignMenu;
use App\Models\Notification;
use Illuminate\Http\JsonResponse;

class NotificationController extends Controller
{
    /**
     * Display the user's notification setting.
     */
    public function edit(Request $request): View
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

        $notification = Notification::where(['user_id' => Auth::user()->id, 'campaign_id' => 17])->first();
        return view('frontend.templates.masbia-template.user-notification', [
            'user' => $request->user(),
            'mainMenu' => $mainMenu,
            'notification' => $notification,
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $post = $request->all();
        unset($post['_token']);
        Notification::updateOrInsert(
            ['user_id' => Auth::user()->id, 'campaign_id' => 17],  // The conditions to check for existing record
            $post
        );

        return response()->json([
            'success' => true,
            'message' => 'Notification updated..',
        ]);
    }

}
