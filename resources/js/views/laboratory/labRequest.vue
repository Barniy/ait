<template>
  <v-container>
    <v-card>
      <v-tabs v-model="tab">
        <v-tabs-slider></v-tabs-slider>
        <v-tab v-for="item in items" :key="item.tab" @click="onTabChange(item.tab)">{{ item.tab }}</v-tab>
      </v-tabs>
      <v-tabs-items v-model="tab">
        <v-tab-item v-for="item in items" :key="item.tab">
          <v-card flat>
            <v-list two-line>
              <v-list-item-group>
                <template v-for="(labRequest, index) in labRequests">
                  <v-list-item :key="labRequest.id" @click="onLabRequestedClicked(labRequest.id)">
                    <template>
                      <v-list-item-content>
                        <v-list-item-title>{{labRequest.patient.fullName}}</v-list-item-title>
                        <v-list-item-subtitle>
                          Requested By: Dr. {{labRequest.user.fullName}} | &nbsp;
                          Priority:{{ labRequest.priority }} | &nbsp;
                          Date: {{labRequest.createdAt | formatDate }}
                        </v-list-item-subtitle>
                        <v-list-item-subtitle>{{ labRequest.description }}</v-list-item-subtitle>
                      </v-list-item-content>
                      <v-list-item-action>
                        <v-list-item-action-text>
                          {{
                          labRequest.status== 'CREATED'?'Unpaid': labRequest.status
                          }}
                        </v-list-item-action-text>
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
    </v-card>
    <LabRequest
      v-bind:id="patientId"
      v-bind:showAddButton="false"
      v-bind:labRequest="selectedLabRequest"
    ></LabRequest>
  </v-container>
</template>

<script>
import LabRequest from "../patients/components/LabRequest";
export default {
  components: {
    LabRequest
  },
  data() {
    return {
      labRequests: [],
      tab: null,
      selectedLabRequest: null,
      patientId: "",
      items: [
        { tab: "PENDING", content: "Pending" },
        { tab: "COMPLETED", content: "Completed" },
        { tab: "ALL", content: "All" }
      ]
    };
  },
  created() {
    this.getLabRequest("PENDING");
  },
  methods: {
    onTabChange(tab) {
      this.getLabRequest(tab);
    },
    getLabRequest(status) {
      axios
        .post("/api/labRequests", {
          status: status
        })
        .then(response => {
          this.labRequests = response.data.data;
        })
        .catch(error => {});
    },
    onLabRequestedClicked(id) {
      this.selectedLabRequest = this.labRequests.filter(
        labRequest => labRequest.id == id
      );
      this.patientId = this.selectedLabRequest[0].patient.id;
    }
  }
};
</script>

<style>
</style>
