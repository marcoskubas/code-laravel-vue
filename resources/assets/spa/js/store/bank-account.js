import {BankAccount} from '../services/resources';

const state = {
    bankAccounts : [],
    bankAccountDelete: null,
};

const mutations = {
    set(state, bankAccounts){
        state.bankAccounts = bankAccounts;
    },
    setDelete(state, bankAccount){
        state.bankAccountDelete = bankAccount;
    },
    'delete'(state){
        state.bankAccounts.$remove(state.bankAccountDelete);
    }
};

const actions = {
    query(context, {pagination, order, search}){
        BankAccount.query({
            page: pagination.current_page + 1,
            orderBy: order.key,
            sortedBy: order.sort,
            search: search
        }).then((response) => {
            context.commit('set', response.data.data);
            let pagination_    = response.data.meta.pagination;
            pagination_.current_page--;
            pagination = pagination_;
        });
    }
};

const module = {
    state, mutations, actions
}

export default module;