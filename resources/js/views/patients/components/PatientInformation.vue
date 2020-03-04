<template>
  <v-container fluid>
    <v-row justify="space-around">
      <v-col cols="3">
        <v-card class="mx-auto" max-width="300" tile>
          <v-list disabled>
            <v-subheader>Profile</v-subheader>
            <v-list-item-group v-model="item" color="primary">
              <v-list-item v-for="(item, i) in items" :key="i">
                <v-list-item-content>
                  <v-list-item-title v-text="item.text"></v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </v-list-item-group>
          </v-list>
        </v-card>
      </v-col>
      <v-col cols="9">
        <v-card>
          <v-card-title>Personal Information</v-card-title>
          <v-list two-line>
            <template>
              <v-list-item>
                <v-avatar color="indigo" class="avatar">
                  <v-icon dark>mdi-account-circle</v-icon>
                </v-avatar>
                <v-list-item-content>
                  <v-list-item-title>{{ patient.fullName }}</v-list-item-title>
                  <v-list-item-subtitle>{{ patient.medicalRecordNumber }}</v-list-item-subtitle>
                  <v-list-item-subtitle v-if="patient.address">{{ patient.address.phoneNumber }}</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>
            </template>
          </v-list>
          <v-divider></v-divider>
          <v-card-title>Basic Information</v-card-title>
          <v-card-text>
            <v-container>
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
                <v-col cols="12" sm="6" md="4">
                  <v-select
                    v-model="patient.language"
                    :items="languages"
                    label="Language"
                    item-text="name"
                    return-object
                    required
                  ></v-select>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <v-divider></v-divider>
          <v-card-title>Address</v-card-title>
          <v-card-text>
            <v-container>
              <v-row>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Region" required v-model="patient.address.region"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Woreda" required v-model="patient.address.woreda"></v-text-field>
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
            </v-container>
          </v-card-text>
          <v-divider></v-divider>
          <v-card-title>Emergency Contact</v-card-title>
          <v-card-text>
            <v-container>
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
            </v-container>
          </v-card-text>
          <v-divider></v-divider>
          <v-card-title>Emergency Contact Address</v-card-title>
          <v-card-text>
            <v-container>
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
                    label="House Number"
                    required
                    v-model="patient.emergencyContact.address.houseNumber"
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field
                    label="tel Phone  Number"
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
            </v-container>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "PatientInformation",
  props: ["id"],
  data: () => ({
    languages: [],
    datePickerModal: false,
    patient: {
      id: "",
      medicalRecordNumber: "",
      fullName: "",
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
    item: 0,
    items: [
      { text: "Basic Information" },
      { text: "Address" },
      { text: "Emergency Contact" },
      { text: "Emergency Contact Address" }
    ]
  }),
  methods: {
    getLanguagess() {
      axios
        .get("/api/languages")
        .then(result => (this.languages = result.data.data))
        .catch(err => {});
    }
  },
  created() {
    this.getLanguagess();
    axios
      .get("/api/patients/" + this.id)
      .then(result => {
        this.patient = result.data.data;
      })
      .catch(err => {});
  }
};
</script>

<style scoped>
.avatar {
  margin: 5px;
}
.v-divider {
  border-color: rgba(0, 0, 0, 0.12) !important;
}
</style>
