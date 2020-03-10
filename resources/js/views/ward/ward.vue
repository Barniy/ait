<template>
  <v-container fluid>
    <v-card>
      <v-toolbar>
        <v-spacer></v-spacer>
        <v-btn @click="onNewWard()" color="primary" dark class="mb-2">
          <v-icon dark left>mdi-plus</v-icon>Ward
        </v-btn>
      </v-toolbar>
    </v-card>
    <v-dialog v-model="dialog" persistent max-width="850px">
      <v-stepper v-model="e1">
        <v-stepper-header>
          <v-stepper-step :complete="e1 > 1" step="1">Ward Admission</v-stepper-step>
          <v-divider></v-divider>
          <v-stepper-step :complete="e1 > 2" step="2">Information Provided About</v-stepper-step>
        </v-stepper-header>
        <v-stepper-items>
          <v-stepper-content step="1">
            <v-row>
              <v-col cols="12" sm="12" md="12">
                <v-dialog ref="dialog" :return-value.sync="date" persistent width="290px">
                  <template v-slot:activator="{ on }">
                    <v-text-field v-model="ward.date" label="Duration" readonly v-on="on"></v-text-field>
                  </template>
                  <v-date-picker v-model="ward.date" scrollable>
                    <v-spacer></v-spacer>
                    <v-btn text color="primary" @click="modal = false">Cancel</v-btn>
                    <v-btn text color="primary" @click="$refs.dialog.save(date)">OK</v-btn>
                  </v-date-picker>
                </v-dialog>
              </v-col>
              <v-col cols="12" sm="12" md="6">
                <v-text-field label="Ward*" v-model="ward.Ward"></v-text-field>
              </v-col>
              <v-col cols="12" sm="12" md="6">
                <v-text-field label="Ward Number*" v-model="ward.wardNumber"></v-text-field>
              </v-col>
              <v-col cols="12" sm="12" md="6">
                <v-text-field label="Bed Number*" v-model="ward.bedNumber"></v-text-field>
              </v-col>
              <v-col cols="12" sm="12" md="6">
                <v-text-field label="OPD*" v-model="ward.opd"></v-text-field>
              </v-col>
              <v-col cols="12" sm="12" md="12">
                <header>
                  ADMISSION INFORMATION CHCKLIST
                  <hr />
                </header>
              </v-col>
              <v-col cols="12" sm="12" md="12">
                <v-textarea label="Admisson Diagnosis*" v-model="ward.AdmissonDiagnosis"></v-textarea>
              </v-col>
            </v-row>
            <v-btn color="primary" @click="e1 = 2">Continue</v-btn>
            <v-btn text @click="dialog =false">Cancel</v-btn>
          </v-stepper-content>
          <v-stepper-content step="2">
            <v-row>
              <v-col cols="12" sm="12" md="12">
                <header>Information Provided About</header>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-checkbox label="Admission Deposit" v-model="ward.Deposit"></v-checkbox>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-checkbox label="Ward Choice" v-model="ward.wardChoice"></v-checkbox>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-checkbox label="Visting Hours" v-model="ward.vistingHours"></v-checkbox>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-checkbox label="Family Care giver" v-model="ward.careGiver"></v-checkbox>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-checkbox label="Ward rate/day" v-model="ward.wardRate"></v-checkbox>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-checkbox label="ICU rate/day" v-model="ward.icu"></v-checkbox>
              </v-col>
              <v-col cols="12" sm="6" md="6">
                <v-select label="NURSE IN CHARGE" v-model="ward.nurseInCharge"></v-select>
              </v-col>
            </v-row>
            <v-btn color="primary" @click="saveNewWard()">Save</v-btn>
            <v-btn text @click="e1 = 1" @>Back</v-btn>
          </v-stepper-content>
        </v-stepper-items>
      </v-stepper>
    </v-dialog>
  </v-container>
</template>
<script>
export default {
  name: "PatientWard",
  data() {
    return {
      dialog: false,
      datePickerModal: "",
      date: new Date().toISOString().substr(0, 10),
      e1: 1,
      ward: {
        id: "",
        patient_id: "",
        date: "",
        ward: "",
        wardNumber: "",
        bedNumber: "",
        opd: "",
        AdmissonDiagnosis: "",
        Deposit: "",
        wardChoice: "",
        vistingHours: "",
        careGiver: "",
        wardRate: "",
        icu: "",
        nurseInCharge: ""
      }
    };
  },
  methods: {
    onNewWard() {
      this.dialog = true;
    },
    saveNewWard() {
      this.ward.patientId = this.id;
      if (this.editedIndex === -1) {
        axios
          .post("/api/wards", this.editedItem)
          .then(result => this.getWards())
          .catch(err => {});
        return;
      }
      axios
        .put("/api/wards" + this.editedItem.id, this.editedItem)
        .then(result => this.getWards())
        .catch(err => {});
      this.close();
    }
  }
};
</script>
<style scoped>
.v-btn {
  text-transform: none !important;
}
</style>
