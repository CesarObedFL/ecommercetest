<template>
    <div class="container">
        <div class="row justify-content-center"><h4><strong>Products in the Cart</strong></h4></div><hr>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <table iclass="table table-hover table-responsive">
                    <thead>
                    <tr>
                        <th style="width:50%">Product</th>
                        <th style="width:10%" class="text-center">Price</th>
                        <th style="width:10%" class="text-center">Quantity</th>
                        <th style="width:20%" class="text-center">Subtotal</th>
                        <th style="width:5%"></th>
                        <th style="width:5%"></th>
                    </tr>
                    </thead>
                    <tbody>               
                    <tr v-for="item in items" :key="item.id">
                        <td v-text="item.name"></td>
                        <td v-text="item.price" class="text-center"><span class="md-prefix">$</span></td>
                        <td class="text-center"><input v-model.number="item.quantity" type="number" :style="{width:'70%'}"></td>
                        <td v-text="item.subtotal" class="text-center"></td>
                        <td>
                            <button class="btn btn-info btn-sm" @click="updateQtty(item.id, item.quantity)"><i class="fa fa-refresh"></i></button>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" @click="deleteItem(item.id)"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong><span class="md-prefix">Total $</span>{{ total }}</strong></td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
         data() {
            return {
                items : [],
                total : 0,
            }
        },
        mounted() {
            this.getItems();
        },
        methods: {
            getItems() {
                let scope = this;
                scope.total = 0;
                axios.get('/cart/get-cart')
                    .then(function(response) {
                        scope.items = response.data;
                        $.each(response.data, function(key, value) {
                            scope.total += parseFloat(value.subtotal);
                        });
                    })
                    .catch(function(error) {
                        alert('an error has occurred... try again...');
                        console.log(error);
                });
            },
            updateQtty(id, quantity) {
                let scope = this;
                axios.put('/cart/update-cart/'+id, {
                    'quantity' : quantity
                })
                .then(function (response) {
                    alert(response.data.message);
                    scope.getItems();
                })
                .catch(function (error) {
                    alert(error);            
                });
            },
            deleteItem(id) {
                let scope = this;
                if(confirm('Are you sure?...')) {
                    axios.delete('/cart/remove-from-cart/'+id)
                    .then(function (response) {
                        console.log(response);
                        scope.getItems();
                    })
                    .catch(function (error) {
                        alert(error);
                    });
                }
            }
        }
    }
</script>
