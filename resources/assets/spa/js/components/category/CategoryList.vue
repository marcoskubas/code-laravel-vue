<template>
	<div class="row">
		<page-title>
			<h5>Administração de categorias</h5>
		</page-title>

		<div class="card-panel z-depth-5">
			<category-tree :categories="categories"></category-tree>
		</div>

		<category-save :modal-options="modalOptionsSave"
                       :category.sync="categorySave"
                       :cp-options="cpOptions"
                       @save-category="saveCategory">
			<span slot="title">{{ title }}</span>
			<div slot="footer">
                <button class="btn btn-flat waves-effect waves-red modal-close modal-action">Cancelar</button>
                <button type="submit" class="btn btn-flat waves-effect green lighten-2 modal-close modal-action">
					OK
                </button>
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
	import {CategoryFormat} from "../../services/categoryNsm";

    export default {
		components: {
			'page-title' 	: PageTitleComponent,
			'category-tree' : CategoryTreeComponent,
			'category-save' : CategorySaveComponent
		},
		data(){
		    return {
		        categories: [],
                categoriesFormatted: [],
				categorySave: {
		            id: 0,
					name: '',
					parent_id: 0
				},
				title: 'Adicionar categoria',
				modalOptionsSave: {
		            id: 'modal-category-save'
				},
                options: {
		            data: [
                        {id: 1, text: 'Valor 1'},
                        {id: 2, text: 'Valor 2'},
                        {id: 3, text: 'Valor 3'},
                        {id: 4, text: 'Valor 4'},
                        {id: 5, text: 'Valor 5'},
                        {id: 6, text: 'Valor 6'},
                    ]
                },
                selected: 6
			}
		},
        computed: {
		    //options para o campo select2 de categoria pai
            //categoryParentOptions
            cpOptions(){
                return {
                    data: this.categoriesFormatted,
                    templateResult(category){
                    	let margin = '&nbsp;'.repeat(category.level * 6);
                    	let text   = category.hasChildren ? `<strong>${category.text}</strong>` : category.text;
                    	return `${margin}${text}`;
                    },
                    escapeMarkup(m){
                    	return m;
                    }
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
		            this.formatCategories();
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
			},
            formatCategories(){
            	this.categoriesFormatted = CategoryFormat.getCategoriesFormatted(this.categories);
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