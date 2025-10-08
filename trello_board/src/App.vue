<script setup>
    import TodoHeader from './components/TodoHeader.vue';
    import TodoBoard from './components/TodoBoard.vue';
    import TodoColumns from './components/TodoColumns.vue';
    import TodoTask from './components/TodoTask.vue';
    import TodoFooter from './components/TodoFooter.vue';
    import task from "./data/Task";
    import cols from "./data/Cols";
    import { ref, provide } from 'vue'
    
    const list_columns = ref(cols);
    const list_todo = ref(task);

    provide('list_columns', list_columns);
    provide('list_todo', list_todo);
</script>
<template>
    <div>
         <TodoHeader />
         <TodoBoard />
         <TodoColumns />
         <TodoTask />
         <TodoFooter />
    </div>
</template>