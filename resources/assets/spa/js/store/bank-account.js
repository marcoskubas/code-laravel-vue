import {BankAccount} from '../services/resources';
import SearchOptions from '../services/search-options';

const state = {
    bankAccounts : [],
    bankAccountDelete: null,
    bankAccountSave: {
        name     : 'minha conta',
        agency   : '',
        account  : '',
        bank_id  : '',
        'default': false
    },
    searchOptions: new SearchOptions('bank')
};

const mutations = {
    updateName(state, name){
        state.bankAccountSave.name = name;
    },
    set(state, bankAccounts){
        state.bankAccounts = bankAccounts;
    },
    setDelete(state, bankAccount){
        state.bankAccountDelete = bankAccount;
    },
    'delete'(state){
        state.bankAccounts.$remove(state.bankAccountDelete);
    },
    setOrder(state, key){
        state.searchOptions.order.key = key;
        let sort = state.searchOptions.order.sort;
        state.searchOptions.order.sort = sort == 'desc' ? 'asc' : 'desc';
    },
    setCurrentPage(state, currentPage){
        state.searchOptions.pagination.current_page = currentPage;
    },
    setSort(state, sort){
        state.searchOptions.order.sort = sort;
    },
    setFilter(state, filter){
        state.searchOptions.search = filter;
    },
    setPagination(state, pagination){
        state.searchOptions.pagination = pagination;
    }

};

const actions = {
    query(context){
        let searchOptions = context.state.searchOptions;
        return BankAccount.query(searchOptions.createOptions()).then((response) => {
            console.log(response.data.data);
            context.commit('set', response.data.data);
            // context.commit('setPagination', response.data.meta.pagination);
        });
    },
    queryWithSortBy(context, key){
        context.commit('setOrder', key);
        context.dispatch('query');
    },
    queryWithPagination(context, currentPage){
        context.commit('setCurrentPage', currentPage);
        context.dispatch('query');
    },
    queryWithFilter(context){
        context.dispatch('query');
    },
    'delete'(context){
        let id = context.state.bankAccountDelete.id;
        BankAccount.delete({id : id}).then((response) => {
            context.commit('delete');
            context.commit('setDelete', null);
            let bankAccounts = context.state.bankAccounts;
            let pagination   = context.state.searchOptions.pagination;
            if(bankAccounts.length === 0 && pagination.current_page > 0){
                context.commit('setCurrentPage', pagination.current_page--);
            }
            return response;
        });
    }
};

const module = {
    state, mutations, actions
}

export default module;