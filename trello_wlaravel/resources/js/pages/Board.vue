<script setup lang="ts">
    import Button from '@/components/ui/button/Button.vue';
    import Heads from '@/components/trello/Heads.vue';
    import teste from '@/components/trello/teste.vue';
    import AddEdit from '@/components/trello/AddEdit.vue';
    import AddPosition from '@/components/trello/AddPosition.vue';
    import ButtonCol from '@/components/trello/ButtonCol.vue';
    import Card from '@/components/trello/Card.vue';
    import App from '@/layouts/App.vue';
    import { ref, computed, provide } from 'vue';
    import { create as createP }  from '@/routes/position';
    import { create as createT }  from '@/routes/task';
    import { edit, create as createTask }  from '@/routes/task';
    import { Link } from '@inertiajs/vue3';
    import { defineProps } from 'vue';
    import Footer from '@/components/trello/Footer.vue';
    import draggable from 'vuedraggable';
    import type { Task, Position } from '@/types/models'

    const props = defineProps<{
        title: string;
        positions: Position[];
        tasks: Task[];
    }>();

    const list_cols = ref(props.positions.map(pos => ({
        ...pos,
        tasks: Array.isArray(pos.tasks) ? pos.tasks : []
    })));

    const columns = computed(() => {
        return list_cols.value.map(col => ({
            ...col,
            tasks: Array.isArray(col.tasks) ? col.tasks : []
        }));
    });

    const ShowCol       = ref(false);
    const ShowTask      = ref(false);
    const isEdit        = ref(false);

    function openCol(){
        ShowCol.value = true;
    }

    function openAdd(){
        ShowTask.value = true;
        console.log("add1");
    }

    function openEdit(){
        ShowTask.value = true;
    }

    function closeCol() {
        ShowCol.value = false;
    }

    function closeTask() {
        ShowTask.value = false;
    }

    const validateData = () => {        
        if (!Array.isArray(props.positions)) {
            console.error('positions is not an array:', props.positions);
        }
        if (!Array.isArray(props.tasks)) {
            console.error('tasks is not an array:', props.tasks);
        }
    };

    validateData();
</script>
<template>
    <App>
        <div class="trello-board">
            <Heads @add-task="openAdd" @close="closeTask"/>
            <div class="flex overflow-x-auto">
                <div v-for="column in list_cols" :key="column.id" class="trello-column">
                    <div class="trello-header-col">
                        <h1 class="trello-title-col">{{ column.desc }}</h1>
                        <h4 class="trello-qt-col">{{ column.tasks.length }}</h4>
                    </div>    
                    <draggable
                        v-model="column.tasks"
                        :group="{ name: 'tasks', pull: true, put: true }"
                        item-key="id"
                        animation="200"
                        ghost-class="trello-ghost">
                        <template #item="{element}">
                            <Card :task="element" @edit-task="openEdit"/>
                        </template>
                        <template #header></template>
                        <template #footer> </template>
                    </draggable>
                </div>
                <ButtonCol @add-col="openCol"/>
            </div>
            <AddPosition v-if="ShowCol" @close="closeCol"/>
            <AddEdit v-if="ShowTask" @close="closeTask"/>
            <Footer />
        </div>
    </App>
</template>