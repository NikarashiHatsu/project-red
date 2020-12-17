<template>
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
            <tr v-for="(prod, index) in produk" :key="index">
                <td class="border p-2">
                    <img class="w-20 h-20 border rounded-sm block mx-auto" :src="prod.foto_produk_path" :alt="'Foto Produk ' + prod.nama_produk">
                </td>
                <td class="border p-2">{{ prod.nama_produk }}</td>
                <td class="border p-2 text-right">{{ prod.harga_produk }}</td>
                <td class="border p-2">Opsi</td>
            </tr>
        </tbody>
        <tbody v-else>
            <tr>
                <td colspan="4" class="border text-center p-2">Belum ada barang</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: ['produk'],
    }
</script>