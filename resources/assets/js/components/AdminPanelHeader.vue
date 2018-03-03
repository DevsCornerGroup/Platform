<template>
	<nav class="nav has-shadow user-select admin-panel-header">
		<div class="container">
			<div class="nav-left">
				<router-link :to="'/night-watch/'" class="nav-item is-tab" active-class="is-active" exact>
					Dashboard 
				</router-link>

				<router-link :to="'/night-watch/submissions'" class="nav-item is-tab" active-class="is-active">
					Submissions
				</router-link>

				<router-link :to="'/night-watch/comments'" class="nav-item is-tab" active-class="is-active">
					Comments
				</router-link>

				<router-link :to="'/night-watch/suggested-channels'" class="nav-item is-tab" active-class="is-active">
					Suggesteds
				</router-link>
			</div>
		</div>
	</nav>
</template>
