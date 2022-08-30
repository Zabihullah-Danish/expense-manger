<script>
import FirstComponent from './components/FirstComponent.vue';
let id = 0;
export default {
    data(){
        return {
            newTodo:'',
            hideCompleted: false,
            // done:'text-red-500',
            underline:'underline',
            todos:[
                {id:id++, text:"History Book",done:true},
                {id:id++, text:"Going to park", done:true},
            ]

        }
    },
    computed:{
        filteredTodos(){
            return this.hideCompleted ? this.todos.filter((t) => !t.done) : this.todos
        }
    },
    components:{
        FirstComponent,
    },
    methods: {
        addTodo(){
            this.todos.push({id:id++, text: this.newTodo, done:false});
            this.newTodo = ''
        },

        removeTodo(todo){
            this.todos = this.todos.filter((t) => t !== todo)
        }
    }
}
</script>

<template>
    
    <hr>
    <div class="max-w-4xl mt-20 border mx-auto">
        <form class="flex flex-col shadow-md" @submit.prevent="addTodo">
            <label for="todo">Todo</label>
            <input v-model="newTodo" class="border p-2" type="text" name="todo" id="todo" placeholder="Enter todo here">
            <input class="float-left p-2 bg-blue-500 text-white inline-block" type="submit" name="add" value="Add">
        </form>
        <h1>Todos List</h1>
        <div>
            <ul v-for="todo in filteredTodos" :key="todo.id" class="space-y-3">
                <li class="">
                    <input type="checkbox" v-model="todo.done">
                    <span :class="{done:todo.done}">{{ todo.text }}</span>
                    <button @click="removeTodo(todo)" class="bg-gray-300 m-1">Remove</button>
                </li>
            </ul>
            <button @click="hideCompleted = !hideCompleted">
             {{ hideCompleted ? 'Show all' : 'Hide completed' }}
            </button>
        </div>
    </div>
</template>

<style scoped>
.done{
    text-decoration:line-through;
}
</style>