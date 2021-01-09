<template>
    <div class="bg-white border-l-4 p-6 mt-6 rounded-none sm:rounded-lg shadow-lg mb-6">
        <h5 class="text-xl font-semibold mb-2">Admob</h5>
        <p class="mt-2">
            App ID: 
            <span class="block bg-gray-800 text-white text-xs rounded-md p-2 mt-1">{{ user.admob.app_id }}</span>
        </p>
        <p class="mt-2">
            Ad Unit ID:
            <span class="block bg-gray-800 text-white text-xs rounded-md p-2 mt-1">{{ user.admob.ad_id }}</span>
        </p>
    </div>
</template>

<script>
    export default {
        props: ['user']
    }
</script>