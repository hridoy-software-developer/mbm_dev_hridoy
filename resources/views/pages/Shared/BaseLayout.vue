<template>
    <div>
        <slot />
    </div>
</template>

<script>
    export default {
        watch: {
            pageFlashes: {
                handler(flashes) {
                    if (flashes.success) {
                        toaster.success(flashes.success);
                        $('.wating_loader').css('display', 'none');
                    }else if (flashes.error) {
                        toaster.error(flashes.error);
                        $('.wating_loader').css('display', 'none');
                    }else if (flashes.info) {
                        toaster.info(flashes.info);
                        $('.wating_loader').css('display', 'none');
                    }
                },
                deep: true
            }
        },
    }
</script>	