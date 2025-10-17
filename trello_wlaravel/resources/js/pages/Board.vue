<script setup lang="ts">
    import Button from '@/components/ui/button/Button.vue';
    import Heads from '@/components/trello/Heads.vue';
    import AddEdit from '@/components/trello/AddEdit.vue';
    import AddPosition from '@/components/trello/AddPosition.vue';
    import Card from '@/components/trello/Card.vue';
    import App from '@/layouts/App.vue';
    import { ref, computed, provide } from 'vue';
    import { create as createP }  from '@/routes/position';
    import { create as createT }  from '@/routes/task';
    import { Link } from '@inertiajs/vue3';
    import { defineProps } from 'vue';

    interface Task {
        id: number;
        title: string;
        description: string;
        tags: string[];
        comments: string[];
        steps: string[];
        attaches: string[];
    }

    interface Column {
        id: number;
        title: string;
        tasks: string[];
    }

    const props = defineProps<{
        columns?: Column[];
        tasks?: Task[];
    }>();

    const list_columns  = ref(props.columns);
    const list_task     = ref(props.tasks);
    const ShowCol       = ref(false);
    const ShowTask      = ref(false);
    const isEdit        = ref(false);
    
    // function openAdd(id: number){
    //     ShowTask.value = true;
    //     console.log('openEditBOARD', id);
    // }

    function openAdd(){
        ShowTask.value = true;
        isEdit.value = false;
    }

    function openCol(){
        ShowCol.value = true;
    }

    function openEdit(id: number){
        ShowTask.value = true;
        isEdit.value = true;
        console.log('openEditBOARD', id);
    }

</script>
<template>
    <App>
        <div class="trello-board">
            <Heads /> <!--@add-task="openAdd"-->
            <!-- <Link :href="createT.url()"><Button></Button></Link> -->
            <Button @click="openCol">New Col</Button>
            <Button @click="openEdit">New Task</Button>
            <div class="d-flex overflow-x-auto">
                <div v-for="column in list_columns" :key="column.id" class="trello-column">
                    <draggable
                        v-model="column.tasks"
                        :group="{ name: 'tasks', pull: true, put: true }"
                        item-key="id"
                        animation="200"
                        ghost-class="trello-ghost">
                        <template #item="{ element: taskId }">
                            <Card :task="taskId" /> <!-- @edit-task="openEdit($evt)"  -->
                        </template>
                    </draggable>
                </div>
            </div>
            <div v-if="ShowCol">
                <AddPosition class="modal fade"/>
            </div>
            <div v-if="ShowTask">
                <AddEdit  class="modal fase"/>
            </div>
        </div>
    </App>
</template>