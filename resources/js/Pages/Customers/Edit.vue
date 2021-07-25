<template>
  <app-layout>
    <div class="">
      <form @submit.prevent="form.put(route('customers.update', customer.id))">
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
            v-model="form.email"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="email"
          />
          <div v-if="errors.email">{{ errors.email }}</div>
          <input
            type="text"
            v-model="form.phone"
            class="pr-6 pb-8 w-full lg:w-1/2"
            label="phone"
          />
          <div v-if="errors.phone">{{ errors.phone }}</div>
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
            Update Customer
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
    customer: Object,
  },

  data() {
    return {
      form: this.$inertia.form({
        name: this.customer.name,
        email: this.customer.email,
        phone: this.customer.phone,
      }),
    };
  },
};
</script>
