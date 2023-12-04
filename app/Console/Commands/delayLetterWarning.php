<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Letter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use App\Notifications\LetterProgressingNotification;

class delayLetterWarning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
        protected $signature = 'letters:delay-alert';

        protected $description = 'alert the delay of letters';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // retrieve all letters in the node
         $letters = Letter::all();


         foreach($letters as $letter){

         // get current node of the letter
              $node = $letter->getCurrentNode();

              //get current node estimated waiting time
             $nodeEstimatedWaitingTime = $node->estimated_waiting_time;


              // get time when the letter arrived to this node
            $timeSinceMovement = $node->created_at;

          // compare the this waiting time to the time of the letter since arrived this node
        $timeSinceMovement = $timeSinceMovement->diffInMinutes(now());


            if($timeSinceMovement >= $nodeEstimatedWaitingTime){

              $departmentId = $node->user->department_id;


           // retrieve the current user department manaager email
             $managerEmails = User::where('department_id', $departmentId)->where('role_with_department', 'Manager')->pluck('email')  ->toArray();;
            dd($managerEmails);
               Notification::route('mail', $managerEmails)->notify(new LetterProgressingNotification($letter, $currentNode));

        }
       }
    }
}
