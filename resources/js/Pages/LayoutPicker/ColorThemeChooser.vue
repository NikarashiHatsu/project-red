<template>
    <div class="bg-white rounded-md shadow-md px-6 py-4">
        <h5 class="text-xl mb-4">Pilih Tema Warna</h5>
        <div class="grid grid-cols-3 grid-flow-row">
            <div @click="chooseColorTheme('red')" :class="(disabled ? disabledClasses('red') : (colorChoosen == 'red' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Red</p>
                <div class="w-8 h-8 bg-red-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('orange')" :class="(disabled ? disabledClasses('orange') : (colorChoosen == 'orange' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Orange</p>
                <div class="w-8 h-8 bg-orange-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('amber')" :class="(disabled ? disabledClasses('amber') : (colorChoosen == 'amber' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Amber</p>
                <div class="w-8 h-8 bg-amber-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('yellow')" :class="(disabled ? disabledClasses('yellow') : (colorChoosen == 'yellow' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Yellow</p>
                <div class="w-8 h-8 bg-yellow-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('lime')" :class="(disabled ? disabledClasses('lime') : (colorChoosen == 'lime' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Lime</p>
                <div class="w-8 h-8 bg-lime-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('green')" :class="(disabled ? disabledClasses('green') : (colorChoosen == 'green' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Green</p>
                <div class="w-8 h-8 bg-green-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('emerald')" :class="(disabled ? disabledClasses('emerald') : (colorChoosen == 'emerald' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Emerald</p>
                <div class="w-8 h-8 bg-emerald-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('teal')" :class="(disabled ? disabledClasses('teal') : (colorChoosen == 'teal' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Teal</p>
                <div class="w-8 h-8 bg-teal-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('cyan')" :class="(disabled ? disabledClasses('cyan') : (colorChoosen == 'cyan' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Cyan</p>
                <div class="w-8 h-8 bg-cyan-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('lightBlue')" :class="(disabled ? disabledClasses('lightBlue') : (colorChoosen == 'lightBlue' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">L. Blue</p>
                <div class="w-8 h-8 bg-lightBlue-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('blue')" :class="(disabled ? disabledClasses('blue') : (colorChoosen == 'blue' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Blue</p>
                <div class="w-8 h-8 bg-blue-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('indigo')" :class="(disabled ? disabledClasses('indigo') : (colorChoosen == 'indigo' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Indigo</p>
                <div class="w-8 h-8 bg-indigo-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('violet')" :class="(disabled ? disabledClasses('violet') : (colorChoosen == 'violet' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Violet</p>
                <div class="w-8 h-8 bg-violet-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('purple')" :class="(disabled ? disabledClasses('purple') : (colorChoosen == 'purple' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Purple</p>
                <div class="w-8 h-8 bg-purple-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('fuchsia')" :class="(disabled ? disabledClasses('fuchsia') : (colorChoosen == 'fuchsia' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Fuchsia</p>
                <div class="w-8 h-8 bg-fuchsia-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('pink')" :class="(disabled ? disabledClasses('pink') : (colorChoosen == 'pink' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
                <p class="mb-2">Pink</p>
                <div class="w-8 h-8 bg-pink-400 rounded-full"></div>
            </div>
            <div @click="chooseColorTheme('rose')" :class="(disabled ? disabledClasses('rose') : (colorChoosen == 'rose' ? activeClass : ''))" class="transition ease-in-out duration-300 hover:bg-gray-100 cursor-pointer rounded-md p-2 flex flex-col items-center text-center">
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

        props: ['disabled'],

        methods: {
            chooseColorTheme(color) {
                if(!this.disabled) {
                    // If it haven't requested
                    // then you could change the color
                    if(this.colorChoosen == color) {
                        this.colorChoosen = null; 
                        color = null;
                    } else {
                        this.colorChoosen = color; 
                    }
                    
                    this.$emit('colorChoosen', color);
                }
            },

            disabledClasses(color) {
                if(this.colorChoosen == color) {
                    return `opacity-50 bg-${this.colorChoosen}-500 hover:bg-${this.colorChoosen}-500 text-white`;
                } else {
                    return 'opacity-50';
                }
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