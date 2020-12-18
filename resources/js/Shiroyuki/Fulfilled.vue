<template>
    <li>
        <!-- Semisal valuenya NGGAK bisa dihitung (kek objek, array, dll) -->
        <div v-if="!countable">
            <div class="inline-block" v-show="apakahAda">
                <i class="fas fa-check-circle text-green-400 mr-2"></i>
            </div>
            <div class="inline-block" v-show="!apakahAda">
                <div class="inline-block" v-show="optional">
                    <i class="fas fa-minus-circle text-gray-400 mr-2"></i>
                </div>
                <div class="inline-block" v-show="!optional">
                    <i class="fas fa-times-circle text-red-400 mr-2"></i>
                </div>
            </div>
            {{ this.info }}
        </div>

        <!-- Semisal valuenya BISA dihitung -->
        <div v-else>
            <div class="inline-block" v-show="value.length != 0">
                <i class="fas fa-check-circle text-green-400 mr-2"></i>
            </div>
            <div class="inline-block" v-show="value.length == 0">
                <i class="fas fa-check-circle text-red-400 mr-2"></i>
            </div>
            {{ this.info }}
        </div>
    </li>
</template>

<script>
export default {
    props: {
        value: {
            type: String,
            default: null,
        },
        info: {
            type: String,
            default: null,
        },
        optional: {
            type: Boolean,
            default: false,
        },
        countable: {
            type: Boolean,
            default: false,
        },
        countableObject: {
            type: Array,
            default() {
                return []
            }
        },
    },

    computed: {
        apakahAda() {
            if(!this.countable) {
                return (this.value) ? true : false;
            }
        },
    }
}
</script>