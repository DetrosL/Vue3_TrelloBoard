<script setup>
    import { ref, inject } from 'vue'

    const list_columns  = inject('list_columns');
    const title_col     = ref('');

    function newCol(){
        const idX = list_columns.value.length;

        list_columns.value.push({
            id: idX,
            titleC: title_col.value,
            taskC: [],
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
                    <button button type="submit" class="btn btn-success save">Add</button>
                </form> 
                             
            </div>
        </div>
    </div>
</template>