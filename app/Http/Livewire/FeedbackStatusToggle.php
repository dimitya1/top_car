<?php

namespace App\Http\Livewire;

use App\Models\Feedback;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class FeedbackStatusToggle extends Component
{
    const BG_GREEN = 'bg-green-400';
    const BG_GRAY = 'bg-gray-400';
    const TRANSLATE_GREEN = 'translate-x-full border-green-400';
    const TRANSLATE_GRAY = 'translate-x-0 border-gray-400';

    public Feedback $feedback;
    public string $divBackgroundClass;
    public string $labelClass;

    public function mount(Feedback $feedback)
    {
        $this->feedback = $feedback;
        if ($feedback->is_handled) {
            $this->divBackgroundClass = self::BG_GREEN;
            $this->labelClass = self::TRANSLATE_GREEN;
        } else {
            $this->divBackgroundClass = self::BG_GRAY;
            $this->labelClass = self::TRANSLATE_GRAY;
        }
    }

    public function render(): View
    {
        return view('livewire.feedback-status-toggle');
    }

    public function toggleStatus()
    {
        $this->feedback->is_handled = !$this->feedback->is_handled;
        $this->feedback->save();

        if ($this->feedback->is_handled) {
            $this->feedback->handled_by = auth()->id();
            $this->divBackgroundClass = self::BG_GREEN;
            $this->labelClass = self::TRANSLATE_GREEN;
        } else {
            $this->feedback->handled_by = null;
            $this->divBackgroundClass = self::BG_GRAY;
            $this->labelClass = self::TRANSLATE_GRAY;
        }
        $this->feedback->save();
        //freshing to update relations
        $this->feedback = $this->feedback->fresh();

        //todo session flash
        session()->flash('successful_status_change', 'successful_status_change');
    }
}
