<template>
    <div>
        <table class="table table-auto w-full">
            <thead>
                <tr>
                    <th class="border py-2 bg-gray-100">Foto</th>
                    <th class="border py-2 bg-gray-100">Nama</th>
                    <th class="border py-2 bg-gray-100">Harga</th>
                    <th class="border py-2 bg-gray-100">Opsi</th>
                </tr>
            </thead>
            <tbody v-if="produk.length > 0">
                <tr v-for="prod in produk" :key="prod.id">
                    <td class="border p-2">
                        <img class="w-20 h-20 border rounded-sm block mx-auto object-cover" :src="prod.storage_foto_produk_path" :alt="'Foto Produk ' + prod.nama_produk">
                    </td>
                    <td class="border p-2">{{ prod.nama_produk }}</td>
                    <td class="border p-2 text-right">{{ prod.formatted_harga_produk }}</td>
                    <td class="border p-2">
                        <jet-danger-button :disabled="sudahDiajukan" :class="{ 'opacity-25': sudahDiajukan }" @click.native="hapusProduk(prod)">
                            Hapus
                        </jet-danger-button>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="4" class="border text-center p-2">Belum ada barang</td>
                </tr>
            </tbody>
        </table>
        <jet-dialog-modal :show="showDeleteDialog">
            <template #title>
                Hapus Produk
            </template>

            <template #content>
                <img class="w-20 h-20 border rounded-sm block mb-4 object-cover" :src="wantToBeDeleted.storage_foto_produk_path" :alt="wantToBeDeleted.nama_produk" />
                <p>
                    Apakah Anda yakin ingin menghapus produk <span class="font-bold">{{ wantToBeDeleted.nama_produk }}</span> ini? Anda bisa mengeditnya jika ada kesalahan (atau typo) daripada menghapusnya lalu menambah produk baru. Penghapusan produk bersifat permanen dan tidak bisa dipulihkan.
                </p>
            </template>

            <template #footer>
                <jet-secondary-button class="mr-3" @click.native="showDeleteDialog = false">
                    Kembali
                </jet-secondary-button>

                <jet-danger-button @click.native="confirmDeletion">
                    Hapus Produk
                </jet-danger-button>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>
    import JetDangerButton from '@/Jetstream/DangerButton';
    import JetDialogModal from '@/Jetstream/DialogModal';
    import JetSecondaryButton from '@/Jetstream/SecondaryButton';
    import { filter } from 'lodash';
    
    export default {
        components: {
            JetDangerButton,
            JetDialogModal,
            JetSecondaryButton,
        },

        props: ['produk', 'sudahDiajukan'],

        data() {
            return {
                showDeleteDialog: false,

                wantToBeDeleted: {
                    id: null,
                    nama_produk: null,
                    foto_produk: null,
                },
            }
        },

        methods: {
            hapusProduk(prod) {
                this.wantToBeDeleted = prod;
                this.showDeleteDialog = true;
            },

            confirmDeletion() {
                this.wantToBeDeleted._method = 'DELETE';
                console.log(this.wantToBeDeleted);
                this.$inertia.post(route('produk.destroy', this.wantToBeDeleted));
                this.showDeleteDialog = false;
            }
        }
    }
</script>