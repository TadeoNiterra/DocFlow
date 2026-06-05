<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\DocumentTypeChart;

// 🚀 IMPORTACIONES CLAVE PARA FILAMENT V5 (Navegación y Modales)
use Filament\Navigation\MenuItem;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;
use Filament\Notifications\Notification;

class DashboardPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('dashboard')
            ->path('dashboard')
            ->login()

            // Favicon Corporativo
            ->favicon(asset('favicon.png'))

            // Paleta de Colores de Marca (PANTONE)
            ->colors([
                'primary' => Color::Hex('#007580'),   // Earth Green
                'warning' => Color::Hex('#EEB500'),   // Shine Yellow
                'gray' => Color::Hex('#666666'),   // Cool Gray 10 C
                'success' => Color::Emerald,
                'danger' => Color::Rose,
            ])

            ->darkMode(true)
            ->sidebarCollapsibleOnDesktop()

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])

            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->widgets([
                StatsOverview::class,
                DocumentTypeChart::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}