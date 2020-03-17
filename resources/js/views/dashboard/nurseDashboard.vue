<template>
  <v-container class="pr-0">
    <v-row>
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
        <v-btn class="mx-2" @click="onNewTempPatient">
          <v-icon dark>mdi-plus</v-icon>
        </v-btn>
      </v-toolbar>
    </v-row>
    <v-row>
      <v-col cols="12" sm="6" md="4">
        <v-list two-line>
          <v-subheader inset>Vital Test Queue</v-subheader>
          <v-list-item-group multiple active-class="pink--text">
            <template v-for="(patient, index) in tempPatients">
              <v-list-item :key="patient.id">
                <template v-slot:default="{ active, toggle }">
                  <v-list-item-content>
                    <v-list-item-title v-text="patient.fullName"></v-list-item-title>
                    <v-list-item-subtitle class="text--primary" v-text="patient.department.name"></v-list-item-subtitle>
                    <v-list-item-subtitle v-text="patient.user.fullName"></v-list-item-subtitle>
                  </v-list-item-content>

                  <v-list-item-action>
                    <v-list-item-action-text v-text="patient.created_at"></v-list-item-action-text>
                  </v-list-item-action>
                </template>
              </v-list-item>

              <v-divider v-if="index + 1 < tempPatients.length" :key="index"></v-divider>
            </template>
          </v-list-item-group>
        </v-list>
      </v-col>
      <v-col cols="12" sm="6" md="4"></v-col>
    </v-row>
    <tempPatientRegister></tempPatientRegister>
  </v-container>
</template>

<script>
// compnent
import tempPatientRegister from "./components/tempPatientRegister";

// vuex
import { mapActions, mapState } from "vuex";
export default {
  name: "NurseDashboard",
  components: { tempPatientRegister },
  data() {
    return {
      search: ""
    };
  },
  computed: {
    ...mapState("dashboard", ["tempPatients", "tempPatientRegistrationModal"])
  },
  methods: {
    ...mapActions("dashboard", ["fetchTempPatients"]),
    onNewTempPatient() {
      this.$store.commit("dashboard/Temp_PATIENT_MODAL");
    }
  },
  created() {
    this.fetchTempPatients();
  }
};
</script>

<style lang="scss" scoped>
</style>