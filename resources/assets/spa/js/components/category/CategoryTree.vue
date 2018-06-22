<template>
    <ul class="category-tree">
        <li v-for="(index, o) in categories" class="category-child">
            <div class="valign-wrapper">
                <a href="javascript:void(0)" class="category-symbol {{ categoryIconColor(o) }}">
                    <i class="material-icons">{{ categoryIcon(o) }}</i>
                </a>
                <span class="valign">{{{ categoryText(o) }}}</span>
            </div>
            <category-tree :categories="o.children.data"></category-tree>
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
            }
        },
        methods: {
            categoryText(category){
                return category.children.data.length > 0 ? `<strong>${category.name}</strong>` : category.name;
            },
            categoryIcon(category){
                return category.children.data.length > 0 ? 'folder' : 'label';
            },
            categoryIconColor(category){
                return category.children.data.length > 0 ? 'green-text' : 'grey-text';
            }
        }
    }
</script>