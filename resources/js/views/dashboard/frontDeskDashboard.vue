<template>
  <v-container class="pr-0">
    <v-row>
      <v-toolbar></v-toolbar>
    </v-row>
    <v-row>
      <v-col cols="12" sm="6" md="4">
        <v-list two-line>
          <v-subheader inset>New Patient Queue</v-subheader>
          <v-list-item-group v-model="selected" multiple active-class="pink--text">
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
  </v-container>
</template>

<script>
import { mapActions, mapState } from "vuex";
export default {
  name: "FrontDeskDashboard",
  data() {
    return {
      selected: [2],
      items: [
        {
          action: "15 min",
          headline: "Brunch this weekend?",
          title: "Ali Connors",
          subtitle:
            "I'll be in your neighborhood doing errands this weekend. Do you want to hang out?"
        },
        {
          action: "2 hr",
          headline: "Summer BBQ",
          title: "me, Scrott, Jennifer",
          subtitle: "Wish I could come, but I'm out of town this weekend."
        },
        {
          action: "6 hr",
          headline: "Oui oui",
          title: "Sandra Adams",
          subtitle: "Do you have Paris recommendations? Have you ever been?"
        },
        {
          action: "12 hr",
          headline: "Birthday gift",
          title: "Trevor Hansen",
          subtitle:
            "Have any ideas about what we should get Heidi for her birthday?"
        },
        {
          action: "18hr",
          headline: "Recipe to try",
          title: "Britta Holt",
          subtitle:
            "We should eat this: Grate, Squash, Corn, and tomatillo Tacos."
        }
      ]
    };
  },
  computed: {
    ...mapState("dashboard", ["tempPatients"])
  },
  methods: {
    ...mapActions("dashboard", ["fetchTempPatients"])
  },
  created() {
    this.fetchTempPatients();
  }
};
</script>

<style lang="scss" scoped>
</style>