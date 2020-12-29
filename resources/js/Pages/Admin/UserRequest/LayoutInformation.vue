<template>
    <div class="bg-white border-l-4 p-6 rounded-lg shadow-lg mb-6">
        <h5 class="text-xl font-semibold mb-2">Layout dan Warna Dipilih</h5>
        <p>ID Layout: {{ layout.layout_id_used }}</p>
        <p>
            <span>Kode Warna Tema:</span> 
            <span :class="'bg-' + layout.color_scheme_used + '-500 text-white py-1 px-2 rounded-md ml-1'">{{ layout.color_scheme_used }}</span>
        </p>
    </div>
</template>

<script>
    export default {
        props: ['layout']
    }
</script>