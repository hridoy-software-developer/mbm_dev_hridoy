<template>
	<div class="m-2 d-flex align-items-center justify-content-between">
		<p class="m-0">Total Record : {{paginationForm.total}}</p>
		<div>
			<button class="btn btn-sm btn-primary mr-2" 
				v-if="paginationForm.prev_page_url != null" 
				@click="$emit('onPaginationChange',paginationForm.prev_page_url)"
			>Previous</button>
			<button class="btn btn-sm btn-info" 
				v-if="paginationForm.next_page_url != null" 
				@click="$emit('onPaginationChange',paginationForm.next_page_url)"
			>Next</button>
		</div>
	</div>
</template>    

<script setup>
	const props = defineProps(['paginationForm']);
</script>