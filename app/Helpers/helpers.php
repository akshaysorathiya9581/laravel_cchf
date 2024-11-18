<?php

use App\Models\EmailApiSettings;
use App\Models\Seasons;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

use Illuminate\Database\Eloquent\Builder;

if (!function_exists('current_season')) {
    function current_season()
    {
        $currentDate = Carbon::now()->format('Y-m-d');
        return Seasons::where('start_date', '<=', $currentDate)
            ->where('end_date', '>=', $currentDate)
            ->first();
    }
}

if (!function_exists('cleanText')) {
    function cleanText($text)
    {
        $decodedText = json_decode('"' . $text . '"');

        if ($decodedText === null) {
            $decodedText = $text;
        }

        return html_entity_decode($decodedText, ENT_QUOTES, 'UTF-8');
    }
}


if (!function_exists('setSendgridApiKey')) {
    function setSendgridApiKey()
    {
        $sendGridKey =    Config::get('SENDGRID_API_KEY', '');
        if (empty($sendGridKey)) {
            $settings = EmailApiSettings::first();
            if ($settings) {
                $sendGridKey = $settings->api_key;
            }
            Config::set('services.sendgrid.api_key', $sendGridKey);
        }
    }



    if (!function_exists('formattedDate')) {
        function formattedDate($dateString)
        {
            $date = new DateTime($dateString);
            $now = new DateTime();

            $diffInSeconds = $now->getTimestamp() - $date->getTimestamp();
            $diffInMinutes = floor($diffInSeconds / 60);
            $diffInHours = floor($diffInMinutes / 60);
            $diffInDays = floor($diffInHours / 24);

            if ($diffInSeconds < 60) {
                return "{$diffInSeconds}s ago";
            } elseif ($diffInMinutes < 60) {
                return "{$diffInMinutes}m ago";
            } elseif ($diffInHours < 24) {
                return "{$diffInHours}h ago";
            } elseif ($diffInDays < 7) {
                return "{$diffInDays} day" . ($diffInDays > 1 ? "s" : "") . " ago";
            } elseif ($date->format('Y') === $now->format('Y')) {
                return $date->format('M') . " " . $date->format('j');
            } else {
                return $date->format('M') . " " . $date->format('j') . " '" . $date->format('y');
            }
        }
    }

    if (!function_exists('formatNumber')) {
        function formatNumber($number)
        {
            return number_format((float)$number, 2, '.', '');
        }
    }
}

if (!function_exists('applySearch')) {
    function applySearch(Builder $query, array $searchableColumns, string $searchValue, callable $additionalQuery = null)
    {
        $query->where(function ($q) use ($searchableColumns, $searchValue, $additionalQuery) {

            foreach ($searchableColumns as $column) {
                if (is_callable($column)) {
                    $column($q, $searchValue);
                } else {
                    $q->orWhere($column, 'like', "%{$searchValue}%");
                }
                // echo $column;
            }

            if ($additionalQuery) {
                $additionalQuery($q, $searchValue);
            }
        });
    }
}

if (!function_exists('get_sustainer_options_list')) {
    function get_sustainer_options_list($id = '')
    {

        $data = array();
        $data[] = array('id' => 1, 'text' => 'oneTime', 'is_notification' =>  false);
        $data[] = array('id' => 2, 'text' => 'Daily', 'is_notification' =>  true);
        $data[] = array('id' => 3, 'text' => 'Weekly', 'is_notification' =>  true);
        $data[] = array('id' => 4, 'text' => 'Monthly', 'is_notification' =>  true);
        $data[] = array('id' => 5, 'text' => 'Annually', 'is_notification' =>  true);
        $data[] = array('id' => 6, 'text' => 'At the time of Candle Lighting', 'is_notification' =>  true);

        $new_data = array();
        foreach ($data as $key => $value) {
            $new_data[] = array('id' => $value['id'], 'text' => $value['text'], 'is_notification' => $value['is_notification']);
        }

        if ($id != '') {
            $temp = array_combine(array_column($new_data, 'id'), array_column($new_data, 'text'));
            return isset($temp[$id]) ? $temp[$id] : '';
        }

        return $new_data;
    }
}


if (!function_exists('get_donation_location_list')) {
    function get_donation_location_list($id = '')
    {

        $data = array();
        $data[] = array('id' => 1, 'text' => 'General');
        $data[] = array('id' => 2, 'text' => 'Boropark');
        $data[] = array('id' => 3, 'text' => 'Flatbush');
        $data[] = array('id' => 4, 'text' => 'Queens');

        $new_data = array();
        foreach ($data as $key => $value) {
            $new_data[] = array('id' => $value['id'], 'text' => $value['text']);
        }

        if ($id != '') {
            $temp = array_combine(array_column($new_data, 'id'), array_column($new_data, 'text'));
            return isset($temp[$id]) ? $temp[$id] : '';
        }

        return $new_data;
    }
}

if (!function_exists('get_user_notification_list')) {
    function get_user_notification_list($id = '')
    {

        $data = array();
        $data[] = array('id' => 'is_updates_news', 'text' => 'Updates & News');
        $data[] = array('id' => 'is_new_course', 'text' => 'New course');
        $data[] = array('id' => 'is_new_parsha_lecture', 'text' => 'New Parsha Lecture');
        $data[] = array('id' => 'is_invitation_customer', 'text' => 'Invitation to take customer survey');
        $data[] = array('id' => 'is_request_rate_review', 'text' => 'Request to rate and review courses you have taken');
        $data[] = array('id' => 'is_reminders_progress_courses', 'text' => 'Reminders about your in-progress courses');
        $data[] = array('id' => 'is_like_comment', 'text' => 'Someone liked your comment, rating or comment');
        $data[] = array('id' => 'is_top_trending_courses', 'text' => 'Top trending courses and Parsha lectures');

        $new_data = array();
        foreach ($data as $key => $value) {
            $new_data[] = array('id' => $value['id'], 'text' => $value['text']);
        }

        if ($id != '') {
            $temp = array_combine(array_column($new_data, 'id'), array_column($new_data, 'text'));
            return isset($temp[$id]) ? $temp[$id] : '';
        }

        return $new_data;
    }
}


if (!function_exists('generateSlug')) {
    function generateSlug($title)
    {
        // Convert to lowercase, remove special characters, and replace spaces with hyphens
        $slug = preg_replace('/[^a-z0-9]+/i', '-', strtolower(trim($title)));

        // Remove hyphens at the start or end of the string
        $slug = trim($slug, '-');

        return $slug;
    }
}