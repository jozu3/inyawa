<div>
<form wire:submit.prevent="submit">
	<input type="number" wire:model.defer="valor" class="form-control" step="0.5" min="0" max="20" >
	@error('valor')<small class="text-danger">{{ $message }}</small> @enderror
</form>
</div>