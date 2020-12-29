<template>
    <div class="col-span-6 sm:col-span-6 lg:col-span-4 xl:col-span-3">
        <div class="aspect-w-1 aspect-h-1 mb-4">
            <img class="w-full h-full rounded-md border border-gray-300" :src="image" :alt="productName">
        </div>
        <p class="font-semibold">{{ productName }}</p>
        <p class="text-sm mb-2">{{ price }}</p>
        <p v-html="description"></p>
    </div>
</template>

<script>
    export default {
        props: ['image', 'productName', 'price', 'description'],
    }
</script>