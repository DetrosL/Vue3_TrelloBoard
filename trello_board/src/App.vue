<script setup>
    import Board from './components/Board.vue';
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
         <Board />
    </div>
</template>