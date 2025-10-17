<script setup lang="ts">
    import Button from '@/components/ui/button/Button.vue';
    import TrelloHeader from '@/components/trello/TrelloHeader.vue';
    import Card from '@/components/trello/Card.vue';
    import App from '@/layouts/App.vue';
    import { ref, computed, provide } from 'vue';
    // import { board }  from '@/routes';
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

    const list_columns = ref(props.columns);
    const list_task = ref(props.tasks);

    function openEdit(id: number){
        console.log('openEditBOARD', id);
    }

</script>
<template>
    <App>
        <div class="trello-board">
            <TrelloHeader /> <!--@add-task="openAdd"-->

            <Link :href="createP.url()"><Button>New Position</Button></Link>
            <Link :href="createT.url()"><Button>New Task</Button></Link>
            <div class="d-flex overflow-x-auto">
                <div v-for="column in list_columns" :key="column.id" class="trello-column">
                    <!-- Drag & Drop com vuedraggable -->
                    <draggable
                        v-model="column.tasks"
                        :group="{ name: 'tasks', pull: true, put: true }"
                        item-key="id"
                        animation="200"
                        ghost-class="trello-ghost">
                        <template #item="{ element: taskId }">
                            <Card :task="list_task[taskId]" /> <!-- @edit-task="openEdit($evt)"  -->
                        </template>
                    </draggable>
                </div>
            </div>
        </div>
    </App>
</template>