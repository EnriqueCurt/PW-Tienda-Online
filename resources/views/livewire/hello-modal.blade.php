<div style="padding: 24px 26px;">
    <div style="display: flex; align-items: center; gap: 10px;">
        <div style="width: 36px; height: 36px; border-radius: 12px; background: #0f172a; color: #ffffff; display: grid; place-items: center; font-weight: 700;">LW</div>
        <div>
            <h2 style="margin: 0; font-size: 20px;">Hola desde Livewire</h2>
            <p style="margin: 4px 0 0; color: #64748b; font-size: 14px;">Este modal viene del UI kit.</p>
        </div>
    </div>
    <div style="margin-top: 18px; display: flex; gap: 10px;">
        <button type="button" wire:click="$dispatch('closeModal')" style="border: 0; padding: 10px 14px; border-radius: 10px; background: #111827; color: #ffffff; cursor: pointer;">
            Cerrar
        </button>
        <button type="button" style="border: 1px solid #e2e8f0; padding: 10px 14px; border-radius: 10px; background: #f8fafc; color: #0f172a; cursor: pointer;">
            Ver mas
        </button>
    </div>
</div>
