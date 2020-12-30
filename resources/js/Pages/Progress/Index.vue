<template>
    <admin-app-layout>
        <template #header>
            Progress Index
        </template>

        <div class="py-12 text-gray-800">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white rounded-lg shadow-lg">
                    <div class="flex justify-between items-center p-6">
                        <h5 class="text-large inline-flex font-semibold">
                            Belum Selesai
                        </h5>

                        <button @click="incompleteShown = true" v-show="!incompleteShown" class="p-2 bg-transparent inline-flex border border-gray-300 rounded-md">
                            <i class="fas fa-eye-slash"></i>
                        </button>

                        <button @click="incompleteShown = false" v-show="incompleteShown" class="p-2 bg-transparent inline-flex border border-gray-300 rounded-md">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div v-if="$page.uncleared.length > 0">
                        <user-progress
                            v-show="incompleteShown"
                            v-for="progress in $page.uncleared"
                            :key="progress.id"
                            :userData="progress" />
                    </div>
                    <div class="p-6 border-t border-gray-300" v-show="incompleteShown" v-else>
                        Belum ada permintaan baru.
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg mt-6">
                    <div class="flex justify-between items-center p-6">
                        <h5 class="text-large inline-flex font-semibold">
                            Selesai
                        </h5>

                        <button @click="completeShown = true" v-show="!completeShown" class="p-2 bg-transparent inline-flex border border-gray-300 rounded-md">
                            <i class="fas fa-eye-slash"></i>
                        </button>

                        <button @click="completeShown = false" v-show="completeShown" class="p-2 bg-transparent inline-flex border border-gray-300 rounded-md">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                    <div v-if="$page.cleared.length > 0">
                        <user-progress
                            v-show="completeShown"
                            v-for="progress in $page.cleared"
                            :key="progress.id"
                            :userData="progress" />
                    </div>
                    <div class="p-6 border-t border-gray-300" v-show="completeShown" v-else>
                        Belum ada progress yang terselesaikan.
                    </div>
                </div>

            </div>
        </div>
    </admin-app-layout>
</template>

<script>
    import AdminAppLayout from '@/Layouts/AdminAppLayout';
    import UserProgress from './UserProgress';

    export default {
        components: {
            AdminAppLayout,
            UserProgress,
        },

        data() {
            return {
                incompleteShown: true,
                completeShown: true,
            }
        }
    }
</script>