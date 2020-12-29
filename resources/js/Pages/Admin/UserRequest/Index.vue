<template>
    <admin-app-layout class="text-gray-800">
        <template #header>
            Index Request Form Order
        </template>

        <div class="py-12 text-gray-800">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="grid grid-cols-12 grid-flow-row gap-6">
                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <div class="bg-white border-l-4 border-yellow-400 rounded-none sm:rounded-lg shadow-lg">
                            <h5 class="text-xl font-semibold p-4">Menunggu Persetujuan</h5>
                            <div v-if="requested_orders.length > 0">
                                <user-request
                                    class="p-4 border-t"
                                    v-for="req in requested_orders"
                                    :key="req.id"
                                    :userData="req" />
                            </div>
                            <div class="p-4 border-t" v-else>
                                Belum ada permintaan yang menunggu persetujuan
                            </div>
                        </div>
                        
                        <div class="block md:hidden mt-6 bg-white border-l-4 border-red-400 rounded-none sm:rounded-lg shadow-lg">
                            <h5 class="text-xl font-semibold p-4">Ditolak</h5>
                            <div v-if="rejected_orders.length > 0">
                                <user-request
                                    class="p-4 border-t"
                                    v-for="req in rejected_orders"
                                    :key="req.id"
                                    :userData="req" />
                            </div>
                            <div class="p-4 border-t" v-else>
                                Belum ada permintaan yang ditolak
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <div class="bg-white border-l-4 border-green-400 rounded-none sm:rounded-lg shadow-lg">
                            <h5 class="text-xl font-semibold p-4">Diterima</h5>
                            <div v-if="confirmed_orders.length > 0">
                                <user-request
                                    class="p-4 border-t"
                                    v-for="req in confirmed_orders"
                                    :key="req.id"
                                    :userData="req" />
                            </div>
                            <div class="p-4 border-t" v-else>
                                Belum ada permintaan yang diterima
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 md:col-span-4">
                        <div class="hidden md:block bg-white border-l-4 border-red-400 rounded-lg shadow-lg">
                            <h5 class="text-xl font-semibold p-4">Ditolak</h5>
                            <div v-if="rejected_orders.length > 0">
                                <user-request
                                    class="p-4 border-t"
                                    v-for="req in rejected_orders"
                                    :key="req.id"
                                    :userData="req" />
                            </div>
                            <div class="p-4 border-t" v-else>
                                Belum ada permintaan yang ditolak
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </admin-app-layout>
</template>

<script>
    import AdminAppLayout from '@/Layouts/AdminAppLayout';
    import UserRequest from './../UserRequest';

    export default {
        components: {
            AdminAppLayout,
            UserRequest,
        },
        
        data() {
            return {
                requested_orders: this.$page.requested_orders,
                confirmed_orders: this.$page.confirmed_orders,
                rejected_orders: this.$page.rejected_orders,
            }
        }
    }
</script>