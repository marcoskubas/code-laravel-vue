<template>
	<div class="row">
		<page-title>
			<h5>Administração de categorias</h5>
		</page-title>

		<div class="card-panel z-depth-5">
			<category-tree :categories="categories"></category-tree>
		</div>

		<category-save :modal-options="modalOptionsSave" :category.sync="categorySave" @save-category="saveCategory">
			<span slot="title">{{ title }}</span>
			<div slot="footer">
				<button type="submit" class="btn btn-flat waves-effect freen lighten-2 modal-close modal-action green-text">
					OK
				</button>
				<button class="btn btn-flat waves-effect waves-red modal-close modal-action">Cancelar</button>
			</div>
		</category-save>

		<div class="fixed-action-btn">
			<a class="btn-floating btn-large" v-link="{name: 'bank-account.create'}">
				<i class="large material-icons">add</i>
			</a>
		</div>
	</div>
</template>

<script type="text/javascript">
	import PageTitleComponent from '../PageTitle.vue';
	import CategoryTreeComponent from './CategoryTree.vue';
	import CategorySaveComponent from './CategorySave.vue';
	import {Category} from "../../services/resources";

    export default {
		components: {
			'page-title' 	: PageTitleComponent,
			'category-tree' : CategoryTreeComponent,
			'category-save' : CategorySaveComponent,
		},
		data(){
		    return {
		        categories: [],
				categorySave: {
		            id: 0,
					name: '',
					parent_id: 0
				},
				title: 'Adicionar categoria',
				modalOptionsSave: {
		            id: 'modal-category-save'
				}
			}
		},
		created(){
		    this.getCategories();
		},
		methods: {
		    getCategories(){
		        Category.query().then(response => {
		            this.categories = response.data.data;
				});
			},
			saveCategory(){
		        console.log('saveCategory teste');
			},
			modalNew(category){
		        this.categorySave = category;
		        $(`#${this.modalOptionsSave.id}`).modal('open');
			},
			modalEdit(category){
                this.categorySave = category;
                $(`#${this.modalOptionsSave.id}`).modal('open');
			}
		},
		events: {
		    'category-new' (category){
				this.modalNew(category);
			},
            'category-edit' (category){
                this.modalEdit(category);
            }
		}
	}
</script>