<template>
  <v-container>
    <v-dialog v-model="modal" persistent max-width="650px">
      <v-card>
        <v-card-title>
          <span class="headline">New Apointement</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <form ref="form" lazy-validation>
              <v-row>
                <v-col cols="12" sm="6" md="6">
                  <v-text-field v-model="appointement.appointementTitle" label="Appointement Title"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="6">
                  <v-dialog ref="dialog" :return-value.sync="date" persistent width="290px">
                    <template v-slot:activator="{ on }">
                      <v-text-field v-model="date" label="Picker in dialog" readonly v-on="on"></v-text-field>
                    </template>
                    <v-date-picker v-model="appointement.appointementDate" scrollable>
                      <v-spacer></v-spacer>
                      <v-btn text color="primary" @click="modal = false">Cancel</v-btn>
                      <v-btn text color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
                    </v-date-picker>
                  </v-dialog>
                </v-col>​
                <v-col cols="12" sm="12" md="12">
                  <v-textarea
                    v-model="appointement.appointementDescription"
                    label="Appointement Description"
                  ></v-textarea>
                </v-col>
              </v-row>
            </form>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="modal = false">Close</v-btn>
          <v-btn color="blue darken-1" type="submit" text @click="onAppointmentSave()">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-container>
</template>
​
<script>
export default {
  name: "Appointement",
  props: ["appointmentModal"],
  data() {
    return {
      modal: false,
      datePickerModal: "",
      date: new Date().toISOString().substr(0, 10),
      deleteConfirmation: false,
      loading: true,
      search: "",
      tableData: [],
      editedIndex: -1,
      appointement: {
        appointementTitle: "",
        appointementDate: new Date().toISOString().substr(0, 10),
        appointementDescription: ""
      }
    };
  },
  computed: {
    loggedIn: () => {
      return window.user;
    }
  },
  created() {
    this.initialized();
  },
  methods: {
    initialized() {
      this.getUsers();
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
    onNewApp() {
      this.dialog = true;
      this.editedItem = Object.assign({}, this.defaultItem);
    },
    saveNewAppointement() {
      if (this.editedIndex === -1) {
        axios
          .post("/api/appointement/", this.editedItem)
          .then(result => this.getAppointement())
          .catch(err => {});
        return;
      }
      axios
        .put("/api/appointement/" + this.editedItem.id, this.editedItem)
        .then(result => this.getAppointement())
        .catch(err => {});
      this.close();
    },
    close() {
      this.dialog = false;
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      }, 300);
    },
    onAppointmentSave() {
      this.$emit("clicked", this.appointement);
    }
  },
  watch: {
    appointmentModal: function() {
      this.modal = !this.modal;
    }
  }
};
</script>
<style scoped>
.v-btn {
  text-transform: none !important;
}
</style>
