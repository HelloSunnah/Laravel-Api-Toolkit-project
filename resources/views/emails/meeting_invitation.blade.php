<h2>Hello {{ $user->name }},</h2>

<p>You’ve been invited to a meeting.</p>

<ul>
    <li><strong>Title:</strong> {{ $meeting->title }}</li>
    <li><strong>Description:</strong> {{ $meeting->description }}</li>
    <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($meeting->date)->format('F j, Y') }}</li>
    <li><strong>Start Time:</strong> {{ $meeting->start_time }} ({{ $meeting->timezone }})</li>
    <li><strong>End Time:</strong> {{ $meeting->end_time }} ({{ $meeting->timezone }})</li>
    <li><strong>Location:</strong> {{ $meeting->location_id }}</li>
</ul>

<p>Please click below to accept or decline the meeting:</p>

<a href="{{ url('/api/meetings/accept/' . $meeting->id . '/' . $user->id) }}"
   style="padding: 10px 20px; background-color: #28a745; color: #fff; text-decoration: none; margin-right: 10px;">
   Accept Meeting
</a>

<a href="{{ url('/api/meetings/decline-form/' . $meeting->id . '/' . $user->id) }}"
   style="padding: 10px 20px; background-color: #dc3545; color: #fff; text-decoration: none;">
   Decline Meeting
</a>

<p>Thank you!</p>
