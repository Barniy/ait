<template>
  <v-container fluid>
    <v-card>
      <v-tabs vertical>
        <v-tab>Basic Information</v-tab>
        <v-tab>Emergency Contact</v-tab>
        <v-tab-item>
          <v-card flat>
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
                    <v-text-field
                      label="House Number"
                      required
                      v-model="patient.address.houseNumber"
                    ></v-text-field>
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
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card flat>
            <v-card-text>
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
            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs>
      <v-card-actions>
        <v-spacer></v-spacer>
        <v-btn large @click="onSavePatient">
          <v-icon dark left>mdi-plus</v-icon>Save
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>
  </v-container>
</template>

<script>
export default {
  name: "PatientInformation",
  props: ["id"],
  data: () => ({
    languages: [],
    genders: ["Female", "Male"],
    date: new Date().toISOString().substr(0, 10),
    interpreterRequired: false,
    datePickerModal: false,
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
    },
    onSavePatient() {
      if (!this.interpreterRequired) {
        this.patient.language = this.languages.filter(
          item => item.name == "Amharic"
        );
      }
      axios
        .put("/api/patients/" + this.patient.id, this.patient)
        .then(response => console.log(response))
        .catch(error => {});
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
