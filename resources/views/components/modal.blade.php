<div wire:ignore.self class="modal fade" id="{{ $id }}" style="display: none;" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="{{ Str::slug($title) }}-title">{{ $title }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        {{ $body }}
      </div>
      <div class="modal-footer">
        {{ $footer ?? '' }}
      </div>
    </div>
  </div>
</div>
