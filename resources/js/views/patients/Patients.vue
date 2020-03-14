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
        <v-btn @click="onNewPatinet(true)" class="text-transform-none">
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
    <v-dialog v-model="dialog" persistent max-width="850px">
      <v-stepper v-model="e1">
        <v-stepper-header>
          <v-stepper-step :complete="e1 > 1" step="1">Patient Basic Information</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 2" step="2">Patient Emegency Contact</v-stepper-step>
        </v-stepper-header>
        <v-stepper-items>
          <v-stepper-content step="1">
            <v-row>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="first name*" required v-model="patient.firstName"></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="middle name*" required v-model="patient.middleName"></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="last name*" required v-model="patient.lastName"></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="Medical Record Number*"
                  required
                  v-model="patient.medicalRecordNumber"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-select v-model="patient.gender" :items="genders" label="Gender"></v-select>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-dialog
                  ref="dialog"
                  v-model="datePickerModal"
                  :return-value.sync="patient.dateOfBirth"
                  persistent
                  width="290px"
                >
                  <template v-slot:activator="{ on }">
                    <v-text-field
                      v-model="patient.dateOfBirth"
                      label="Date of birth"
                      readonly
                      v-on="on"
                    ></v-text-field>
                  </template>
                  <v-date-picker v-model="patient.dateOfBirth" scrollable>
                    <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="datePickerModal = false">Cancel</v-btn>
                    <v-btn text color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
                  </v-date-picker>
                </v-dialog>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="Religion*" required v-model="patient.religion"></v-text-field>
              </v-col>
              <v-col cols="12" sm="5" md="4">
                <v-checkbox v-model="interpreterRequired" label="Interpreter"></v-checkbox>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-select
                  :disabled="!interpreterRequired"
                  v-model="patient.language"
                  :items="languages"
                  label="Language"
                  item-text="name"
                  return-object
                  required
                ></v-select>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="Region" required v-model="patient.address.region"></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="Woreda" required v-model="patient.address.woreda"></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="Kebele" required v-model="patient.address.kebele"></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field label="House Number" required v-model="patient.address.houseNumber"></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="tel Phone  Number"
                  required
                  v-model="patient.address.telPhoneNumber"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="Mobile Phone Number"
                  required
                  v-model="patient.address.mobilePhoneNumber"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-btn color="primary" @click="e1 = 2">Continue</v-btn>
            <v-btn text @click="dialog =false">Cancel</v-btn>
          </v-stepper-content>
          <v-stepper-content step="2">
            <v-row>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="first name*"
                  required
                  v-model="patient.emergencyContact.firstName"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="middle name*"
                  required
                  v-model="patient.emergencyContact.middleName"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="last name*"
                  required
                  v-model="patient.emergencyContact.lastName"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-row>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="Region"
                  required
                  v-model="patient.emergencyContact.address.region"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="Woreda"
                  required
                  v-model="patient.emergencyContact.address.woreda"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="Kebele"
                  required
                  v-model="patient.emergencyContact.address.kebele"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="House Number"
                  required
                  v-model="patient.emergencyContact.address.houseNumber"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="Tele Phone  Number"
                  required
                  v-model="patient.emergencyContact.address.telPhoneNumber"
                ></v-text-field>
              </v-col>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="Mobile Phone Number"
                  required
                  v-model="patient.emergencyContact.address.mobilePhoneNumber"
                ></v-text-field>
              </v-col>
            </v-row>
            <v-btn color="primary" @click="onSaveNewPatient()">Save</v-btn>
            <v-btn text @click="e1 = 1" @>Back</v-btn>
          </v-stepper-content>
        </v-stepper-items>
      </v-stepper>
    </v-dialog>
  </v-container>
</template>
<script>
import ApiService from "../../services/ApiService.js";
import Appointement from "../appointment/appointment";
export default {
  name: "Patients",
  components: {
    Appointement
  },
  data() {
    return {
      dialog: false,
      selectedPatient: null,
      appointmentModal: false,
      datePickerModal: "",
      interpreterRequired: false,
      date: new Date().toISOString().substr(0, 10),
      languages: [],
      genders: ["Female", "Male"],
      e1: 1,
      search: "",
      loading: true,
      
      patient: {
        medicalRecordNumber: "",
        firstName: "",
        middleName: "",
        lastName: "",
        gender: "",
        dateOfBirth: "",
        language: "",
        religion: "",
        address: {
          region: "",
          woreda: "",
          kebele: "",
          houseNumber: "",
          telPhoneNumber: "",
          mobilePhoneNumber: ""
        },
        emergencyContact: {
          firstName: "",
          middleName: "",
          lastName: "",
          address: {
            region: "",
            woreda: "",
            kebele: "",
            houseNumber: "",
            telPhoneNumber: "",
            mobilePhoneNumber: ""
          }
        }
      },
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
    getLanguagess() {
      ApiService.executeQueryGet("languages")
        .then(result => (this.languages = result.data.data))
        .catch(err => {});
    },
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
    onSaveNewPatient() {
      if (!this.interpreterRequired) {
        this.patient.language = this.languages.filter(
          item => item.name == "Amharic"
        );
      }
      ApiService.executeCommandPost("patients", this.patient)
        .then(response => this.onNewPatinet(false))
        .catch(error => {});
    },
    onNewPatinet(dialog) {
      this.dialog = dialog;
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
    }
  },
  watch: {
    pagination: {
      handler() {
        this.getPatients(1);
      },
      deep: true
    }
  },
  created() {
    this.getLanguagess();
  }
};
</script>



<style scoped>
.v-btn {
  text-transform: none !important;
}
</style>
