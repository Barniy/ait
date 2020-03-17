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
                <v-list-item-group v-if="tab== '0'">
                  <template v-for="(labRequest, index) in labRequests">
                    <v-list-item :key="labRequest.id" @click="onLabRequestedClicked(labRequest.id)">
                      <template>
                        <v-list-item-content>
                          <v-list-item-subtitle>
                            <v-chip
                              class="ma-1"
                              v-for="(request, index) in labRequest.LabTests"
                              :key="index"
                            >{{ request }}</v-chip>
                          </v-list-item-subtitle>
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
                          <v-icon>mdi-circle-edit-outline</v-icon>
                        </v-list-item-action>
                      </template>
                    </v-list-item>
                    <v-divider :key="index"></v-divider>
                  </template>
                </v-list-item-group>
                <v-list-item-group v-if="tab== '1'">
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
        <LabRequest
          v-if="tab== '0'"
          v-bind:id="id"
          v-bind:showAddButton="true"
          v-bind:labRequest="selectedLabRequest"
        ></LabRequest>
        <ImagingRequest
          v-if="tab== '1'"
          v-bind:id="id"
          v-bind:imagingRequest="selectedImagingRequest"
        ></ImagingRequest>
      </v-card-text>
    </v-card>
  </v-container>
</template>
<script>
import ApiService from "../../../services/ApiService";
import LabRequest from "./LabRequest.vue";
import ImagingRequest from "./ImagingRequest.vue";
export default {
  name: "PatientExamination",
  props: ["id"],
  components: {
    LabRequest,
    ImagingRequest
  },
  data() {
    return {
      tab: null,
      imagingRequests: [],
      labRequests: [],
      selectedImagingRequest: null,
      selectedLabRequest: null,
      items: [
        { tab: "Laboratory", content: "Laboratory" },
        { tab: "Imaging", content: "Imaging" }
      ]
    };
  },
  methods: {
    getLabRequest() {
      ApiService.executeQueryPost("/patientLabRequests", {
        patientId: this.id
      })
        .then(response => {
          this.labRequests = response.data.data;
        })
        .catch(error => {});
    },
    getImagingRequest() {
      ApiService.executeQueryPost("/patientImagingRequests", {
        patientId: this.id
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
    },
    onLabRequestedClicked(id) {
      this.selectedLabRequest = this.labRequests.filter(
        labRequest => labRequest.id == id
      );
    }
  },
  created() {
    this.getImagingRequest();
    this.getLabRequest();
  }
};
</script>

<style>
</style>
