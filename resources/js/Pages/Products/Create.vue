<template>
  <app-layout>
    <div class="">
      <form @submit.prevent="submit">
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
          <input
            type="text"
            v-model="form.name"
            class="pr-6 pb-8 w-full lg:w-1/2"
            placeholder="Enter Product Name"
            label="name"
          />
          <div v-if="errors.name">{{ errors.name }}</div>
          <input
            type="text"
            v-model="form.description"
            class="pr-6 pb-8 w-full lg:w-1/2"
            placeholder="Enter Product Description"
            label="description"
          />
          <div v-if="errors.description">{{ errors.description }}</div>
          <input
            type="text"
            v-model="form.retailprice"
            placeholder="Enter Retail Price"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="retailprice"
          />
          <div v-if="errors.retailprice">{{ errors.retailprice }}</div>
          <input
            type="text"
            v-model="form.wholesaleprice"
            class="pr-6 pb-8 w-full lg:w-1/2"
            placeholder="Enter Wholesale Price"
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
            Create Product
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
  },

  data() {
    return {
      form: {
        name: null,
        description: null,
        retailprice: null,
        wholesaleprice: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(this.route("products.store"), this.form);
    },
  },
};
</script>
