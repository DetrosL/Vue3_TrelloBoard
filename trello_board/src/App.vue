<script setup>
    import TodoHeader from './components/TodoHeader.vue';
    import TodoBoard from './components/TodoBoard.vue';
    import TodoColumns from './components/TodoColumns.vue';
    import TodoTask from './components/TodoTask.vue';
    import TodoFooter from './components/TodoFooter.vue';
    import { ref, provide } from 'vue'
    
    const list_todo = ref([]);
    const list_columns = ref([]);
    provide('list_todo', list_todo);
    provide('list_columns', list_columns);
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
<style scoped>
</style>