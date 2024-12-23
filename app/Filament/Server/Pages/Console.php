<?php

namespace App\Filament\Server\Pages;

use App\Filament\Server\Widgets\ServerConsole;
use App\Filament\Server\Widgets\ServerCpuChart;
use App\Filament\Server\Widgets\ServerMemoryChart;
// use App\Filament\Server\Widgets\ServerNetworkChart;
use App\Filament\Server\Widgets\ServerOverview;
use App\Models\Server;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Pages\Page;
use Filament\Support\Enums\ActionSize;

class Console extends Page
{
    protected static ?string $navigationIcon = 'tabler-brand-tabler';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.server.pages.console';

    public function getWidgetData(): array
    {
        return [
            'server' => Filament::getTenant(),
            'user' => auth()->user(),
        ];
    }

    public function getWidgets(): array
    {
        return [
            ServerOverview::class,
            ServerConsole::class,
            ServerCpuChart::class,
            ServerMemoryChart::class,
            //ServerNetworkChart::class, TODO: convert units.
        ];
    }

    public function getVisibleWidgets(): array
    {
        return $this->filterVisibleWidgets($this->getWidgets());
    }

    public function getColumns(): int|string|array
    {
        return 3;
    }

    protected function getHeaderActions(): array
    {
        /** @var Server $server */
        $server = Filament::getTenant();

        return [
            Action::make('start')
                ->color('primary')
                ->size(ActionSize::ExtraLarge)
                ->action(fn () => $this->dispatch('setServerState', state: 'start'))
                ->disabled(fn () => $server->isInConflictState()),
            Action::make('restart')
                ->color('gray')
                ->size(ActionSize::ExtraLarge)
                ->action(fn () => $this->dispatch('setServerState', state: 'restart'))
                ->disabled(fn () => $server->isInConflictState() || $server->retrieveStatus() == 'offline'),
            Action::make('stop')
                ->color('danger')
                ->size(ActionSize::ExtraLarge)
                ->action(fn () => $this->dispatch('setServerState', state: 'stop'))
                ->disabled(fn () => $server->isInConflictState() || $server->retrieveStatus() == 'offline'),
            Action::make('kill')
                ->color('danger')
                ->requiresConfirmation()
                ->modalHeading('Do you wish to kill this server?')
                ->modalDescription('This can result in data corruption and/or data loss!')
                ->modalSubmitActionLabel('Kill Server')
                ->size(ActionSize::ExtraLarge)
                ->action(fn () => $this->dispatch('setServerState', state: 'kill'))
                ->disabled(fn () => $server->isInConflictState() || $server->retrieveStatus() == 'offline'),
        ];
    }
}
