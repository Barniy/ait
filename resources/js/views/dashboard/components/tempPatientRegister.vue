<template>
  <v-row justify="center">
    <v-dialog v-model="tempPatientRegistrationModal" persistent max-width="600px">
      <v-card>
        <v-card-title>
          <span class="headline">New Patient</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-form ref="form" v-model="valid" lazy-validation>
              <v-row>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field
                    label="first name"
                    required
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
                <v-col cols="12">
                  <v-select
                    v-model="department"
                    :items="departments"
                    label="Departments"
                    item-text="name"
                    item-value="id"
                    required
                    :error-messages="departmentErrors"
                    @input="$v.department.$touch()"
                    @blur="$v.department.$touch()"
                  ></v-select>
                </v-col>
              </v-row>
            </v-form>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="cancelPatientRegistration">Close</v-btn>
          <v-btn color="blue darken-1" text @click="onSaveNewTempPatient">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
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
    department: { required }
  },
  name: "tempPatientRegister",
  data() {
    return {
      valid: true,
      firstName: "",
      middleName: "",
      lastName: "",
      department: ""
    };
  },
  computed: {
    ...mapState("department", ["departments"]),
    ...mapState("dashboard", ["tempPatientRegistrationModal"]),
    loggedIn: () => {
      return window.user;
    },
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
    departmentErrors() {
      const errors = [];
      if (!this.$v.department.$dirty) return errors;
      !this.$v.department.required && errors.push("Department is required.");
      return errors;
    }
  },
  methods: {
    ...mapActions("dashboard", ["addTempPatient"]),
    ...mapActions("department", ["fetchDepartments"]),
    async onSaveNewTempPatient() {
      await this.$v.$touch();
      let patient = {
        medicalRecordNumber: this.medicalRecordNumber,
        firstName: this.firstName,
        middleName: this.middleName,
        lastName: this.lastName,
        departmentId: this.department,
        userId: this.loggedIn.user.id
      };
      if (this.valid) {
        this.addTempPatient(patient);
        this.cancelPatientRegistration();
      }
    },
    cancelPatientRegistration() {
      this.$store.commit("dashboard/Temp_PATIENT_MODAL");
      this.clear();
    },
    clear() {
      this.$v.$reset();
      this.firstName = "";
      this.middleName = "";
      this.lastName = "";
      this.department = "";
    }
  },
  mounted() {
    this.fetchDepartments();
  }
};
</script>

<style lang="scss" scoped>
</style>