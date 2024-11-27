<!-- resources/views/emails/volunteer-signup.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Signup Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Volunteer Signup Form Submission</h2>

    <h3>Personal Information</h3>
    <table>
        <tr>
            <th>First Name</th>
            <td>{{ $first_name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td>{{ $last_name ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $email_id ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ $phone_no ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Street Address</th>
            <td>{{ $address ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>City</th>
            <td>{{ $city ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>State</th>
            <td>{{ $state ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Post Code</th>
            <td>{{ $post_code ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Country</th>
            <td>{{ $country ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Email Updates</th>
            <td>{{ isset($email_updates) && $email_updates == 'yes' ? 'Yes' : 'No' }}</td>
        </tr>
    </table>

    <h3>Volunteer Roles</h3>
    <table>
        <tr>
            <th>Interested Roles</th>
            <td>{{ isset($roles) && !empty($roles) ? implode(', ', $roles) : 'N/A' }}</td>
        </tr>
    </table>

    <h3>Volunteer Opportunity</h3>
    <table>
        <tr>
            <th>Type of Opportunity</th>
            <td>{{ $vol_opportunity ?? 'N/A' }}</td>
        </tr>
    </table>

    <h3>Group Information</h3>
    <table>
        <tr>
            <th>Volunteering as a Group?</th>
            <td>{{ $is_group ?? 'No' }}</td>
        </tr>
        @if(isset($is_group) && $is_group == 'yes')
            <tr>
                <th>Group Name</th>
                <td>{{ $group_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Adults in Group</th>
                <td>{{ $adults_in_group ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Children in Group</th>
                <td>{{ $children_in_group ?? 'N/A' }}</td>
            </tr>
        @endif
    </table>

    <h3>Special Skills</h3>
    <table>
        <tr>
            <th>Skills</th>
            <td>{{ $special_skills ?? 'N/A' }}</td>
        </tr>
    </table>

    <h3>Preferred Venue(s)</h3>
    <table>
        <tr>
            <th>Venue(s)</th>
            <td>{{ isset($venues) && !empty($venues) ? implode(', ', $venues) : 'N/A' }}</td>
        </tr>
    </table>

    <h3>Availability</h3>
    <table>
        <tr>
            <th>Days Available</th>
            <td>{{ isset($avail_day) && !empty($avail_day) ? implode(', ', $avail_day) : 'N/A' }}</td>
        </tr>
        <tr>
            <th>Times Available</th>
            <td>{{ isset($avail_time) && !empty($avail_time) ? implode(', ', $avail_time) : 'N/A' }}</td>
        </tr>
    </table>

    <h3>Emergency Contact</h3>
    <table>
        <tr>
            <th>Emergency Contact Phone</th>
            <td>{{ $emergency_contact ?? 'N/A' }}</td>
        </tr>
        <tr>
            <th>Relationship</th>
            <td>{{ $contact_relationship ?? 'N/A' }}</td>
        </tr>
    </table>
</body>
</html>
