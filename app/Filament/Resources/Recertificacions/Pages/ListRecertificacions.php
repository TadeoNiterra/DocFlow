<?php

namespace App\Filament\Resources\Recertificacions\Pages;

use App\Filament\Resources\Recertificacions\RecertificacionResource;
use App\Models\Colaborador;
use App\Models\Recertificacion;
use App\Models\RecertificacionDetalle;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Artisan;
use LdapRecord\Container;

class ListRecertificacions extends ListRecords
{
    protected static string $resource = RecertificacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('ejecutarRecertificacion')
                ->label('Ejecutar Escaneo AD Ahora')
                ->icon('heroicon-o-arrow-path')
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading('Iniciar Recertificación Manual')
                ->modalDescription('Se consultará el Active Directory para auditar todas las cuentas asociadas a los colaboradores. ¿Deseas continuar?')
                ->modalSubmitActionLabel('Sí, ejecutar')
                ->action(function () {
                    try {
                        // 1. Ejecutar el comando de consola o llamar la lógica directamente
                        Artisan::call('ad:recertificar');

                        Notification::make()
                            ->title('Escaneo finalizado con éxito')
                            ->body('Se ha generado un nuevo registro de recertificación con los resultados del Active Directory.')
                            ->success()
                            ->send();

                    } catch (\Exception $e) {
                        Notification::make()
                            ->title('Error al conectar con Active Directory')
                            ->body($e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),
        ];
    }
}