<?php

declare(strict_types=1);

namespace Orchid\Monitor;

use Orchid\Screen\Layouts;
use Orchid\Screen\Screen;

class MonitorScreen extends Screen
{
    /**
     * Display header name
     *
     * @var string
     */
    public $name;

    /**
     * Display header description
     *
     * @var string
     */
    public $description;

    /**
     * Query data
     *
     * @return array
     */
    public function query(): array
    {
        $this->name = trans('orchid/monitor::monitor.Monitor');
        $this->description = trans('orchid/monitor::monitor.description');


        $monitor = new Monitor();

        return [
            'disabled'    => stripos(PHP_OS, 'WIN') === 0 || $this->shellExecEnabled() === false,
            'info'        => $monitor->info(),
            'hardware'    => $monitor->hardware(),
            'loadAverage' => $monitor->loadAverage(),
            'memory'      => $monitor->memory(),
            'network'     => $monitor->network(),
            'storage'     => $monitor->storage(),
        ];
    }

    /**
     * Button commands
     *
     * @return array
     */
    public function commandBar(): array
    {
        return [];
    }

    /**
     * Views
     *
     * @return array
     */
    public function layout(): array
    {
        return [
            Layouts::view('orchid/monitor::index'),
        ];
    }

    /**
     * @return bool
     */
    private function shellExecEnabled(): bool
    {
        $disabled = explode(',', ini_get('disable_functions'));

        return !in_array('shell_exec', $disabled, true);
    }
}
