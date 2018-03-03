<template>
	<section class="container margin-top-1 col-7" id="not-found">
		<div class="no-content-wrapper user-select">
			<img class="svg-icons" src="https://cdn.jsdelivr.net/npm/cdn-votepen@1.0.1/svg/notfound.svg"></img>
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
