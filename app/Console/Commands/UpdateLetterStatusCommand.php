<?php

namespace App\Console\Commands;

use App\Models\Letter;
use App\Models\Node;
use Illuminate\Console\Command;

class UpdateLetterStatusCommand extends Command
{


        protected $signature = 'letters:update-status';

        protected $description = 'update the status of letters';



     public function handle()
    {
        $letters = Letter::all();

        foreach ($letters as $letter) {
            $routeId = $letter->letterType->routes->pluck('id')->first();

            $nodes = Node::whereHas('routes', function ($query) use ($routeId) {
                $query->where('route_id', $routeId);
            })->get();

            $movements = $letter->movements()->whereIn('node_id', $nodes->pluck('id'))->get();

            $statuses = $movements->pluck('status')->unique();

            if ($statuses->contains('Pending')) {
                $letter->status = 'Pending';
            } elseif ($statuses->contains('In Progress')) {
                $letter->status = 'In Progress';
            } elseif ($statuses->contains('Cancelled')) {
                $letter->status = 'Cancelled';
            } elseif ($nodes->count() > 0 && $movements->count() === $nodes->count() && $statuses->contains('Completed')) {
                $letter->status = 'Completed';
            }

            $letter->save();
        }

        $this->info('Letter status calculation completed.');
    }
}
