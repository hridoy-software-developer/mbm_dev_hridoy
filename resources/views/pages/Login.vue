<template>
    <BaseLayout>
        <div class="form-screen">
            <a href="javascript:void(0)" class="spur-logo">
                <i class="fas fa-bolt"></i> 
                <span>MBM Group Admin</span>
            </a>
            <div class="card account-dialog">
                <div class="card-header bg-primary text-white">Administration Login</div>
                <div class="card-body">
                    <form @submit.prevent="submitLogin">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter email" v-model="form.email">
                            <div class="validation_error" 
                                v-if="usePage().props.value.errors.email">
                                {{ usePage().props.value.errors.email[0] }}
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" v-model="form.password">
                            <div class="validation_error" 
                                v-if="usePage().props.value.errors.password">
                                {{ usePage().props.value.errors.password[0] }}
                            </div>
                        </div>
                        <div class="account-dialog-actions d-flex" style="justify-content: center;">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </BaseLayout>
</template>

<script setup>
    import { ref, reactive, onMounted, computed } from "vue";
    import { Inertia } from '@inertiajs/inertia';
    import { usePage, useForm } from '@inertiajs/inertia-vue3';

    const form = useForm({
        email: 'admin@mbmroup.com',
        password: 'password'
    });

    const submitLogin = () => {
        form.post(window.baseURL+'/login');
    };

</script>	