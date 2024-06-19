<?php

namespace App\Jobs;

use App\Models\Note;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Create a new job instance.
   */
  public function __construct(public Note $note)
  {
    //
  }

  /**
   * Execute the job.
   */
  public function handle(): void
  {
    $noteUrl = config('app.url') . '/notes/' . $this->note->id;
    // $this->info($noteUrl);
    $emailContent = "Hello, you've received a new note.";

    // $x = mail($this->note->user->email, 'New Note', $emailContent);
    $x = Mail::raw($emailContent, function ($message) {
      $message
        ->from(config('app.name'), 'Sendnotes')
        ->to($this->note->recipient)
        ->subject('You have a new note from');
    });
  }
}
