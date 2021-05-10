<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanProfileController extends Controller
{
    protected $plan;
    protected $profile;

    public function __construct(Plan $plan, Profile $profile)
    {
        $this->plan = $plan;
        $this->profile = $profile;
    }

    public function plans($idPlan)
    {
        if (!$plan = $this->plan->find($idPlan)) {
            return redirect()->back();
        }

        return view('admin.pages.plans.profiles.profiles', [
            'plan' => $plan,
            'profiles' => $plan->profiles()->paginate()
        ]);
    }

    public function profiles($idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        return view('admin.pages.profiles.plans.plans', [
            'profiles' => $profile->plan()->paginate(),
            'profile' => $profile
        ]);
    }

    public function profilesAvailable($idPlan)
    {
        if (!$plan = $this->plan->find($idPlan)) {
            return redirect()->back();
        }

        return view('admin.pages.plans.profiles.available', [
            'plan' => $plan,
            'profiles' => $plan->profilesAvailable(),
        ]);
    }

    public function attachProfilesProfile(Request $request, $idPlan)
    {
        if (!$plan = $this->plan->find($idPlan)) {
            return redirect()->back();
        }

        if (!$request->profiles || count($request->profiles) == 0) {
            return redirect()
                ->back()
                ->with('alert', 'Selecione pelo menos um plano');
        }

        $plan->profiles()->attach($request->profiles);

        return redirect()->route('plans.profiles', $plan->id)
            ->with('message', 'Registro cadastrado com sucesso');
    }

    public function detachPlanProfile($idPlan, $idProfile)
    {
        $plan = $this->plan->find($idPlan);
        $profile = $this->profile->find($idProfile);

        if (!$plan || !$profile) {
            return redirect()->back();
        }

        $plan->profiles()->detach($profile);

        return redirect()->route('plans.profiles', $plan->id)
            ->with('message', 'Permissão descadastrada com sucesso');
    }

    public function filterProfilesAvailable(Request $request, $idPlan)
    {
        if (!$plan = $this->plan->find($idPlan)) {
            return redirect()->back();
        }

        return view('admin.pages.plans.profiles.profiles', [
            'plan' => $plan,
            'profiles' => $plan->profilesAvailableSearch($request->filter),
            'filters' => $request->except('_token')
        ]);
    }
}
