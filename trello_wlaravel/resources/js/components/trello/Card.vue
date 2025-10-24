<script setup lang="ts">
    import { Blend } from 'lucide-vue-next';
    import { defineProps, ref } from 'vue'
    import type { Task } from '@/types/models'

    const props = defineProps<{
        task: Task;
    }>();

    const emit = defineEmits(["edit-task"]);

    function openEdit(){
        emit('edit-task', props.task);
        console.log('[CARD] Clicou no card → emitindo task:', props.task);
    }
</script>
<template>
    <div v-if="props.task" class="trello-card" :style="{borderLeftColor: props.task.tags[0] ? props.task.tags[0].color : 'black' }" @click="openEdit">
        <div class="trello-card0" >
            <div v-for="tag in props.task.tags" :key="tag.id" class="trello-card-color" :style="{backgroundColor: tag.color }"></div>
        </div>
        <div class="trello-card1">
            <p>{{ props.task.nome }}</p>
        </div>
        <div class="trello-card2">
            <div class="trello-card2-1">
                <a v-if="props.task.steps.length > 0" class="trello-icons tre-teste" href="">
                    <span class="material-icons text-dark">check_box</span> <span>{{ task.steps.filter(item => item.completed == true).length }}/{{ props.task.steps.length }}</span> <!--dark:text-white-->
                </a>
                <a v-if="props.task.comments.length > 0" class="trello-icons tre-teste2"  href="">
                    <span class="material-icons text-dark">mode_comment</span><span>{{ props.task.comments.length }}</span>
                </a>
                <a v-if="props.task.attaches.length > 0" class="trello-icons"  href="">
                    <span class="material-icons text-dark">attachment</span><span>{{ props.task.attaches.length }}</span>
                </a>
            </div>
            <div class="trello-card2-2">
                <a v-if="true" class="trello-icons"  href="">
                    <span class="material-icons text-dark">account_circle</span>
                    <span class="material-icons text-dark">account_circle</span>
                </a>
            </div>
        </div>
    </div>
</template>
