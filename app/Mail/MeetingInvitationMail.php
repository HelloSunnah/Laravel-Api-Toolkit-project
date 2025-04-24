<?php

namespace App\Mail;

use App\Models\Meeting;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MeetingInvitationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $meeting;
    public $user;

    public function __construct(Meeting $meeting, User $user)
    {
        $this->meeting = $meeting;
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('You are invited to a meeting: ' . $this->meeting->title)
                    ->view('emails.meeting_invitation')
                    ->with([
                        'meeting' => $this->meeting,
                        'user' => $this->user,
                    ]);
    }
}

