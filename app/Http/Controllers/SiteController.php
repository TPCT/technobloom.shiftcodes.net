<?php

namespace App\Http\Controllers;

use App\Models\Branch\Branch;
use App\Models\Candidate\Candidate;
use App\Models\City;
use App\Models\Cluster\Cluster;
use App\Models\ContactUs;
use App\Models\Dropdown\Dropdown;
use App\Models\Faq\Faq;
use App\Models\News\News;
use App\Models\Page\Page;
use App\Models\Party\Party;
use App\Models\Slider\Slider;
use App\Models\TeamMember\TeamMember;
use App\Models\Testimonial;
use App\Settings\Site;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SiteController extends Controller
{
    public function index(Request $request){
         if ($request->isMethod('post')) {
            $data = $request->validate([
                'first_name' => 'required|regex:/^[^0-9]*$/i',
                'last_name' => 'required|regex:/^[^0-9]*$/i',
                'phone_number' => 'required',
                'email' => 'required|email',
                'message' => 'required',
                'g-recaptcha-response' => app(Site::class)->enable_captcha ? 'required|captcha' : 'nullable'
            ]);

            ContactUs::create($data);
            return redirect()
                ->to(route('site.index') . "#contact-us-form")
                ->with('success', __("Form Has Been Submitted Successfully"));
         }

         $sections = Dropdown::active()
             ->whereCategory(Dropdown::BLOCK_CATEGORY)
             ->whereSlug('homepage-sections')
             ->first()?->blocks()->orderBy('weight', 'asc')->get();

         $companies_slider = Slider::active()
             ->whereSlug('trusted-by-top-companies')
             ->first();

         $testimonials = Testimonial::active()->get();

         $blogs = News::active()->where('promote_to_homepage', 1)->limit(3)->get();

         $homepage_contact_us_top_section = Dropdown::active()
                ->whereCategory(Dropdown::BLOCK_CATEGORY)
                ->whereSlug('homepage-contact-us-section')
                ->first()
                ?->blocks()
                ->whereSlug('homepage-contact-us-top-section')->first();

        $homepage_contact_us_left_section = Dropdown::active()
            ->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('homepage-contact-us-section')
            ->first()
            ?->blocks()
            ->whereSlug('homepage-contact-us-left-section')->first();

        $homepage_contact_us_right_section = Dropdown::active()
            ->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('homepage-contact-us-section')
            ->first()
            ?->blocks()
            ->whereSlug('homepage-contact-us-right-section')->first();

        $homepage_bottom_section = Dropdown::active()
            ->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('homepage-bottom-section')
            ->first()
            ?->blocks()
            ->first();

        return $this->view('Site.homepage',
              compact(
                  'sections',
                  'companies_slider',
                  'testimonials',
                  'blogs',
                  'homepage_contact_us_right_section',
                  'homepage_contact_us_left_section',
                  'homepage_contact_us_top_section',
                  'homepage_bottom_section'
              )
        );
    }

    public function aboutUs(Request $request){
        $sections = Dropdown::active()
            ->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('about-us-sections')
            ->first()?->blocks()->orderBy('weight', 'asc')->get();

        $companies_slider = Slider::active()
            ->whereSlug('trusted-by-top-companies')
            ->first();

        $testimonials = Testimonial::active()->get();

        $team_members = TeamMember::active()->get();

        $about_us_bottom_section = Dropdown::active()
            ->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('about-us-bottom-section')
            ->first()
            ?->blocks()
            ->first();


        return $this->view('Site.about-us', compact('sections', 'companies_slider', 'team_members', 'testimonials', 'about_us_bottom_section'));
    }

    public function faqs(Request $request)
    {
        $faqs = Faq::paginate(app(Site::class)->faqs_page_size)->withQueryString();
        return $this->view('Site.faqs', compact('faqs'));
    }

    public function contactUs(Request $request){
        $contact_us_form_section = Dropdown::active()
            ->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('contact-us-form-section')
            ->first()
            ?->blocks()
            ->first();

        $branches = Branch::active()->get();

        $contact_us_bottom_section = Dropdown::active()
            ->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('contact-us-bottom-section')
            ->first()
            ?->blocks()
            ->first();

        if ($request->method() == "POST") {
            $data = $request->validate([
                'first_name' => 'required|regex:/^[^0-9]*$/i',
                'last_name' => 'required|regex:/^[^0-9]*$/i',
                'phone_number' => 'required',
                'email' => 'required|email',
                'message' => 'required',
                'g-recaptcha-response' => app(Site::class)->enable_captcha ? 'required|captcha' : 'nullable'
            ]);

            unset($data['g-recaptcha-response']);
            $model = ContactUs::create($data);
            $model->save();
            return redirect()->route('site.contact-us')->with('success', __("site.Application Has Been Submitted Successfully"));
        }
        return $this->view('Site.contact-us', compact('contact_us_form_section', 'branches', 'contact_us_bottom_section'));
    }

    public function show(): bool|\Illuminate\Http\JsonResponse|string
    {
        $segments = \request()->segments();
        $prefix = implode(
            '/',
            array_slice($segments, \request()->route()->hasParameter('section') ? 2 : 1, -1)
        );

        $prefix = $prefix ?: null;
        $slug = last($segments);


        $page = Page::active()
            ->directAccess()
            ->whereSlug($slug)
            ->wherePrefix($prefix)
            ->whereDoesntHave('sections')
            ->first();

        if (!$page){
            $prefix = implode('/', array_slice($segments, 2, -1));
            $prefix = $prefix ?: null;

            $page = Page::active()
                        ->directAccess()
                        ->whereSlug($slug)
                        ->wherePrefix($prefix)
                        ->first();
        }

        if (!$page)
            throw new NotFoundHttpException();
//            return (new SectionController())->index(app()->getLocale(), \request()->segment(2));

        $view = strtolower(explode(' ', $page->view)[0]);
        return $this->view('Pages.' . $view, compact('page'));
    }
}
