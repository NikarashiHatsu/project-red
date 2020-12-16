<template>
    <li>
        <div v-if="value">
            <i class="fas fa-check-circle text-green-400 mr-2"></i>
            {{ this.info }}
        </div>
        <div v-else>
            <i class="fas fa-times-circle text-red-400 mr-2"></i>
            {{ this.info }}
        </div>
    </li>
</template>

<script>
export default {
    props: ['info', 'value']
}
</script>