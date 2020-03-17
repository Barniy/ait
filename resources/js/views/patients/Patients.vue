<template>
  <v-container fluid>
    <v-card>
      <v-toolbar>
        <v-text-field
          solo-inverted
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
          class="hidden-sm-and-down"
        />
        <v-spacer></v-spacer>
        <v-btn @click="onNewPatinet()" class="text-transform-none">
          <v-icon dark left>mdi-plus</v-icon>Patinet
        </v-btn>
      </v-toolbar>
      <v-data-table
        :headers="headers"
        :items="tableData"
        item-key="id"
        :search="search"
        class="elevation-1"
        loading-text="Loading... Please wait"
        :loading="loading"
        no-data-text="No Record found"
        :options.sync="pagination"
        :server-items-length="pagination.totalItems"
        :items-per-page="pagination.itemsPerPage"
        @click:row="patientDetail"
      >
        <template v-slot:item.action="{ item }">
          <v-icon medium class="mr-2" @click.stop="onCalendarClicked(item)">mdi-calendar</v-icon>
        </template>
      </v-data-table>
      <Appointement v-bind:appointmentModal="appointmentModal" @clicked="addAppointment"></Appointement>
    </v-card>
    <patientRegistration></patientRegistration>
  </v-container>
</template>
<script>
// apis
import ApiService from "../../services/ApiService.js";

// vuex
import { mapState } from "vuex";

// components
import Appointement from "../appointment/appointment";
import patientRegistration from "./patientRegistration";

export default {
  name: "Patients",
  components: {
    Appointement,
    patientRegistration
  },
  data() {
    return {
      selectedPatient: null,
      appointmentModal: false,
      datePickerModal: "",
      search: "",
      loading: true,
      pagination: { totalItems: null, itemsPerPage: null, page: null },
      headers: [
        {
          text: "Id",
          sortable: false,
          align: " d-none",
          value: "id"
        },
        {
          text: "MCN",
          align: "left",
          sortable: false,
          value: "medicalRecordNumber"
        },
        { text: "Full Name", value: "fullName" },
        { text: "Gender", value: "gender" },
        { text: "Date Of Birth", value: "dateOfBirth" },
        {
          text: "Phone Number",
          value: "address.mobilePhoneNumber"
        },
        { text: "Actions", value: "action", sortable: false }
      ],
      tableData: []
    };
  },
  methods: {
    patientDetail(event) {
      this.$router.push("/admin/patient/" + event.id);
    },
    totalItems() {
      return this.pagination.totalItems;
    },
    rowsPerPageItems() {
      return this.pagination.rowsPerPageItems;
    },
    getPatients(page) {
      ApiService.executeQueryGet("patients?page=" + this.pagination.page)
        .then(response => {
          console.log(response.data.data);
          this.tableData = response.data.data;
          this.pagination.page = response.data.meta.current_page;
          this.pagination.itemsPerPage = response.data.meta.per_page;
          this.pagination.totalItems = response.data.meta.total;
          this.loading = false;
        })
        .catch(err => {});
    },
    onNewPatinet() {
      this.$store.commit("patients/PATIENT_MODAL");
    },
    onCalendarClicked(item) {
      this.appointmentModal = !this.appointmentModal;
      this.selectedPatient = item;
    },
    addAppointment(appointmen) {
      console.log(appointmen);
      ApiService.executeCommandPost("appointments", {
        patientId: this.selectedPatient.id,
        appointmentTitle: appointmen.appointementTitle,
        appointmentDescription: appointmen.appointementDescription,
        appointmentDate: appointmen.appointementDate,
        userId: this.loggedIn.user.id
      })
        .then(response => this.onCalendarClicked(null))
        .catch(function(error) {});
    }
  },
  computed: {
    loggedIn: () => {
      return window.user;
    },
    ...mapState("patients", ["patientRegistrationModal"])
  },
  watch: {
    pagination: {
      handler() {
        this.getPatients(1);
      },
      deep: true
    }
  }
};
</script>



<style scoped>
.v-btn {
  text-transform: none !important;
}
</style>
