<template>
  <app-layout>
    <div class="">
      <form @submit.prevent="form.put(route('products.update', product.id))">
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
          <input
            type="text"
            v-model="form.name"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="name"
          />
          <div v-if="errors.name">{{ errors.name }}</div>
          <input
            type="text"
            v-model="form.description"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="description"
          />
          <div v-if="errors.description">{{ errors.description }}</div>
          <input
            type="text"
            v-model="form.retailprice"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="retailprice"
          />
          <div v-if="errors.retailprice">{{ errors.retailprice }}</div>
          <input
            type="text"
            v-model="form.wholesaleprice"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="wholesaleprice"
          />
          <div v-if="errors.wholesaleprice">{{ errors.wholesaleprice }}</div>
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
            Update Product
          </button>
        </div>
      </form>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },

  props: {
    errors: Object,
    product: Object,
  },

  data() {
    return {
      form: this.$inertia.form({
        name: this.product.name,
        description: this.product.description,
        retailprice: this.product.retailprice,
        wholesaleprice: this.product.wholesaleprice,
      }),
    };
  },
};
</script>
