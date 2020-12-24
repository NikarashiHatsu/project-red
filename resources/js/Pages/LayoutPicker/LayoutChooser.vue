<template>
    <div class="bg-white rounded-md shadow-md">
        <h5 class="text-xl px-6 py-4">Pilih Layout</h5>
        <a href="javascript:void(0)" @click="chooseLayout(1)" :class="(activeLayout == 1) ? activeClass : ''" class="flex justify-between items-center px-6 py-3 hover:bg-gray-100 rounded-md transition ease-in-out duration-300">
            <span>Layout 1</span>
            <div :class="(activeLayout == 1) ? activeIconClass : ''" class="p-2 rounded-full text-xs text-center w-8 h-8 transition ease-in-out duration-300">
                <i class="fas fa-chevron-right"></i>
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                activeLayout: this.$page.data.layout_picker.layout_id_used,
            }
        },

        props: ['colorChoosen', 'disabled'],

        methods: {
            chooseLayout(num) {
                if(!this.disabled) {
                    // If it haven't requested
                    // then you could change the layout
                    if(this.activeLayout == num) {
                        this.activeLayout = null;
                        num = null;
                    } else {
                        this.activeLayout = num;
                    }
                    
                    this.$emit('layoutChoosen', num);
                }
            }
        },

        computed: {
            activeClass() {
                let activeBg = 'bg-gray-100 text-black hover:bg-gray-200';

                if(this.colorChoosen) {
                    activeBg = `bg-${this.colorChoosen}-500 text-white hover:bg-${this.colorChoosen}-600`;
                }

                if(this.disabled) {
                    activeBg += ' opacity-50';
                }

                return activeBg;
            },

            activeIconClass() {
                let activeIconBg = 'bg-gray-200';

                if(this.colorChoosen) {
                    activeIconBg = `bg-${this.colorChoosen}-600`;
                }

                if(this.disabled) {
                    activeIconBg += ' opacity-50';
                }

                return activeIconBg;
            }
        }
    }
</script>