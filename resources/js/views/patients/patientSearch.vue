<template>
  <v-layout align-center justify-center row>
    <v-text-field class="mt-7" placeholder="Search" solo v-model="search"></v-text-field>
    <v-list>
      <v-list-item v-for="item in items" :key="item.title" @click>
        <v-list-item-icon>
          <v-icon v-if="item.icon" color="pink">mdi-star</v-icon>
        </v-list-item-icon>

        <v-list-item-content>
          <v-list-item-title v-text="item.title"></v-list-item-title>
        </v-list-item-content>

        <v-list-item-avatar>
          <v-img :src="item.avatar"></v-img>
        </v-list-item-avatar>
      </v-list-item>
    </v-list>
  </v-layout>
</template>

<script>
// apis
import ApiService from "../../services/ApiService.js";

// vuex
import { mapState, mapActions } from "vuex";

export default {
  data: () => ({
    search: null,
    model: null,
    items: []
  }),

  methods: {
    searchPatients() {
      console.log("heep");
      ApiService.executeQueryPost("searchPatient", { query: this.search })
        .then(res => {
          this.items = res.data;
          console.log(this.items);
        })

        .catch(err => {
          console.log(err);
        });
    }
  },
  watch: {
    search(before, after) {
      // Lazily load input items
      if (!this.search) return;
      this.searchPatients();
    }
  }
};
</script>

<style lang="scss" scoped>
</style>



 