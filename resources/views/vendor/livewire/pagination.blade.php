<div class="flex items-center justify-between mt-4 gap-5">
  {{-- Showing X to Y of Z --}}
  <div class="text-sm text-gray-100">
    Showing
    <span class="font-semibold">{{ $paginator->firstItem() }}</span> to
    <span class="font-semibold">{{ $paginator->lastItem() }}</span> of
    <span class="font-semibold">{{ $paginator->total() }}</span> results
  </div>

  <div class="flex items-center space-x-2">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <span class="px-4 py-2 text-gray-500  rounded-md cursor-not-allowed">
      <i class="fas fa-chevron-left"></i>
    </span>
    @else
    <button wire:click="previousPage"
      class="px-4 py-2 text-white hover:border hover:border-orange-800 rounded-md  focus:outline-none focus:ring-2 focus:ring-blue-400">
      <i class="fas fa-chevron-left"></i>
    </button>
    @endif

    {{-- Page Numbers --}}

    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
      @if ($i == $paginator->currentPage())
      <span class="px-4 py-2 text-white rounded-md cursor-default">
        {{ $i }}
      </span>
      @else
      <button wire:click="gotoPage({{ $i }})"
        class="px-4 py-2 rounded-md hover:border hover:border-orange-800 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-400">
        {{ $i }}
      </button>
      @endif
      @endfor

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
      <button wire:click="nextPage"
        class="px-4 py-2 text-white hover:border hover:border-orange-800 rounded-md  focus:outline-none focus:ring-2 focus:ring-blue-400">
        <i class="fas fa-chevron-right"></i>
      </button>
      @else
      <span class="px-4 py-2 text-gray-500 rounded-md cursor-not-allowed">
        <i class="fas fa-chevron-right"></i>
      </span>
      @endif
  </div>
</div>