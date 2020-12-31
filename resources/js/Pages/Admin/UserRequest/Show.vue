<template>
    <admin-app-layout>
        <template #header>
            User Request - {{ user_data.name }}
        </template>

        <div class="py-12 text-gray-800">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="grid grid-cols-12 grid-flow-row gap-6">
                    <div class="col-span-12 sm:col-span-6 lg:col-span-8">
                        <store-information :class="'border-' + layout_picker.color_scheme_used + '-200'" :storeInfo="form_order" :products="products" :confirmed="apakahDikonfirmasi" :rejected="apakahDitolak" />
                    </div>
                    <div class="col-span-12 sm:col-span-6 lg:col-span-4">
                        <layout-information :class="'border-' + layout_picker.color_scheme_used + '-200'" :layout="layout_picker" />
                        <user-information :class="'border-' + layout_picker.color_scheme_used + '-200'" :user="user_data" />
                        <control-panel :class="'border-' + layout_picker.color_scheme_used + '-200'" :formOrder="form_order" :confirmed="apakahDikonfirmasi" :rejected="apakahDitolak" />
                    </div>
                </div>
                
            </div>
        </div>
    </admin-app-layout>
</template>

<script>
    import AdminAppLayout from '@/Layouts/AdminAppLayout';
    import ControlPanel from './ControlPanel';
    import LayoutInformation from './LayoutInformation';
    import StoreInformation from './StoreInformation';
    import UserInformation from './UserInformation';

    export default {
        components: {
            AdminAppLayout,
            ControlPanel,
            LayoutInformation,
            StoreInformation,
            UserInformation,
        },

        data() {
            return {
                user_data: this.$page.data,
                form_order: this.$page.data.form_order,
                products: this.$page.data.products,
                layout_picker: this.$page.data.layout_picker,
            }
        },

        computed: {
            apakahDikonfirmasi() {
                return this.$page.data.form_order.confirmed;
            },

            apakahDitolak() {
                return this.$page.data.form_order.rejected;
            }
        }
    }
</script>