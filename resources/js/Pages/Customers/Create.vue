<template>
  <app-layout>
    <div class="">
      <form @submit.prevent="submit">
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
          <input
            type="text"
            v-model="form.name"
            class="pr-6 pb-8 w-full lg:w-1/2"
            placeholder="Enter Customer Name"
            label="name"
          />
          <div v-if="errors.name">{{ errors.name }}</div>
          <input
            type="text"
            v-model="form.email"
            class="pr-6 pb-8 w-full lg:w-1/2"
            placeholder="Enter Email"
            label="email"
          />
          <div v-if="errors.email">{{ errors.email }}</div>
          <input
            type="text"
            v-model="form.phone"
            class="pr-6 pb-8 w-full lg:w-1/2"
            placeholder="Enter Phone no"
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
            Create Customer
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
        email: null,
        phone: null,
      },
    };
  },
  methods: {
    submit() {
      this.$inertia.post(this.route("customers.store"), this.form);
    },
  },
};
</script>
