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
                    <div v-if="userProgresses.length > 0">
                        <user-progress
                            v-show="incompleteShown"
                            v-for="progress in userProgresses"
                            :key="progress.id"
                            :userData="progress" />
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
                userProgresses: this.$page.data,
                incompleteShown: true,
                completeShown: true,
            }
        }
    }
</script>