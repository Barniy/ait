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
                <template v-for="(imagingRequest, index) in imagingRequests">
                  <v-list-item
                    :key="imagingRequest.id"
                    @click="onImagingRequestedClicked(imagingRequest.id)"
                  >
                    <template>
                      <v-list-item-content>
                        <v-list-item-subtitle>
                          <v-chip
                            class="ma-1"
                            v-for="(examination, index) in imagingRequest.requestedExaminations"
                            :key="index"
                          >{{ examination }}</v-chip>
                        </v-list-item-subtitle>
                        <v-list-item-subtitle>
                          Requested By: Dr. {{imagingRequest.user.fullName}} | &nbsp;
                          Date: {{imagingRequest.createdAt | formatDate}}
                        </v-list-item-subtitle>
                        <v-list-item-subtitle v-text="imagingRequest.provisionalDiagnosis"></v-list-item-subtitle>
                      </v-list-item-content>
                      <v-list-item-action>
                        <v-list-item-action-text>
                          {{
                          imagingRequest.status== 'CREATED'?'Unpaid': imagingRequest.status
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
    <ImagingRequest v-bind:id="patientId" v-bind:imagingRequest="selectedImagingRequest"></ImagingRequest>
  </v-container>
</template>

<script>
import ImagingRequest from "../patients/components/ImagingRequest";
export default {
  components: {
    ImagingRequest
  },
  data() {
    return {
      tab: null,
      imagingRequests: [],
       patientId: "",
      selectedImagingRequest: null,
      items: [
        { tab: "PENDING", content: "Pending" },
        { tab: "COMPLETED", content: "Completed" },
        { tab: "ALL", content: "All" }
      ]
    };
  },
  created() {
    this.getImagingRequest("PENDING");
  },
  methods: {
    onTabChange(tab) {
      this.getImagingRequest(tab);
    },
    getImagingRequest(status) {
      axios
        .post("/api/ImagingRequests", {
          status: status
        })
        .then(response => {
          this.imagingRequests = response.data.data;
        })
        .catch(error => {});
    },
    onImagingRequestedClicked(id) {
      this.selectedImagingRequest = this.imagingRequests.filter(
        imagingRequest => imagingRequest.id == id
      );
      this.patientId = this.selectedImagingRequest[0].patient.id;
    }
  }
};
</script>

<style>
</style>
