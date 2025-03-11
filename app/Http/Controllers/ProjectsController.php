<?php

namespace App\Http\Controllers;

use App\Models\Dropdown\Dropdown;
use App\Models\Project\Project;
use App\Settings\Site;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){

        $categories = Dropdown::whereCategory(Dropdown::PROJECT_CATEGORY)->get();

        $search = \request('search');

        $projects = Project::active()
            ->whereHas('categories', function(\Illuminate\Database\Eloquent\Builder $query){
                $query->when(request('search'), function($query, $search){
                    $query->where('slug', $search);
                });
            })
            ->paginate(app(Site::class)->projects_page_size)->withQueryString();

        $our_projects_bottom_section = Dropdown::active()
            ->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('our-projects-bottom-section')
            ->first()
            ?->blocks()
            ->first();

        return $this->view('Projects.index', compact('categories', 'projects', 'search', 'our_projects_bottom_section'));
    }

    public function show($locale, Project $project){
        $projects = Project::active()
            ->whereHas('categories', function($query) use ($project){
                foreach ($project->categories as $category) {
                    $query->orWhere('category_id', $category->id);
                }
            })->get();

        $our_projects_bottom_section = Dropdown::active()
            ->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('our-projects-bottom-section')
            ->first()
            ?->blocks()
            ->first();
        return $this->view('Projects.show', compact('project', 'projects', 'our_projects_bottom_section'));
    }
}
