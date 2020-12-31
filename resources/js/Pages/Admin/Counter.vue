<template>
    <div class="flex justify-between items-center bg-white rounded-none sm:rounded-lg shadow-lg p-6">
        <div class="flex flex-col">
            <h5 class="text-xl">{{ title }}</h5>
            <h3 class="text-3xl font-bold">{{ count }}</h3>
        </div>
        <i class="fas fa-2x" :class="icon"></i>
    </div>
</template>

<script>
    export default {
        props: ['count', 'title', 'icon']
    }
</script>