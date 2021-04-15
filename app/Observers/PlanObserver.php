<?php

namespace App\Observers;

use App\Models\Plan;

use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the plan "creating" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function creating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
        $plan->price = str_replace(",", ".", $plan->price);
    }

    /**
     * Handle the plan "updating" event.
     *
     * @param  \App\Models\Plan  $plan
     * @return void
     */
    public function updating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
        $plan->price = str_replace(",", ".", $plan->price);
    }
}
