<template>
  <div>
    <v-toolbar>
      <v-btn-toggle>
        <v-btn @click="onTabClicked(true, false,false,false)">Information</v-btn>
        <v-btn @click="onTabClicked(false,true,false,false)">Vital</v-btn>
        <v-btn @click="onTabClicked(false,false,true,false)">Examinations</v-btn>
        <v-btn @click="onTabClicked(false,false,false,true)">Payment</v-btn>
      </v-btn-toggle>
    </v-toolbar>
    <PatientInformation v-if="onPatientInformation" v-bind:id="id"></PatientInformation>
    <PatientVital v-if="onPatientVital" v-bind:id="id"></PatientVital>
    <PatientExamination v-if="onPatientExamination"></PatientExamination>
    <PatientPayment v-if="onPatientPayment"></PatientPayment>
  </div>
</template>

<script>
import PatientExamination from "./components/PatientExamination";
import PatientInformation from "./components/PatientInformation";
import PatientPayment from "./components/PatientPayment";
import PatientVital from "./components/PatientVital";
export default {
  components: {
    PatientExamination,
    PatientInformation,
    PatientPayment,
    PatientVital
  },
  name: "PatientDetail",
  props: ["id"],
  data() {
    return {
      onPatientInformation: true,
      onPatientExamination: false,
      onPatientPayment: false,
      onPatientVital: false
    };
  },
  methods: {
    onTabClicked(onInfoTab, onVitalTab, onExaminationTab, onPaymentTab) {
      this.onPatientInformation = onInfoTab;
      this.onPatientVital = onVitalTab;
      this.onPatientExamination = onExaminationTab;
      this.onPatientPayment = onPaymentTab;
    }
  }
};
</script>

<style>
</style>
