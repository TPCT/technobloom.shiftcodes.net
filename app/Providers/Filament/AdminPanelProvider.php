<?php

namespace App\Providers\Filament;

use App\Filament\Middlewares\AdminPanelVisitor;
use App\Filament\Middlewares\Banned;
use App\Filament\Pages\Auth\Login;
use App\Settings\Site;
use Awcodes\Curator\CuratorPlugin;
use Awcodes\Curator\Models\Media;
use BezhanSalleh\FilamentShield\FilamentShield;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use CactusGalaxy\FilamentAstrotomic\FilamentAstrotomicTranslatablePlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\SpatieLaravelTranslatablePlugin;
use Filament\Support\Assets\Js;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Kenepa\TranslationManager\Http\Middleware\SetLanguage;
use Kenepa\TranslationManager\TranslationManagerPlugin;
use Saade\FilamentLaravelLog\Facades\FilamentLaravelLog;
use Saade\FilamentLaravelLog\FilamentLaravelLogPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->profile()
            ->favicon(function (Site $Site) {
                return asset("/storage/" . Media::find($Site->fav_icon)?->path);
            })
            ->colors([
                'primary' => Color::Amber,
            ])
            ->collapsibleNavigationGroups()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->plugins([
                FilamentAstrotomicTranslatablePlugin::make(),
                TranslationManagerPlugin::make(),
                CuratorPlugin::make()
                    ->label('Media')
                    ->navigationGroup("CMS")
                    ->navigationCountBadge()
                    ->defaultListView('grid'),

                FilamentShieldPlugin::make()->gridColumns([
                    'default' => 1,
                    'sm' => 2,
                    'lg' => 3
                ])
                ->sectionColumnSpan(1)
                ->checkboxListColumns([
                    'default' => 1,
                    'sm' => 2,
                    'lg' => 1,
                ]),
                FilamentLaravelLogPlugin::make(),
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
                AdminPanelVisitor::class,
                SetLanguage::class
            ])
            ->profile(isSimple: false)
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->authMiddleware([
                Authenticate::class
            ]);
    }
}
