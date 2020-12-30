<template>
    <inertia-link :href="route('admin.progress.show', userData.id)" class="border-t hover:bg-gray-100 transition ease-in-out duration-300 border-gray-300 p-6 block">
        <div class="flex justify-between">
            <div class="flex w-1/2">
                <div class="w-24 h-24 mr-4">
                    <img class="w-24 h-24 object-cover rounded-md border border-gray-300" :src="userData.form_order.storage_logo_toko_path" :alt="userData.form_order.nama_toko" />
                </div>
                <div class="flex flex-col">
                    <h6 class="text-lg font-semibold mb-2">
                        {{ userData.form_order.nama_toko }}
                    </h6>
                    <p>
                        <span class="font-semibold">Nama Aplikasi:</span> {{ userData.form_order.nama_aplikasi }}
                    </p>
                    <p>
                        <span class="font-semibold">Deskripsi Aplikasi:</span> {{ userData.form_order.deskripsi_aplikasi }}
                    </p>
                    <p>
                        <span class="font-semibold">URL Website Perusahaan:</span> {{ userData.form_order.url_website_perusahaan }}
                    </p>
                    <div class="flex">
                        <inertia-link :href="route('admin.user_request.show', userData.form_order.user_id)" class="inline-flex bg-blue-400 hover:bg-blue-500 border-blue-400 border text-white mt-4 px-2 py-1 rounded transition ease-in-out duration-200">
                            Lihat detail Permintaan
                        </inertia-link>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-end w-1/3">
                <h6 class="text-lg font-semibold mb-4">
                    Progress
                </h6>
                <div class="grid grid-cols-3 grid-flow-row w-full">
                    <div class="col-span-1 text-xs pl-2 bg-green-200 border-green-400 w-full rounded-l-2xl border border-r-0 py-2">
                        Approval
                    </div>
                    <div :class="$page.data.is_apk_created ? 'bg-green-200 border-green-400': 'bg-gray-200 border-gray-400'" class="col-span-1 text-xs pl-2  w-full border border-r-0 py-2">
                        Generate APK
                    </div>
                    <div :class="$page.data.is_published_on_google_play ? 'bg-green-200 border-green-400': 'bg-gray-200 border-gray-400'" class="col-span-1 text-xs pl-2 w-full rounded-r-2xl border py-2">
                        Upload PlayStore
                    </div>
                </div>
            </div>
        </div>
    </inertia-link>
</template>

<script>
    export default {
        props: ['userData'],
    }
</script>