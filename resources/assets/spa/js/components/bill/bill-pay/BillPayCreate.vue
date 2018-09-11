<template src="../_form.html"></template>

<script>
    import billPayMixin from '../../../mixins/bill-mixin';
    export default{
        mixins: [billPayMixin],
        methods: {
            namespace(){
                return 'billPay';
            },
            title(){
                return 'Novo pagamento';
            }
        }
    }
</script>