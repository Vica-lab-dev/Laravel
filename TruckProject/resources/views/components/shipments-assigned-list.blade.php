<?php

use Livewire\Component;

new class extends Component
{
    //
};
?>

<div>
    <p>Clicked Times: <span class="{{ $count >= 5000 ? "red" : "" }}">{{ $count }}</span></p>

    <button wire:click="increment">Increment</button>
    <button wire:click="decrement">Decrement</button>

    <p>{{ $errorMessage }}</p>

    <input type="number" min="1" wire:blur="validateAmount" wire:model.live.debounce="amount">
    <p>Amount is {{ $amount }}</p>

    <style>
        .red {color:red}
    </style>

</div>
