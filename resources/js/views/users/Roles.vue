<template>
  <div>
    <v-card>
      <v-card-title>
        <v-row>
          <v-col>
            <v-text-field v-model="role.name" label="New Role*" required></v-text-field>
          </v-col>
          <v-col>
            <v-btn large @click="onSaveRole()">
              <v-icon dark left>mdi-plus</v-icon>Save
            </v-btn>
          </v-col>
        </v-row>
      </v-card-title>
      <v-data-table
        :headers="headers"
        :items="tableData"
        :search="search"
        :loading="loading"
        loading-text="Loading... Please wait"
      >
       <template v-slot:item.action="{ item }">
          <v-icon small class="mr-2" @click="onEditUser(item)">mdi-circle-edit-outline</v-icon>
          <v-icon small @click="onDeleteUser(item)">mdi-delete-circle</v-icon>
        </template>
      </v-data-table>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "role",
  data() {
    return {
      loading: true,
      search: "",
      editedIndex: -1,
      headers: [
        {
          text: "Id",
          value: "id"
        },
        {
          text: "Name",
          value: "name"
        },
        { text: "Guard Name", value: "guard_name" },
        {
          text: "Action"
        }
      ],
      tableData: [],
      role: {
        name: ""
      }
    };
  },
  created() {
    this.initialized();
  },
  methods: {
    initialized() {
      axios
        .get("/api/roles")
        .then(result => (this.tableData = result.data.data))
        .catch(err => {});
      this.loading = false;
    },
    onSaveRole() {
      axios
        .post("/api/roles", this.role)
        .then(result => this.initialized())
        .catch(err => {});
    }
  }
};
</script>

<style scoped>
</style>
