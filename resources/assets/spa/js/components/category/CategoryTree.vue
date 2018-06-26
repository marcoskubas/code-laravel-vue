<template>
    <ul class="category-tree">
        <li v-for="(index, o) in categories" class="category-child">
            <div class="valign-wrapper">
                <a :data-activates="dropdownId(o)" href="javascript:void(0)" class="category-symbol {{ categoryIconColor(o) }}">
                    <i class="material-icons">{{ categoryIcon(o) }}</i>
                </a>
                <ul :id="dropdownId(o)" class="dropdown-content">
                    <li>
                        <a href="#" @click.prevent="categoryNew(o)">Adicionar</a>
                    </li>
                    <li>
                        <a href="#" @click.prevent="categoryEdit(o)">Editar</a>
                    </li>
                    <li>
                        <a href="#">Remover</a>
                    </li>
                </ul>
                <span class="valign">{{{ categoryText(o) }}}</span>
            </div>
            <category-tree :categories="o.children.data" :parent="o"></category-tree>
        </li>
    </ul>
</template>

<script type="text/javascript">
    export default {
        name : 'category-tree',
        props: {
            categories : {
                type: Array,
                required: true
            },
            parent : {
                type     : Object,
                required : false,
                'default'(){
                    return null;
                }
            },
        },
        watch: {
            categories: {
                handler(categories){
                    $('.category-child div > a').dropdown({
                        hover: true,
                        inDuration: 300,
                        outDuration: 400,
                        belowOrigin: true
                    });
                },
                deep: true
            }
        },
        methods: {
            dropdownId(category){
                return `category-tree-dropdown-${category.id}`;
            },
            categoryText(category){
                return category.children.data.length > 0 ? `<strong>${category.name}</strong>` : category.name;
            },
            categoryIcon(category){
                return category.children.data.length > 0 ? 'folder' : 'label';
            },
            categoryIconColor(category){
                return category.children.data.length > 0 ? 'green-text' : 'grey-text';
            },
            categoryNew(category){
                this.$dispatch('category-new', category);
            },
            categoryEdit(category){
                this.$dispatch('category-edit', category, this.parent);
            }
        }
    }
</script>