<template>
    <BackendLayout>
        <div class="card w-50">
            <div class="header">
                <span>Edit Post</span>
            </div>
            <div class="body p-3">
                <form @submit.prevent="submitForm">
                    <div class="form-group">
                        <label>Enter Title</label>
                        <input type="text" class="form-control" placeholder="Enter title" v-model="form.title">
                        <div class="validation_error" 
                            v-if="usePage().props.value.errors.title">
                            {{ usePage().props.value.errors.title[0] }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Enter description</label>
                        <textarea class="form-control" placeholder="Enter description" rows="7" v-model="form.description"></textarea>
                        <div class="validation_error" 
                            v-if="usePage().props.value.errors.description">
                            {{ usePage().props.value.errors.description[0] }}
                        </div>
                    </div>
                    <div class="account-dialog-actions d-flex" style="justify-content: center;">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </BackendLayout>
</template>

<script setup>
    import { ref, reactive, onMounted, computed } from "vue";
    import { usePage, useForm } from '@inertiajs/inertia-vue3';

    const baseURL = window.baseURL;

    const form = useForm({
        id: usePage().props.value.post.id,
        title: usePage().props.value.post.title,
        description: usePage().props.value.post.description
    });

    const submitForm = () => {
        form.post(window.baseURL+'/admin/post/update');
    };

</script>   

<style lang="scss" scoped>
    .search{
        margin: 0px;
        input{
            width: 200px;
            height: 35px;
            padding: 5px;
        }
    }
    label{
        text-transform: capitalize;
        font-weight: 600;
        &:after{
            content: ' : '
        }
    }
</style>