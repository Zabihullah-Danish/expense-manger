<script>
// import test from './pages/test.vue';
export default{
    data() {
        return {
            name: "",
            lastname: "Danish",
            count: 0,


            //styles for components.
            btnStyle:'p-2 border shadow bg-blue-500 text-white rounded-md'

        }
    },
    methods:{

        getName(){
            axios.get('/api/').then(response => {
                this.name = response.name
            });
        },

        fullName(){
            return this.name + " " + this.lastname;
        },
        increment(){
            this.count++
        },

        decrement(){
            this.count--
        },

        resetToZero(){
            this.count = 0;
        }
    },
    mounted(){
        this.getName();
    }
}
</script>

<template>
    <div class="w-full">
        <div class="flex flex-col">
            <div class="flex flex-row border p-2">
                <div class="flex flex-col w-2/12 border">
                    <div class="border">
                        <!-- Logo goes here -->
                        {{ getName() }}
                        Logo
                    </div>
                    <div class="border">
                        <!-- menu items go here -->
                        Menu
                    </div>
                </div>
                <div class="w-10/12">
                    
                    <div class="flex flex-col">
                        <div class="border">
                            <!-- Top bar go here -->
                            Top Bar
                        </div>
                        <div class="h-screen border">
                            <!-- content here -->
                            <div>

                                <button :class="btnStyle" v-on:click="increment()">Increment</button>
                                <button @click="resetToZero()" class="bg-gray-400 text-white rounded-md p-2">Reset(0) {{ count }}</button>
                                <button :class="btnStyle" v-on:click="decrement()">Decrement</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
            
            </div>

            <div>
                <!-- Footer here -->
                <div class="text-center p-5 bg-zinc-800 text-white">
                    <h1>Footer</h1>
                </div>
            </div>

        </div>
      
    </div>
</template>