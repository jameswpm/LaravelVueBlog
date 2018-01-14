<template>

    <div>
        <div class="form-inline">
            <a v-if="create" v-bind:href="create">Create</a>
            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Search the Article" v-model="search">
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th style="cursor:pointer" v-on:click="orderColumn(index)" v-for="(title,index) in titles">{{ title }}</th>
                <th v-if="edit || detail || erase">Action</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item, index) in list">
                <td v-for="i in item">{{ i }}</td>
                <td v-if="edit || detail || erase">
                    <form v-bind:id="index" v-if="erase && token" v-bind:action="erase" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" v-bind:value="token">
                        <a v-if="edit" v-bind:href="edit">Edit |</a>
                        <a v-if="detail" v-bind:href="detail">Detail |</a>
                        <a href="#" v-on:click="executeForm(index)">Erase</a>
                    </form>
                    <span v-if="!token">
                        <a v-if="edit" v-bind:href="edit">Edit |</a>
                        <a v-if="detail" v-bind:href="detail">Detail |</a>
                        <a v-if="erase" v-bind:href="erase">Erase</a>
                    </span>
                    <span v-if="token && !erase">
                        <a v-if="edit" v-bind:href="edit">Edit |</a>
                        <a v-if="detail" v-bind:href="detail">Detail</a>
                    </span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titles',
               'items',
               'create',
               'detail',
               'edit',
               'erase',
               'token',
               'order',
               'ordercol'],
        data: function() {
          return {
              search: '',
              orderAux: this.order || "asc",
              orderColAux: this.orderCol || 0
          };
        },
        methods:{
            executeForm: function (index) {
                document.getElementById(index).submit();
            },
            orderColumn(indexColumn) {
                this.orderColAux = indexColumn;
                if (this.orderAux.toLowerCase() == 'asc') {
                    this.orderAux = 'desc';
                } else {
                    this.orderAux = 'asc';
                }
            }
        },
        computed:{
            list:function() {

                let order = this.orderAux;
                let orderCol = this.orderColAux;
                order = order.toLowerCase();
                orderCol = parseInt(orderCol);

                if (order == 'asc') {
                    this.items.sort((a, b) => {
                        if (a[orderCol] > b[orderCol]) {return 1;}
                        if (a[orderCol] < b[orderCol]) {return -1;}
                        return 0;
                    });
                } else {
                    this.items.sort((a, b) => {
                        if (a[orderCol] < b[orderCol]) {return 1;}
                        if (a[orderCol] > b[orderCol]) {return -1;}
                        return 0;
                    });
                }

                return this.items.filter(res => {
                    for (let k = 0; k < res.length; k++) {
                        if ((res[k] + "").toLocaleLowerCase().indexOf(this.search.toLowerCase()) >= 0) {
                            return true;
                        }
                    }
                    return false;
                });
            }
        }
    }
</script>
