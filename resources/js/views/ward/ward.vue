<template>
  <v-container>i am component</v-container>
</template>

<script>
import ApiService from "../../services/ApiService";
export default {
  name: "Ward",
  data() {
    return {};
  },
  methods: {
    testApi() {
      ApiService.executeQueryGet("/patients/")
        .then(response => {
          console.log(response);
        })
        .catch(err => {});
    }
  },
  created() {
    this.testApi();
  }
};
</script>