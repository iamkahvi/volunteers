<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Models\Shift;
use App\Models\Schedule;
use App\Models\Slot;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\DB;

class shiftFollowUp extends Notification
{
  protected $shift;
  protected $user;

  use Queueable;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct(Slot $shift, User $user)
  {
      $this->shift = $shift;
      $this->user = $user;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function via($notifiable)
  {
      return ['mail'];
  }

  /**
   * Get the mail representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return \Illuminate\Notifications\Messages\MailMessage
   */
  public function toMail($notifiable)
  {

      $urlShift = url('/slot/'.$this->shift->id.'/view');

      $urlEvent = url('/event/'.$this->shift->getEventAttribute()->id);

      // Get the shift object
      $schedules = Schedule::get()->where('id', '=', $this->shift->schedule_id);
      foreach ($schedules as $schedule)
      {
         if (Shift::get()->where('id', '=', $schedule->shift_id)->isEmpty())
         {

         } else
         {
             $theShift = Shift::get()->where('id', '=', $schedule->shift_id)->first();
         }
      }

      $shift_start_time = date('g:i A',strtotime($this->shift->start_time));
      $shift_end_time = date('g:i A',strtotime($this->shift->end_time));
      $shift_start_date = $this->shift->start_date;

     // Check if user is signed up for shift
     //if ($this->shift->user_id == $this->user->id) {

          return (new MailMessage)
                      ->subject($this->shift->getDepartmentAttribute()->name.' Shift on '.$this->shift->start_date)
                      ->greeting('Hello '.$this->user->name.'!')
                      ->line('Thank you so much for being apart of the Loving Spoonful team.')
                      ->line('This is a notification for your '.$theShift->name.' shift from '.$shift_start_time.' to '.$shift_end_time.' on '.$shift_start_date.'.')
                      ->action('View Shift',env('SITE_URL').'/slot/'.$this->shift->id.'/view');

      //}

      // If not, the notification is for the admin
      /*
      else {

          return (new MailMessage)
                      ->subject('Admin: '.$this->shift->getDepartmentAttribute()->name.' Shift Starting Soon')
                      ->greeting('No one has signed up for a '.$theShift->name.' shift that begins at '.date('g:i A',strtotime($this->shift->start_time)))
                      ->action('View Shift',env('SITE_URL').'/slot/'.$this->shift->id.'/view')
                      ->line('Description: '.$theShift->description);
      }
      */
  }

  /**
   * Get the array representation of the notification.
   *
   * @param  mixed  $notifiable
   * @return array
   */
  public function toArray($notifiable)
  {
      return [
          //
      ];
  }
}
