<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Products
      </h2>
    </template>

    <div v-if="$page.props.flash.success" class="bg-green-600 text-white">
      {{ $page.props.flash.success }}
    </div>

    <div class="mt-4">
      <inertia-link
        class="border bg-indigo-300 rounded-xl px-4 py-2 m-4"
        :href="route('products.create')"
      >
        <span>Create</span>
      </inertia-link>
    </div>
    <div class="">
      <table class="shadow-lg border m-4 rounded-xl">
        <thead>
          <tr class="bg-indigo-100">
            <th class="py-2 px-4 border">Name</th>
            <th class="py-2 px-4 border">Description</th>
            <th class="py-2 px-4 border">Retail Price</th>
            <th class="py-2 px-4 border">Wholesale Price</th>
            <th class="py-2 px-4 border">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in data" :key="item.id">
            <td class="py-2 px-4 border">{{ item.name }}</td>
            <td class="py-2 px-4 border">{{ item.description }}</td>
            <td class="py-2 px-4 border">{{ item.retailprice }}</td>
            <td class="py-2 px-4 border">{{ item.wholesaleprice }}</td>
            <td class="py-2 px-4 border">
              <inertia-link
                class="border bg-indigo-300 rounded-xl px-4 py-2 m-4"
                :href="route('products.edit', item.id)"
              >
                <span>Edit</span>
              </inertia-link>
              <button
                class="border bg-indigo-300 rounded-xl px-4 py-2 m-4"
                @click="destroy(item.id)"
              >
                <span>Delete</span>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
  components: {
    AppLayout,
  },
  props: ["data"],
  data() {
    return {};
  },
  methods: {
    destroy(id) {
      this.$inertia.delete(this.route("products.destroy", id));
    },
  },
};
</script>
