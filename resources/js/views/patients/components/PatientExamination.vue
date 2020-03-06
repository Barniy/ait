<template>
  <v-container fluid>
    <v-tabs v-model="tab">
      <v-tabs-slider></v-tabs-slider>
      <v-tab v-for="item in items" :key="item.tab">{{ item.tab }}</v-tab>
    </v-tabs>
    <v-card>
      <v-card-text>
        <v-tabs-items v-model="tab">
          <v-tab-item v-for="item in items" :key="item.tab">
            <v-card flat>
              <v-list two-line>
                <v-list-item-group>
                  <template v-for="(item, index) in lists">
                    <v-list-item :key="item.title">
                      <template>
                        <v-list-item-content>
                          <v-list-item-title v-text="item.title"></v-list-item-title>
                          <v-list-item-subtitle class="text--primary" v-text="item.headline"></v-list-item-subtitle>
                          <v-list-item-subtitle v-text="item.subtitle"></v-list-item-subtitle>
                        </v-list-item-content>
                        <v-list-item-action>
                          <v-list-item-action-text v-text="item.action"></v-list-item-action-text>
                          <v-icon>mdi-circle-edit-outline</v-icon>
                        </v-list-item-action>
                      </template>
                    </v-list-item>
                    <v-divider :key="index"></v-divider>
                  </template>
                </v-list-item-group>
              </v-list>
            </v-card>
          </v-tab-item>
        </v-tabs-items>
      </v-card-text>
      <v-card-text>
        <LabRequest v-if="tab== '0'"></LabRequest>
        <ImagingRequest v-if="tab== '1'"></ImagingRequest>
      </v-card-text>
    </v-card>
  </v-container>
</template>
<script>
import LabRequest from "./LabRequest.vue";
import ImagingRequest from "./ImagingRequest.vue";
export default {
  name: "PatientExamination",
  components: {
    LabRequest,
    ImagingRequest
  },
  data() {
    return {
      tab: null,
      lists: [
        {
          action: "pending",
          headline: "Brunch this weekend?",
          title: " Ali Connors",
          subtitle:
            "I'll be in your neighborhood doing errands this weekend. Do you want to hang out?"
        },
        {
          action: "pending",
          headline: "Summer BBQ",
          title: "me, Scrott, Jennifer",
          subtitle: "Wish I could come, but I'm out of town this weekend."
        },
        {
          action: "pending",
          headline: "Oui oui",
          title: "Sandra Adams",
          subtitle: "Do you have Paris recommendations? Have you ever been?"
        },
        {
          action: "completed",
          headline: "Birthday gift",
          title: "Trevor Hansen",
          subtitle:
            "Have any ideas about what we should get Heidi for her birthday?"
        },
        {
          action: "completed",
          headline: "Recipe to try",
          title: "Britta Holt",
          subtitle:
            "We should eat this: Grate, Squash, Corn, and tomatillo Tacos."
        },
        {
          action: "pending",
          headline: "Summer BBQ",
          title: "me, Scrott, Jennifer gh",
          subtitle: "Wish I could come, but I'm out of town this weekend."
        },
        {
          action: "pending",
          headline: "Oui oui",
          title: "Sandra Adams sfd",
          subtitle: "Do you have Paris recommendations? Have you ever been?"
        },
        {
          action: "completed",
          headline: "Birthday gift",
          title: "Trevor Hansen fsg",
          subtitle:
            "Have any ideas about what we should get Heidi for her birthday?"
        },
        {
          action: "completed",
          headline: "Recipe to try",
          title: "Britta Holt fg",
          subtitle:
            "We should eat this: Grate, Squash, Corn, and tomatillo Tacos."
        }
      ],
      items: [
        { tab: "Laboratory", content: "Laboratory" },
        { tab: "Imaging", content: "Imaging" }
      ]
    };
  }
};
</script>

<style>
</style>
