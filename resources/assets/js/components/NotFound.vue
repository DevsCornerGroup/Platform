<template>
	<section class="container margin-top-1 col-7" id="not-found">
		<div class="no-content-wrapper user-select">
			<img style="width:50px" src="https://image.flaticon.com/icons/svg/202/202381.svg"></img>
			<p v-text="message"></p>
		</div>
	</section>
</template>

<script>
export default {
    data() {
        return {
            message:
                "I hate to be the one breaking it to you, but you've been given a wrong address!"
        };
    }
};
</script>

<style>
#not-found {
    margin-top: 10%;
}
</style>
