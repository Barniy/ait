<template>
  <div>
    <v-card>
      <v-toolbar>
        <v-text-field
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
          class="hidden-sm-and-down"
        />
        <v-spacer></v-spacer>
        <v-btn @click="onNewUser()">
          <v-icon dark left>mdi-plus</v-icon>User
        </v-btn>
      </v-toolbar>
      <v-data-table
        :headers="headers"
        :items="tableData"
        :search="search"
        loading-text="Loading... Please wait"
        :loading="loading"
        class="elevation-1"
      >
        <template slot="items" slot-scope="props">
          <td>{{ getNestedObject(props.item, ['someArray', index, 'someProp']) }}xcxc</td>
        </template>

        <template v-slot:item.action="{ item }">
          <v-icon small class="mr-2" @click="onEditUser(item)">mdi-circle-edit-outline</v-icon>
          <v-icon small @click="onDeleteUser(item)">mdi-delete-circle</v-icon>
        </template>
      </v-data-table>
    </v-card>
    <v-dialog v-model="dialog" persistent max-width="600px">
      <v-card>
        <v-card-title>
          <span class="headline">{{ formTitle }}</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <form ref="form" lazy-validation>
              <v-row>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field v-model="editedItem.firstName" label="First name*" required></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field v-model="editedItem.middleName" label="Middle name*" required></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field v-model="editedItem.lastName" label="Last name*" required></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-text-field v-model="editedItem.email" label="Email*" required></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-select
                    v-model="editedItem.role"
                    :items="allRoles"
                    label="Roles*"
                    item-text="name"
                    return-object
                    required
                  ></v-select>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-text-field
                    v-model="editedItem.password"
                    label="Password*"
                    type="password"
                    required
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6">
                  <v-text-field
                    v-model="editedItem.password_confirmation"
                    label="Confirm Password*"
                    type="password"
                    required
                  ></v-text-field>
                </v-col>
              </v-row>
            </form>
          </v-container>
          <small>*indicates required field</small>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
          <v-btn color="blue darken-1" type="submit" text @click="saveNewUser()">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    <v-dialog v-model="deleteConfirmation" persistent max-width="450">
      <v-card>
        <v-card-title>Are you sure you want to delete this item?</v-card-title>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="deleteConfirmation = false">No</v-btn>
          <v-btn color="green darken-1" text @click="deleteUser()">Yes</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
export default {
  name: "Users",
  data() {
    return {
      dialog: false,
      deleteConfirmation: false,
      loading: true,
      search: "",
      headers: [
        {
          text: "First Name",
          align: "left",
          sortable: false,
          value: "firstName"
        },
        { text: "Middle Name", value: "middleName" },
        { text: "Last Name", value: "lastName" },
        { text: "Email", value: "email" },
        { text: "Role", value: "role" },
        { text: "Actions", value: "action", sortable: false }
      ],
      tableData: [],
      editedIndex: -1,
      allRoles: [],
      allPermsission: [],
      editedItem: {
        id: "",
        firstName: "",
        middleName: "",
        lastName: "",
        email: "",
        password: "",
        password_confirmation: "",
        role: {}
      },
      deafultItem: {
        id: "",
        firstName: "",
        middleName: "",
        lastName: "",
        email: "",
        role: {}
      }
    };
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New User" : "Edit User";
    }
  },
  created() {
    this.initialized();
  },
  methods: {
    initialized() {
      this.getUsers();
      this.getRoles();
      this.getPermissions();
    },

    getUsers() {
      axios
        .get("/api/users")
        .then(result => {
          this.tableData = result.data.data;
          this.loading = false;
        })
        .catch(err => {});
    },

    getRoles() {
      axios
        .get("/api/roles")
        .then(result => (this.allRoles = result.data.data))
        .catch(err => {});
    },

    getPermissions() {
      axios
        .get("/api/permissions")
        .then(result => (this.allPermsission = result.data.data))
        .catch(err => {});
    },

    onEditUser(item) {
      this.editedIndex = this.tableData.indexOf(item);
      this.editedItem = Object.assign({}, item);
      console.log(this.editedItem);
      this.dialog = true;
    },

    onDeleteUser(item) {
      this.editedIndex = this.tableData.indexOf(item);
      this.editedItem = Object.assign({}, item);
      this.deleteConfirmation = true;
    },

    onNewUser() {
      this.dialog = true;
      this.editedItem = Object.assign({}, this.defaultItem);
    },
    getNestedObject(nestedObj, pathArr) {
      return pathArr.reduce(
        (obj, key) => (obj && obj[key] !== "undefined" ? obj[key] : undefined),
        nestedObj
      );
    },
    saveNewUser() {
      if (this.editedIndex === -1) {
        axios
          .post("/api/users/", this.editedItem)
          .then(result => this.getUsers())
          .catch(err => {});
        return;
      }
      axios
        .put("/api/users/" + this.editedItem.id, this.editedItem)
        .then(result => this.getUsers())
        .catch(err => {});
      this.close();
    },
    deleteUser() {
      this.deleteConfirmation = false;
      axios
        .delete("/api/users/" + this.editedItem.id)
        .then(result => this.getUsers())
        .catch(err => {});
    },
    close() {
      this.dialog = false;
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      }, 300);
    }
  }
};
</script>
<style scoped>
</style>
