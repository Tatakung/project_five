<div>
    <button wire:click="openModal" class="bg-blue-500 text-white px-4 py-2 rounded">
        เปิด Modal
    </button>

    <x-dialog-modal wire:model="showingModal">
        <x-slot name="title">
            อัปโหลดไฟล์
        </x-slot>

        <x-slot name="content">
            <input type="file" wire:model="fileUpload">
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeModal">
                ยกเลิก
            </x-secondary-button>
            <x-primary-button>
                อัปโหลด
            </x-primary-button>
        </x-slot>
    </x-dialog-modal>
</div>
