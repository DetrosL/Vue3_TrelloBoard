<script setup>
    import { ref, inject } from 'vue'

    const list_columns  = inject('list_columns');
    const title_col     = ref('');

    function newCol(){
        const lastId = list_columns.value.length > 0 ? list_columns.value[list_columns.value.length - 1].id : 0

        list_columns.value.push({
            id: lastId + 1,
            titleC: title_col.value,
        });

        title_col.value = '';
    }

</script>
<template>
    <div class="modal fade" id="addColModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content d-flex">
                <div class="modal-header">
                    <h4 class="modal-title">New Column</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div> 
                <form @submit.prevent="newCol">
                    <label for="title" class="form-label">Title column:</label>
                    <input 
                        v-model="title_col"    
                        type="text" 
                        class="form-control inputs" 
                        id="title"
                        name="title" />

                    <div v-for="col in list_columns">{{ col.titleC }}</div>

                    <button button type="submit" class="btn btn-success save">Add</button>
                </form> 
                             
            </div>
        </div>
    </div>
</template>
<style scoped>

    .colors{
        margin-bottom: 1.4em;
        width: 10em;
        height: 3em;
    }

    .save {
        padding: 0.6em 1.2em;
        font-weight: 500;
        width: 25em;
        margin-bottom: 1.5em;
    }
</style>