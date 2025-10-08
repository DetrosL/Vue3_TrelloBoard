<script setup>
    import { ref, defineProps } from 'vue'

    const props = defineProps({
        task: Object,
        required: true
    })

    console.log('console2:'+props.task);

</script>
<template>
    <div v-if="props.task" class="card">
        <div class="card0">
            <div class="card-color"></div> <!--v-for para cada cor q tiver-->
        </div>
        <div class="card1">
            <p>{{ props.task.titleT }}</p>
        </div>
        <div class="card2">
            <span v-if="props.task.stepsT.id > 0" class="material-symbols-outlined text-dark s_check">check_box</span> <!--steps-->
            <!--<span v-if="true" class="material-symbols-outlined text-dark s_comment">mode_comment</span> comments
            <span v-if="true" class="material-symbols-outlined text-dark s_attach">attachment</span> attachment
            <span v-if="true" class="material-symbols-outlined text-dark s_user">account_circle</span> users-->
        </div>

    </div>
</template>
<style scoped>
    .card {
        display: flex;
        background-color: #fff;
        margin: 0 1em 1em 1em;
        padding: 0.6em;
        padding: 0;
        border-radius: .5em;
        box-shadow: 0 2px 4px rgba(0,0,0,0.3);
        font-family: 'Arial', sans-serif;
        transition: transform 0.2s, box-shadow 0.2s;
        height: 6em;
    }	

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 10px #00000080;
    }

    .card1 {
        height: 2em;
        margin: .4em .4em 0;
    }

    .card2 {
        height: 2em;
        margin: .4em;
        background-color: #ad9718;
        display: flex;
        justify-content: space-between;
        align-items: stretch;
    }
    /* .s_user{
        align-items: right;
    } */
</style>

<!-- 

width: 256;
height: 100;
gap: 8px;
angle: 0 deg;
opacity: 1;
border-radius: 10px;
border-left-width: 4px;
padding-top: 12px;
padding-right: 12px;
padding-left: 16px; 

border-left: 4px solid #FB2C36
-->
