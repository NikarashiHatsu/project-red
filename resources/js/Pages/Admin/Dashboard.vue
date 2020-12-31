<template>
    <admin-app-layout>
        <template #header>
            Admin Dashboard
        </template>

        <div class="py-12 text-gray-800">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <!-- Counter -->
                <div class="grid grid-cols-12 grid-flow-row gap-6">
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                        <counter 
                            :title="'Total Admin'"
                            :count="admin_count"
                            :icon="'fa-user-shield'" />
                    </div>
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                        <counter 
                            :title="'Total Pengguna'"
                            :count="user_count"
                            :icon="'fa-user'" />
                    </div>
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                        <counter 
                            :title="'Total Toko'"
                            :count="store_count"
                            :icon="'fa-store'" />
                    </div>
                    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                        <counter 
                            :title="'Total Kasir'"
                            :count="cashier_count"
                            :icon="'fa-cash-register'" />
                    </div>
                </div>
                <!-- /Counter -->

                <!-- Message -->
                <div class="grid grid-cols-12 grid-flow-row gap-6 mt-6">
                    <div class="col-span-12 lg:col-span-8">
                        <div class="bg-white sm:rounded-none lg:rounded-lg shadow-lg p-6">
                            <h3 class="text-2xl font-semibold mb-4">Dashboard</h3>
                            <p>Selamat Datang {{ $page.user.name }}</p>
                            <!-- TODO: Disini entar diisi sama grafik -->
                        </div>
                    </div>
                    
                    <div class="col-span-12 lg:col-span-4">
                        <div class="bg-white sm:rounded-none lg:rounded-lg shadow-lg">
                            <div v-if="pending_requests > 0" class="flex flex-col">
                                <div class="items-center text-center p-4 pt-6">
                                    <i class="fas fa-exclamation-triangle fa-2x mb-4 text-yellow-400"></i>
                                    <h6 class="text-lg font-semibold mb-1">Hey, cek ini!</h6>
                                    <p class="mb-2">Ada permintaan baru yang membutuhkan persetujuan! (Klik untuk melihat informasi lebih detail)</p>
                                </div>
                                <user-request
                                    class="mt-2 p-4 border-t border-gray-300"
                                    v-for="userData in user_requests"
                                    :key="userData.id"
                                    :userData="userData" />
                            </div>

                            <div v-else class="flex flex-col items-center text-center p-6">
                                <i class="fas fa-thumbs-up fa-2x mb-4 text-blue-400"></i>
                                <h6 class="text-lg font-semibold">Semua bagus!</h6>
                                <p>Belum ada permintaan yang diajukan.</p>
                            </div>
                        </div>

                        <div class="bg-white sm:rounded-none lg:rounded-lg shadow-lg mt-6">
                            <div v-if="pending_progress > 0" class="flex flex-col">
                                <div class="items-center text-center p-4 pt-6">
                                    <i class="fas fa-exclamation-triangle fa-2x mb-4 text-yellow-400"></i>
                                    <h6 class="text-lg font-semibold mb-1">Hey, cek ini!</h6>
                                    <p class="mb-2">Ada progress yang belum diselesaikan! (Klik untuk melihat informasi lebih detail)</p>
                                </div>
                                <user-progress
                                    class="mt-2 p-4 border-t border-gray-300"
                                    v-for="userData in user_progress"
                                    :key="userData.id"
                                    :userData="userData" />
                            </div>

                            <div v-else class="flex flex-col items-center text-center p-6">
                                <i class="fas fa-thumbs-up fa-2x mb-4 text-blue-400"></i>
                                <h6 class="text-lg font-semibold">Semua bagus!</h6>
                                <p>Progress telah diselesaikan.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Message -->
            </div>
        </div>
    </admin-app-layout>
</template>

<script>
    import AdminAppLayout from '@/Layouts/AdminAppLayout';
    import Counter from './Counter';
    import UserProgress from './UserProgress';
    import UserRequest from './UserRequest';

    export default {
        components: {
            AdminAppLayout,
            Counter,
            UserProgress,
            UserRequest
        },

        data() {
            return {
                admin_count: this.$page.data.admin_count,
                user_count: this.$page.data.user_count,
                store_count: this.$page.data.store_count,
                cashier_count: this.$page.data.cashier_count,
                pending_requests: this.$page.data.pending_requests,
                pending_progress: this.$page.data.pending_progress,
                user_requests: this.$page.data.user_requests,
                user_progress: this.$page.data.user_progress,
            }
        }
    }
</script>