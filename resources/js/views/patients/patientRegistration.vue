<template>
  <v-container>
    <v-dialog v-model="patientRegistrationModal" persistent max-width="850px">
      <v-form ref="form" v-model="valid" lazy-validation>
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
                  <v-text-field
                    label="first name"
                    v-model="firstName"
                    :error-messages="firstNameErrors"
                    @input="$v.firstName.$touch()"
                    @blur="$v.firstName.$touch()"
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field
                    label="middle name"
                    required
                    v-model="middleName"
                    :error-messages="middleNameErrors"
                    @input="$v.middleName.$touch()"
                    @blur="$v.middleName.$touch()"
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field
                    label="last name"
                    required
                    v-model="lastName"
                    :error-messages="lastNameErrors"
                    @input="$v.lastName.$touch()"
                    @blur="$v.lastName.$touch()"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field
                    label="Medical Record Number"
                    required
                    v-model="medicalRecordNumber"
                    :error-messages="medicalRecordNumberErrors"
                    @input="$v.medicalRecordNumber.$touch()"
                    @blur="$v.medicalRecordNumber.$touch()"
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-select
                    v-model="gender"
                    :items="genders"
                    label="Gender"
                    :error-messages="genderErrors"
                    @input="$v.gender.$touch()"
                    @blur="$v.gender.$touch()"
                  ></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-dialog
                    ref="dialog"
                    v-model="modal"
                    :return-value.sync="date"
                    persistent
                    width="290px"
                  >
                    <template v-slot:activator="{ on }">
                      <v-text-field
                        v-model="dateOfBirth"
                        label="Date of birth"
                        readonly
                        v-on="on"
                        :error-messages="dateErrors"
                        @input="$v.dateOfBirth.$touch()"
                        @blur="$v.dateOfBirth.$touch()"
                      ></v-text-field>
                    </template>
                    <v-date-picker v-model="dateOfBirth" scrollable>
                      <v-spacer></v-spacer>
                      <v-btn text color="primary" @click="modal = false">Cancel</v-btn>
                      <v-btn text color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
                    </v-date-picker>
                  </v-dialog>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Religion" required v-model="religion"></v-text-field>
                </v-col>
                <v-col cols="12" sm="5" md="4">
                  <v-checkbox v-model="interpreterRequired" label="Interpreter"></v-checkbox>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-select
                    :disabled="!interpreterRequired"
                    v-model="language"
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
                  <v-text-field label="Region" required v-model="patientRegion"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Woreda" required v-model="patientWoreda"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Kebele" required v-model="patientKebele"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="House Number" required v-model="patientHouseNumber"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="tel Phone  Number" required v-model="patientTelPhoneNumber"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field
                    label="Mobile Phone Number"
                    required
                    v-model="patientMobilePhoneNumber"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-btn color="primary" @click="validateBasicInformation">Continue</v-btn>
              <v-btn text @click="cancelPatientRregistration()">Cancel</v-btn>
            </v-stepper-content>
            <v-stepper-content step="2">
              <v-row>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="first name" required v-model="emergencyContactFirstName"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="middle name" required v-model="emergencyContactMiddleName"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="last name" required v-model="emergencyContactLastName"></v-text-field>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Region" required v-model="emergencyContactRegion"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Woreda" required v-model="emergencyContactWoreda"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="Kebele" required v-model="emergencyContactKebele"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field label="House Number" required v-model="emergencyContacHouseNumber"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field
                    label="Tele Phone  Number"
                    required
                    v-model="emergencyContactTelPhoneNumber"
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field
                    label="Mobile Phone Number"
                    required
                    v-model="emergencyContactMobilePhoneNumber"
                  ></v-text-field>
                </v-col>
              </v-row>
              <v-btn color="primary" @click="onSaveNewPatient()">Save</v-btn>
              <v-btn text @click="e1 = 1" @>Back</v-btn>
            </v-stepper-content>
          </v-stepper-items>
        </v-stepper>
      </v-form>
    </v-dialog>
  </v-container>
</template>

<script>
// apis
import ApiService from "../../services/ApiService.js";

// vuex
import { mapState, mapActions } from "vuex";

// validation
import { validationMixin } from "vuelidate";
import { required, maxLength, email } from "vuelidate/lib/validators";
export default {
  mixins: [validationMixin],

  validations: {
    medicalRecordNumber: { required, maxLength: maxLength(64) },
    firstName: { required },
    middleName: { required },
    lastName: { required },
    gender: { required },
    dateOfBirth: { required },
    patientRegion: { required },
    patientWoreda: { required },
    patientKebele: { required },
    patientMobilePhoneNumber: { required }
  },
  name: "RegistrationPatient",
  data() {
    return {
      valid: true,
      modal: false,
      e1: 1,
      languages: [],
      interpreterRequired: false,
      genders: ["Female", "Male"],
      date: new Date().toISOString().substr(0, 10),
      medicalRecordNumber: "",
      firstName: "",
      middleName: "",
      lastName: "",
      gender: "",
      dateOfBirth: "",
      language: "",
      religion: "",
      patientRegion: "",
      patientWoreda: "",
      patientKebele: "",
      patientHouseNumber: "",
      patientTelPhoneNumber: "",
      patientMobilePhoneNumber: "",
      emergencyContactFirstName: "",
      emergencyContactMiddleName: "",
      emergencyContactLastName: "",
      emergencyContactRegion: "",
      emergencyContactWoreda: "",
      emergencyContactKebele: "",
      emergencyContacHouseNumber: "",
      emergencyContactTelPhoneNumber: "",
      emergencyContactMobilePhoneNumber: ""
    };
  },
  computed: {
    ...mapState("patients", ["patientRegistrationModal"]),
    firstNameErrors() {
      const errors = [];
      if (!this.$v.firstName.$dirty) return errors;
      !this.$v.firstName.required && errors.push("first name  is required.");
      return errors;
    },
    middleNameErrors() {
      const errors = [];
      if (!this.$v.middleName.$dirty) return errors;
      !this.$v.middleName.required && errors.push("middle name is required.");
      return errors;
    },
    lastNameErrors() {
      const errors = [];
      if (!this.$v.lastName.$dirty) return errors;
      !this.$v.lastName.required && errors.push("last name is required.");
      return errors;
    },
    medicalRecordNumberErrors() {
      const errors = [];
      if (!this.$v.medicalRecordNumber.$dirty) return errors;
      !this.$v.medicalRecordNumber.maxLength &&
        errors.push("medical record number must be at most 10 characters long");
      !this.$v.medicalRecordNumber.required &&
        errors.push("medical record number is required.");
      return errors;
    },
    genderErrors() {
      const errors = [];
      if (!this.$v.gender.$dirty) return errors;
      !this.$v.gender.required && errors.push("Gender is required.");
      return errors;
    },
    dateErrors() {
      const errors = [];
      if (!this.$v.dateOfBirth.$dirty) return errors;
      !this.$v.dateOfBirth.required &&
        errors.push("date of birth is required.");
      return errors;
    }
  },
  methods: {
    ...mapActions("patients", ["addPatient"]),
    cancelPatientRregistration() {
      this.$store.commit("patients/PATIENT_MODAL");
    },
    async validateBasicInformation() {
      await this.$v.$touch();
      if (this.valid) {
        this.e1 = 2;
      }
    },
    onSaveNewPatient() {
      if (!this.interpreterRequired) {
        this.language = this.languages.filter(item => item.name == "Amharic");
      }
      let patient = {
        medicalRecordNumber: this.medicalRecordNumber,
        firstName: this.firstName,
        middleName: this.middleName,
        lastName: this.lastName,
        gender: this.gender,
        dateOfBirth: this.dateOfBirth,
        language: this.language,
        religion: this.religion,
        address: {
          region: this.patientRegion,
          woreda: this.patientWoreda,
          kebele: this.patientKebele,
          houseNumber: this.patientHouseNumber,
          telPhoneNumber: this.patientTelPhoneNumber,
          mobilePhoneNumber: this.patientMobilePhoneNumber
        },
        emergencyContact: {
          firstName: this.emergencyContactFirstName,
          middleName: this.emergencyContactMiddleName,
          lastName: this.emergencyContactLastName,
          address: {
            region: this.emergencyContactRegion,
            woreda: this.emergencyContactWoreda,
            kebele: this.emergencyContactKebele,
            houseNumber: this.emergencyContacHouseNumber,
            telPhoneNumber: this.emergencyContactTelPhoneNumber,
            mobilePhoneNumber: this.emergencyContactTelPhoneNumber
          }
        }
      };
      // dispach add patient action from mapedActions
      this.addPatient(patient);
     this.cancelPatientRregistration();
      this.clear();
    },
    getLanguagess() {
      ApiService.executeQueryGet("languages")
        .then(result => (this.languages = result.data.data))
        .catch(err => {});
    },

    clear() {
      this.$v.$reset();
      this.medicalRecordNumber = "";
      this.firstName = "";
      this.middleName = "";
      this.lastName = "";
      this.gender = "";
      this.dateOfBirth = "";
      this.language = "";
      this.religion = "";
      this.patientRegion = "";
      this.patientWoreda = "";
      this.patientKebele = "";
      this.patientHouseNumber = "";
      this.patientTelPhoneNumber = "";
      this.patientMobilePhoneNumber = "";
      this.emergencyContactFirstName = "";
      this.emergencyContactMiddleName = "";
      this.emergencyContactLastName = "";
      this.emergencyContactRegion = "";
      this.emergencyContactWoreda = "";
      this.emergencyContactKebele = "";
      this.emergencyContacHouseNumber = "";
      this.emergencyContactTelPhoneNumber = "";
      this.emergencyContactMobilePhoneNumber = "";
    }
  },
  created() {
    this.getLanguagess();
  }
};
</script>

<style lang="scss" scoped>
</style>