<template>
    <div class="bg-white rounded-md shadow-md px-6 py-4">
        <h5 class="text-xl mb-4">Pilih Tema Warna</h5>
        <div class="grid grid-cols-3 grid-flow-row">
            <div @click="chooseColorTheme('red')" :class="(colorChoosen == 'red' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Red</p>
                <div class="w-8 h-8 bg-red-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('orange')" :class="(colorChoosen == 'orange' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Orange</p>
                <div class="w-8 h-8 bg-orange-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('amber')" :class="(colorChoosen == 'amber' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Amber</p>
                <div class="w-8 h-8 bg-amber-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('yellow')" :class="(colorChoosen == 'yellow' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Yellow</p>
                <div class="w-8 h-8 bg-yellow-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('lime')" :class="(colorChoosen == 'lime' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Lime</p>
                <div class="w-8 h-8 bg-lime-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('green')" :class="(colorChoosen == 'green' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Green</p>
                <div class="w-8 h-8 bg-green-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('emerald')" :class="(colorChoosen == 'emerald' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Emerald</p>
                <div class="w-8 h-8 bg-emerald-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('teal')" :class="(colorChoosen == 'teal' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Teal</p>
                <div class="w-8 h-8 bg-teal-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('cyan')" :class="(colorChoosen == 'cyan' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Cyan</p>
                <div class="w-8 h-8 bg-cyan-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('lightBlue')" :class="(colorChoosen == 'lightBlue' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">L. Blue</p>
                <div class="w-8 h-8 bg-lightBlue-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('blue')" :class="(colorChoosen == 'blue' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Blue</p>
                <div class="w-8 h-8 bg-blue-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('indigo')" :class="(colorChoosen == 'indigo' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Indigo</p>
                <div class="w-8 h-8 bg-indigo-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('violet')" :class="(colorChoosen == 'violet' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Violet</p>
                <div class="w-8 h-8 bg-violet-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('purple')" :class="(colorChoosen == 'purple' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Purple</p>
                <div class="w-8 h-8 bg-purple-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('fuchsia')" :class="(colorChoosen == 'fuchsia' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Fuchsia</p>
                <div class="w-8 h-8 bg-fuchsia-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('pink')" :class="(colorChoosen == 'pink' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Pink</p>
                <div class="w-8 h-8 bg-pink-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('rose')" :class="(colorChoosen == 'rose' ? activeClass : '')" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Rose</p>
                <div class="w-8 h-8 bg-rose-400 rounded-full"></div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                colorChoosen: this.$page.data.layout_picker.color_scheme_used,
            }
        },

        methods: {
            chooseColorTheme(color) {
                if(this.colorChoosen == color) {
                    this.colorChoosen = null; 
                    color = null;
                } else {
                    this.colorChoosen = color; 
                }
                
                this.$emit('colorChoosen', color);
            }
        },

        computed: {
            activeClass() {
                let bg = '';

                if(this.colorChoosen) {
                    bg = `bg-${this.colorChoosen}-500 hover:bg-${this.colorChoosen}-500 `;
                }
                
                return `${bg} text-white`;
            }
        }
    }
</script>