<template>
    <li>
        <div v-if="value">
            <i class="fas fa-check-circle text-green-400 mr-2"></i>
            {{ this.info }}
        </div>
        <div v-else>
            <div v-if="optional">
                <i class="fas fa-minus-circle text-gray-400 mr-2"></i>
                {{ this.info }}
            </div>
            <div v-else>
                <i class="fas fa-times-circle text-red-400 mr-2"></i>
                {{ this.info }}
            </div>
        </div>
    </li>
</template>

<script>
export default {
    props: {
        info: {
            type: String,
        },
        value: {
            type: String,
        },
        optional: {
            type: Boolean,
            default: false,
        },
    }
}
</script>