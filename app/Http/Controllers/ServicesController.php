<?php

namespace App\Http\Controllers;

use App\Models\Dropdown\Dropdown;
use App\Models\Service\Service;
use App\Models\Slider\Slider;
use App\Models\TeamMember\TeamMember;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function show($locale, Service $service){
        $companies_slider = Slider::active()
            ->whereSlug('trusted-by-top-companies')
            ->first();

        $why_to_choose_us_section = Dropdown::active()
            ->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('services-why-to-choose-us-section')
            ->first()
            ?->blocks()
            ->first();

        $services_bottom_section = Dropdown::active()
            ->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('services-bottom-section')
            ->first()
            ?->blocks()
            ->first();

        $team_members = TeamMember::active()->get();

        return $this->view('Services.show', compact(
            'service', 'companies_slider',
            'why_to_choose_us_section', 'services_bottom_section',
            'team_members'
        ));
    }
}
