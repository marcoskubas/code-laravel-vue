
<template>
	<div id="app">
		<div class="spinner-fixed" v-if="loading">
			<div class="spinner">
				<div class="indeterminate"></div>
			</div>
		</div>

        <header v-if="showMenu">
			<menu></menu>
        </header>

        <main>
        	<router-view></router-view>
        </main>

        <footer class="page-footer">
            <div class="footer-copyfight">
                <div class="container">
                    <a class="grey-text text-lighten-4" href="http://localhost:3001">{{ year }} Laravel Vue SPA</a>
                </div>
            </div>
        </footer>

    </div>
</template>

<script type="text/javascript">
	import MenuComponent from './Menu.vue';
    import store from '../store/store';
	export default {
		components: {
			'menu' : MenuComponent
		},
		data(){
			return {
				year 	: new Date().getFullYear(),
				loading : false
			}
		},
		created(){
			window.Vue.http.interceptors.unshift((request, next) => {
				this.loading = true;
				next(() => this.loading = false);
			});
		},
		computed: {
		    isAuth(){
		        return store.state.auth.check;
            },
			showMenu(){
				return this.isAuth && this.$route.name != 'auth.login';
			}
		}
	};
</script>

<style type="text/css">
	#app{
		display: flex;
		min-height: 100vh;
		flex-direction: column;
	}

	main{
		flex: 1 0 auto;
	}
</style>