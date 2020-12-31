<template>
    <div class="bg-white border-l-4 p-6 rounded-none sm:rounded-lg shadow-lg">
        <h5 class="text-xl font-semibold mb-2">Informasi User</h5>
        <div class="flex flex-col items-center mt-4">
            <img :src="user.profile_photo_url" :alt="user.name" class="h-20 w-20 rounded-full border border-gray-400 mb-2">
            <p class="font-semibold">{{ user.name }}</p>
            <p class="text-sm">{{ user.email }}</p>
            <p class="text-sm">Bergabung: {{ getDate(user.created_at) }}</p>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],

        methods: {
            getDate(date) {
                let d = new Date(date);
                let hari = this.getHari(d.getDay());
                let tanggal = d.getDate();
                let bulan = this.getBulan(d.getMonth());
                let tahun = d.getFullYear();
                
                return `${hari}. ${tanggal} ${bulan}, ${tahun}`;
            },

            getHari(hari) {
                switch (hari) {
                    case 1: return 'Senin'; break;
                    case 2: return 'Selasa'; break;
                    case 3: return 'Rabu'; break;
                    case 4: return 'Kamis'; break;
                    case 5: return 'Jum\'at'; break;
                    case 6: return 'Sabtu'; break;
                    case 7: return 'Minggu'; break;
                
                    default: break;
                }
            },

            getBulan(bulan) {
                switch (bulan) {
                    case 0: return 'Januari'; break;
                    case 1: return 'Februari'; break;
                    case 2: return 'Maret'; break;
                    case 3: return 'April'; break;
                    case 4: return 'Mei'; break;
                    case 5: return 'Juni'; break;
                    case 6: return 'Juli'; break;
                    case 7: return 'Agustus'; break;
                    case 8: return 'September'; break;
                    case 9: return 'Oktober'; break;
                    case 10: return 'November'; break;
                    case 11: return 'Desember'; break;
                
                    default:
                        break;
                }
            }
        }
    }
</script>