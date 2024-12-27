<div>
  @if ($selected === $name)
    <button type="button" disabled
      class="dropdown-option block w-full text-start px-4 py-2 text-sm bg-primary/10 text-primary">
      {{ __('messages.' . $name) }}
    </button>
  @else
    <button type="button" {{ "wire:click=$fun('$name')" }}
      class="dropdown-option block w-full text-start px-4 py-2 text-sm text-gray-600 dark:text-gray-300 hover:text-primary transition-all duration-150">
      {{ __('messages.' . $name) }}
    </button>
  @endif
</div>
