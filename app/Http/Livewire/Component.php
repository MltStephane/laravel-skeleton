<?php

namespace App\Http\Livewire;

use Closure;
use WireElements\Pro\Contracts\BehavesAsModal;
use WireElements\Pro\Contracts\BehavesAsSlideOver;
use WireUi\Traits\Actions;

use function array_merge;
use function count;

class Component extends \WireElements\Pro\Components\Component implements BehavesAsModal, BehavesAsSlideOver
{
    use Actions;

    public ?string $overlayTitle = null;

    public array $successMessage = ['title' => 'Action effectuée avec succès', 'description' => null];

    public array $errorMessage = ['title' => 'Oups! Une erreur est survenue', 'description' => null];

    public static function adminView(string $view = null, array $data = [])
    {
        return view($view, $data)->layout('layouts.admin');
    }

    public static function publicView(string $view = null, array $data = [])
    {
        return view($view, $data)->layout('layouts.public');
    }

    public static function appView(string $view = null, array $data = [])
    {
        return view($view, $data)->layout('layouts.app');
    }

    public static function attributes(): array
    {
        return [
            'size' => '3xl',
        ];
    }

    public function execute(Closure $callback, ?string $redirectRoute = null): mixed
    {
        if (count($this->getRules()) > 0) {
            $this->validate();
        }

        $result = $callback();

        if ($result) {
            if (null !== $redirectRoute) {
                $this->redirect($redirectRoute);

                return true;
            }

            $this->emit('postSubmit');

            $this->notification()->success(
                title: $this->successMessage['title'],
                description: $this->successMessage['description']
            );

            $this->close(withForce: true);
        } else {
            $this->notification()->error(
                title: $this->errorMessage['title'],
                description: $this->errorMessage['description']
            );
        }

        return $result;
    }

    public function openModal(string $path, array $data = [])
    {
        $this->emit('modal.open', $path, $data);
    }

    public function openSlideOver(string $path, array $data = [])
    {
        $this->emit('slide-over.open', $path, $data);
    }

    public function closeOverlay()
    {
        $this->emit('slide-over.close');
        $this->emit('modal.close');
    }

    public function setOverlayTitle(?string $overlayTitle): void
    {
        $this->overlayTitle = $overlayTitle;
    }

    public function setSuccessMessage(string $title, ?string $description = null): void
    {
        $this->successMessage = ['title' => $title, 'description' => $description];
    }

    public function setErrorMessage(string $title, ?string $description = null): void
    {
        $this->errorMessage = ['title' => $title, 'description' => $description];
    }

    protected function getListeners(): array
    {
        return array_merge($this->listeners, [
            'postSubmit' => '$refresh',
        ]);
    }
}
