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
    <div style="padding: 24px; border: 2px solid #1d6e65; border-radius: 12px">
        <h2 style="text-align: center">Volunteer Detail</h2>

        <h3>Personal Information</h3>
        <table>
            <tr>
                <th>First Name</th>
                <td>{{ $volunteer->first_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td>{{ $volunteer->last_name ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $volunteer->email_id ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Phone</th>
                <td>{{ $volunteer->phone_no ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Street Address</th>
                <td>{{ $volunteer->address ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>City</th>
                <td>{{ $volunteer->city ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>State</th>
                <td>{{ $volunteer->state ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Post Code</th>
                <td>{{ $volunteer->post_code ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Country</th>
                <td>{{ $volunteer->country ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Email Updates</th>
                <td>{{ isset($email_updates) && $email_updates == 'yes' ? 'Yes' : 'No' }}</td>
            </tr>
        </table>

        <h3>Volunteer Roles</h3>
        <table>
            <tr>
                <td colspan="2">{{ isset($volunteer->roles) && !empty($volunteer->roles) ? implode(', ', $volunteer->roles) : 'N/A' }}</td>
            </tr>
        </table>

        <h3>Volunteer Opportunity</h3>
        <table>
            <tr>
                <th>Type of Opportunity</th>
                <td>{{ $volunteer->vol_opportunity ?? 'N/A' }}</td>
            </tr>
        </table>

        <h3>Group Information</h3>
        <table>
            <tr>
                <th>Volunteering as a Group?</th>
                <td>{{ $volunteer->is_group ?? 'No' }}</td>
            </tr>
            @if(isset($volunteer->is_group) && $volunteer->is_group == 'yes')
                <tr>
                    <th>Group Name</th>
                    <td>{{ $volunteer->group_name ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Adults in Group</th>
                    <td>{{ $volunteer->adults_in_group ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Children in Group</th>
                    <td>{{ $volunteer->children_in_group ?? 'N/A' }}</td>
                </tr>
            @endif
        </table>

        <h3>Special Skills</h3>
        <table>
            <tr>
                <th>Skills</th>
                <td>{{ $volunteer->special_skills ?? 'N/A' }}</td>
            </tr>
        </table>

        <h3>Preferred Venue(s)</h3>
        <table>
            <tr>
                <th>Venue(s)</th>
                <td>{{ isset($volunteer->venue) && !empty($volunteer->venue) ? implode(', ', $volunteer->venue) : 'N/A' }}</td>
            </tr>
        </table>

        <h3>Availability</h3>
        <table>
            <tr>
                <th>Days Available</th>
                <td>{{ isset($volunteer->avail_day) && !empty($volunteer->avail_day) ? implode(', ', $volunteer->avail_day) : 'N/A' }}</td>
            </tr>
            <tr>
                <th>Times Available</th>
                <td>{{ isset($volunteer->avail_time) && !empty($volunteer->avail_time) ? implode(', ', $volunteer->avail_time) : 'N/A' }}</td>
            </tr>
        </table>

        <h3>Emergency Contact</h3>
        <table>
            <tr>
                <th>Emergency Contact Phone</th>
                <td>{{ $volunteer->emergency_contact ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Relationship</th>
                <td>{{ $volunteer->contact_relationship ?? 'N/A' }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
