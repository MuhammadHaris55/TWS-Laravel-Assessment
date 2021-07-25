<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Sales</h2>
    </template>
    <div class="">
      <form @submit.prevent="submit">
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
          <!-- Reference -->
          <div class="p-2 mr-2 mb-2 mt-4 ml-6 flex flex-wrap">
            <input
              type="text"
              v-model="form.reference"
              class="
                pr-2
                pb-2
                w-full
                lg:w-1/4
                rounded-md
                placeholder-indigo-300
              "
              label="reference"
              placeholder="Enter Reference"
            />
            <div v-if="errors.reference">{{ errors.reference }}</div>
          </div>
          <!-- CUSTOMER ID -->
          <div class="p-2 mr-2 mb-2 ml-6 flex flex-wrap">
            <select
              v-model="form.customer_id"
              class="pr-2 pb-2 w-full lg:w-1/4 rounded-md"
              label="customer_id"
              aria-placeholder="Select Customer"
            >
              <option
                v-for="customer in customers"
                :key="customer.id"
                :value="customer.id"
              >
                {{ customer.name }}
              </option>
            </select>
            <div v-if="errors.customer">{{ errors.customer }}</div>
          </div>
          <!-- DESCRIPTION -->
          <!-- <div class="p-2 mr-2 mb-2 mt-4 ml-6 flex flex-wrap">
          <input
            type="text"
            v-model="form.description"
            class="pr-2 pb-2 w-full lg:w-1/4 rounded-md placeholder-indigo-300"
            label="description"
            placeholder="Enter Description"
          />
          <div v-if="errors.description">{{ errors.description }}</div>
        </div> -->
        <div class="panel-body">
          <button
            class="border bg-indigo-300 rounded-xl px-4 py-2 m-4"
            @click.prevent="addRow"
          >
            Add row
          </button>
          <div v-if="isError">{{ firstError }}</div>
          <table class="table border">
            <thead class="">
              <tr>
                <th>Product:</th>
                <th>Quantity:</th>
                <th>Total:</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr v-for="(sale, index) in form.sales" :key="sale.id"> -->
                  <tr>
                <!-- <td>
                  <input
                    type="text"
                    v-model="form.reference"
                    class="pr-6 pb-8 w-full lg:w-1/2"
                    placeholder="Enter Reference No"
                    label="reference"
                  />
                </td>
                <div v-if="errors.reference">{{ errors.reference }}</div> -->
                <!-- <td>
                  <select v-model="sale.customer_id" class="rounded-md w-36">
                    <option
                      v-for="customer in customers"
                      :key="customer.id"
                      :value="customer.id"
                    >
                      {{ customer.name }}
                    </option>
                  </select>
                </td> -->
                <td>
                  <select v-model="sale.product_id" class="rounded-md w-36">
                    <option
                      v-for="product in products"
                      :key="product.id"
                      :value="product.id"
                    >
                      {{ product.name }}
                    </option>
                  </select>
                </td>
                <td>
                  <input
                    type="number"
                    v-model="form.quantity"
                    class="pr-6 pb-8 w-full lg:w-1/2"
                    placeholder="Enter Quantity"
                    label="quantity"
                  />
                </td>
                <!-- <div v-if="errors.quantity">{{ errors.quantity }}</div> -->
                <td>
                  <input
                    type="number"
                    v-model="form.total"
                    placeholder="Total Price"
                    class="pr-6 pb-8 w-full lg:w-1/2"
                    label="totalprice"
                    readonly
                  />
                </td>
                <!-- <div v-if="errors.totalprice">{{ errors.totalprice }}</div> -->
                <!-- <td>
                  <input
                    type="number"
                    v-model="form.grandtotal"
                    class="pr-6 pb-8 w-full lg:w-1/2"
                    placeholder="Enter Grand Price"
                    label="grandtotal"
                    readonly
                  />
                </td> -->
              </tr>
            </tbody>
          </table>
          <!-- <div v-if="errors.grandtotal">{{ errors.grandtotal }}</div> -->
        </div>
        <div
          class="
            px-8
            py-4
            bg-gray-100
            border-t border-gray-200
            flex
            justify-end
            items-center
          "
        >
          <button
            class="border bg-indigo-300 rounded-xl px-4 py-2 m-4"
            type="submit"
          >
            Create Sale
          </button>
        </div>
      </form>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  components: {
    AppLayout,
  },

  props: {
    errors: Object,
    customers: Object,
    products: Object,
  },

  setup(props) {
    const form = useForm({
      //   date: null,
      reference: null,
      customer_id: props.customers[0].id,
      grandtotal: null,

      sales: [
        {
          product_id: props.products[0].id,
          quantity: 0,
          total: 0,
        },
        // {
        //   account_id: props.accounts[0].id,
        //   debit: 0,
        //   credit: 0,
        // },
      ],
    });

    return { form };
  },

  data() {
    return {
      form: {
        reference: null,
        customer: null,
        product: null,
        quantity: null,
        total: null,
        grandtotal: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(this.route("sales.store"), this.form);
    },

    addRow() {
      this.form.sales.push({
        product_id: this.product_first.id,
        quantity: 0,
        total: 0,
      });
      count += 1;
      console.log(count);
    },
    deleteRow(index) {
      this.form.sales.splice(index, 1);
    },

    grandtotal() {
      let grandtotal = 0;
      for (var i = 0; i < this.form.sales.length; i++) {
        grandtotal = grandtotal + parseInt(this.form.sales[i].total);
      }
      this.grandtotal = grandtotal;
    },
  },
  watch: {},
};
</script>
