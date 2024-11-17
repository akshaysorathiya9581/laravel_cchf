<?php

namespace App\Http\Controllers;

use App\Models\banners;
use App\Models\campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Services\FileUploadService;
use App\Exceptions\FileUploadException;
use Illuminate\Support\Facades\DB;
use Exception;

class bannerController extends Controller
{

    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
    }


    public function store(Request $request, $slug)
    {
        // dd($request->all());

        $campaign = campaign::where('slug', $slug)->firstOrFail();
        $validator = Validator::make($request->all(), [
            'banner_type' => 'required|in:file,text',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'text_main_content' => 'nullable|string',
            'text_sub_content' => 'nullable|string',
            'text_amount' => 'nullable|string',
            'text_button' => 'nullable|string',
            'text_button_link' => 'nullable|string',
            'secondary_button_content' => 'nullable|string',
            'secondary_button_url' => 'nullable|string',
            'file_mobile_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'file_desktop_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'text_mobile_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'text_desktop_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validator->after(function ($validator) use ($request) {
            if ($request->start_date) {
                $query = banners::query();

                if ($request->end_date) {
                    $query->where(function ($query) use ($request) {
                        $query->where('start_date', '<=', $request->end_date)
                            ->where('end_date', '>=', $request->start_date)
                            ->where('campaign_id', $request->campaign_id);
                    });
                } else {
                    $query->where('start_date', '>=', $request->start_date)
                        ->where('campaign_id', $request->campaign_id);
                }

                $overlappingBanners = $query->exists();

                if ($overlappingBanners) {
                    $validator->errors()->add('date_range', 'The selected date range overlaps with an existing banner.');
                }
            }

            if ($request->banner_type === 'file') {
                $mobileImage = $request->hasFile('file_mobile_image');
                $desktopImage = $request->hasFile('file_desktop_image');

                if (!$mobileImage && !$desktopImage) {
                    $validator->errors()->add('images', 'You must upload at least one of mobile image or desktop image.');
                }
            }

            if ($request->banner_type === 'text') {
                $mobileTextImage = $request->hasFile('text_mobile_image');
                $desktopTextImage = $request->hasFile('text_desktop_image');

                if (!$mobileTextImage && !$desktopTextImage) {
                    $validator->errors()->add('text_images', 'You must upload at least one of mobile image or desktop image.');
                }
            }
        });



        if ($validator->fails()) {
            return response()->json(['error' => 'Failed to Add banner.', 'messages' => $validator->errors()], 422);
        }

        $bannerData = $request->only([
            'file_title',
            'text_main_content',
            'text_sub_content',
            'text_button',
            'text_button_link',
            'text_amount',
            'start_date',
            'end_date',
            'banner_type',
            'secondary_button_url',
            'secondary_button_content'
        ]);
        $bannerData['campaign_id'] = $campaign->id;
        $fileFields = [
            'file_desktop_image',
            'file_mobile_image',
            'text_desktop_image',
            'text_mobile_image'
        ];

        foreach ($fileFields as $fileField) {
            if ($request->hasFile($fileField)) {
                try {
                    $fileUrl = $this->fileUploadService->uploadFile($request, $fileField, 'banners');
                    $bannerData[$fileField] = $fileUrl;
                } catch (Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 400);
                } catch (Exception $e) {
                    return response()->json(['error' => 'File upload failed, please try again.'], 400);
                }
            }
        }

        $banner = banners::create($bannerData);

        return response()->json(['banner' => $banner, 'success' => 'Banner Created'], 201);
    }



    public function getSingleBanner(Request $request)
    {
        try {
            $bannerId = $request->input('bannerId');
            // Fetch the banner using firstOrFail
            $banner = Banners::where('id', $bannerId)->firstOrFail();
            return response()->json(['banner' => $banner], 201);
        } catch (FileUploadException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json(['error' => 'File upload failed, please try again.'], 400);
        }
    }

    public function update(Request $request, banners $banners)

    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'banner_type' => 'required|in:file,text',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'text_main_content' => 'nullable|string',
            'text_sub_content' => 'nullable|string',
            'text_amount' => 'nullable|string',
            'text_button' => 'nullable|string',
            'text_button_link' => 'nullable|string',
            'secondary_button_content' => 'nullable|string',
            'secondary_button_url' => 'nullable|string',
            'file_mobile_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'file_desktop_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'text_mobile_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            'text_desktop_image' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validator->after(function ($validator) use ($request) {
            $overlappingBanners = banners::where(function ($query) use ($request) {
                if ($request->start_date) {
                    $query->where('end_date', '>=', $request->start_date);
                }
                if ($request->end_date) {
                    $query->where('start_date', '<=', $request->end_date);
                }
                $query->where('campaign_id', $request->campaign_id)
                    ->where('id', '!=', $request->bannerId);
            })->exists();

            if ($overlappingBanners) {
                $validator->errors()->add('date_range', 'The selected date range overlaps with an existing banner.');
            }
        });


        if ($validator->fails()) {
            return response()->json(['error' => 'Failed to update banner.', 'messages' => $validator->errors()], 422);
        }
        $bannerId = $request->input('bannerId');
        $bannerData = $request->only([
            'file_title',
            'text_main_content',
            'text_sub_content',
            'text_button',
            'text_button_link',
            'text_amount',
            'start_date',
            'end_date',
            'banner_type',
            'secondary_button_url',
            'secondary_button_content'
        ]);
        $oldFiles = [
            'old_file_desktop_image',
            'old_file_mobile_image',
            'old_text_desktop_image',
            'old_text_mobile_image'
        ];
        $fileFields = [
            'file_desktop_image',
            'file_mobile_image',
            'text_desktop_image',
            'text_mobile_image'
        ];
        foreach ($fileFields as $index => $fileField) {
            if ($request->hasFile($fileField)) {
                try {
                    $fileUrl = $this->fileUploadService->uploadFile($request, $fileField, 'banners');
                    $bannerData[$fileField] = $fileUrl;
                } catch (FileUploadException $e) {
                    return response()->json(['error' => $e->getMessage()], 400);
                } catch (Exception $e) {
                    return response()->json(['error' => 'File upload failed, please try again.'], 400);
                }
            } else {
                $bannerData[$fileField] = $request->input($oldFiles[$index]);
            }
        }
        $banner = banners::findOrFail($bannerId);
        $banner->update($bannerData);

        return response()->json(['banner' => $banner], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($bannersId)
    {
        $banners = banners::findOrFail($bannersId);
        $banners->delete();
        return redirect()->back()->with('success', 'banner deleted successfully.');
    }
}